<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Store a new contact request
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        // Save to database
        $contact = ContactRequest::create($validated);

        // Send Telegram notification
        $this->sendTelegramNotification($contact);

        return response()->json([
            'success' => true,
            'message' => 'تم إرسال رسالتك بنجاح. سنتواصل معك قريباً.',
        ]);
    }

    /**
     * Display contact requests in admin dashboard
     */
    public function index()
    {
        $contacts = ContactRequest::latest()->paginate(20);
        return view('admin.pages.contacts.index', compact('contacts'));
    }

    /**
     * Send notification to Telegram
     */
    private function sendTelegramNotification(ContactRequest $contact)
    {
        $botToken = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHAT_ID');

        if (!$botToken || !$chatId) {
            Log::warning('Telegram credentials not configured');
            return;
        }

        $message = "🔔 *رسالة جديدة من موقع AMN Law*\n\n";
        $message .= "👤 *الاسم:* {$contact->name}\n";
        $message .= "📧 *البريد:* {$contact->email}\n";
        
        if ($contact->phone) {
            $message .= "📱 *الهاتف:* {$contact->phone}\n";
        }
        
        if ($contact->subject) {
            $message .= "📋 *الموضوع:* {$contact->subject}\n";
        }
        
        $message .= "\n💬 *الرسالة:*\n{$contact->message}";

        try {
            Http::post("https://api.telegram.org/bot{$botToken}/sendMessage", [
                'chat_id' => $chatId,
                'text' => $message,
                'parse_mode' => 'Markdown',
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to send Telegram notification: ' . $e->getMessage());
        }
    }

    /**
     * Update contact request status
     */
    public function updateStatus(Request $request, ContactRequest $contact)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,read,replied,archived',
        ]);

        $contact->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'تم تحديث الحالة بنجاح',
        ]);
    }
}
