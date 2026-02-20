<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'service_type',
        'message',
        'status',
        'has_political_activity',
        'company_name',
        'company_website',
        'commercial_record',
        'incorporation_contract',
        'company_capital',
        'premium_residency',
        'attachments'
    ];
    protected $casts = [
        'has_political_activity' => 'boolean',
        'premium_residency' => 'boolean',
        'attachments' => 'array',
    ];
}
