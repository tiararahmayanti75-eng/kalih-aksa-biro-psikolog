<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
// Import kelas notifikasi dan facade Notification
use App\Notifications\NewPendaftaranNotification;
use Illuminate\Support\Facades\Notification;

class PendaftaranController extends Controller
{
    // Fungsi untuk menyimpan pendaftaran baru
    public function store(Request $request)
    {
        // 1. Cek Honeypot (Keamanan Anti-Spam)
        if ($request->filled('honeypot')) {
            return back()->withErrors(['honeypot' => 'Aktivitas mencurigakan terdeteksi!']);
        }

        // 2. Validasi Input
        $request->validate([
            'nama_lengkap'    => 'required|string|max:255',
            'email'           => 'required|email',
            'foto_ktp'        => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'tanggal'         => 'required|date',
            'nomor_wa'        => 'required',
            'jenis_layanan'   => 'required',
        ]);

        // 3. Proses Upload File
        $fileName = null;
        if ($request->hasFile('foto_ktp')) {
            $fileName = time() . '_' . $request->file('foto_ktp')->getClientOriginalName();
            $request->file('foto_ktp')->move(public_path('uploads/images'), $fileName);
        }

        // 4. Simpan ke Database
        $pendaftaran = Pendaftaran::create([
            'nama_lengkap'    => $request->nama_lengkap,
            'email'           => $request->email,
            'nomor_wa'        => $request->nomor_wa,
            'jenis_layanan'   => $request->jenis_layanan,
            'tanggal'         => $request->tanggal,
            'jenis_konseling' => $request->jenis_konseling,
            'keluhan'         => $request->keluhan,
            'foto_ktp'        => $fileName,
            'status'          => 'Menunggu',
        ]);

        // Kirim notifikasi email ke admin
        Notification::route('mail', 'admin@kalihaksa.com')
                    ->notify(new NewPendaftaranNotification($pendaftaran));

        // 5. Redirect ke Halaman Sukses dengan pesan flash
        return redirect()->route('pendaftaran.sukses')
                         ->with('success', 'Pendaftaran Anda berhasil dikirim! Silakan tunggu konfirmasi kami.');
    }

    // Menampilkan form pencarian status
    public function cekStatus()
    {
        return view('cek_status');
    }

    // Mencari data berdasarkan email
    public function hasilStatus(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        
        // Mencari pendaftaran terbaru berdasarkan email
        $pendaftaran = Pendaftaran::where('email', $request->email)->latest()->first();

        return view('cek_status', compact('pendaftaran'));
    }
}