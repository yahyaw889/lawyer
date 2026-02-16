<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\PaymentTransaction;
use App\Services\TapPaymentService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CheckPendingPayments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payment:check-pending';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check status of pending payments with Tap API';

    /**
     * Execute the console command.
     */
    public function handle(TapPaymentService $paymentService)
    {
        $this->info('Starting pending payment check...');

        // Fetch transactions that are 'INITIATED' or 'PENDING'
        // Created more than 5 minutes ago and less than 24 hours ago
        $transactions = PaymentTransaction::whereIn('status', ['INITIATED', 'PENDING'])
            ->where('created_at', '<=', Carbon::now()->subMinutes(5))
            ->where('created_at', '>=', Carbon::now()->subHours(24))
            ->get();

        if ($transactions->isEmpty()) {
            $this->info('No pending transactions found requiring check.');
            return;
        }

        $this->info("Found {$transactions->count()} pending transactions.");

        foreach ($transactions as $transaction) {
            $this->info("Checking Transaction ID: {$transaction->id} (Tap ID: {$transaction->tap_id})");

            if (!$transaction->tap_id || $transaction->tap_id == 'N/A') {
                $this->warn("Skipping Transaction {$transaction->id} - Invalid Tap ID.");
                continue;
            }

            try {
                $charge = $paymentService->checkStatus($transaction->tap_id);
                $status = $charge['status'] ?? 'UNKNOWN';

                $this->info("Tap Status: {$status}");

                if ($status == 'CAPTURED') {
                    // Update Transaction
                    $transaction->update([
                        'status' => 'CAPTURED',
                        'transaction_response' => $charge
                    ]);

                    // Update Consultation
                    $transaction->consultationRequest()->update(['payment_status' => 'PAID']);

                    // Send Notification
                    // We instantiate the controller to reuse the notification logic
                    // Or ideally move this logic to a Service. For now, we'll duplicate the logic to avoid Controller instantiation complexity in CLI
                    $this->sendNotification($transaction);

                    $this->info("Transaction {$transaction->id} marked as CAPTURED and notification sent.");

                } elseif (in_array($status, ['FAILED', 'ABANDONED', 'CANCELLED', 'DECLINED'])) {
                     $transaction->update([
                        'status' => 'FAILED',
                        'transaction_response' => $charge
                    ]);
                    $this->info("Transaction {$transaction->id} marked as FAILED.");
                }

            } catch (\Exception $e) {
                Log::error("Error checking transaction {$transaction->id}: " . $e->getMessage());
                $this->error("Error checking transaction {$transaction->id}: " . $e->getMessage());
            }
        }

        $this->info('Pending payment check completed.');
    }

    private function sendNotification($transaction)
    {
        $token = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHAT_ID');

        if (!$token || !$chatId) {
            return;
        }

        $message = "🚨 *طلب استشارة فورية جديد* 🚨\n\n";
        $message .= "✅ *تم الدفع بنجاح (تم التحقق تلقائياً)*\n";
        $message .= "──────────────\n";
        $message .= "👤 *بيانات العميل:*\n";
        $message .= "• *الاسم:* " . $transaction->customer_name . "\n";
        $message .= "• *الهاتف:* " . $transaction->customer_phone . "\n";
        $message .= "• *البريد:* " . $transaction->customer_email . "\n\n";
        
        $message .= "💰 *بيانات الدفع:*\n";
        $message .= "• *المبلغ:* " . $transaction->amount . " SAR\n";
        $message .= "• *رقم المعاملة:* `" . $transaction->tap_id . "`\n";
        
        if ($transaction->consultation_topic) {
            $message .= "\n📝 *الموضوع:* \n" . $transaction->consultation_topic . "\n";
        }

        $message .= "\n📅 *التاريخ:* " . $transaction->created_at->format('Y-m-d H:i A');

        try {
            Http::withoutVerifying()->post("https://api.telegram.org/bot{$token}/sendMessage", [
                'chat_id' => $chatId,
                'text' => $message,
                'parse_mode' => 'Markdown',
            ]);
        } catch (\Exception $e) {
            Log::error('Telegram notification failed: ' . $e->getMessage());
        }
    }
}
