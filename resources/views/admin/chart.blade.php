<div class="card mb-4 shadow-sm border-0">
    <div class="card-header bg-white fw-bold">Proporsi Status Pasien</div>
    <div class="card-body">
        <canvas id="statusChart" style="max-height: 250px;"></canvas>
    </div>
</div>

@push('scripts')
<script>
    const ctx = document.getElementById('statusChart').getContext('2d');
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Menunggu', 'Selesai'],
            datasets: [{
                data: [{{ $total_menunggu }}, {{ $total_selesai }}],
                backgroundColor: ['#ffc107', '#198754'] // Warna Kuning & Hijau
            }]
        }
    });
</script>
@endpush