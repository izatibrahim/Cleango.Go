<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelanggan - CleanGo Laundry</title>
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
            color: var(--warning);
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
            color: #06B6D4;
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

        .alert-warning {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.1) 0%, rgba(245, 158, 11, 0.05) 100%);
            color: #D97706;
            border-left: 4px solid #F59E0B;
        }

        .alert-danger ul {
            margin-bottom: 0;
            padding-left: 20px;
        }

        /* Buttons */
        .btn-submit {
            background: linear-gradient(135deg, var(--warning) 0%, #FBBF24 100%);
            border: none;
            border-radius: 12px;
            padding: 14px 32px;
            color: white;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(245, 158, 11, 0.4);
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
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .info-box i {
            color: var(--primary);
            font-size: 1.5rem;
        }

        .info-box-content {
            flex: 1;
        }

        .info-box-title {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 4px;
        }

        .info-box-text {
            font-size: 0.85rem;
            color: #6B7280;
            margin: 0;
        }

        /* Customer Info Card */
        .customer-info-card {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.05) 0%, rgba(251, 191, 36, 0.05) 100%);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 24px;
            border: 2px solid rgba(245, 158, 11, 0.2);
        }

        .customer-info-title {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--warning);
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .customer-info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .customer-info-item {
            display: flex;
            flex-direction: column;
        }

        .customer-info-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            color: #6B7280;
            margin-bottom: 4px;
            letter-spacing: 0.5px;
        }

        .customer-info-value {
            font-size: 0.9rem;
            color: var(--dark);
            font-weight: 500;
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

            .customer-info-grid {
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

        /* Valid Feedback */
        .is-valid {
            border-color: var(--success) !important;
        }

        .is-valid:focus {
            box-shadow: 0 0 0 0.2rem rgba(16, 185, 129, 0.15) !important;
        }

        /* Character Counter */
        .char-counter {
            font-size: 0.8rem;
            color: #6B7280;
            text-align: right;
            margin-top: 4px;
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

        /* Badge */
        .badge-edited {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.1) 0%, rgba(251, 191, 36, 0.1) 100%);
            color: var(--warning);
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 500;
            border: 1px solid rgba(245, 158, 11, 0.3);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light navbar-custom sticky-top">
        <div class="container">
            <a href="/pelanggan" class="navbar-brand">
                <i class="bi bi-arrow-left-circle me-2"></i> Kembali ke Daftar Pelanggan
            </a>
            <h5 class="navbar-title d-none d-md-block">Edit Pelanggan</h5>
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
                            <i class="bi bi-pencil-square"></i>
                            Edit Pelanggan
                        </h2>
                    </div>

                    <!-- Customer Info Card -->
                    <div class="customer-info-card">
                        <div class="customer-info-title">
                            Informasi Pelanggan
                        </div>
                        <div class="customer-info-grid">
                            <div class="customer-info-item">
                                <span class="customer-info-label">ID Pelanggan</span>
                                <span class="customer-info-value">#{{ str_pad($pelanggan->id, 5, '0', STR_PAD_LEFT) }}</span>
                            </div>
                            <div class="customer-info-item">
                                <span class="customer-info-label">Terdaftar Sejak</span>
                                <span class="customer-info-value">{{ $pelanggan->created_at->format('d M Y') }}</span>
                            </div>
                            <div class="customer-info-item">
                                <span class="customer-info-label">Terakhir Diupdate</span>
                                <span class="customer-info-value">{{ $pelanggan->updated_at->format('d M Y H:i') }}</span>
                            </div>
                            <div class="customer-info-item">
                                <span class="customer-info-label">Status</span>
                                <span class="customer-info-value">
                                    <span class="badge-edited">Mode Edit</span>
                                </span>
                            </div>
                        </div>
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
                    <form action="/pelanggan/{{ $pelanggan->id }}" method="POST" id="customerEditForm">
                        @csrf
                        @method('PATCH')

                        <!-- Nama Pelanggan -->
                        <div class="form-group">
                            <label for="name" class="form-label">
                                Nama Lengkap <span class="required">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('name') is-invalid @enderror" 
                                id="name" 
                                name="name" 
                                value="{{ old('name', $pelanggan->name) }}" 
                                placeholder="Contoh: Budi Santoso" 
                                required
                                minlength="3"
                            >
                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email & Phone Row -->
                        <div class="form-row">
                            <!-- Email -->
                            <div class="form-group">
                                <label for="email" class="form-label">
                                    Email <span class="required">*</span>
                                </label>
                                <input 
                                    type="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    id="email" 
                                    name="email" 
                                    value="{{ old('email', $pelanggan->email) }}" 
                                    placeholder="contoh@email.com" 
                                    required
                                >
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- No HP -->
                            <div class="form-group">
                                <label for="phone" class="form-label">
                                    No. Handphone <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">+62</span>
                                    <input 
                                        type="tel" 
                                        class="form-control @error('phone') is-invalid @enderror" 
                                        id="phone" 
                                        name="phone" 
                                        value="{{ old('phone', $pelanggan->phone) }}" 
                                        placeholder="81234567890" 
                                        required
                                        pattern="[0-9]{9,13}"
                                    >
                                </div>
                                @error('phone')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Alamat -->
                        <div class="form-group">
                            <label for="address" class="form-label">
                                Alamat Lengkap
                            </label>
                            <textarea 
                                class="form-control @error('address') is-invalid @enderror" 
                                id="address" 
                                name="address" 
                                rows="3" 
                                placeholder="Jl. Contoh No. 123, RT/RW 01/02"
                                maxlength="200"
                            >{{ old('address', $pelanggan->address) }}</textarea>
                            <div class="d-flex justify-content-end">
                                <small class="char-counter">
                                    <span id="charCount">0</span>/200
                                </small>
                            </div>
                            @error('address')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Kota -->
                        <div class="form-group">
                            <label for="city" class="form-label">
                                Kota/Kabupaten
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('city') is-invalid @enderror" 
                                id="city" 
                                name="city" 
                                value="{{ old('city', $pelanggan->city) }}" 
                                placeholder="Contoh: Bandung, Jakarta Selatan"
                                list="cityList"
                            >
                            <datalist id="cityList">
                                <option value="Bandung">
                                <option value="Jakarta Selatan">
                                <option value="Jakarta Utara">
                                <option value="Surabaya">
                                <option value="Semarang">
                                <option value="Yogyakarta">
                                <option value="Medan">
                            </datalist>
                            @error('city')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex gap-2 button-group">
                            <button type="submit" class="btn btn-submit">
                                <i class="bi bi-check-circle-fill me-2"></i> Simpan
                            </button>
                            <a href="/pelanggan" class="btn btn-cancel">
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
        // Character counter for address
        const addressField = document.getElementById('address');
        const charCount = document.getElementById('charCount');
        
        if (addressField && charCount) {
            // Initialize counter
            charCount.textContent = addressField.value.length;
            
            addressField.addEventListener('input', function() {
                charCount.textContent = this.value.length;
                if (this.value.length >= 180) {
                    charCount.style.color = '#F59E0B';
                }
                if (this.value.length >= 200) {
                    charCount.style.color = '#DC2626';
                }
                if (this.value.length < 180) {
                    charCount.style.color = '#6B7280';
                }
            });
        }

        // Phone number validation
        const phoneInput = document.getElementById('phone');
        
        if (phoneInput) {
            phoneInput.addEventListener('input', function() {
                // Remove any non-digit characters
                this.value = this.value.replace(/\D/g, '');
                
                // Remove leading 0 if present
                if (this.value.startsWith('0')) {
                    this.value = this.value.substring(1);
                }
                
                // Limit to 13 digits
                if (this.value.length > 13) {
                    this.value = this.value.substring(0, 13);
                }
            });
        }

        // Email validation
        const emailInput = document.getElementById('email');
        
        if (emailInput) {
            emailInput.addEventListener('blur', function() {
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (this.value && !emailPattern.test(this.value)) {
                    this.classList.add('is-invalid');
                } else if (this.value) {
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                }
            });
        }

        // Name validation
        const nameInput = document.getElementById('name');
        
        if (nameInput) {
            nameInput.addEventListener('blur', function() {
                if (this.value.length < 3) {
                    this.classList.add('is-invalid');
                } else {
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                }
            });
        }

        // Form submission
        const form = document.getElementById('customerEditForm');
        
        form.addEventListener('submit', function(e) {
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const phone = document.getElementById('phone').value.trim();
            
            if (!name || name.length < 3) {
                e.preventDefault();
                alert('Nama pelanggan harus diisi (minimal 3 karakter)!');
                document.getElementById('name').focus();
                return false;
            }
            
            if (!email) {
                e.preventDefault();
                alert('Email harus diisi!');
                document.getElementById('email').focus();
                return false;
            }
            
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                e.preventDefault();
                alert('Format email tidak valid!');
                document.getElementById('email').focus();
                return false;
            }
            
            if (!phone || phone.length < 9) {
                e.preventDefault();
                alert('Nomor handphone harus diisi dengan benar (minimal 9 digit)!');
                document.getElementById('phone').focus();
                return false;
            }

            // Confirm before submit
            if (!confirm('Apakah Anda yakin ingin menyimpan perubahan data pelanggan ini?')) {
                e.preventDefault();
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
                if (!alert.classList.contains('alert-warning')) {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }
            });
        }, 5000);

        // Capitalize first letter of each word in name
        if (nameInput) {
            nameInput.addEventListener('blur', function() {
                const words = this.value.toLowerCase().split(' ');
                const capitalizedWords = words.map(word => {
                    return word.charAt(0).toUpperCase() + word.slice(1);
                });
                this.value = capitalizedWords.join(' ');
            });
        }

        // Track changes for unsaved warning
        let formChanged = false;
        const formInputs = form.querySelectorAll('input, textarea');
        
        formInputs.forEach(input => {
            input.addEventListener('change', function() {
                formChanged = true;
            });
        });

        // Warn before leaving if form changed
        window.addEventListener('beforeunload', function(e) {
            if (formChanged) {
                e.preventDefault();
                e.returnValue = '';
            }
        });

        // Don't warn when submitting
        form.addEventListener('submit', function() {
            formChanged = false;
        });
    </script>
</body>
</html>