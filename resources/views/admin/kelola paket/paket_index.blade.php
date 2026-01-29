<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Paket - CleanGo Laundry</title>
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

        .alert-info {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.1) 0%, rgba(236, 72, 153, 0.05) 100%);
            color: var(--primary);
            border-left: 4px solid var(--primary);
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

        .btn-add i {
            margin-right: 6px;
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

        /* Paket Cards */
        .paket-card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 20px;
            border: 2px solid #F3F4F6;
            transition: all 0.3s;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .paket-card:hover {
            border-color: var(--primary);
            box-shadow: 0 12px 30px rgba(139, 92, 246, 0.15);
            transform: translateY(-5px);
        }

        .paket-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            box-shadow: 0 4px 12px rgba(139, 92, 246, 0.3);
        }

        .paket-icon i {
            font-size: 1.8rem;
            color: white;
        }

        .paket-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 10px;
        }

        .paket-harga {
            font-size: 1.75rem;
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 10px;
        }

        .paket-harga-label {
            font-size: 0.85rem;
            color: #6B7280;
            font-weight: 400;
        }

        .paket-jenis {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.1) 0%, rgba(236, 72, 153, 0.1) 100%);
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 0.85rem;
            color: var(--primary);
            margin-bottom: 15px;
            font-weight: 500;
            border: 1px solid rgba(139, 92, 246, 0.2);
        }

        .paket-desc {
            color: #6B7280;
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 15px;
            flex-grow: 1;
        }

        .paket-actions {
            margin-top: auto;
            padding-top: 15px;
            border-top: 1px solid #F3F4F6;
            display: flex;
            gap: 10px;
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

        .badge-price {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.1) 0%, rgba(236, 72, 153, 0.1) 100%);
            color: var(--primary);
            padding: 6px 14px;
            border-radius: 50px;
            font-weight: 500;
            border: 1px solid rgba(139, 92, 246, 0.2);
        }

        .badge-type {
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.1) 0%, rgba(6, 182, 212, 0.05) 100%);
            color: #0891B2;
            padding: 6px 14px;
            border-radius: 50px;
            font-weight: 500;
            border: 1px solid rgba(6, 182, 212, 0.2);
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

            .view-toggle {
                flex-direction: column;
            }

            .view-btn {
                width: 100%;
            }

            .paket-actions {
                flex-direction: column;
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

        .paket-card {
            animation: fadeInUp 0.5s ease-out;
        }

        /* Hidden class for view toggle */
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
            <h5 class="navbar-title d-none d-md-block">Kelola Paket Laundry</h5>
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
                    <i class="bi bi-box-seam-fill"></i> Daftar Paket Laundry
                </h2>
                <a href="/paket/tambah" class="btn-add">
                    <i class="bi bi-plus-circle-fill"></i> Tambah Paket Baru
                </a>
            </div>
        </div>

        <!-- View Toggle -->
        <div class="container-custom">
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
                <i class="bi bi-grid-3x3-gap-fill"></i>
                Semua Paket Layanan
            </h5>
            @if ($pakets->count() > 0)
                <div class="row">
                    @foreach($pakets as $p)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="paket-card">
                                <div class="paket-icon">
                                    <i class="bi bi-box-seam-fill"></i>
                                </div>
                                
                                <div class="paket-title">{{ $p->nama_paket }}</div>
                                
                                <div class="paket-harga">
                                    Rp {{ number_format($p->harga, 0, ',', '.') }}
                                    <span class="paket-harga-label">/kg</span>
                                </div>
                                
                                <div class="paket-jenis">
                                    <i class="bi bi-tag-fill"></i> {{ $p->jenis }}
                                </div>
                                
                                <p class="paket-desc">
                                    Layanan {{ strtolower($p->jenis) }} dengan kualitas terbaik dan harga yang kompetitif untuk kepuasan pelanggan Anda.
                                </p>
                                
                                <div class="paket-actions">
                                    <a href="/paket/{{ $p->id }}/edit" class="btn btn-action btn-edit">
                                        <i class="bi bi-pencil-square me-1"></i> Edit
                                    </a>
                                    <form action="/paket/hapus/{{ $p->id }}" method="POST" style="display:inline; flex: 1;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus paket {{ $p->nama_paket }}?')">
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
                        <i class="bi bi-inbox"></i>
                    </div>
                    <h3 class="empty-title">Belum Ada Paket</h3>
                    <p class="empty-desc">Mulai tambahkan paket layanan laundry untuk pelanggan Anda</p>
                    <a href="/paket/tambah" class="btn-add">
                        <i class="bi bi-plus-circle-fill"></i> Tambah Paket Pertama
                    </a>
                </div>
            @endif
        </div>

        <!-- Table View (Hidden by default) -->
        <div id="tableView" class="container-custom d-none-custom">
            <h5 class="section-title">
                <i class="bi bi-table"></i>
                Daftar Paket dalam Tabel
            </h5>
            @if ($pakets->count() > 0)
                <div class="table-container">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 35%;">Nama Paket</th>
                                    <th style="width: 20%;">Harga</th>
                                    <th style="width: 20%;">Jenis</th>
                                    <th style="width: 20%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pakets as $index => $p)
                                    <tr>
                                        <td class="text-muted">{{ $index + 1 }}</td>
                                        <td>
                                            <strong style="color: var(--dark);">{{ $p->nama_paket }}</strong>
                                        </td>
                                        <td>
                                            <span class="badge-price">Rp {{ number_format($p->harga, 0, ',', '.') }}</span>
                                        </td>
                                        <td>
                                            <span class="badge-type">{{ $p->jenis }}</span>
                                        </td>
                                        <td>
                                            <a href="/paket/{{ $p->id }}/edit" class="btn btn-sm btn-edit me-1">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                            <form action="/paket/hapus/{{ $p->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus {{ $p->nama_paket }}?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-delete">
                                                    <i class="bi bi-trash-fill"></i> Hapus
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
                        <i class="bi bi-inbox"></i>
                    </div>
                    <h3 class="empty-title">Belum Ada Paket</h3>
                    <p class="empty-desc">Mulai tambahkan paket layanan laundry untuk pelanggan Anda</p>
                    <a href="/paket/tambah" class="btn-add">
                        <i class="bi bi-plus-circle-fill"></i> Tambah Paket Pertama
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