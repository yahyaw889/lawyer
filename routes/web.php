<?php

use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==============================
// Frontend & Authentication
// ==============================

// Redirect root to login
Route::controller(FrontEndController::class)->group(function() {
    Route::get('/', 'languageSelection')->name('index');
    Route::get('/home', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/services', 'services')->name('services.index');
    Route::get('/consultation', 'consultation')->name('consultation');
    Route::get('/request', 'request')->name('request');
    Route::post('/request/submit', 'storeRequest')->name('request.submit');
    Route::get('/faq', 'faq')->name('faq');
    Route::get('/legal-representation', 'legalRepresentation')->name('legal-representation');
Route::get('/document-attestation', 'documentAttestation')->name('document-attestation');
Route::get('/consultation-request', 'consultationRequest')->name('consultation-request');
Route::get('/business-services', 'businessServicesIndex')->name('business-services.index');
Route::get('/business-services/{slug}', 'businessServiceShow')->name('business-services.show');
    Route::post('/contact/submit', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');
});
Route::controller(ConsultationController::class)->group(function(){
    Route::get('/consultation/checkout', 'showCheckout')->name('consultation.checkout');
    Route::post('/consultation/submit', 'submit')->name('consultation.submit');
    Route::any('/tap/callback', 'handleCallback')->name('tap.callback');
});


// Authentication Routes
Route::controller(LoginController::class)->group(function() {
    Route::get('login', 'showLoginForm')->name('login');
    Route::post('login', 'login');
    Route::post('logout', 'logout')->name('logout');
});


// ==============================
// Admin Dashboard
// ==============================
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    
    // Dashboard
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // Consultations
    Route::get('/consultations', [\App\Http\Controllers\Admin\ConsultationRequestController::class, 'index'])->name('consultations.index');

    // Service Requests
    Route::get('/requests', [\App\Http\Controllers\Admin\ServiceRequestController::class, 'index'])->name('requests.index');
    Route::delete('/requests/{id}', [\App\Http\Controllers\Admin\ServiceRequestController::class, 'destroy'])->name('requests.destroy');

    // Contact Requests
    Route::get('/contacts', [\App\Http\Controllers\ContactController::class, 'index'])->name('contacts.index');

    // System Utilities
    Route::post('clear-cache', fn() => ['success' => true])->name('clear-cache');

    // Settings
    Route::get('/settings', [\App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('settings.index');
    Route::put('/settings', [\App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('settings.update');

    // Payments
    Route::get('/payments', [\App\Http\Controllers\Admin\PaymentController::class, 'index'])->name('payments.index');

    // Invoices
    Route::get('/invoices', [\App\Http\Controllers\Admin\InvoiceController::class, 'index'])->name('invoices.index');
    Route::get('/invoices/{id}', [\App\Http\Controllers\Admin\InvoiceController::class, 'show'])->name('invoices.show');

    // Reports
    Route::get('/reports', [\App\Http\Controllers\Admin\ReportController::class, 'index'])->name('reports.index');
    
});
