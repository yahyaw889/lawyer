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
        ]);

        SystemSetting::setValue('consultation_price', $request->consultation_price, 'payment');

        return redirect()->route('admin.settings.index')->with('success', 'تم تحديث الإعدادات بنجاح');
    }
}
