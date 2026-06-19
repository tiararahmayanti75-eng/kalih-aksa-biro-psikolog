<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pasien - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; }
        .card { border: none; box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15); border-radius: 10px; }
        .card-header { background-color: #fff; border-bottom: 1px solid #e3e6f0; font-weight: bold; }
        .detail-box { background-color: #f4f6f9; border-left: 4px solid #4e73df; }
    </style>
</head>
<body>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <div class="mb-3 d-flex justify-content-between">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary shadow-sm">
                        <i class="bi bi-arrow-left-circle"></i> Kembali ke Dashboard
                    </a>
                    
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.export') }}" class="btn btn-success shadow-sm">
                            <i class="bi bi-file-earmark-excel"></i> Excel
                        </a>

                        <a href="https://wa.me/{{ $pendaftaran->nomor_wa }}?text=Halo%20{{ $pendaftaran->nama_lengkap }},%20jadwal%20konseling%20Anda%20telah%20dikonfirmasi." 
                           target="_blank" class="btn btn-primary shadow-sm">
                            <i class="bi bi-whatsapp"></i> Kirim Pengingat WA
                        </a>

                        <form action="{{ route('admin.tandaiSelesai', $pendaftaran->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-primary shadow-sm">
                                <i class="bi bi-check-circle"></i> Selesai
                            </button>
                        </form>

                        <a href="{{ route('admin.cetakPdf', $pendaftaran->id) }}" class="btn btn-danger shadow-sm" target="_blank">
                            <i class="bi bi-file-earmark-pdf"></i> PDF
                        </a>
                    </div>
                </div>

                <div class="card shadow">
                    <div class="card-header py-3">
                        <h5 class="m-0 text-primary"><i class="bi bi-person-text"></i> Detail Pasien: {{ $pendaftaran->nama_lengkap }}</h5>
                    </div>
                    
                    <div class="card-body">
                        <p><strong>Email:</strong> {{ $pendaftaran->email ?? '-' }}</p>
                        <p><strong>Layanan:</strong> {{ $pendaftaran->jenis_layanan ?? '-' }}</p>
                        <p><strong>WhatsApp:</strong> {{ $pendaftaran->nomor_wa ?? '-' }}</p>
                        
                        <!-- Bagian yang diperbaiki disesuaikan dengan database -->
                        <p><strong>Jadwal:</strong> {{ $pendaftaran->hari ?? '-' }}, {{ $pendaftaran->tanggal ?? '-' }} {{ $pendaftaran->jam ?? '-' }}</p>
                        <p><strong>Metode:</strong> {{ $pendaftaran->jenis_konseling ?? '-' }}</p>
                        
                        <div class="mb-3">
                            <strong class="text-muted">Keluhan Lengkap:</strong>
                            <div class="p-4 rounded detail-box mt-2">
                                {{ $pendaftaran->keluhan ?? 'Tidak ada keluhan.' }}
                            </div>
                        </div>
                        
                        <div class="mt-3">
                            <strong>Foto KTP:</strong><br>
                            @if($pendaftaran->foto_ktp) 
                                <img src="{{ asset('uploads/images/' . $pendaftaran->foto_ktp) }}" 
                                     class="img-fluid border mt-2" style="max-width: 400px;" alt="KTP">
                            @else
                                <p class="text-muted mt-2">Foto KTP tidak tersedia.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>