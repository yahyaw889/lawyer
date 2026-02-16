<?php

namespace Database\Seeders;

use App\Models\SystemSetting;
use Illuminate\Database\Seeder;

class TapSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'key' => 'tap_secret_key',
                'value' => env('TAP_SECRET_KEY', ''),
                'group' => 'payment'
            ],
            [
                'key' => 'tap_public_key',
                'value' => env('TAP_PUBLIC_KEY', ''),
                'group' => 'payment'
            ],
            [
                'key' => 'tap_merchant_id',
                'value' => env('TAP_MERCHANT_ID', ''),
                'group' => 'payment'
            ],
        ];

        foreach ($settings as $setting) {
            SystemSetting::firstOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
