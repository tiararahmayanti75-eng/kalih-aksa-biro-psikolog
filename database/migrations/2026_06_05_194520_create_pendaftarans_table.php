<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            // Menambahkan ->nullable() agar kolom tidak wajib diisi
            $table->string('email')->nullable();
            $table->string('whatsapp')->nullable(); 
            $table->string('layanan')->nullable();
            $table->date('jadwal_pilihan')->nullable(); 
            $table->string('metode')->nullable(); 
            $table->text('keluhan')->nullable();
            $table->string('status')->default('Menunggu'); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};