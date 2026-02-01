<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ConsultationRequest;

class ConsultationRequestController extends Controller
{
    public function index()
    {
        $consultations = ConsultationRequest::with('paymentTransaction')->latest()->paginate(10);
        return view('admin.pages.consultations.index', compact('consultations'));
    }
}
