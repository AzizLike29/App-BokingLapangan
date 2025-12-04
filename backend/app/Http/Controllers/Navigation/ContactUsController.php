<?php

namespace App\Http\Controllers\Navigation;

use Illuminate\Http\Request;
use App\Models\ContactMessages;
use App\Http\Controllers\Controller;
use App\Http\Requests\Navigation\ContactUsRequest;
use App\Jobs\SendContactMessageToWhatsapp;

class ContactUsController extends Controller
{
    public function store(ContactUsRequest $request)
    {
        // Data yang sudah tervalidasi di request
        $data = $request->validated();

        // Simpan data ke database
        $contact = ContactMessages::create($data);

        // Kirim ke job untuk send ke Whatsapp
        SendContactMessageToWhatsapp::dispatch($contact);

        return response()->json([
            'message' => 'Terima kasih, pesan berhasil dikirim, ditunggu ya.'
        ], 201);
    }
}
