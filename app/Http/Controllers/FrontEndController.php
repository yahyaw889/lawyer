<?php

namespace App\Http\Controllers;

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
}
