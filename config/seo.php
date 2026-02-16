<?php

return [
    'site_name' => 'AMN Global Law Firm',
    'default_title' => 'AMN Global Law Firm - Top Lawyers in Riyadh',
    'default_description' => 'AMN Global Law Firm provides expert legal services in Saudi Arabia, specializing in business formation, litigation, and investment law.',
    'default_image' => env('APP_URL') . '/img/logo.png', // Fallback image
    'default_keywords' => 'law firm, lawyers in riyadh, saudi arabia law, business setup saudi, litigation, investment law',
    
    'twitter' => [
        'site' => '@amn_law', // Twitter handle
        'creator' => '@amn_law',
    ],

    'geo' => [
        'enabled' => true,
        'region' => 'SA-01', // Riyadh Region
        'placename' => 'Riyadh',
        'position' => '24.7136;46.6753', // Riyadh coordinates
    ],
];
