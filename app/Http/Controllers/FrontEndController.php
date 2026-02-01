<?php

namespace App\Http\Controllers;

use App\Jobs\TelegramNotification;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;

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
            TelegramNotification::dispatch($serviceRequest);
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
}
