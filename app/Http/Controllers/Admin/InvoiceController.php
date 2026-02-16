<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentTransaction;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = PaymentTransaction::whereIn('status', ['CAPTURED', 'COMPLETED'])
            ->with('consultationRequest')
            ->latest()
            ->paginate(10);
        return view('admin.pages.invoices.index', compact('invoices'));
    }

    public function show($id)
    {
        $invoice = PaymentTransaction::with('consultationRequest')->findOrFail($id);
        return view('admin.pages.invoices.show', compact('invoice'));
    }
}
