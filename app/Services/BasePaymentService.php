<?php

namespace App\Services;

use Exception;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class BasePaymentService
{
    /**
     * Create a new class instance.
     */
    protected  $base_url;
    protected array $header;
    protected function buildRequest($method, $url, $data = null,$type='json')
    {
        /** @var Response $response */
        $response = Http::withHeaders($this->header)->withoutVerifying()->acceptJson()->timeout(50)->send($method, $this->base_url . $url, [
                $type => $data
            ]);
            if (!$response->successful()) {
                throw new Exception('حدث خطأ اثناء عملية الدفع: ' . $response->body());
            }
            return $response->json();
    }
}