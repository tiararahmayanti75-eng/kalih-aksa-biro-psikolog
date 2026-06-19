<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Berhasil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">
    
    <div class="card shadow text-center p-5" style="max-width: 500px;">
        
        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        <h2 class="text-success mb-3">Berhasil!</h2>
        <p>Terima kasih telah mendaftar. Data Anda telah kami terima.</p>
        <p>Admin kami akan segera menghubungi Anda melalui WhatsApp.</p>
        
        <div class="d-grid gap-2">
            <a href="https://wa.me/62895806700908" class="btn btn-success mt-2">Chat Admin via WhatsApp</a>
            <a href="/" class="btn btn-outline-primary mt-2">Kembali ke Beranda</a>
        </div>
    </div>

</body>
</html>