<?php

namespace App\Http\Controllers;

use App\Enums\ServiceType;
use App\Jobs\TelegramNotification;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Enum;

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
    public function request(Request $request)
    {
        $selectedService = null;
        if ($request->has('service')) {
            $selectedService = ServiceType::tryFrom($request->query('service'));
        }
        return view('frontend.pages.request', compact('selectedService'));
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
            'service_type' => ['required', 'string', new Enum(ServiceType::class)],
            'message' => 'nullable|string',
        ]);

        // Convert enum value to Arabic label for storage
        $serviceEnum = ServiceType::from($validated['service_type']);
        $validated['service_type'] = $serviceEnum->labelAr();
        $validated['status'] = 'جديد';

        $serviceRequest = ServiceRequest::create($validated);

        // Send Telegram Notification
        try {
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
     * Display the FAQ page.
     */
    public function faq()
    {
        return view('frontend.pages.faq');
    }

    /**
     * Display the Legal Representation page.
     */
    public function legalRepresentation()
    {
        return view('frontend.pages.legal-representation');
    }

    public function documentAttestation()
    {
        return view('frontend.pages.document-attestation');
    }

    public function consultationRequest()
    {
        return view('frontend.pages.consultation-request');
    }

    public function businessServicesIndex()
    {
        return view('frontend.pages.business-services.index');
    }

    public function businessServiceShow($slug)
    {
        // Define valid slugs -> keys mapping to validate and finding key
        $services = [
            'government-platforms-management' => 'platforms_management',
            'commercial-license' => 'commercial_license',
            'premium-residency' => 'premium_residency',
            'intellectual-property' => 'intellectual_property',
            'company-formation' => 'company_formation',
            'business-liquidation' => 'business_liquidation',
        ];

        if (!array_key_exists($slug, $services)) {
            abort(404);
        }

        $serviceKey = $services[$slug];
        
        return view('frontend.pages.business-services.show', compact('serviceKey', 'slug'));
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

        $message = "🔔 *طلب خدمة جديد*\n\n";
        $message .= "👤 *الاسم:* " . $order->name . "\n";
        $message .= "📞 *الهاتف:* " . $order->phone . "\n";
        $message .= "📧 *البريد:* " . $order->email . "\n";
        $message .= "⚖️ *الخدمة:* " . $order->service_type . "\n";
        
        if ($order->message) {
            $message .= "📝 *الرسالة:* " . $order->message . "\n";
        }

        $message .= "\n📅 *التاريخ:* " . $order->created_at->format('Y-m-d H:i');

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
