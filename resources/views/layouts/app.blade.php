<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Kalih Aksa</title>
    
    <!-- CSS Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Sedikit sentuhan agar tampilan lebih rapi */
        body { background-color: #f8f9fc; }
        .stat-card { border-radius: 10px; transition: 0.3s; }
        .stat-card:hover { transform: translateY(-5px); }
    </style>
</head>
<body>

    <!-- Navigasi (Bisa kamu tambahkan navbar di sini nanti) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Kalih Aksa Admin</a>
        </div>
    </nav>

    <!-- Konten Halaman -->
    <div class="container">
        @yield('content')
    </div>

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- 
        Tempat untuk menampung script dari file lain.
        Semua @push('scripts') di halaman lain akan muncul di sini.
    -->
    @stack('scripts')
    
</body>
</html>