<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cek Status Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">
    <div class="container" style="max-width: 600px;">
        <div class="card shadow p-4">
            <h3>Cek Status Pendaftaran</h3>
            <form action="{{ route('pendaftaran.hasilStatus') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Masukkan Email Anda:</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Cek Status</button>
                <a href="/" class="btn btn-secondary">Kembali</a>
            </form>

            @if(isset($pendaftaran))
                <div class="mt-4 p-3 border rounded bg-white">
                    <h5>Hasil Pencarian:</h5>
                    <p>Nama: <b>{{ $pendaftaran->nama_lengkap }}</b></p>
                    <p>Status: <span class="badge bg-info">{{ $pendaftaran->status }}</span></p>
                </div>
            @elseif(isset($_POST['email']))
                <div class="alert alert-danger mt-4">Data dengan email tersebut tidak ditemukan.</div>
            @endif
        </div>
    </div>
</body>
</html>