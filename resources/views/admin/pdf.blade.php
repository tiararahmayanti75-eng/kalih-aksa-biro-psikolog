<!DOCTYPE html>
<html>
<head>
    <title>Data Pasien - {{ $pasien->nama }}</title>
    <style>
        body { font-family: sans-serif; }
        h2 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f2f2f2; width: 30%; }
    </style>
</head>
<body>
    <h2>Data Pendaftaran Pasien</h2>
    <table>
        <tr><th>Nama</th><td>{{ $pasien->nama }}</td></tr>
        <tr><th>Email</th><td>{{ $pasien->email }}</td></tr>
        <tr><th>Layanan</th><td>{{ $pasien->layanan }}</td></tr>
        <tr><th>WhatsApp</th><td>{{ $pasien->whatsapp }}</td></tr>
        <tr><th>Tanggal Konseling</th><td>{{ $pasien->tanggal_konseling }}</td></tr>
        <tr><th>Status</th><td>{{ $pasien->status }}</td></tr>
    </table>
</body>
</html>