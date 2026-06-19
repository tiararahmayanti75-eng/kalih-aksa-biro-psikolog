<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Counseling - Kalih Aksa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0 text-center">Form Pendaftaran Counseling</h4>
                </div>
                <div class="card-body">
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3" style="display: none;">
                            <label>Jangan isi kolom ini jika Anda manusia:</label>
                            <input type="text" name="honeypot" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Upload Foto KTP:</label>
                            <input type="file" name="foto_ktp" class="form-control" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap:</label>
                            <input type="text" name="nama_lengkap" class="form-control" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email:</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nomor WhatsApp:</label>
                                <input type="text" name="nomor_wa" class="form-control" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jenis Layanan:</label>
                                <select name="jenis_layanan" class="form-select" required>
                                    <option value="Konseling Individu">Konseling Individu</option>
                                    <option value="Konseling Couple">Konseling Couple</option>
                                    <option value="Konseling Remaja">Konseling Remaja</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jenis Konseling:</label>
                                <select name="jenis_konseling" class="form-select">
                                    <option value="Online">Online</option>
                                    <option value="Offline">Offline</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal:</label>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Keluhan:</label>
                            <textarea name="keluhan" class="form-control" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2">Kirim Pendaftaran</button>
                        
                        <a href="{{ route('pendaftaran.cekStatus') }}" class="d-block mt-3 text-center text-decoration-none">Sudah daftar? Cek status di sini</a>
                        
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>