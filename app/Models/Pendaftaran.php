<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    // Mengarahkan ke tabel yang benar di database
    protected $table = 'pendaftarans';
    
    // Daftar kolom yang diizinkan untuk diisi (Mass Assignment)
    // Harus sama persis dengan nama kolom di HeidiSQL
    protected $fillable = [
        'nama_lengkap', 
        'email', 
        'nomor_wa', 
        'jenis_layanan', 
        'tanggal', 
        'jenis_konseling', 
        'keluhan', 
        'foto_ktp', 
        'status'
    ];
}