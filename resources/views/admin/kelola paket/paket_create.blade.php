<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Paket - CleanGo Laundry</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary: #8B5CF6;
            --primary-dark: #7C3AED;
            --secondary: #EC4899;
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
            padding: 35px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            border: 1px solid rgba(139, 92, 246, 0.1);
            margin-top: 30px;
            margin-bottom: 30px;
        }

        /* Header Section */
        .form-header {
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid #F3F4F6;
        }

        .form-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-title i {
            color: var(--primary);
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
            margin-bottom: 20px;
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

        /* Select Options Enhancement */
        .form-select option {
            padding: 10px;
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
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light navbar-custom sticky-top">
        <div class="container">
            <a href="/paket" class="navbar-brand">
                <i class="bi bi-arrow-left-circle me-2"></i> Kembali ke Daftar Paket
            </a>
            <h5 class="navbar-title d-none d-md-block">Tambah Paket Baru</h5>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-xl-6">
                <div class="form-container">
                    <!-- Header -->
                    <div class="form-header">
                        <h2 class="form-title">
                            <i class="bi bi-plus-circle-fill"></i>
                            Tambah Paket
                        </h2>
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
                    <form action="/paket/simpan" method="POST">
                        @csrf

                        <!-- Nama Paket -->
                        <div class="form-group">
                            <label for="nama_paket" class="form-label">
                                Nama Paket <span class="required">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('nama_paket') is-invalid @enderror" 
                                id="nama_paket" 
                                name="nama_paket" 
                                value="{{ old('nama_paket') }}" 
                                placeholder="Contoh: Cuci Regular, Cuci Express" 
                                required
                            >
                            @error('nama_paket')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Harga -->
                        <div class="form-group">
                            <label for="harga" class="form-label">
                                Harga per Kilogram <span class="required">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input 
                                    type="number" 
                                    class="form-control @error('harga') is-invalid @enderror" 
                                    id="harga" 
                                    name="harga" 
                                    value="{{ old('harga') }}" 
                                    placeholder="Masukkan harga" 
                                    step="500" 
                                    min="0" 
                                    required
                                >
                            </div>
                            @error('harga')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Jenis Paket -->
                        <div class="form-group">
                            <label for="jenis" class="form-label">
                                Jenis Paket <span class="required">*</span>
                            </label>
                            <select 
                                class="form-select @error('jenis') is-invalid @enderror" 
                                id="jenis" 
                                name="jenis" 
                                required
                            >
                                <option value="">-- Pilih Jenis Paket --</option>
                                <option value="Regular" {{ old('jenis') == 'Regular' ? 'selected' : '' }}>Cuci Regular</option>
                                <option value="Express" {{ old('jenis') == 'Express' ? 'selected' : '' }}>Cuci Express</option>
                                <option value="Premium" {{ old('jenis') == 'Premium' ? 'selected' : '' }}>Cuci Premium</option>
                                <option value="Karpet" {{ old('jenis') == 'Karpet' ? 'selected' : '' }}>Cuci Karpet</option>
                                <option value="Bedcover" {{ old('jenis') == 'Bedcover' ? 'selected' : '' }}>Cuci Bedcover</option>
                                <option value="Jas" {{ old('jenis') == 'Jas' ? 'selected' : '' }}>Cuci Jas</option>
                                <option value="Sepatu" {{ old('jenis') == 'Sepatu' ? 'selected' : '' }}>Cuci Sepatu</option>
                                <option value="Gorden" {{ old('jenis') == 'Gorden' ? 'selected' : '' }}>Cuci Gorden</option>
                            </select>
                            @error('jenis')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex gap-2 button-group">
                            <button type="submit" class="btn btn-submit">
                                <i class="bi bi-save-fill me-2"></i> Simpan
                            </button>
                            <a href="/paket" class="btn btn-cancel">
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
        // Auto format currency input
        const hargaInput = document.getElementById('harga');
        
        hargaInput.addEventListener('blur', function() {
            if (this.value) {
                // Round to nearest 500
                let value = Math.round(parseInt(this.value) / 500) * 500;
                this.value = value;
            }
        });

        // Form validation
        const form = document.querySelector('form');
        
        form.addEventListener('submit', function(e) {
            const namaPaket = document.getElementById('nama_paket').value.trim();
            const harga = document.getElementById('harga').value;
            const jenis = document.getElementById('jenis').value;
            
            if (!namaPaket || !harga || !jenis) {
                e.preventDefault();
                alert('Mohon lengkapi semua field yang wajib diisi!');
                return false;
            }
            
            if (parseInt(harga) < 0) {
                e.preventDefault();
                alert('Harga tidak boleh negatif!');
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
    </script>
</body>
</html>