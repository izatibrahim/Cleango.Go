<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi - CleanGo Laundry</title>
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
        .form-container {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            border: 1px solid rgba(139, 92, 246, 0.1);
            margin-top: 30px;
            margin-bottom: 30px;
        }

        /* Header Section */
        .form-header {
            text-align: center;
            margin-bottom: 35px;
        }

        .form-icon {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 8px 20px rgba(139, 92, 246, 0.3);
        }

        .form-icon i {
            font-size: 2.5rem;
            color: white;
        }

        .form-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 10px;
        }

        .form-subtitle {
            color: #6B7280;
            font-size: 0.95rem;
        }

        /* Form Elements */
        .form-label {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        .form-label i {
            color: var(--primary);
            margin-right: 5px;
        }

        .required {
            color: var(--secondary);
        }

        .form-control, .form-select {
            border-radius: 12px;
            border: 2px solid #E5E7EB;
            padding: 12px 16px;
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(139, 92, 246, 0.15);
            outline: none;
        }

        .form-control::placeholder {
            color: #9CA3AF;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        .input-group-text {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.1) 0%, rgba(236, 72, 153, 0.1) 100%);
            border: 2px solid #E5E7EB;
            border-right: none;
            border-radius: 12px 0 0 12px;
            color: var(--primary);
            font-weight: 600;
        }

        .input-group .form-control {
            border-left: none;
            border-radius: 0 12px 12px 0;
        }

        .input-group .form-control:focus {
            border-left: none;
        }

        .form-text {
            color: #6B7280;
            font-size: 0.8rem;
            margin-top: 6px;
            display: block;
        }

        .form-text i {
            color: var(--info);
        }

        /* Alert */
        .alert {
            border-radius: 12px;
            border: none;
            padding: 16px 20px;
        }

        .alert-danger {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(239, 68, 68, 0.05) 100%);
            color: #DC2626;
            border-left: 4px solid #DC2626;
        }

        .alert-info {
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.1) 0%, rgba(6, 182, 212, 0.05) 100%);
            color: #0891B2;
            border-left: 4px solid #0891B2;
        }

        .alert-danger ul {
            margin-bottom: 0;
            padding-left: 20px;
        }

        /* Buttons */
        .btn-submit {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border: none;
            border-radius: 12px;
            padding: 14px 32px;
            color: white;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(139, 92, 246, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(139, 92, 246, 0.4);
            color: white;
        }

        .btn-cancel {
            background: white;
            border: 2px solid #E5E7EB;
            border-radius: 12px;
            padding: 14px 32px;
            color: var(--dark);
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-cancel:hover {
            background: #F3F4F6;
            border-color: #D1D5DB;
            color: var(--dark);
            transform: translateY(-2px);
        }

        /* Form Group */
        .form-group {
            margin-bottom: 24px;
        }

        /* Info Box */
        .info-box {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.05) 0%, rgba(236, 72, 153, 0.05) 100%);
            border-radius: 12px;
            padding: 16px 20px;
            margin-bottom: 24px;
            border-left: 4px solid var(--primary);
        }

        .info-box i {
            color: var(--primary);
            font-size: 1.2rem;
            margin-right: 8px;
        }

        .info-box strong {
            color: var(--primary);
        }

        /* Transaction Number Badge */
        .trx-number-badge {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.1) 0%, rgba(236, 72, 153, 0.1) 100%);
            border: 2px solid rgba(139, 92, 246, 0.3);
            border-radius: 12px;
            padding: 12px;
            font-family: 'Courier New', monospace;
            font-weight: 600;
            color: var(--primary);
            font-size: 1.1rem;
            text-align: center;
            margin-bottom: 15px;
        }

        /* Price Calculator */
        .price-calculator {
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.05) 0%, rgba(6, 182, 212, 0.02) 100%);
            border-radius: 12px;
            padding: 20px;
            margin-top: 15px;
            border: 2px solid rgba(6, 182, 212, 0.2);
        }

        .price-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
            font-size: 0.9rem;
        }

        .price-row:last-child {
            margin-bottom: 0;
            padding-top: 12px;
            border-top: 2px solid rgba(6, 182, 212, 0.2);
            font-weight: 700;
            font-size: 1.2rem;
            color: var(--primary);
        }

        .price-label {
            color: #6B7280;
        }

        .price-value {
            font-weight: 600;
            color: var(--dark);
        }

        /* Status Badge */
        .status-badge {
            display: inline-block;
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

        /* Weight Input */
        .weight-input-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-container {
                padding: 25px;
                margin-top: 20px;
            }

            .form-title {
                font-size: 1.5rem;
            }

            .form-icon {
                width: 70px;
                height: 70px;
            }

            .form-icon i {
                font-size: 2rem;
            }

            .btn-submit, .btn-cancel {
                width: 100%;
                margin-bottom: 10px;
            }

            .button-group {
                flex-direction: column;
            }

            .weight-input-group {
                grid-template-columns: 1fr;
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

        .form-container {
            animation: fadeInUp 0.5s ease-out;
        }

        /* Invalid Feedback */
        .invalid-feedback {
            color: #DC2626;
            font-size: 0.85rem;
            margin-top: 6px;
        }

        .is-invalid {
            border-color: #DC2626 !important;
        }

        .is-invalid:focus {
            box-shadow: 0 0 0 0.2rem rgba(220, 38, 38, 0.15) !important;
        }

        /* Form Row */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }

        /* Character Counter */
        .char-counter {
            font-size: 0.8rem;
            color: #6B7280;
            text-align: right;
            margin-top: 4px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light navbar-custom sticky-top">
        <div class="container">
            <a href="/transaksi" class="navbar-brand">
                <i class="bi bi-arrow-left-circle me-2"></i> Kembali ke Daftar Transaksi
            </a>
            <h5 class="navbar-title d-none d-md-block">Tambah Transaksi Baru</h5>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
                <div class="form-container">
                    <!-- Header -->
                    <div class="form-header">
                        <div class="form-icon">
                            <i class="bi bi-receipt-cutoff"></i>
                        </div>
                        <h2 class="form-title">Tambah Transaksi Baru</h2>
                        <p class="form-subtitle">Buat transaksi laundry baru untuk pelanggan Anda</p>
                    </div>

                    <!-- Error Alert -->
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><i class="bi bi-exclamation-circle-fill me-2"></i>Terdapat Kesalahan!</strong>
                            <ul class="mt-2 mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Form -->
                    <form action="/transaksi/simpan" method="POST" id="transactionForm">
                        @csrf

                        <!-- No Transaksi -->
                        <div class="form-group">
                            <label for="no_transaksi" class="form-label">
                                <i class="bi bi-hash"></i> Nomor Transaksi <span class="required">*</span>
                            </label>
                            <div class="trx-number-badge">
                                <i class="bi bi-receipt me-2"></i>
                                <span id="trxNumberDisplay">{{ old('no_transaksi', 'TRX-' . date('YmdHis')) }}</span>
                            </div>
                            <input 
                                type="hidden" 
                                class="form-control @error('no_transaksi') is-invalid @enderror" 
                                id="no_transaksi" 
                                name="no_transaksi" 
                                value="{{ old('no_transaksi', 'TRX-' . date('YmdHis')) }}" 
                                readonly
                                required
                            >
                            <small class="form-text">
                                <i class="bi bi-info-circle-fill"></i> Nomor transaksi dibuat otomatis
                            </small>
                            @error('no_transaksi')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Pelanggan & Tanggal Row -->
                        <div class="form-row">
                            <!-- Pelanggan -->
                            <div class="form-group">
                                <label for="user_id" class="form-label">
                                    <i class="bi bi-person-fill"></i> Pelanggan
                                </label>
                                <select 
                                    class="form-select @error('user_id') is-invalid @enderror" 
                                    id="user_id" 
                                    name="user_id"
                                >
                                    <option value="">-- Pilih Pelanggan --</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <small class="form-text">
                                    <i class="bi bi-info-circle-fill"></i> Opsional - bisa kosong
                                </small>
                                @error('user_id')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tanggal -->
                            <div class="form-group">
                                <label for="tanggal" class="form-label">
                                    <i class="bi bi-calendar-event-fill"></i> Tanggal
                                </label>
                                <input 
                                    type="date" 
                                    class="form-control" 
                                    id="tanggal" 
                                    name="tanggal" 
                                    value="{{ old('tanggal', date('Y-m-d')) }}"
                                >
                                <small class="form-text">
                                    <i class="bi bi-info-circle-fill"></i> Tanggal transaksi
                                </small>
                            </div>
                        </div>

                        <!-- Paket -->
                        <div class="form-group">
                            <label for="paket_id" class="form-label">
                                <i class="bi bi-box-seam-fill"></i> Paket Laundry <span class="required">*</span>
                            </label>
                            <select 
                                class="form-select @error('paket_id') is-invalid @enderror" 
                                id="paket_id" 
                                name="paket_id" 
                                required 
                                onchange="updateCalculator()"
                            >
                                <option value="">-- Pilih Paket Laundry --</option>
                                @foreach ($pakets as $paket)
                                    <option 
                                        value="{{ $paket->id }}" 
                                        data-harga="{{ $paket->harga }}"
                                        data-nama="{{ $paket->nama_paket }}"
                                        {{ old('paket_id') == $paket->id ? 'selected' : '' }}
                                    >
                                        {{ $paket->nama_paket }} - Rp {{ number_format($paket->harga, 0, ',', '.') }}/kg
                                    </option>
                                @endforeach
                            </select>
                            <small class="form-text">
                                <i class="bi bi-info-circle-fill"></i> Pilih paket layanan yang sesuai
                            </small>
                            @error('paket_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Berat & Harga per KG -->
                        <div class="form-row">
                            <!-- Berat -->
                            <div class="form-group">
                                <label for="berat" class="form-label">
                                    <i class="bi bi-speedometer2"></i> Berat (kg)
                                </label>
                                <div class="input-group">
                                    <input 
                                        type="number" 
                                        class="form-control" 
                                        id="berat" 
                                        name="berat" 
                                        value="{{ old('berat', 1) }}" 
                                        step="0.5" 
                                        min="0.5"
                                        onchange="updateCalculator()"
                                    >
                                    <span class="input-group-text">kg</span>
                                </div>
                                <small class="form-text">
                                    <i class="bi bi-info-circle-fill"></i> Minimal 0.5 kg
                                </small>
                            </div>

                            <!-- Harga per KG (Display) -->
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="bi bi-tag-fill"></i> Harga per KG
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="harga_display" 
                                        value="0" 
                                        readonly
                                        style="background-color: #F9FAFB;"
                                    >
                                </div>
                                <small class="form-text">
                                    <i class="bi bi-info-circle-fill"></i> Sesuai paket yang dipilih
                                </small>
                            </div>
                        </div>

                        <!-- Price Calculator -->
                        <div class="price-calculator" id="priceCalculator" style="display: none;">
                            <div class="price-row">
                                <span class="price-label">Paket:</span>
                                <span class="price-value" id="calc_paket">-</span>
                            </div>
                            <div class="price-row">
                                <span class="price-label">Harga per kg:</span>
                                <span class="price-value" id="calc_harga_kg">Rp 0</span>
                            </div>
                            <div class="price-row">
                                <span class="price-label">Berat:</span>
                                <span class="price-value" id="calc_berat">0 kg</span>
                            </div>
                            <div class="price-row">
                                <span class="price-label">TOTAL HARGA:</span>
                                <span class="price-value" id="calc_total">Rp 0</span>
                            </div>
                        </div>

                        <!-- Total Harga -->
                        <div class="form-group">
                            <label for="total_harga" class="form-label">
                                <i class="bi bi-wallet2"></i> Total Harga <span class="required">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input 
                                    type="number" 
                                    class="form-control @error('total_harga') is-invalid @enderror" 
                                    id="total_harga" 
                                    name="total_harga" 
                                    value="{{ old('total_harga') }}" 
                                    step="1000" 
                                    min="0" 
                                    required
                                    style="font-weight: 700; font-size: 1.1rem; color: var(--primary);"
                                >
                            </div>
                            <small class="form-text">
                                <i class="bi bi-info-circle-fill"></i> Harga otomatis dihitung, dapat diubah manual
                            </small>
                            @error('total_harga')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="form-group">
                            <label for="status" class="form-label">
                                <i class="bi bi-flag-fill"></i> Status Transaksi <span class="required">*</span>
                            </label>
                            <select 
                                class="form-select @error('status') is-invalid @enderror" 
                                id="status" 
                                name="status" 
                                required
                                onchange="updateStatusPreview()"
                            >
                                <option value="pending" {{ old('status', 'pending') == 'pending' ? 'selected' : '' }}>
                                    ⏳ Pending - Menunggu Proses
                                </option>
                                <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>
                                    ✅ Selesai - Sudah Dicuci
                                </option>
                                <option value="dibayar" {{ old('status') == 'dibayar' ? 'selected' : '' }}>
                                    💰 Dibayar - Lunas
                                </option>
                            </select>
                            <div class="mt-2">
                                <span class="status-badge status-pending" id="statusPreview">
                                    <i class="bi bi-clock-fill me-1"></i> Pending
                                </span>
                            </div>
                            @error('status')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Catatan -->
                        <div class="form-group">
                            <label for="catatan" class="form-label">
                                <i class="bi bi-chat-left-text-fill"></i> Catatan Tambahan
                            </label>
                            <textarea 
                                class="form-control @error('catatan') is-invalid @enderror" 
                                id="catatan" 
                                name="catatan" 
                                rows="3" 
                                placeholder="Contoh: Pisahkan baju putih dan berwarna, gunakan pewangi extra"
                                maxlength="500"
                            >{{ old('catatan') }}</textarea>
                            <div class="d-flex justify-content-between">
                                <small class="form-text">
                                    <i class="bi bi-info-circle-fill"></i> Instruksi khusus untuk laundry (opsional)
                                </small>
                                <small class="char-counter">
                                    <span id="charCount">0</span>/500
                                </small>
                            </div>
                            @error('catatan')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Info Box -->
                        <div class="info-box">
                            <i class="bi bi-lightbulb-fill"></i>
                            <strong>Tips:</strong> Pastikan semua data sudah benar sebelum menyimpan. Nomor transaksi akan digunakan untuk pelacakan order.
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex gap-3 button-group">
                            <button type="submit" class="btn btn-submit">
                                <i class="bi bi-save-fill me-2"></i> Simpan Transaksi
                            </button>
                            <a href="/transaksi" class="btn btn-cancel">
                                <i class="bi bi-x-circle me-2"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Spacing -->
    <div style="height: 50px;"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Update calculator when paket or berat changes
        function updateCalculator() {
            const paketSelect = document.getElementById('paket_id');
            const beratInput = document.getElementById('berat');
            const totalHargaInput = document.getElementById('total_harga');
            const hargaDisplay = document.getElementById('harga_display');
            const priceCalculator = document.getElementById('priceCalculator');
            
            const selectedOption = paketSelect.options[paketSelect.selectedIndex];
            const hargaPerKg = parseInt(selectedOption.dataset.harga) || 0;
            const namaPaket = selectedOption.dataset.nama || '-';
            const berat = parseFloat(beratInput.value) || 0;
            
            if (hargaPerKg > 0 && berat > 0) {
                const total = hargaPerKg * berat;
                
                // Update displays
                hargaDisplay.value = formatRupiah(hargaPerKg);
                totalHargaInput.value = total;
                
                // Update calculator
                document.getElementById('calc_paket').textContent = namaPaket;
                document.getElementById('calc_harga_kg').textContent = 'Rp ' + formatRupiah(hargaPerKg);
                document.getElementById('calc_berat').textContent = berat + ' kg';
                document.getElementById('calc_total').textContent = 'Rp ' + formatRupiah(total);
                
                // Show calculator
                priceCalculator.style.display = 'block';
            } else {
                hargaDisplay.value = '0';
                totalHargaInput.value = '';
                priceCalculator.style.display = 'none';
            }
        }

        // Format number to Rupiah
        function formatRupiah(angka) {
            return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        // Update status preview
        function updateStatusPreview() {
            const statusSelect = document.getElementById('status');
            const statusPreview = document.getElementById('statusPreview');
            const status = statusSelect.value;
            
            statusPreview.className = 'status-badge';
            
            if (status === 'pending') {
                statusPreview.classList.add('status-pending');
                statusPreview.innerHTML = '<i class="bi bi-clock-fill me-1"></i> Pending';
            } else if (status === 'selesai') {
                statusPreview.classList.add('status-selesai');
                statusPreview.innerHTML = '<i class="bi bi-check-circle-fill me-1"></i> Selesai';
            } else if (status === 'dibayar') {
                statusPreview.classList.add('status-dibayar');
                statusPreview.innerHTML = '<i class="bi bi-cash-coin me-1"></i> Dibayar';
            }
        }

        // Character counter for catatan
        const catatanField = document.getElementById('catatan');
        const charCount = document.getElementById('charCount');
        
        if (catatanField && charCount) {
            catatanField.addEventListener('input', function() {
                charCount.textContent = this.value.length;
                if (this.value.length >= 450) {
                    charCount.style.color = '#F59E0B';
                }
                if (this.value.length >= 500) {
                    charCount.style.color = '#DC2626';
                }
                if (this.value.length < 450) {
                    charCount.style.color = '#6B7280';
                }
            });
            // Initialize counter
            charCount.textContent = catatanField.value.length;
        }

        // Form submission
        const form = document.getElementById('transactionForm');
        
        form.addEventListener('submit', function(e) {
            const paketId = document.getElementById('paket_id').value;
            const totalHarga = document.getElementById('total_harga').value;
            
            if (!paketId) {
                e.preventDefault();
                alert('Silakan pilih paket laundry!');
                document.getElementById('paket_id').focus();
                return false;
            }
            
            if (!totalHarga || parseInt(totalHarga) <= 0) {
                e.preventDefault();
                alert('Total harga harus lebih dari 0!');
                document.getElementById('total_harga').focus();
                return false;
            }

            // Show loading state
            const submitBtn = form.querySelector('.btn-submit');
            submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i> Menyimpan...';
            submitBtn.disabled = true;
        });

        // Auto-dismiss alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);

        // Initialize on page load
        window.addEventListener('DOMContentLoaded', function() {
            updateCalculator();
            updateStatusPreview();
        });
    </script>
</body>
</html>