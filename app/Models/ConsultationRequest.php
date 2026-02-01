<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultationRequest extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'type',
        'topic',
        'payment_status',
        'attachments'
    ];

    protected $casts = [
        'attachments' => 'array',
    ];

    public function paymentTransaction()
    {
        return $this->hasOne(PaymentTransaction::class);
    }
}
