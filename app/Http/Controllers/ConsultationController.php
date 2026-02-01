<?php

namespace App\Http\Controllers;

use App\Models\ConsultationRequest;
use App\Models\PaymentTransaction;
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

    public function submit(Request $request)
    {
        // 1. Validate Request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'type' => 'required|string',
            'topic' => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            // 2. Create Consultation Request (Pending)
            $consultation = ConsultationRequest::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'type' => $request->type,
                'topic' => $request->topic,
                'payment_status' => 'PENDING'
            ]);

            // 3. Prepare Data for Tap
            $parts = explode(' ', $request->name, 2);
            $firstName = $parts[0];
            $lastName = isset($parts[1]) ? $parts[1] : 'Client';

            $paymentData = [
                'amount' => 575,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $request->email,
                'phone_number' => $request->phone,
                'metadata' => [
                    'consultation_id' => $consultation->id
                ]
            ];

            // 4. Call Tap Service
            $response = $this->paymentService->sendPayment($paymentData);

            if (isset($response['transaction']['url'])) {
                // 5. Create Payment Transaction Record
                PaymentTransaction::create([
                    'consultation_request_id' => $consultation->id,
                    'tap_id' => $response['id'] ?? 'N/A', // Tap usually returns ID here
                    'status' => 'INITIATED',
                    'amount' => 575,
                    'customer_name' => $request->name,
                    'customer_email' => $request->email,
                    'customer_phone' => $request->phone,
                    'transaction_response' => $response
                ]);

                DB::commit();
                return redirect()->to($response['transaction']['url']);
            }

            DB::rollBack();
            Log::error('Tap Payment Error: ' . json_encode($response));
            return back()->with('error', 'Unable to initiate payment.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Consultation Payment Exception: ' . $e->getMessage());
            return back()->with('error', 'An error occurred. Please try again later.');
        }
    }

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
                    return view('frontend.pages.payment.success', ['payment' => $paymentInfo]);
                }
            }

            return view('frontend.pages.payment.failed');

        } catch (\Exception $e) {
            Log::error('Tap Callback Exception: ' . $e->getMessage());
            return view('frontend.pages.payment.failed');
        }
    }
}
