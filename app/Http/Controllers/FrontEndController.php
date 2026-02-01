<?php

namespace App\Http\Controllers;

use App\Jobs\TelegramNotification;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FrontEndController extends Controller
{
    /**
     * Display the language selection page.
     */
    public function languageSelection()
    {
        return view('frontend.language-selection');
    }

    /**
     * Display the main home page.
     */
    public function home()
    {
        return view('frontend.index');
    }

    /**
     * Display the About page.
     */
    public function about()
    {
        return view('frontend.pages.about');
    }

    /**
     * Display the Services page.
     */
    public function services()
    {
        return view('frontend.pages.services');
    }

    /**
     * Display the Consultation page.
     */
    public function consultation()
    {
        return view('frontend.pages.consultation');
    }

    /**
     * Display the Request page.
     */
    public function request()
    {
        return view('frontend.pages.request');
    }
    /**
     * Store a new service request.
     */
    public function storeRequest(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'service_type' => 'required|string',
            'message' => 'nullable|string',
        ]);

        $serviceRequest = ServiceRequest::create($validated);

        // Send Telegram Notification
        try {
            // Option 1: Queue (Commented out)
            // TelegramNotification::dispatch($serviceRequest);
            
            // Option 2: Synchronous (Active)
            $this->sendTelegramNotification($serviceRequest);
        } catch (\Exception $e) {
            // Continue even if notification fails
        }

        $message = __('frontend.messages.request_sent_successfully') ?? 'Your request has been sent successfully!';

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $message,
            ]);
        }

        return back()->with('success', $message);
    }

    /**
     * Send Telegram Notification Synchronously
     */
    private function sendTelegramNotification($order)
    {
        $token = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHAT_ID');

        if (!$token || !$chatId) {
            return;
        }

        $message = "🔔 *New Service Request*\n\n";
        $message .= "👤 *Name:* " . $order->name . "\n";
        $message .= "📞 *Phone:* " . $order->phone . "\n";
        $message .= "📧 *Email:* " . $order->email . "\n";
        $message .= "⚖️ *Service:* " . __('frontend.services_list.items.' . $order->service_type) . "\n";
        
        if ($order->message) {
            $message .= "📝 *Message:* " . $order->message . "\n";
        }

        $message .= "\n📅 *Date:* " . $order->created_at->format('Y-m-d H:i');

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
