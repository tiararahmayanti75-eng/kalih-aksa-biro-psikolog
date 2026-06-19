<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Kalih Aksa Biro Psikolog Baru</title>
    <!-- Menggunakan Bootstrap untuk tampilan yang rapi -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; }
        .navbar-brand { font-weight: bold; color: #4e73df !important; }
        .card { border: none; box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15); }
        .table-responsive { background: #fff; padding: 20px; border-radius: 8px; }
    </style>
</head>
<body>

    <!-- Navbar Atas -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand text-white" href="#">
                <i class="bi bi-shield-lock-fill"></i> Admin Kalih Aksa
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><i class="bi bi-speedometer2"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="{{ route('logout') }}"><i class="bi bi-box-arrow-right"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten Utama Dashboard -->
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Pendaftaran Psikolog Baru</h1>
        </div>

        <!-- Notifikasi Sukses Aksi -->
        @if(session('sukses'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('sukses') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Tabel Data Pendaftar -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle" width="100%" cellspacing="0">
                        <thead class="table-light">
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Layanan Psikologi</th>
                                <th>Status</th>
                                <th width="20%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($semua_pendaftaran as $index => $pendaftar)
                            <tr>
                                <td>{{ $semua_pendaftaran->firstItem() + $index }}</td>
                                <td>{{ $pendaftar->nama }}</td>
                                <td>{{ $pendaftar->email }}</td>
                                <td>{{ $pendaftar->layanan ?? 'Belum Memilih' }}</td>
                                <td>
                                    @if($pendaftar->status == 'Menunggu' || $pendaftar->status == 'Pending')
                                        <span class="badge bg-warning text-dark">Menunggu</span>
                                    @elseif($pendaftar->status == 'Proses')
                                        <span class="badge bg-primary">Proses</span>
                                    @else
                                        <span class="badge bg-success">Selesai</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-inline-flex">
                                        <!-- Tombol Detail -->
                                        <a href="{{ route('pendaftaran.detail', $pendaftar->id) }}" class="btn btn-info btn-sm text-white me-1">
                                            <i class="bi bi-eye"></i> Detail
                                        </a>

                                        <!-- Form Tombol Setujui (Mengubah status jadi Selesai/Proses) -->
                                        <form action="{{ route('pendaftaran.updateStatus', $pendaftar->id) }}" method="POST" class="me-1">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success btn-sm" title="Setujui" @if($pendaftar->status == 'Selesai') disabled @endif>
                                                <i class="bi bi-check-circle"></i>
                                            </button>
                                        </form>

                                        <!-- Form Tombol Hapus -->
                                        <form action="{{ route('pendaftaran.destroy', $pendaftar->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">Belum ada data pendaftaran yang masuk.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Tombol Navigasi Halaman (Pagination) -->
                <div class="mt-3">
                    {{ $semua_pendaftaran->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>