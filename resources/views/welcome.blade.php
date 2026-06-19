<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalih Aksa - Biro Psikologi & Konseling</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Tema Soft Pink & White */
        body {
            background: linear-gradient(135deg, #ffffff 0%, #fff0f2 100%);
            color: #5c4d50;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow-x: hidden;
        }

        .nav-admin { position: absolute; top: 20px; right: 20px; }
        
        .btn-outline-pink {
            background-color: #ffffff;
            color: #ff758f;
            border: 2px solid #ffb7c5;
            border-radius: 20px;
            padding: 6px 18px;
            font-size: 0.9rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 2px 6px rgba(255, 182, 193, 0.2);
        }
        .btn-outline-pink:hover { background-color: #ffe3e6; color: #ff4d6d; }

        .badge-biro {
            background-color: #ffccd5;
            color: #ff4d6d;
            font-weight: 700;
            font-size: 0.85rem;
            padding: 6px 16px;
            border-radius: 30px;
            display: inline-block;
            margin-bottom: 20px;
        }

        .hero-title { font-size: 3.5rem; font-weight: 800; color: #4a3f41; line-height: 1.2; margin-bottom: 20px; }
        .hero-desc { font-size: 1.1rem; color: #8a7679; line-height: 1.6; margin-bottom: 35px; max-width: 520px; }

        .btn-get-started {
            background-color: #ffb7c5;
            color: white;
            border: none;
            border-radius: 30px;
            padding: 12px 35px;
            font-size: 1.1rem;
            font-weight: 700;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 183, 197, 0.4);
        }
        .btn-get-started:hover { background-color: #ff99ac; color: white; transform: translateY(-2px); }

        .illustration-card {
            background: #ffffff;
            border: 1px solid #ffe3e6;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(255, 182, 193, 0.2);
            text-align: center;
        }
        .card-icon-wrapper { font-size: 4rem; margin-bottom: 15px; display: flex; justify-content: center; gap: 10px; }
        .card-title { font-size: 1.5rem; font-weight: 700; color: #4a3f41; margin-bottom: 15px; }
        .card-desc { font-size: 0.95rem; color: #8a7679; line-height: 1.6; margin: 0; }
    </style>
</head>
<body>

    <div class="nav-admin">
        <a href="{{ route('pendaftaran.admin') }}" class="btn-outline-pink">🔒 Panel Admin</a>
    </div>

    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <div class="mb-4 d-inline-block" style="padding: 10px; background: #ffffff; border-radius: 50%; box-shadow: 0 4px 10px rgba(255, 182, 193, 0.2);">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo Kalih Aksa" 
                         style="width: 120px; height: 120px; object-fit: contain; border-radius: 50%; display: block;"
                         onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name=Kalih+Aksa&background=random';">
                </div>
                
                <br>
                <span class="badge-biro">Biro Psikologi Kalih Aksa</span>
                <h1 class="hero-title">Temukan Kedamaian<br>dan Kenyamanan dalam Berbincang</h1>
                <p class="hero-desc">Kami hadir sebagai ruang aman bagi Anda untuk berbagi cerita, meringankan beban pikiran, dan melangkah menuju kesehatan mental yang lebih baik bersama psikolog ahli kami.</p>
                <a href="{{ route('pendaftaran.index') }}" class="btn-get-started">Get Started 🚀</a>
            </div>
            
            <div class="col-lg-5">
                <div class="illustration-card">
                    <div class="card-icon-wrapper">
                        <span>🧠</span>
                        <span style="font-size: 2.5rem; align-self: flex-start; color: #ffb7c5;">✨</span>
                    </div>
                    <h3 class="card-title">Mari Jaga Kesehatan Mentalmu</h3>
                    <p class="card-desc">Jangan dipendam sendiri, ribuan orang telah menemukan solusi terbaik lewat sesi konseling privat dan mendalam di platform kami.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>