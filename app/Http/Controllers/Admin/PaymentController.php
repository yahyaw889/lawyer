<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentTransaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = PaymentTransaction::with('consultationRequest')->latest()->paginate(10);
        return view('admin.pages.payments.index', compact('payments'));
    }
}
