<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = [
        'name',
        'phone_whatsapp',
        'company',
        'services',
        'message',
    ];

    protected $casts = [
        'services' => 'array',
    ];
}
