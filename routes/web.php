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
    Route::get('/services', 'services')->name('services');
    Route::get('/consultation', 'consultation')->name('consultation');
    Route::get('/request', 'request')->name('request');
    Route::post('/request/submit', 'storeRequest')->name('request.submit');
});
Route::controller(ConsultationController::class)->group(function(){
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
    Route::get('/', function () {
        return view('admin.pages.home');
    })->name('dashboard');

    // Consultations
    Route::get('/consultations', [\App\Http\Controllers\Admin\ConsultationRequestController::class, 'index'])->name('consultations.index');

    // Service Requests
    Route::get('/requests', [\App\Http\Controllers\Admin\ServiceRequestController::class, 'index'])->name('requests.index');
    Route::delete('/requests/{id}', [\App\Http\Controllers\Admin\ServiceRequestController::class, 'destroy'])->name('requests.destroy');

    // System Utilities
    Route::post('clear-cache', fn() => ['success' => true])->name('clear-cache');
    
});
