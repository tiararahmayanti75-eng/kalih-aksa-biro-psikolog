@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card p-4 shadow">
        <h2 class="mb-3">Edit Data Pasien: {{ $pasien->nama }}</h2>
        <hr>
        <form action="{{ route('admin.update', $pasien->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" value="{{ $pasien->nama }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $pasien->email }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>WhatsApp</label>
                    <input type="text" name="whatsapp" class="form-control" value="{{ $pasien->whatsapp }}">
                </div>
                
                <div class="col-md-6 mb-3">
                    <label>Layanan</label>
                    <input type="text" name="layanan" class="form-control" value="{{ $pasien->layanan }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label>Hari</label>
                    <input type="text" name="hari_konseling" class="form-control" value="{{ $pasien->hari_konseling }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal_konseling" class="form-control" value="{{ $pasien->tanggal_konseling }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Jam</label>
                    <input type="text" name="jam_konseling" class="form-control" value="{{ $pasien->jam_konseling }}">
                </div>
                
                <div class="col-md-12 mb-4">
                    <label>Status Pendaftaran</label>
                    <select name="status" class="form-select">
                        <option value="Menunggu" {{ $pasien->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option value="Proses" {{ $pasien->status == 'Proses' ? 'selected' : '' }}>Proses</option>
                        <option value="Selesai" {{ $pasien->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>
            </div>
            
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection