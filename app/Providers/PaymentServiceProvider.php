<?php

namespace App\Providers;

use App\Interfaces\PaymentGatewayInterface;
use App\Services\FatoorahPaymentService;
use App\Services\FatoorahService;
use App\Services\PaymobPaymentService;
use App\Services\PaypalPaymentService;
use App\Services\StudentPaymentService;
use App\Services\TapPaymentService;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(PaymentGatewayInterface::class, function ($app) {
            $gatewayType = request('gateway_type' , 'fatoorah');
            return match($gatewayType)
            {
                'tap' => $app->make(TapPaymentService::class),
                // 'fatoorah' => $app->make(FatoorahPaymentService::class),
                // 'paymob' => $app->make(PaymobPaymentService::class),
                // 'cash' => $app->make(FatoorahPaymentService::class),
                // 'paypal' => $app->make(PaypalPaymentService::class),
                default => throw new \Exception('Invalid gateway type'),
            };
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
