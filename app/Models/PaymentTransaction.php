<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentTransaction extends Model
{
    protected $fillable = [
        'tap_id',
        'status',
        'amount',
        'currency',
        'customer_name',
        'customer_email',
        'customer_phone',
        'consultation_topic',
        'consultation_request_id',
        'transaction_response'
    ];

    protected $casts = [
        'transaction_response' => 'array',
    ];

    public function consultationRequest()
    {
        return $this->belongsTo(ConsultationRequest::class);
    }
}
