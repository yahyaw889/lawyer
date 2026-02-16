<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SystemSetting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $consultationPrice = SystemSetting::getValue('consultation_price', 575);
        return view('admin.pages.settings.index', compact('consultationPrice'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'consultation_price' => 'required|numeric|min:1',
            'tap_public_key' => 'nullable|string',
            'tap_secret_key' => 'nullable|string',
            'tap_merchant_id' => 'nullable|string',
        ]);

        SystemSetting::setValue('consultation_price', $request->consultation_price, 'payment');

        if ($request->filled('tap_public_key')) {
            SystemSetting::setValue('tap_public_key', $request->tap_public_key, 'payment');
        }
        
        if ($request->filled('tap_secret_key')) {
            SystemSetting::setValue('tap_secret_key', $request->tap_secret_key, 'payment');
        }

        if ($request->filled('tap_merchant_id')) {
            SystemSetting::setValue('tap_merchant_id', $request->tap_merchant_id, 'payment');
        } else {
             // If field is present but empty, clear it
             SystemSetting::setValue('tap_merchant_id', null, 'payment');
        }

        return redirect()->route('admin.settings.index')->with('success', 'تم تحديث الإعدادات بنجاح');
    }
}
