@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<!-- Statistics Cards -->
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ isset($totalTransaksi) ? $totalTransaksi : 127 }}</h3>
                <p>Total Transaksi</p>
            </div>
            <div class="icon">
                <i class="bi bi-bag-check-fill"></i>
            </div>
            <a href="{{ route('admin.transaksi.index') }}" class="small-box-footer">
                Lihat Detail <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ isset($totalPaket) ? $totalPaket : 12 }}</h3>
                <p>Total Paket</p>
            </div>
            <div class="icon">
                <i class="bi bi-box-seam-fill"></i>
            </div>
            <a href="{{ route('admin.paket.index') }}" class="small-box-footer">
                Lihat Detail <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ isset($totalPelanggan) ? $totalPelanggan : 89 }}</h3>
                <p>Total Pelanggan</p>
            </div>
            <div class="icon">
                <i class="bi bi-people-fill"></i>
            </div>
            <a href="{{ route('admin.pelanggan.index') }}" class="small-box-footer">
                Lihat Detail <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>Rp{{ isset($totalPendapatan) ? number_format($totalPendapatan, 0, ',', '.') : '2.450.000' }}</h3>
                <p>Pendapatan</p>
            </div>
            <div class="icon">
                <i class="bi bi-wallet2"></i>
            </div>
            <div class="small-box-footer">
                &nbsp;
            </div>
        </div>
    </div>
</div>

<!-- Menu Cards -->
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Kelola Paket</h3>
            </div>
            <div class="card-body">
                <p>Manajemen layanan & harga laundry</p>
                <a href="{{ route('admin.paket.index') }}" class="btn btn-primary">
                    <i class="bi bi-box-seam"></i> Kelola Paket
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-success card-outline">
            <div class="card-header">
                <h3 class="card-title">Kelola Transaksi</h3>
            </div>
            <div class="card-body">
                <p>Input & pantau orderan pelanggan</p>
                <a href="{{ route('admin.transaksi.index') }}" class="btn btn-success">
                    <i class="bi bi-receipt"></i> Kelola Transaksi
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-warning card-outline">
            <div class="card-header">
                <h3 class="card-title">Kelola Pelanggan</h3>
            </div>
            <div class="card-body">
                <p>Database & data member laundry</p>
                <a href="{{ route('admin.pelanggan.index') }}" class="btn btn-warning">
                    <i class="bi bi-people"></i> Kelola Pelanggan
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Activity Table -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Aktivitas Terbaru</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="bi bi-dash"></i>
            </button>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Aktivitas</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentActivities as $activity)
                    <tr>
                        <td><i class="bi bi-calendar3 me-1"></i>{{ \Carbon\Carbon::parse($activity->created_at)->format('d M Y') }}</td>
                        <td>New Transaction</td>
                        <td>Transaksi {{ $activity->no_transaksi }} - {{ $activity->paket->nama_paket ?? 'N/A' }}</td>
                        <td><span class="badge bg-{{ $activity->status == 'selesai' ? 'success' : 'info' }}">{{ ucfirst($activity->status ?? 'pending') }}</span></td>
                    </tr>
                    @empty
                    <tr>
                        <td><i class="bi bi-calendar3 me-1"></i><span id="today"></span></td>
                        <td>Dashboard Accessed</td>
                        <td>Admin mengakses halaman dashboard</td>
                        <td><span class="badge bg-success">Aktif</span></td>
                    </tr>
                    <tr>
                        <td><i class="bi bi-calendar3 me-1"></i><span id="yesterday"></span></td>
                        <td>Welcome</td>
                        <td>Sistem laundry siap digunakan</td>
                        <td><span class="badge bg-info">Info</span></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Format tanggal Indonesia - hanya untuk fallback jika diperlukan
    function formatDateShort(date) {
        const day = date.getDate();
        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 
                        'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        const month = months[date.getMonth()];
        const year = date.getFullYear();

        return `${day} ${month} ${year}`;
    }

    // Set tanggal untuk fallback jika tidak ada aktivitas
    @if($recentActivities->isEmpty())
    const today = new Date();
    const yesterday = new Date(today);
    yesterday.setDate(yesterday.getDate() - 1);

    document.getElementById('today').textContent = formatDateShort(today);
    document.getElementById('yesterday').textContent = formatDateShort(yesterday);
    @endif
</script>
@endpush