@extends('layouts.admin') {{-- Sesuaikan dengan layout yang kamu pakai --}}

@section('content')
<div class="container">
    <h2>Daftar Pasien</h2>

    <!-- Tombol Export Excel -->
    <div class="mb-3">
        <a href="{{ route('admin.export') }}" class="btn btn-success">
            <i class="fas fa-file-excel"></i> Download Excel
        </a>
    </div>

    <!-- Tabel Data Pasien -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Keluhan</th>
                <th>Tanggal Daftar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pasiens as $index => $pasien)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $pasien->nama }}</td>
                <td>{{ $pasien->keluhan }}</td>
                <td>{{ $pasien->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection