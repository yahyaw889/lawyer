<?php

namespace App\Http\Controllers;

use App\Enums\ServiceType;
use App\Jobs\TelegramNotification;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Support\Str;

class FrontEndController extends Controller
{
    protected $seoService;

    public function __construct(\App\Services\SeoService $seoService)
    {
        $this->seoService = $seoService;
    }

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
        $this->seoService
            ->setTitle(__('frontend.hero.slogan'))
            ->setDescription(__('frontend.hero.subtitle'))
            ->addSchema([
                '@type' => 'LegalService',
                'name' => 'AMN Global Law Firm',
                'image' => asset('img/logo.png'),
                'description' => __('frontend.hero.subtitle'),
                'telephone' => '+966555200816',
                'email' => 'info@amn-law.sa',
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => 'Riyadh',
                    'addressLocality' => 'Riyadh',
                    'addressRegion' => 'Riyadh',
                    'postalCode' => '12345',
                    'addressCountry' => 'SA'
                ],
                'priceRange' => '$$$',
                'openingHoursSpecification' => [
                    [
                        '@type' => 'OpeningHoursSpecification',
                        'dayOfWeek' => ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'],
                        'opens' => '09:00',
                        'closes' => '17:00'
                    ]
                ],
                'geo' => [
                    '@type' => 'GeoCoordinates',
                    'latitude' => '24.7136',
                    'longitude' => '46.6753'
                ]
            ]);

        return view('frontend.index');
    }

    /**
     * Display the About page.
     */
    public function about()
    {
        $this->seoService
            ->setTitle(__('frontend.nav.about'))
            ->setDescription(__('frontend.vision_mission.vision'));

        return view('frontend.pages.about');
    }

    /**
     * Display the Services page.
     */
    public function services()
    {
        $this->seoService
            ->setTitle(__('frontend.nav.services'))
            ->setDescription('Explore our comprehensive legal services including business formation, litigation, and investment law.');

        return view('frontend.pages.services');
    }

    /**
     * Display the Consultation page.
     */
    public function consultation()
    {
        $this->seoService
            ->setTitle(__('frontend.nav.consultation'))
            ->setDescription('Book a legal consultation with our expert lawyers in Riyadh.');

        return view('frontend.pages.consultation');
    }

    /**
     * Display the Request page.
     */
    public function request(Request $request)
    {
        $selectedService = null;
        if ($request->has('service')) {
            $serviceSlug = $request->query('service');
            if ($serviceSlug === 'attestation') {
                $selectedService = ServiceType::DOCUMENT_ATTESTATION;
            } else {
                $selectedService = ServiceType::tryFrom($serviceSlug);
            }
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
            'has_political_activity' => 'nullable|boolean',
            'company_name' => 'nullable|string|max:255',
            'company_website' => 'nullable|url|max:255',
            'commercial_record' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'incorporation_contract' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'company_capital' => 'nullable|in:50000_to_500000,500000_to_10000000,more_than_10000000',
            'premium_residency' => 'nullable|boolean',
            'attachments' => 'nullable|array|max:5',
            'attachments.*' => 'file|max:10240',
        ]);

        // Convert enum value to Arabic label for storage
        $serviceEnum = ServiceType::from($validated['service_type']);
        $validated['service_type'] = $serviceEnum->labelAr();
        $validated['status'] = 'جديد';

        // Handle File Uploads
        if ($request->hasFile('commercial_record')) {
            $validated['commercial_record'] = $request->file('commercial_record')->store('service_requests/commercial_records', 'public');
        }

        if ($request->hasFile('incorporation_contract')) {
            $validated['incorporation_contract'] = $request->file('incorporation_contract')->store('service_requests/incorporation_contracts', 'public');
        }

        if ($request->hasFile('attachments')) {
            $attachmentPaths = [];
            foreach ($request->file('attachments') as $file) {
                $attachmentPaths[] = $file->store('service_requests/attachments', 'public');
            }
            $validated['attachments'] = $attachmentPaths;
        }

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
        $this->seoService
            ->setTitle(__('faq.title'))
            ->setDescription(__('faq.subtitle'))
            ->addSchema([
                '@type' => 'FAQPage',
                'mainEntity' => [
                    [
                        '@type' => 'Question',
                        'name' => __('faq.apostille.title'),
                        'acceptedAnswer' => [
                            '@type' => 'Answer',
                            'text' => strip_tags(__('faq.apostille.content'))
                        ]
                    ],
                    [
                        '@type' => 'Question',
                        'name' => __('faq.premium_residency.title'),
                        'acceptedAnswer' => [
                            '@type' => 'Answer',
                            'text' => strip_tags(__('faq.premium_residency.content'))
                        ]
                    ]
                ]
            ]);

        return view('frontend.pages.faq');
    }

    /**
     * Display the Legal Representation page.
     */
    public function legalRepresentation()
    {
        $this->seoService
            ->setTitle(__('frontend.services_list.items.legal_representation'))
            ->setDescription('Expert legal representation in Saudi courts for commercial and civil cases.');

        return view('frontend.pages.legal-representation');
    }

    public function documentAttestation()
    {
        $this->seoService
            ->setTitle(__('frontend.services_list.items.document_attestation'))
            ->setDescription('Fast and reliable document attestation and apostille services in Riyadh.');

        return view('frontend.pages.document-attestation');
    }

    public function consultationRequest()
    {
        $this->seoService
            ->setTitle(__('frontend.services_list.items.consultation_request'))
            ->setDescription('Request a legal consultation with AMN Global Law Firm.');

        return view('frontend.pages.consultation-request');
    }

    public function businessServicesIndex()
    {
        $this->seoService
            ->setTitle(__('business_services.index.title'))
            ->setDescription('Comprehensive business legal services: Company Formation, Licensing, IP Protection, and more.');

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
        
        $this->seoService
            ->setTitle(__('business_services.services.' . $serviceKey . '.title'))
            ->setDescription(Str::limit(__('business_services.services.' . $serviceKey . '.description'), 160));

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
            $message .= "📝 *الرسالة:* \n" . $order->message . "\n";
        }

        // Add extra business fields to Telegram notification if they exist
        if ($order->has_political_activity !== null) {
            $message .= "🏛 *نشاط سياسي:* " . ($order->has_political_activity ? 'نعم' : 'لا') . "\n";
        }
        if ($order->company_name) {
            $message .= "🏢 *اسم الشركة:* " . $order->company_name . "\n";
        }
        if ($order->company_website) {
            $message .= "🌐 *موقع الشركة:* " . $order->company_website . "\n";
        }
        if ($order->company_capital) {
            $capitals = [
                '50000_to_500000' => 'من 50,000 إلى 500,000',
                '500000_to_10000000' => 'من 500,000 إلى 10,000,000',
                'more_than_10000000' => 'أكثر من 10,000,000',
            ];
            $message .= "💰 *رأس المال:* " . ($capitals[$order->company_capital] ?? $order->company_capital) . "\n";
        }
        if ($order->premium_residency !== null) {
            $message .= "🌟 *إقامة مميزة:* " . ($order->premium_residency ? 'نعم' : 'لا') . "\n";
        }
        if ($order->commercial_record) {
            $message .= "📎 *السجل التجاري:* مرفق\n";
        }
        if ($order->incorporation_contract) {
            $message .= "📎 *عقد التأسيس:* مرفق\n";
        }
        if (!empty($order->attachments)) {
            $count = count($order->attachments);
            $message .= "📎 *مرفقات إضافية:* مرفق ({$count} ملفات)\n";
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
