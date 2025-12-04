<?php

namespace App\Jobs;

use App\Models\ContactMessages;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendContactMessageToWhatsapp implements ShouldQueue
{
    use Dispatchable, Queueable, InteractsWithQueue, SerializesModels;

    public ContactMessages $contact;

    /**
     * Create a new job instance.
     */
    public function __construct(ContactMessages $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $toContact = config('services.whatsapp.admin_number');

        $textMessages = "*New Contact Messages*\n"
            . "Nama : {$this->contact->full_name}\n "
            . "Email : {$this->contact->email}\n "
            . "Subjek : {$this->contact->subject}\n "
            . "Pesan : {$this->contact->message}\n ";

        try {
            $response = Http::withHeaders([
                'Authorization' => config('services.whatsapp.token')
            ])
                ->asForm()
                ->post(
                    config('services.whatsapp.endpoint'),
                    [
                        'target'    => $toContact,
                        'message'   => $textMessages
                    ]
                );

            if ($response->successful()) {
                $this->contact->update([
                    'whatsapp_status'   => 'sent',
                    'whatsapp_sent_at'  => now(),
                    'whatsapp_number'   => config('services.whatsapp.admin_number'),
                ]);
            } else {
                $this->contact->update([
                    'whatsapp_status' => 'failed'
                ]);
            }
        } catch (\Throwable $e) {
            logger()->error('failed to send whatsapp message:', [
                'contact_id' => $this->contact->id,
                'error' => $e->getMessage()
            ]);
        }
    }
}
