<?php

namespace App\Http\Controllers\Navigation;

use App\Models\Court;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Navigation\ExperienceRequest;

class ExperienceController extends Controller
{
    public function store(ExperienceRequest $request)
    {
        // Data yang sudah tervalidasi di request
        $data = $request->validated();

        // Simpan data ke database
        $court = Court::create([
            'name'             => $data['name'],
            'city'             => $data['city'],
            'district'         => $data['district'],
            'image_url'        => $data['image_url'],
            'open_time'        => $data['open_time'],
            'close_time'       => $data['close_time'],
            'field_count'      => $data['field_count'],
            'maps_url'         => $data['maps_url'],
            'contact_name'     => $data['contact_name'],
            'contact_whatsapp' => $data['contact_whatsapp'],
            'rating'           => $data['rating']
        ]);

        return response()->json([
            'message' => 'Data Lapangan Berhasil Ditambah',
            'court' => $court,
        ]);
    }
}
