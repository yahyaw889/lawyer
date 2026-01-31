<?php

namespace App\Services;

use App\Interfaces\PaymentGatewayInterface;
use Exception;
use Illuminate\Http\Request;

class TapPaymentService extends BasePaymentService implements PaymentGatewayInterface
{
    /**
     * Create a new class instance.
     */
    protected $secret_key;

    public function __construct()
    {
        $this->base_url = config("payment.tap.base_url");
        $this->secret_key = config("payment.tap.secret_key");
        $this->header = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->secret_key
        ];
    }

    public function sendPayment($request)
    {
        $data = $this->formatData($request['amount'], $request['first_name'], $request['last_name'], $request['phone_number'], $request['email']);
        $response = $this->buildRequest('POST', 'v2/charges', $data);
        return $response;
    }

    public function callBack(Request $request)
    {
        if (isset($request['tap_id'])) {
             // Verify the transaction status by calling checkStatus or inspecting the request if trusted
             // Ideally, we should fetch the charge status from Tap to be secure
             $charge = $this->checkStatus($request['tap_id']);
             
             if(isset($charge['status']) && $charge['status'] == 'CAPTURED') {
                 return $charge;
             }
        }
        
        throw new Exception('حدث خطأ اثناء عملية الدفع');
    }

    public function checkStatus($chargeId)
    {
        // Tap allows retrieving charge by ID
        $response = $this->buildRequest('GET', 'v2/charges/' . $chargeId);
        return $response;
    }

    protected function formatData($amount, $first_name, $last_name, $phone_number, $email)
    {
        return [
            "amount" => $amount,
            "currency" => "EGP",
            "threeDSecure" => true,
            "save_card" => false,
            "description" => "Payment for invoice",
            "statement_descriptor" => "Invoice Payment",
            "metadata" => [
                "udf1" => "Metadata 1"
            ],
            "reference" => [
                "transaction" => "txn_" . time(),
                "order" => "ord_" . time() 
            ],
            "receipt" => [
                "email" => true,
                "sms" => true
            ],
            "customer" => [
                "first_name" => $first_name,
                "last_name" => $last_name,
                "email" => $email,
                "phone" => [
                    "country_code" => "20", 
                    "number" => $phone_number
                ]
            ],
            "source" => [
                "id" => "src_all"
            ],
            "post" => [
                 "url" => config('payment.tap.response_url') 
            ],
            "redirect" => [
                "url" => config('payment.tap.redirect_url') 
            ]
        ];
    }
}
