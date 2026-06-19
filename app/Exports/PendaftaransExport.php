<?php

namespace App\Exports;

use App\Models\Pendaftaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PendaftaransExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Mengambil semua data
        return Pendaftaran::all();
    }

    public function headings(): array
    {
        // Menambahkan baris judul di file Excel
        return [
            'ID',
            'Nama',
            'Email',
            'WhatsApp',
            'Layanan',
            'Status',
            'Created At',
            'Updated At',
        ];
    }
}