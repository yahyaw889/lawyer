<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    /**
     * Display the single-page application.
     */
    public function index()
    {
        return view('frontend.index');
    }
}
