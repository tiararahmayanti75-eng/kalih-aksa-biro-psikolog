<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewPendaftaranNotification extends Notification
{
    use Queueable;

    public $pendaftaran;

    // Menerima data pendaftaran saat notifikasi dipanggil
    public function __construct($pendaftaran)
    {
        $this->pendaftaran = $pendaftaran;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Ada Pendaftar Baru: ' . $this->pendaftaran->nama_lengkap)
            ->line('Halo Admin, ada pendaftar baru nih!')
            ->line('Nama: ' . $this->pendaftaran->nama_lengkap)
            ->line('Email: ' . $this->pendaftaran->email)
            ->line('Nomor WA: ' . $this->pendaftaran->nomor_wa)
            ->line('Layanan: ' . $this->pendaftaran->jenis_layanan)
            ->line('Keluhan: ' . $this->pendaftaran->keluhan)
            ->action('Lihat Database', url('/')) 
            ->line('Segera hubungi pendaftar ya!');
    }
}