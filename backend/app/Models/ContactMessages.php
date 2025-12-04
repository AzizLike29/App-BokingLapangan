<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessages extends Model
{

    protected $table = 'contact_messages';

    protected $fillable = [
        'full_name',
        'email',
        'subject',
        'message',
        'whatsapp_status',
        'whatsapp_sent_at',
    ];

    // Casting tipe data
    protected $casts = [
        'whatsapp_sent_at' => 'datetime',
    ];
}
