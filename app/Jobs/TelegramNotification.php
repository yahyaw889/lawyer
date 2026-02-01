<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\OrderCreatedNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;


class TelegramNotification implements ShouldQueue
{
    use Dispatchable, Queueable, SerializesModels;

    protected $order;
    protected $users;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function handle()
    {
        $token = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHAT_ID');

        if (!$token || !$chatId) {
            return;
        }

        $message = "🔔 *New Service Request*\n\n";
        $message .= "👤 *Name:* " . $this->order->name . "\n";
        $message .= "📞 *Phone:* " . $this->order->phone . "\n";
        $message .= "📧 *Email:* " . $this->order->email . "\n";
        $message .= "⚖️ *Service:* " . __('frontend.services_list.items.' . $this->order->service_type) . "\n";
        
        if ($this->order->message) {
            $message .= "📝 *Message:* " . $this->order->message . "\n";
        }

        $message .= "\n📅 *Date:* " . $this->order->created_at->format('Y-m-d H:i');

        try {
            Http::withoutVerifying()->post("https://api.telegram.org/bot{$token}/sendMessage", [
                'chat_id' => $chatId,
                'text' => $message,
                'parse_mode' => 'Markdown',
            ]);
        } catch (\Exception $e) {
            // Log error or fail silently
            Log::error('Telegram notification failed: ' . $e->getMessage());
        }
    }
}
