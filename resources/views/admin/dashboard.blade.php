@extends('layouts.app')

@section('content')
<h2 class="mb-4 fw-bold">Dashboard Admin - Kalih Aksa</h2>

<!-- Statistik Angka -->
<div class="row mb-4">
    <div class="col-md-4"><div class="stat-card bg-primary text-white p-3 rounded shadow-sm">Total Pasien: {{ $total_pasien }}</div></div>
    <div class="col-md-4"><div class="stat-card bg-warning text-dark p-3 rounded shadow-sm">Menunggu: {{ $total_menunggu }}</div></div>
    <div class="col-md-4"><div class="stat-card bg-success text-white p-3 rounded shadow-sm">Selesai: {{ $total_selesai }}</div></div>
</div>

<!-- FITUR PENCARIAN -->
<div class="card mb-4 border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.dashboard') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari nama pasien..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Cari</button>
            @if(request('search'))
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary ms-2">Reset</a>
            @endif
        </form>
    </div>
</div>

<!-- FILTER STATUS -->
<div class="mb-3">
    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary {{ !request('status') ? 'active' : '' }}">Semua</a>
    <a href="{{ route('admin.dashboard', ['status' => 'Menunggu']) }}" class="btn btn-outline-warning {{ request('status') == 'Menunggu' ? 'active' : '' }}">Menunggu</a>
    <a href="{{ route('admin.dashboard', ['status' => 'Selesai']) }}" class="btn btn-outline-success {{ request('status') == 'Selesai' ? 'active' : '' }}">Selesai</a>
</div>

<!-- TABEL PASIEN -->
<div class="table-responsive">
    <table class="table table-hover border">
        <thead class="table-light">
            <tr>
                <th>Waktu</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($semua_pendaftaran as $pasien)
            <tr>
                <td>{{ $pasien->created_at->format('d M, H:i') }}</td>
                <td>{{ $pasien->nama_lengkap }}</td> <!-- SUDAH DIPERBAIKI -->
                <td>
                    <span class="badge {{ $pasien->status == 'Selesai' ? 'bg-success' : 'bg-warning text-dark' }}">
                        {{ $pasien->status }}
                    </span>
                </td>
                <td>
                    <div class="btn-group" role="group">
                        <a href="{{ route('admin.detail', $pasien->id) }}" class="btn btn-sm btn-info text-white">Lihat</a>
                        <a href="{{ route('admin.edit', $pasien->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('admin.cetakPdf', $pasien->id) }}" class="btn btn-sm btn-danger" target="_blank">PDF</a>
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $pasien->id }})">Hapus</button>
                    </div>

                    <form id="delete-form-{{ $pasien->id }}" action="{{ route('admin.destroy', $pasien->id) }}" method="POST" style="display: none;">
                        @csrf 
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="text-center">Data tidak ditemukan!</td></tr>
            @endforelse
        </tbody>
    </table>
    
    <div class="mt-3">
        {{ $semua_pendaftaran->appends(['status' => request('status')])->links() }}
    </div>
</div>
@endsection 

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>
@endpush