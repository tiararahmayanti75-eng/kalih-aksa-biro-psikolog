<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Konseling - Kalih Aksa</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #fbf6f7;
            color: #4a4a4a;
            position: relative;
            overflow-x: hidden;
        }

        /* Dekorasi background gelombang estetik */
        .bg-wave {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 320px;
            background: linear-gradient(135deg, #f3cbd6 0%, #e8a7bb 100%);
            z-index: -1;
            border-radius: 0 0 50px 50px;
        }

        .brand-logo { 
            color: #ffffff; 
            font-weight: 700; 
            letter-spacing: 0.5px;
        }
        
        .brand-logo i { color: #fff; }

        /* Gaya Form Card per Kelompok Data */
        .form-block-card {
            background: #ffffff;
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(214, 125, 154, 0.08);
            padding: 30px;
            margin-bottom: 25px;
            transition: transform 0.3s ease;
        }

        .form-block-card:hover {
            transform: translateY(-2px);
        }

        .block-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: #c46985;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .block-title i {
            background-color: #fff0f3;
            color: #d67d9a;
            padding: 6px 10px;
            border-radius: 10px;
            font-size: 1.1rem;
        }

        /* Form Controls Custom */
        .form-label {
            font-weight: 600;
            font-size: 0.85rem;
            color: #555;
            margin-bottom: 6px;
        }

        .form-control, .form-select {
            border: 1.5px solid #f0dfe3;
            border-radius: 12px;
            padding: 11px 16px;
            font-size: 0.9rem;
            color: #333;
            background-color: #fafbfc;
        }

        .form-control:focus, .form-select:focus {
            border-color: #d67d9a;
            box-shadow: 0 0 0 4px rgba(214, 125, 154, 0.12);
            background-color: #ffffff;
        }

        /* Kapsul Pilihan Jam */
        .session-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(85px, 1fr));
            gap: 10px;
        }

        .session-radio {
            display: none;
        }

        .session-label {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            border: 1.5px solid #f0dfe3;
            border-radius: 12px;
            cursor: pointer;
            font-size: 0.85rem;
            font-weight: 500;
            background: #ffffff;
            transition: all 0.2s ease;
        }

        .session-radio:checked + .session-label {
            border-color: #d67d9a;
            background-color: #d67d9a;
            color: #ffffff;
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(214, 125, 154, 0.2);
        }

        /* Tombol Registrasi */
        .btn-register {
            background: linear-gradient(135deg, #d67d9a 0%, #c46985 100%);
            color: white;
            border: none;
            border-radius: 15px;
            padding: 15px 35px;
            font-weight: 700;
            font-size: 1rem;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(196, 105, 133, 0.3);
        }

        .btn-register:hover {
            background: linear-gradient(135deg, #c46985 0%, #b35874 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 22px rgba(196, 105, 133, 0.4);
        }

        .privacy-note {
            background-color: #fff8f9;
            border-left: 4px solid #d67d9a;
            padding: 15px 20px;
            border-radius: 0 14px 14px 0;
            font-size: 0.85rem;
            color: #7d686c;
        }
    </style>
</head>
<body>

    <div class="bg-wave"></div>

    <header class="container py-4 mb-3">
        <div class="d-flex justify-content-between align-items-center">
            <div class="brand-logo fs-4">
                <i class="bi bi-heart-pulse-fill me-2"></i>Kalih Aksa
            </div>
            <span class="text-white opacity-75 small d-none d-sm-inline-block"><i class="bi bi-patch-check"></i> Biro Psikologi Terpercaya</span>
        </div>
    </header>

    <div class="container pb-5">
        
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-9">
                
                <div class="mb-4 text-start text-sm-center text-white pt-2">
                    <h2 class="fw-bold mb-1">Formulir Pendaftaran Sesi</h2>
                    <p class="small opacity-75">Silakan isi informasi berikut untuk menjadwalkan sesi konseling Anda</p>
                </div>

                @if(session('success'))
                    <div class="alert alert-success border-0 rounded-4 shadow-sm p-3 mb-4" role="alert">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-check-circle-fill fs-5 me-2 text-success"></i>
                            <div><strong>Berhasil!</strong> {{ session('success') }}</div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card form-block-card">
                        <div class="block-title">
                            <i class="bi bi-person-badge"></i> Data Identitas Diri
                        </div>
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Nama Lengkap Pasien *</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap Anda" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Jenis Kelamin *</label>
                                <select name="jk" class="form-select" required>
                                    <option value="" disabled selected>Pilih jenis kelamin...</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Nomor WhatsApp Aktif *</label>
                                <input type="text" name="whatsapp" class="form-control" placeholder="Contoh: 0812XXXXXXXX" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" placeholder="Kota Kelahiran">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Pekerjaan</label>
                                <input type="text" name="pekerjaan" class="form-control" placeholder="Kesibukan saat ini">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email Pasien *</label>
                                <input type="email" name="email" class="form-control" placeholder="alamat@email.com" required>
                            </div>
                        </div>
                    </div>

                    <div class="card form-block-card">
                        <div class="block-title">
                            <i class="bi bi-calendar-check"></i> Pengaturan Sesi & Jadwal
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Kategori Layanan *</label>
                                <select name="layanan" class="form-select" required>
                                    <option value="" disabled selected>Pilih jenis layanan...</option>
                                    <option value="Let's Talk (Konseling Individu)">Let's Talk (Konseling Individu)</option>
                                    <option value="Couple Counseling">Couple Counseling (Pasangan)</option>
                                    <option value="Family Counseling">Family Counseling (Keluarga)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Metode Konseling *</label>
                                <select name="jenis_konseling" class="form-select" required>
                                    <option value="Online">Online (Tatap Muka Virtual)</option>
                                    <option value="Offline">Offline (Bertemu Langsung)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Hari Pilihan *</label>
                                <select name="hari" class="form-select" required>
                                    <option value="" disabled selected>Pilih hari...</option>
                                    <option value="Senin">Senin</option> 
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option> 
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option> 
                                    <option value="Sabtu">Sabtu</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tanggal Sesi *</label>
                                <input type="date" name="tanggal_konseling" class="form-control" required>
                            </div>

                            <div class="col-12 mt-3">
                                <label class="form-label d-block mb-2">Jam Sesi Pilihan (WIB) *</label>
                                <div class="session-grid">
                                    @php
                                        $pilihan_jam = ['08.00', '09.00', '10.00', '11.00', '13.00', '14.00', '15.00', '16.00', '17.00'];
                                    @endphp
                                    @foreach($pilihan_jam as $jam)
                                    <div>
                                        <input type="radio" name="jam_sesi" value="{{ $jam }}" id="session-{{ $loop->index }}" class="session-radio" @if($loop->first) checked @endif>
                                        <label for="session-{{ $loop->index }}" class="session-label">{{ $jam }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-12 mt-2">
                                <label class="form-label">Foto Dokumen KTP <span class="text-muted fw-normal">(Opsional)</span></label>
                                <input type="file" name="ktp" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="card form-block-card">
                        <div class="block-title">
                            <i class="bi bi-chat-heart"></i> Informasi Catatan Tambahan
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Pilihan Tenaga Psikolog</label>
                                <select name="psikolog" class="form-select">
                                    <option value="Tidak ada preferensi">Tidak ada preferensi (Rekomendasi Terbaik)</option>
                                    <option value="Kanti Nuarisha, M.Psi., Psikolog">Kanti Nuarisha, M.Psi., Psikolog</option>
                                    <option value="Marsela Rizky Amalia, M.Psi., Psikolog">Marsela Rizky Amalia, M.Psi., Psikolog</option>
                                    <option value="Debby Ivana Korry, M.Psi., Psikolog">Debby Ivana Korry, M.Psi., Psikolog</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Mengetahui Kalih Aksa dari mana?</label>
                                <select name="sumber_info" class="form-select">
                                    <option value="" disabled selected>Pilih opsi...</option>
                                    <option value="Instagram">Instagram Klien</option>
                                    <option value="TikTok">Media Sosial TikTok</option>
                                    <option value="Website">Pencarian Google</option>
                                    <option value="Teman">Rekomendasi Rekan/Keluarga</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Keluhan atau Gambaran Singkat Masalah</label>
                                <textarea name="keluhan" class="form-control" rows="4" placeholder="Tuliskan keluhan atau hal-hal yang mengganjal di pikiran Anda secara singkat..."></textarea>
                            </div>
                            
                            <div class="col-12 mt-3">
                                <div class="privacy-note">
                                    <i class="bi bi-shield-fill-lock me-1"></i> <strong>Jaminan Privasi:</strong> Seluruh data identitas serta catatan keluhan Anda berada di bawah perlindungan asas kerahasiaan penuh kode etik psikolog.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-register px-5 shadow">
                            <i class="bi bi-send-check-fill me-2"></i> Daftarkan Sesi Konseling Sekarang
                        </button>
                        <p class="text-muted small mt-3 italic-text" style="font-style: italic;">"Langkah kecil awal dari sebuah perjalanan menuju kesembuhan diri." — Kalih Aksa</p>
                    </div>

                </form>
                </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>