<?php

namespace App\Imports;

use App\Models\Pendaftaran;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PendaftaranImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Pendaftaran([
            // Kiri: nama kolom di database | Kanan: nama header di file Excel
            'nama_lengkap'   => $row['nama_lengkap'] ?? null,
            'email'          => $row['email'] ?? null,
            'nomor_wa'       => $row['whatsapp'] ?? null,
            'jenis_layanan'  => $row['layanan'] ?? null,
            'keluhan'        => $row['keluhan'] ?? null,
            'status'         => $row['status'] ?? 'Menunggu',
        ]);
    }
}