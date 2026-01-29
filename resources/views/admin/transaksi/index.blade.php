<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi - CleanGo Laundry</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary: #8B5CF6;
            --primary-dark: #7C3AED;
            --secondary: #EC4899;
            --success: #10B981;
            --warning: #F59E0B;
            --danger: #EF4444;
            --info: #06B6D4;
            --light: #F3E8FF;
            --dark: #1F2937;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #faf8ff 0%, #f5f3ff 100%);
            background-attachment: fixed;
            min-height: 100vh;
            color: var(--dark);
        }

        /* Navbar */
        .navbar-custom {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(139, 92, 246, 0.1);
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            font-weight: 600;
            color: var(--dark) !important;
            transition: all 0.3s;
            text-decoration: none;
        }

        .navbar-brand:hover {
            color: var(--primary) !important;
        }

        .navbar-title {
            font-weight: 600;
            color: var(--dark);
            margin: 0;
        }

        /* Container */
        .container-custom {
            background: white;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 25px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            border: 1px solid rgba(139, 92, 246, 0.1);
        }

        /* Page Header */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 0;
        }

        .page-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            margin: 0;
        }

        .page-title i {
            color: var(--primary);
            margin-right: 10px;
        }

        /* Alert */
        .alert {
            border-radius: 12px;
            border: none;
            padding: 16px 20px;
            animation: slideDown 0.3s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-success {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(16, 185, 129, 0.05) 100%);
            color: var(--success);
            border-left: 4px solid var(--success);
        }

        /* Buttons */
        .btn-add {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border: none;
            border-radius: 12px;
            padding: 12px 28px;
            color: white;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(139, 92, 246, 0.3);
            text-decoration: none;
            display: inline-block;
        }

        .btn-add:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(139, 92, 246, 0.4);
            color: white;
        }

        /* Stats */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            border: 2px solid #F3F4F6;
            transition: all 0.3s;
        }

        .stat-card:hover {
            border-color: var(--primary);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(139, 92, 246, 0.15);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
            font-size: 1.5rem;
        }

        .stat-icon.pending {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.1) 0%, rgba(245, 158, 11, 0.05) 100%);
            color: var(--warning);
        }

        .stat-icon.selesai {
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.1) 0%, rgba(6, 182, 212, 0.05) 100%);
            color: var(--info);
        }

        .stat-icon.dibayar {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(16, 185, 129, 0.05) 100%);
            color: var(--success);
        }

        .stat-icon.total {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.1) 0%, rgba(236, 72, 153, 0.1) 100%);
            color: var(--primary);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 0.8rem;
            color: #6B7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Search & Filter */
        .search-filter-bar {
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 15px;
            margin-bottom: 20px;
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            border-radius: 12px;
            border: 2px solid #E5E7EB;
            padding: 12px 16px 12px 45px;
            font-size: 0.95rem;
            transition: all 0.3s;
            width: 100%;
        }

        .search-box input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(139, 92, 246, 0.15);
            outline: none;
        }

        .search-box i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #6B7280;
        }

        .filter-select {
            border-radius: 12px;
            border: 2px solid #E5E7EB;
            padding: 12px 16px;
            font-size: 0.95rem;
            transition: all 0.3s;
            min-width: 200px;
        }

        .filter-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(139, 92, 246, 0.15);
            outline: none;
        }

        /* Transaction Cards */
        .transaction-card {
            background: white;
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 20px;
            border: 2px solid #F3F4F6;
            transition: all 0.3s;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .transaction-card:hover {
            border-color: var(--primary);
            box-shadow: 0 12px 30px rgba(139, 92, 246, 0.15);
            transform: translateY(-5px);
        }

        .transaction-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 15px;
        }

        .trx-number {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.1) 0%, rgba(236, 72, 153, 0.1) 100%);
            color: var(--primary);
            padding: 6px 14px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.85rem;
            font-family: 'Courier New', monospace;
            border: 1px solid rgba(139, 92, 246, 0.3);
        }

        .transaction-details {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-bottom: 15px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.85rem;
            color: #6B7280;
        }

        .detail-item i {
            color: var(--primary);
            font-size: 1rem;
        }

        .detail-value {
            font-weight: 500;
            color: var(--dark);
        }

        .price-display {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .transaction-actions {
            display: flex;
            gap: 10px;
            padding-top: 15px;
            border-top: 1px solid #F3F4F6;
        }

        .btn-action {
            flex: 1;
            border-radius: 10px;
            padding: 10px;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s;
            border: none;
        }

        .btn-edit {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.1) 0%, rgba(245, 158, 11, 0.05) 100%);
            color: var(--warning);
            border: 1px solid rgba(245, 158, 11, 0.3);
        }

        .btn-edit:hover {
            background: var(--warning);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
        }

        .btn-delete {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(239, 68, 68, 0.05) 100%);
            color: var(--danger);
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .btn-delete:hover {
            background: var(--danger);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }

        /* Status Badges */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-pending {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.1) 0%, rgba(245, 158, 11, 0.05) 100%);
            color: var(--warning);
            border: 1px solid rgba(245, 158, 11, 0.3);
        }

        .status-selesai {
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.1) 0%, rgba(6, 182, 212, 0.05) 100%);
            color: var(--info);
            border: 1px solid rgba(6, 182, 212, 0.3);
        }

        .status-dibayar {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(16, 185, 129, 0.05) 100%);
            color: var(--success);
            border: 1px solid rgba(16, 185, 129, 0.3);
        }

        /* Table View */
        .table-container {
            border-radius: 12px;
            overflow: hidden;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.05) 0%, rgba(236, 72, 153, 0.05) 100%);
            border: none;
            font-weight: 600;
            color: var(--primary);
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            padding: 18px 20px;
        }

        .table tbody td {
            padding: 18px 20px;
            vertical-align: middle;
            border-color: #F3F4F6;
        }

        .table tbody tr {
            transition: all 0.2s;
        }

        .table tbody tr:hover {
            background-color: rgba(139, 92, 246, 0.02);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-icon {
            font-size: 4rem;
            color: #D1D5DB;
            margin-bottom: 20px;
        }

        .empty-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 10px;
        }

        .empty-desc {
            color: #6B7280;
            margin-bottom: 20px;
        }

        /* Section Title */
        .section-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            color: var(--primary);
        }

        /* View Toggle */
        .view-toggle {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .view-btn {
            padding: 10px 20px;
            border-radius: 10px;
            border: 2px solid #E5E7EB;
            background: white;
            color: var(--dark);
            font-weight: 500;
            transition: all 0.3s;
            cursor: pointer;
        }

        .view-btn:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .view-btn.active {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border-color: transparent;
            color: white;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .btn-add {
                width: 100%;
                text-align: center;
            }

            .search-filter-bar {
                grid-template-columns: 1fr;
            }

            .filter-select {
                width: 100%;
            }

            .transaction-details {
                grid-template-columns: 1fr;
            }

            .transaction-actions {
                flex-direction: column;
            }

            .stats-row {
                grid-template-columns: repeat(2, 1fr);
            }

            .view-toggle {
                flex-direction: column;
            }

            .view-btn {
                width: 100%;
            }
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .transaction-card {
            animation: fadeInUp 0.5s ease-out;
        }

        /* Hidden class */
        .d-none-custom {
            display: none !important;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light navbar-custom sticky-top">
        <div class="container">
            <a href="/dashboard" class="navbar-brand">
                <i class="bi bi-arrow-left-circle me-2"></i> Kembali ke Dashboard
            </a>
            <h5 class="navbar-title d-none d-md-block">Kelola Transaksi</h5>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container mt-4 mb-5">
        <!-- Alert Success -->
        @if ($message = session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                <strong>Berhasil!</strong> {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Page Header -->
        <div class="container-custom">
            <div class="page-header">
                <h2 class="page-title">
                    <i class="bi bi-receipt-cutoff"></i> Daftar Transaksi
                </h2>
                <a href="/transaksi/tambah" class="btn-add">
                    <i class="bi bi-plus-circle-fill me-2"></i> Tambah Transaksi
                </a>
            </div>
        </div>

        <!-- Stats -->
        <div class="container-custom">
            <div class="stats-row">
                <div class="stat-card">
                    <div class="stat-icon total">
                        <i class="bi bi-receipt-cutoff"></i>
                    </div>
                    <div class="stat-number" id="totalTransaksi">{{ $transaksis->count() }}</div>
                    <div class="stat-label">Total Transaksi</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon pending">
                        <i class="bi bi-clock-fill"></i>
                    </div>
                    <div class="stat-number" id="pendingCount">{{ $transaksis->where('status', 'pending')->count() }}</div>
                    <div class="stat-label">Pending</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon selesai">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                    <div class="stat-number" id="selesaiCount">{{ $transaksis->where('status', 'selesai')->count() }}</div>
                    <div class="stat-label">Selesai</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon dibayar">
                        <i class="bi bi-cash-coin"></i>
                    </div>
                    <div class="stat-number" id="dibayarCount">{{ $transaksis->where('status', 'dibayar')->count() }}</div>
                    <div class="stat-label">Dibayar</div>
                </div>
            </div>
        </div>

        <!-- Search & Filter -->
        <div class="container-custom">
            <div class="search-filter-bar">
                <div class="search-box">
                    <i class="bi bi-search"></i>
                    <input 
                        type="text" 
                        id="searchInput" 
                        class="form-control" 
                        placeholder="Cari nomor transaksi, pelanggan, atau paket..."
                    >
                </div>
                <select class="filter-select" id="statusFilter" onchange="filterTransactions()">
                    <option value="">Semua Status</option>
                    <option value="pending">Pending</option>
                    <option value="selesai">Selesai</option>
                    <option value="dibayar">Dibayar</option>
                </select>
            </div>

            <div class="view-toggle">
                <button class="view-btn active" onclick="showView('card')">
                    <i class="bi bi-grid-3x3-gap-fill me-2"></i> Tampilan Kartu
                </button>
                <button class="view-btn" onclick="showView('table')">
                    <i class="bi bi-table me-2"></i> Tampilan Tabel
                </button>
            </div>
        </div>

        <!-- Card View -->
        <div id="cardView" class="container-custom">
            <h5 class="section-title">
                <i class="bi bi-receipt"></i>
                Semua Transaksi
            </h5>
            @if ($transaksis->count() > 0)
                <div class="row" id="transactionCards">
                    @foreach($transaksis as $t)
                        <div class="col-lg-6 mb-4 transaction-item" 
                             data-trx="{{ strtolower($t->no_transaksi) }}"
                             data-customer="{{ strtolower($t->user->name ?? '') }}"
                             data-paket="{{ strtolower($t->paket->nama_paket ?? '') }}"
                             data-status="{{ $t->status }}">
                            <div class="transaction-card">
                                <div class="transaction-header">
                                    <span class="trx-number">
                                        <i class="bi bi-hash"></i> {{ $t->no_transaksi }}
                                    </span>
                                    @if ($t->status == 'pending')
                                        <span class="status-badge status-pending">
                                            <i class="bi bi-clock-fill"></i> Pending
                                        </span>
                                    @elseif ($t->status == 'selesai')
                                        <span class="status-badge status-selesai">
                                            <i class="bi bi-check-circle-fill"></i> Selesai
                                        </span>
                                    @else
                                        <span class="status-badge status-dibayar">
                                            <i class="bi bi-cash-coin"></i> Dibayar
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="transaction-details">
                                    <div class="detail-item">
                                        <i class="bi bi-person-fill"></i>
                                        <span>{{ $t->user->name ?? 'Tidak ada data' }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <i class="bi bi-box-seam-fill"></i>
                                        <span>{{ $t->paket->nama_paket ?? '-' }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <i class="bi bi-calendar-event-fill"></i>
                                        <span>{{ $t->created_at->format('d M Y') }}</span>
                                    </div>
                                    @if($t->catatan)
                                        <div class="detail-item" style="grid-column: 1 / -1;">
                                            <i class="bi bi-chat-left-text-fill"></i>
                                            <span>{{ Str::limit($t->catatan, 50) }}</span>
                                        </div>
                                    @endif
                                </div>

                                <div class="price-display">
                                    Rp {{ number_format($t->total_harga, 0, ',', '.') }}
                                </div>
                                
                                <div class="transaction-actions">
                                    <a href="/transaksi/{{ $t->id }}/edit" class="btn btn-action btn-edit">
                                        <i class="bi bi-pencil-square me-1"></i> Edit
                                    </a>
                                    <form action="/transaksi/{{ $t->id }}" method="POST" style="display:inline; flex: 1;" onsubmit="return confirm('Yakin ingin menghapus transaksi {{ $t->no_transaksi }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-action btn-delete w-100">
                                            <i class="bi bi-trash-fill me-1"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="bi bi-receipt"></i>
                    </div>
                    <h3 class="empty-title">Belum Ada Transaksi</h3>
                    <p class="empty-desc">Mulai buat transaksi laundry pertama Anda</p>
                    <a href="/transaksi/tambah" class="btn-add">
                        <i class="bi bi-plus-circle-fill"></i> Tambah Transaksi Pertama
                    </a>
                </div>
            @endif
        </div>

        <!-- Table View (Hidden by default) -->
        <div id="tableView" class="container-custom d-none-custom">
            <h5 class="section-title">
                <i class="bi bi-table"></i>
                Daftar Transaksi dalam Tabel
            </h5>
            @if ($transaksis->count() > 0)
                <div class="table-container">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 15%;">No. Transaksi</th>
                                    <th style="width: 15%;">Pelanggan</th>
                                    <th style="width: 15%;">Paket</th>
                                    <th style="width: 15%;">Total Harga</th>
                                    <th style="width: 12%;">Status</th>
                                    <th style="width: 10%;">Tanggal</th>
                                    <th style="width: 13%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaksis as $index => $t)
                                    <tr class="transaction-item"
                                        data-trx="{{ strtolower($t->no_transaksi) }}"
                                        data-customer="{{ strtolower($t->user->name ?? '') }}"
                                        data-paket="{{ strtolower($t->paket->nama_paket ?? '') }}"
                                        data-status="{{ $t->status }}">
                                        <td class="text-muted">{{ $index + 1 }}</td>
                                        <td>
                                            <span class="trx-number">{{ $t->no_transaksi }}</span>
                                        </td>
                                        <td>
                                            <strong style="color: var(--dark);">{{ $t->user->name ?? '-' }}</strong>
                                        </td>
                                        <td>
                                            <small>{{ $t->paket->nama_paket ?? '-' }}</small>
                                        </td>
                                        <td>
                                            <strong style="color: var(--primary);">Rp {{ number_format($t->total_harga, 0, ',', '.') }}</strong>
                                        </td>
                                        <td>
                                            @if ($t->status == 'pending')
                                                <span class="status-badge status-pending">
                                                    <i class="bi bi-clock-fill"></i> Pending
                                                </span>
                                            @elseif ($t->status == 'selesai')
                                                <span class="status-badge status-selesai">
                                                    <i class="bi bi-check-circle-fill"></i> Selesai
                                                </span>
                                            @else
                                                <span class="status-badge status-dibayar">
                                                    <i class="bi bi-cash-coin"></i> Dibayar
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <small>{{ $t->created_at->format('d M Y') }}</small>
                                        </td>
                                        <td>
                                            <a href="/transaksi/{{ $t->id }}/edit" class="btn btn-sm btn-edit me-1">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="/transaksi/{{ $t->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-delete">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="bi bi-receipt"></i>
                    </div>
                    <h3 class="empty-title">Belum Ada Transaksi</h3>
                    <p class="empty-desc">Mulai buat transaksi laundry pertama Anda</p>
                    <a href="/transaksi/tambah" class="btn-add">
                        <i class="bi bi-plus-circle-fill"></i> Tambah Transaksi Pertama
                    </a>
                </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // View Toggle Function
        function showView(view) {
            const cardView = document.getElementById('cardView');
            const tableView = document.getElementById('tableView');
            const buttons = document.querySelectorAll('.view-btn');
            
            buttons.forEach(btn => btn.classList.remove('active'));
            
            if (view === 'card') {
                cardView.classList.remove('d-none-custom');
                tableView.classList.add('d-none-custom');
                buttons[0].classList.add('active');
                localStorage.setItem('preferredView', 'card');
            } else {
                cardView.classList.add('d-none-custom');
                tableView.classList.remove('d-none-custom');
                buttons[1].classList.add('active');
                localStorage.setItem('preferredView', 'table');
            }
        }

        // Load preferred view from localStorage
        window.addEventListener('DOMContentLoaded', function() {
            const preferredView = localStorage.getItem('preferredView') || 'card';
            showView(preferredView);
        });

        // Search functionality
        const searchInput = document.getElementById('searchInput');
        
        searchInput.addEventListener('keyup', function() {
            filterTransactions();
        });

        // Filter by status
        function filterTransactions() {
            const searchTerm = searchInput.value.toLowerCase();
            const statusFilter = document.getElementById('statusFilter').value;
            const transactionItems = document.querySelectorAll('.transaction-item');
            let visibleCount = 0;
            
            transactionItems.forEach(item => {
                const trx = item.getAttribute('data-trx');
                const customer = item.getAttribute('data-customer');
                const paket = item.getAttribute('data-paket');
                const status = item.getAttribute('data-status');
                
                const matchSearch = trx.includes(searchTerm) || customer.includes(searchTerm) || paket.includes(searchTerm);
                const matchStatus = statusFilter === '' || status === statusFilter;
                
                if (matchSearch && matchStatus) {
                    item.style.display = '';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            // Update stats
            updateFilterStats();
        }

        // Update stats based on visible items
        function updateFilterStats() {
            const visibleItems = document.querySelectorAll('.transaction-item:not([style*="display: none"])');
            const statusCounts = {
                total: 0,
                pending: 0,
                selesai: 0,
                dibayar: 0
            };

            visibleItems.forEach(item => {
                const status = item.getAttribute('data-status');
                statusCounts.total++;
                if (status in statusCounts) {
                    statusCounts[status]++;
                }
            });

            document.getElementById('totalTransaksi').textContent = statusCounts.total;
            document.getElementById('pendingCount').textContent = statusCounts.pending;
            document.getElementById('selesaiCount').textContent = statusCounts.selesai;
            document.getElementById('dibayarCount').textContent = statusCounts.dibayar;
        }

        // Auto-dismiss alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>