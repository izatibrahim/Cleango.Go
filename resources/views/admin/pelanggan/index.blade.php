<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggan - CleanGo Laundry</title>
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

        /* Search Bar */
        .search-container {
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

        /* Customer Cards */
        .customer-card {
            background: white;
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 20px;
            border: 2px solid #F3F4F6;
            transition: all 0.3s;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .customer-card:hover {
            border-color: var(--primary);
            box-shadow: 0 12px 30px rgba(139, 92, 246, 0.15);
            transform: translateY(-5px);
        }

        .customer-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .customer-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .customer-info {
            flex: 1;
        }

        .customer-name {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 5px;
        }

        .customer-id {
            font-size: 0.75rem;
            color: #6B7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .customer-details {
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

        .customer-actions {
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

        .badge-date {
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.1) 0%, rgba(6, 182, 212, 0.05) 100%);
            color: #0891B2;
            padding: 4px 10px;
            border-radius: 50px;
            font-weight: 500;
            font-size: 0.75rem;
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

        /* Stats */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }

        .stat-card {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.05) 0%, rgba(236, 72, 153, 0.05) 100%);
            border-radius: 12px;
            padding: 15px;
            text-align: center;
            border: 1px solid rgba(139, 92, 246, 0.1);
        }

        .stat-number {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--primary);
        }

        .stat-label {
            font-size: 0.8rem;
            color: #6B7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
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

            .customer-details {
                grid-template-columns: 1fr;
            }

            .customer-actions {
                flex-direction: column;
            }

            .stats-row {
                grid-template-columns: repeat(2, 1fr);
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

        .customer-card {
            animation: fadeInUp 0.5s ease-out;
        }

        /* Hidden class for view toggle */
        .d-none-custom {
            display: none !important;
        }

        /* Pagination */
        .pagination {
            margin: 0;
        }

        .page-link {
            color: var(--primary);
            border: 1px solid #E5E7EB;
            border-radius: 8px;
            margin: 0 3px;
            padding: 8px 15px;
        }

        .page-link:hover {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .page-item.active .page-link {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border-color: transparent;
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
            <h5 class="navbar-title d-none d-md-block">Kelola Pelanggan</h5>
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
                    <i class="bi bi-people-fill"></i> Daftar Pelanggan
                </h2>
                <a href="/pelanggan/tambah" class="btn-add">
                    <i class="bi bi-person-plus-fill me-2"></i> Tambah Pelanggan
                </a>
            </div>
        </div>

        <!-- Stats -->
        <div class="container-custom">
            <div class="stats-row">
                <div class="stat-card">
                    <div class="stat-number">{{ $pelanggans->total() }}</div>
                    <div class="stat-label">Total Pelanggan</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $pelanggans->count() }}</div>
                    <div class="stat-label">Ditampilkan</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $pelanggans->currentPage() }}</div>
                    <div class="stat-label">Halaman</div>
                </div>
            </div>
        </div>

        <!-- Search & Filter -->
        <div class="container-custom">
            <div class="search-container">
                <div class="search-box">
                    <i class="bi bi-search"></i>
                    <input 
                        type="text" 
                        id="searchInput" 
                        class="form-control" 
                        placeholder="Cari nama, email, atau nomor HP pelanggan..."
                    >
                </div>
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
                <i class="bi bi-person-lines-fill"></i>
                Semua Pelanggan Terdaftar
            </h5>
            @if ($pelanggans->count() > 0)
                <div class="row" id="customerCards">
                    @foreach($pelanggans as $p)
                        <div class="col-lg-6 mb-4 customer-item" 
                             data-name="{{ strtolower($p->name) }}" 
                             data-email="{{ strtolower($p->email) }}" 
                             data-phone="{{ $p->phone }}">
                            <div class="customer-card">
                                <div class="customer-header">
                                    <div class="customer-avatar">
                                        {{ strtoupper(substr($p->name, 0, 1)) }}
                                    </div>
                                    <div class="customer-info">
                                        <div class="customer-name">{{ $p->name }}</div>
                                        <div class="customer-id">ID: #{{ str_pad($p->id, 5, '0', STR_PAD_LEFT) }}</div>
                                    </div>
                                </div>
                                
                                <div class="customer-details">
                                    <div class="detail-item">
                                        <i class="bi bi-envelope-fill"></i>
                                        <span>{{ $p->email }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <i class="bi bi-telephone-fill"></i>
                                        <span>{{ $p->phone ?? '-' }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <i class="bi bi-geo-alt-fill"></i>
                                        <span>{{ $p->city ?? 'Tidak ada data' }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <i class="bi bi-calendar-check-fill"></i>
                                        <span>{{ $p->created_at->format('d M Y') }}</span>
                                    </div>
                                </div>
                                
                                @if($p->address)
                                    <div class="detail-item mb-3">
                                        <i class="bi bi-house-fill"></i>
                                        <span>{{ Str::limit($p->address, 60) }}</span>
                                    </div>
                                @endif
                                
                                <div class="customer-actions">
                                    <a href="/pelanggan/{{ $p->id }}/edit" class="btn btn-action btn-edit">
                                        <i class="bi bi-pencil-square me-1"></i> Edit
                                    </a>
                                    <form action="/pelanggan/{{ $p->id }}" method="POST" style="display:inline; flex: 1;" onsubmit="return confirm('Yakin ingin menghapus pelanggan {{ $p->name }}?')">
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
                        <i class="bi bi-person-x"></i>
                    </div>
                    <h3 class="empty-title">Belum Ada Pelanggan</h3>
                    <p class="empty-desc">Mulai tambahkan pelanggan pertama Anda</p>
                    <a href="/pelanggan/tambah" class="btn-add">
                        <i class="bi bi-person-plus-fill"></i> Tambah Pelanggan Pertama
                    </a>
                </div>
            @endif

            <!-- Pagination for Card View -->
            @if ($pelanggans->hasPages())
                <nav class="mt-4">
                    <ul class="pagination justify-content-center">
                        {{ $pelanggans->links('pagination::bootstrap-5') }}
                    </ul>
                </nav>
            @endif
        </div>

        <!-- Table View (Hidden by default) -->
        <div id="tableView" class="container-custom d-none-custom">
            <h5 class="section-title">
                <i class="bi bi-table"></i>
                Daftar Pelanggan dalam Tabel
            </h5>
            @if ($pelanggans->count() > 0)
                <div class="table-container">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 20%;">Nama</th>
                                    <th style="width: 20%;">Email</th>
                                    <th style="width: 12%;">No. HP</th>
                                    <th style="width: 15%;">Kota</th>
                                    <th style="width: 13%;">Bergabung</th>
                                    <th style="width: 15%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pelanggans as $index => $p)
                                    <tr class="customer-item" 
                                        data-name="{{ strtolower($p->name) }}" 
                                        data-email="{{ strtolower($p->email) }}" 
                                        data-phone="{{ $p->phone }}">
                                        <td class="text-muted">{{ ($pelanggans->currentPage() - 1) * $pelanggans->perPage() + $index + 1 }}</td>
                                        <td>
                                            <strong style="color: var(--dark);">{{ $p->name }}</strong>
                                            <br>
                                            <small class="text-muted">ID: #{{ str_pad($p->id, 5, '0', STR_PAD_LEFT) }}</small>
                                        </td>
                                        <td>
                                            <small>{{ $p->email }}</small>
                                        </td>
                                        <td>
                                            <small>{{ $p->phone ?? '-' }}</small>
                                        </td>
                                        <td>
                                            <small>{{ $p->city ?? '-' }}</small>
                                        </td>
                                        <td>
                                            <span class="badge-date">{{ $p->created_at->format('d M Y') }}</span>
                                        </td>
                                        <td>
                                            <a href="/pelanggan/{{ $p->id }}/edit" class="btn btn-sm btn-edit me-1">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="/pelanggan/{{ $p->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus {{ $p->name }}?')">
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
                        <i class="bi bi-person-x"></i>
                    </div>
                    <h3 class="empty-title">Belum Ada Pelanggan</h3>
                    <p class="empty-desc">Mulai tambahkan pelanggan pertama Anda</p>
                    <a href="/pelanggan/tambah" class="btn-add">
                        <i class="bi bi-person-plus-fill"></i> Tambah Pelanggan Pertama
                    </a>
                </div>
            @endif

            <!-- Pagination for Table View -->
            @if ($pelanggans->hasPages())
                <nav class="mt-4">
                    <ul class="pagination justify-content-center">
                        {{ $pelanggans->links('pagination::bootstrap-5') }}
                    </ul>
                </nav>
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
            const searchTerm = this.value.toLowerCase();
            const customerItems = document.querySelectorAll('.customer-item');
            let visibleCount = 0;
            
            customerItems.forEach(item => {
                const name = item.getAttribute('data-name');
                const email = item.getAttribute('data-email');
                const phone = item.getAttribute('data-phone') || '';
                
                if (name.includes(searchTerm) || email.includes(searchTerm) || phone.includes(searchTerm)) {
                    item.style.display = '';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            // Show/hide empty state message
            const activeView = document.querySelector('.view-btn.active').textContent.includes('Kartu') ? 'card' : 'table';
            const emptyMessage = document.getElementById('searchEmptyMessage');
            
            if (visibleCount === 0 && !emptyMessage) {
                const container = activeView === 'card' ? document.querySelector('#cardView .row') : document.querySelector('#tableView tbody');
                const message = document.createElement('div');
                message.id = 'searchEmptyMessage';
                message.className = 'empty-state';
                message.innerHTML = `
                    <div class="empty-icon"><i class="bi bi-search"></i></div>
                    <h3 class="empty-title">Tidak Ada Hasil</h3>
                    <p class="empty-desc">Tidak ditemukan pelanggan dengan kata kunci "${searchTerm}"</p>
                `;
                
                if (activeView === 'card') {
                    container.appendChild(message);
                } else {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `<td colspan="7">${message.outerHTML}</td>`;
                    container.appendChild(tr);
                }
            } else if (visibleCount > 0 && emptyMessage) {
                emptyMessage.remove();
            }
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