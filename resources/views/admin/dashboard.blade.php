<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - CleanGo Laundry</title>
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
            --info: #06B6D4;
            --danger: #EF4444;
            --bg-light: #f8fafc;
            --glass: rgba(255, 255, 255, 0.95);
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

        /* Navbar Enhancement */
        .navbar-custom {
            background: var(--glass) !important;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(139, 92, 246, 0.1);
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.3rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.5px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 1rem;
        }

        .btn-logout {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: var(--danger);
            border: 1px solid rgba(239, 68, 68, 0.2);
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-logout:hover {
            background: var(--danger);
            color: white;
            border-color: var(--danger);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }

        /* Container & Cards */
        .container-custom {
            background: white;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 25px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            border: 1px solid rgba(139, 92, 246, 0.1);
        }

        .page-header {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .page-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--dark);
            margin: 0;
        }

        .page-subtitle {
            color: #6B7280;
            margin: 0;
            font-size: 0.95rem;
        }

        .date-badge {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.1) 0%, rgba(236, 72, 153, 0.1) 100%);
            padding: 8px 16px;
            border-radius: 50px;
            color: var(--primary);
            font-weight: 500;
            font-size: 0.85rem;
            border: 1px solid rgba(139, 92, 246, 0.2);
        }

        /* Stats Card Styling */
        .card-stat {
            border-radius: 20px;
            border: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            height: 100%;
        }

        .card-stat::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transition: all 0.5s;
        }

        .card-stat:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.2);
        }

        .card-stat:hover::before {
            top: -20%;
            right: -20%;
        }

        .stat-icon {
            font-size: 2.5rem;
            opacity: 0.9;
            margin-bottom: 15px;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 0.85rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            opacity: 0.95;
        }

        /* Menu Card Styling */
        .menu-card {
            border-radius: 20px;
            border: 2px solid rgba(139, 92, 246, 0.1);
            background: white;
            transition: all 0.3s ease;
            text-decoration: none;
            min-height: 140px;
            display: flex;
            align-items: center;
            padding: 25px;
            position: relative;
            overflow: hidden;
        }

        .menu-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: 0.3s;
            z-index: 0;
        }

        .menu-card:hover::before {
            opacity: 1;
        }

        .menu-card:hover {
            transform: translateY(-5px);
            border-color: transparent;
            box-shadow: 0 15px 35px -5px rgba(0, 0, 0, 0.15);
        }

        .menu-card.card-primary::before {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        }

        .menu-card.card-success::before {
            background: linear-gradient(135deg, var(--secondary) 0%, #D946EF 100%);
        }

        .menu-card.card-warning::before {
            background: linear-gradient(135deg, var(--warning) 0%, #FBBF24 100%);
        }

        .menu-card:hover .menu-content {
            color: white;
        }

        .menu-card:hover .menu-icon {
            color: white;
        }

        .menu-icon {
            font-size: 3rem;
            margin-right: 20px;
            position: relative;
            z-index: 1;
            transition: all 0.3s;
        }

        .menu-content {
            position: relative;
            z-index: 1;
            transition: all 0.3s;
        }

        .menu-card.card-primary .menu-icon {
            color: var(--primary);
        }

        .menu-card.card-success .menu-icon {
            color: var(--secondary);
        }

        .menu-card.card-warning .menu-icon {
            color: var(--warning);
        }

        .menu-content h5 {
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--dark);
        }

        .menu-content p {
            font-size: 0.85rem;
            margin: 0;
            color: #6B7280;
        }

        /* Gradients */
        .card-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        }

        .card-success {
            background: linear-gradient(135deg, var(--secondary) 0%, #D946EF 100%);
        }

        .card-warning {
            background: linear-gradient(135deg, var(--warning) 0%, #FBBF24 100%);
        }

        .card-info {
            background: linear-gradient(135deg, var(--info) 0%, #0891B2 100%);
        }

        /* Table Styling */
        .table-container {
            border-radius: 15px;
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

        .badge {
            padding: 6px 14px;
            border-radius: 50px;
            font-weight: 500;
            font-size: 0.75rem;
        }

        .badge-success {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(16, 185, 129, 0.15) 100%);
            color: var(--success);
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        .badge-info {
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.1) 0%, rgba(6, 182, 212, 0.15) 100%);
            color: var(--info);
            border: 1px solid rgba(6, 182, 212, 0.2);
        }

        .badge-warning {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.1) 0%, rgba(245, 158, 11, 0.15) 100%);
            color: var(--warning);
            border: 1px solid rgba(245, 158, 11, 0.2);
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0;
        }

        .footer-text {
            background: white;
            padding: 20px;
            border-radius: 15px;
            border: 1px solid rgba(139, 92, 246, 0.1);
            margin-top: 20px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-header {
                text-align: center;
            }

            .page-title {
                font-size: 1.5rem;
            }

            .stat-number {
                font-size: 1.5rem;
            }

            .stat-icon {
                font-size: 2rem;
            }

            .menu-card {
                flex-direction: column;
                text-align: center;
                padding: 20px;
            }

            .menu-icon {
                margin-right: 0;
                margin-bottom: 10px;
                font-size: 2.5rem;
            }

            .user-info {
                flex-direction: column;
                gap: 10px;
            }

            .date-badge {
                font-size: 0.75rem;
                padding: 6px 12px;
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

        .animate-fade-in {
            animation: fadeInUp 0.5s ease-out;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light navbar-custom sticky-top">
        <div class="container">
            <a href="/" class="navbar-brand mb-0 h1 d-flex align-items-center text-decoration-none" style="color: var(--primary) !important;">
                <i class="bi bi-droplet-fill me-2"></i> CleanGo
            </a>
            <div class="user-info">
                <div class="d-none d-md-flex align-items-center gap-2">
                    <div class="user-avatar">A</div>
                    <div class="d-flex flex-column">
                        <span class="fw-600" style="font-size: 0.9rem; line-height: 1.2;">Admin</span>
                        <small class="text-muted" style="font-size: 0.75rem;">Administrator</small>
                    </div>
                </div>
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-logout">
                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4 mb-5">
        <!-- Page Header -->
        <div class="container-custom animate-fade-in">
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                <div class="page-header">
                    <h2 class="page-title">
                        <i class="bi bi-grid-1x2-fill me-2" style="color: var(--primary);"></i>
                        Dashboard
                    </h2>
                    <p class="page-subtitle">Pantau perkembangan bisnis laundry Anda hari ini</p>
                </div>
                <div class="date-badge">
                    <i class="bi bi-calendar3 me-1"></i>
                    <span id="currentDate"></span>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card card-stat card-primary text-white animate-fade-in" style="animation-delay: 0.1s;">
                    <div class="card-body">
                        <div class="stat-icon"><i class="bi bi-bag-check-fill"></i></div>
                        <div class="stat-number">{{ isset($totalTransaksi) ? $totalTransaksi : 127 }}</div>
                        <div class="stat-label">Total Transaksi</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card card-stat card-success text-white animate-fade-in" style="animation-delay: 0.2s;">
                    <div class="card-body">
                        <div class="stat-icon"><i class="bi bi-box-seam-fill"></i></div>
                        <div class="stat-number">{{ isset($totalPaket) ? $totalPaket : 12 }}</div>
                        <div class="stat-label">Total Paket</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card card-stat card-warning text-white animate-fade-in" style="animation-delay: 0.3s;">
                    <div class="card-body">
                        <div class="stat-icon"><i class="bi bi-people-fill"></i></div>
                        <div class="stat-number">{{ isset($totalPelanggan) ? $totalPelanggan : 89 }}</div>
                        <div class="stat-label">Total Pelanggan</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card card-stat card-info text-white animate-fade-in" style="animation-delay: 0.4s;">
                    <div class="card-body">
                        <div class="stat-icon"><i class="bi bi-wallet2"></i></div>
                        <div class="stat-number" style="font-size: 1.5rem;">Rp{{ isset($totalPendapatan) ? number_format($totalPendapatan, 0, ',', '.') : '2.450.000' }}</div>
                        <div class="stat-label">Pendapatan</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menu Cards -->
        <div class="mb-4">
            <h5 class="section-title mb-4">
                <i class="bi bi-lightning-charge-fill me-2" style="color: var(--primary);"></i>
                Menu Utama
            </h5>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="/paket" class="menu-card card-primary text-decoration-none">
                        <i class="bi bi-box-seam-fill menu-icon"></i>
                        <div class="menu-content">
                            <h5>Kelola Paket</h5>
                            <p>Manajemen layanan & harga</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="/transaksi" class="menu-card card-success text-decoration-none">
                        <i class="bi bi-receipt-cutoff menu-icon"></i>
                        <div class="menu-content">
                            <h5>Kelola Transaksi</h5>
                            <p>Input & pantau orderan</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="/pelanggan" class="menu-card card-warning text-decoration-none">
                        <i class="bi bi-people-fill menu-icon"></i>
                        <div class="menu-content">
                            <h5>Kelola Pelanggan</h5>
                            <p>Database & data member</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Activity Table -->
        <div class="container-custom">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h5 class="section-title">
                    <i class="bi bi-clock-history me-2" style="color: var(--primary);"></i>
                    Aktivitas Terbaru
                </h5>
                <a href="#" class="text-decoration-none" style="color: var(--primary); font-size: 0.85rem; font-weight: 500;">
                    Lihat Semua <i class="bi bi-arrow-right"></i>
                </a>
            </div>
            <div class="table-container">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Aktivitas</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-muted">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    <span id="today"></span>
                                </td>
                                <td class="fw-500">Dashboard Accessed</td>
                                <td class="text-muted">Admin mengakses halaman dashboard</td>
                                <td><span class="badge badge-success"><i class="bi bi-check-circle me-1"></i>Aktif</span></td>
                            </tr>
                            <tr>
                                <td class="text-muted">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    <span id="yesterday"></span>
                                </td>
                                <td class="fw-500">New Transaction</td>
                                <td class="text-muted">Transaksi baru berhasil dicatat</td>
                                <td><span class="badge badge-info"><i class="bi bi-info-circle me-1"></i>Selesai</span></td>
                            </tr>
                            <tr>
                                <td class="text-muted">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    <span id="twoDaysAgo"></span>
                                </td>
                                <td class="fw-500">Package Updated</td>
                                <td class="text-muted">Paket layanan diperbarui</td>
                                <td><span class="badge badge-warning"><i class="bi bi-bookmark-check me-1"></i>Tersimpan</span></td>
                            </tr>
                            <tr>
                                <td class="text-muted">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    <span id="threeDaysAgo"></span>
                                </td>
                                <td class="fw-500">Customer Added</td>
                                <td class="text-muted">Pelanggan baru ditambahkan</td>
                                <td><span class="badge badge-success"><i class="bi bi-person-check me-1"></i>Berhasil</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center footer-text">
            <p class="text-muted mb-0">
                <i class="bi bi-droplet-fill me-1" style="color: var(--primary);"></i>
                <strong style="color: var(--primary);">CleanGo Management System</strong> v1.0 &copy; 2026
                <br>
                <small style="font-size: 0.75rem;">Dibangun dengan ❤️ untuk kemudahan bisnis laundry Anda</small>
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Format tanggal Indonesia
        function formatDateIndonesia(date) {
            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
                          'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            
            const dayName = days[date.getDay()];
            const day = date.getDate();
            const month = months[date.getMonth()];
            const year = date.getFullYear();
            
            return `${dayName}, ${day} ${month} ${year}`;
        }

        function formatDateShort(date) {
            const day = date.getDate();
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 
                          'Jul', 'Agu', 'Sep', 'Oct', 'Nov', 'Des'];
            const month = months[date.getMonth()];
            const year = date.getFullYear();
            
            return `${day} ${month} ${year}`;
        }

        // Set tanggal
        const today = new Date();
        const yesterday = new Date(today);
        yesterday.setDate(yesterday.getDate() - 1);
        const twoDaysAgo = new Date(today);
        twoDaysAgo.setDate(twoDaysAgo.getDate() - 2);
        const threeDaysAgo = new Date(today);
        threeDaysAgo.setDate(threeDaysAgo.getDate() - 3);

        document.getElementById('currentDate').textContent = formatDateIndonesia(today);
        document.getElementById('today').textContent = formatDateShort(today);
        document.getElementById('yesterday').textContent = formatDateShort(yesterday);
        document.getElementById('twoDaysAgo').textContent = formatDateShort(twoDaysAgo);
        document.getElementById('threeDaysAgo').textContent = formatDateShort(threeDaysAgo);

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

        // Add animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe cards
        document.querySelectorAll('.card-stat, .menu-card').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>
</html>