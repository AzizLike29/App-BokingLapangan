<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    protected $fillable = [
        'name',
        'city',
        'district',
        'image_url',
        'open_time',
        'close_time',
        'field_count',
        'maps_url',
        'contact_name',
        'contact_whatsapp',
        'rating',
    ];
}
