<?php

namespace App\Http\Controllers;

use App\Models\ConsultationRequest;
use App\Models\PaymentTransaction;
use App\Models\SystemSetting;
use App\Services\TapPaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ConsultationController extends Controller
{
    protected $paymentService;

    public function __construct(TapPaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    /**
     * Show the checkout page with the consultation form and payment summary.
     */
    public function showCheckout()
    {
        $price = SystemSetting::getValue('consultation_price', 575);
        return view('frontend.pages.payment.checkout', compact('price'));
    }

    /**
     * Submit the consultation request and initiate Tap payment.
     */
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'type' => 'required|string',
            'topic' => 'nullable|string',
            'payment_method' => 'required|in:pay_now,pay_later',
        ]);

        $price = SystemSetting::getValue('consultation_price', 575);

        DB::beginTransaction();
        try {
            // 1. Create Consultation Request
            $consultation = ConsultationRequest::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'type' => $request->type,
                'topic' => $request->topic,
                'payment_status' => $request->payment_method === 'pay_later' ? 'UNPAID' : 'PENDING'
            ]);

            // Handle Pay Later
            if ($request->payment_method === 'pay_later') {
                DB::commit();

                // Send Telegram Notification for Pay Later
                try {
                    $this->sendTelegramNotification(null, $consultation);
                } catch (\Exception $e) {
                    Log::error('Telegram notification failed: ' . $e->getMessage());
                }

                return response()->json([
                    'success' => true,
                    'redirect_url' => route('consultation.success.later') // You might need to create this route or reuse success page
                ]);
            }

            // 2. Prepare Data for Tap (Pay Now)
            $parts = explode(' ', $request->name, 2);
            $firstName = $parts[0];
            $lastName = isset($parts[1]) ? $parts[1] : 'Client';

            // No token needed for Redirect flow (defaults to src_all in Service)
            $paymentData = [
                'amount' => (float) $price,
                'currency' => 'SAR',
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $request->email,
                'phone_number' => $request->phone,
                'metadata' => [
                    'consultation_id' => $consultation->id
                ]
            ];

            // 3. Call Tap Service
            $response = $this->paymentService->sendPayment($paymentData);

            if (isset($response['transaction']['url'])) {
                // 4. Create Payment Transaction Record
                PaymentTransaction::create([
                    'consultation_request_id' => $consultation->id,
                    'tap_id' => $response['id'] ?? 'N/A',
                    'status' => 'INITIATED',
                    'amount' => (float) $price,
                    'customer_name' => $request->name,
                    'customer_email' => $request->email,
                    'customer_phone' => $request->phone,
                    'consultation_topic' => $request->topic,
                    'transaction_response' => $response
                ]);

                DB::commit();

                // Return JSON with redirect URL for AJAX
                return response()->json([
                    'success' => true,
                    'redirect_url' => $response['transaction']['url']
                ]);
            }

            DB::rollBack();
            Log::error('Tap Payment Error: ' . json_encode($response));
            return response()->json([
                'success' => false,
                'message' => 'تعذر بدء عملية الدفع. يرجى المحاولة مرة أخرى.'
            ], 422);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Consultation Payment Exception: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء المعالجة. يرجى المحاولة لاحقاً.'
            ], 500);
        }
    }

    /**
     * Handle the Tap callback after payment.
     */
    public function handleCallback(Request $request)
    {
        try {
            $paymentInfo = $this->paymentService->callBack($request);
            $tapId = $request->input('tap_id');

            // Find transaction by Tap ID
            $transaction = PaymentTransaction::where('tap_id', $tapId)->first();

            if ($transaction) {
                // Update Transaction
                $status = ($paymentInfo['status'] ?? '') == 'CAPTURED' ? 'CAPTURED' : 'FAILED';
                $transaction->update([
                    'status' => $status,
                    'transaction_response' => $paymentInfo
                ]);

                // Update Consultation Request
                if ($status == 'CAPTURED') {
                    $transaction->consultationRequest()->update(['payment_status' => 'PAID']);

                    // Send Telegram notification
                    try {
                        $this->sendTelegramNotification($transaction, $transaction->consultationRequest);
                    } catch (\Exception $e) {
                        Log::error('Telegram notification failed: ' . $e->getMessage());
                    }

                    return view('frontend.pages.payment.success', ['payment' => $paymentInfo]);
                }
            }

            return view('frontend.pages.payment.failed');

        } catch (\Exception $e) {
            Log::error('Tap Callback Exception: ' . $e->getMessage());
            return view('frontend.pages.payment.failed');
        }
    }

    /**
     * Show the success page for Pay Later requests.
     */
    public function successLater()
    {
        return view('frontend.pages.payment.success-later');
    }

    /**
     * Send Telegram notification for successful payment.
     */
    private function sendTelegramNotification($transaction = null, $consultation = null)
    {
        $token = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHAT_ID');

        if (!$token || !$chatId) {
            return;
        }

        // Determine data source
        $name = $transaction ? $transaction->customer_name : $consultation->name;
        $phone = $transaction ? $transaction->customer_phone : $consultation->phone;
        $email = $transaction ? $transaction->customer_email : $consultation->email;
        $topic = $transaction ? $transaction->consultation_topic : $consultation->topic;
        $amount = $transaction ? $transaction->amount : SystemSetting::getValue('consultation_price', 575);
        $date = ($transaction ? $transaction->created_at : $consultation->created_at)->format('Y-m-d H:i A');
        $isPayLater = $consultation && $consultation->payment_status === 'UNPAID';

        $message = "🚨 *طلب استشارة فورية جديد* 🚨\n\n";

        if ($isPayLater) {
            $message .= "⏳ *دفع لاحقاً (تحويل بنكي / مؤجل)*\n";
        } else {
            $message .= "✅ *تم الدفع بنجاح*\n";
        }

        $message .= "──────────────\n";
        $message .= "👤 *بيانات العميل:*\n";
        $message .= "• *الاسم:* " . $name . "\n";
        $message .= "• *الهاتف:* " . $phone . "\n";
        $message .= "• *البريد:* " . $email . "\n\n";

        if (!$isPayLater) {
            $message .= "💰 *بيانات الدفع:*\n";
            $message .= "• *المبلغ:* " . $amount . " SAR\n";
            $message .= "• *رقم المعاملة:* `" . $transaction->tap_id . "`\n";
        }

        if ($topic) {
            $message .= "\n📝 *الموضوع:* \n" . $topic . "\n";
        }

        $message .= "\n📅 *التاريخ:* " . $date;

        try {
            \Illuminate\Support\Facades\Http::withoutVerifying()->post("https://api.telegram.org/bot{$token}/sendMessage", [
                'chat_id' => $chatId,
                'text' => $message,
                'parse_mode' => 'Markdown',
            ]);
        } catch (\Exception $e) {
            Log::error('Telegram notification failed: ' . $e->getMessage());
        }
    }
}
