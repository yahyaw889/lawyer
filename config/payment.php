<?php  

return [


//     'paymob' => [
//         'api_key' => env('PAYMOB_API_KEY'),
//         'integrations_id' => env('PAYMOB_INTEGRATIONS_ID' , [5197573, 5197572]),
//         'base_url' => env('PAYMOB_BASE_URL'),
//     ],


    'tap' => [
        'base_url' => env('TAP_BASE_URL', 'https://api.tap.company/'),
        'secret_key' => env('TAP_SECRET_KEY'),
        'redirect_url' => env('TAP_REDIRECT_URL'),
        'response_url' => env('TAP_RESPONSE_URL'),
    ],



//     'fatoorah' => [
//         'base_url' => env('FATOORAH_BASE_URL' ),
//         'token' => env('FATOORAH_TOKEN'),
//     ],





//     'paypal' => [
//         'mode' => env('PAYPAL_MODE'),
//         'client_id' => env('PAYPAL_SANDBOX_CLIENT_ID'),
//         'client_secret' => env('PAYPAL_SANDBOX_CLIENT_SECRET'),
//     ],

//     'currency' => env('CURRENCY_KEY', '0543123ac564fd3b9a15b6f2c4418937'),





];