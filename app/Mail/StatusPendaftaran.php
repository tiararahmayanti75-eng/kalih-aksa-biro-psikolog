<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StatusPendaftaran extends Mailable
{
    use Queueable, SerializesModels;

    // Variabel ini akan dikirim ke view email
    public $pasien; 

    /**
     * Create a new message instance.
     */
    public function __construct($pasien)
    {
        $this->pasien = $pasien;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Update Status Pendaftaran - Kalih Aksa',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.status', 
        );
    }
}