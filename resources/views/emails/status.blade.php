<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px; }
        .header { background-color: #4e73df; color: white; padding: 10px; text-align: center; border-radius: 5px 5px 0 0; }
        .content { padding: 20px; }
        .footer { text-align: center; font-size: 0.8em; color: #888; margin-top: 20px; }
        .status-badge { display: inline-block; padding: 5px 15px; background-color: #28a745; color: white; border-radius: 5px; font-weight: bold; font-size: 1.1em; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Pemberitahuan Kalih Aksa</h2>
        </div>
        <div class="content">
            <h3>Halo, {{ $pasien->nama_lengkap }}!</h3>
            <p>Terima kasih telah mempercayakan kebutuhan konseling Anda kepada kami.</p>
            <p>Kami ingin menginformasikan bahwa status pendaftaran Anda telah diperbarui menjadi:</p>
            
            <p style="text-align: center;">
                <span class="status-badge">{{ $pasien->status }}</span>
            </p>
            
            <p>Jika Anda memiliki pertanyaan lebih lanjut, silakan hubungi admin kami melalui WhatsApp.</p>
            <p>Salam hangat,<br><strong>Tim Admin Kalih Aksa</strong></p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Kalih Aksa. Semua hak dilindungi.
        </div>
    </div>
</body>
</html>