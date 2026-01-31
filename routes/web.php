<?php

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
    Route::get('/', 'index')->name('index');
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
    Route::get('/dashboard', function () {
        return view('admin.pages.home');
    })->name('dashboard');

    // System Utilities
    Route::post('clear-cache', fn() => ['success' => true])->name('clear-cache');
    
});
