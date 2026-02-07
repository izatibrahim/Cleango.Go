{{-- resources/views/pelanggan/edit.blade.php --}}

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

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #faf8ff 0%, #f5f3ff 100%);
            background-attachment: fixed;
            min-height: 100vh;
            color: var(--dark);
        }

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

        .navbar-brand:hover { color: var(--primary) !important; }

        .form-container {
            background: white;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(139, 92, 246, 0.1);
            margin-top: 30px;
            margin-bottom: 30px;
            animation: fadeInUp 0.5s ease-out;
        }

        .form-header {
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid #F3F4F6;
        }

        .form-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-title i { color: var(--warning); }

        .form-label { font-weight: 600; font-size: 0.9rem; }
        .required { color: var(--secondary); }

        .form-control, .form-select {
            border-radius: 12px;
            border: 2px solid #E5E7EB;
            padding: 12px 16px;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(139, 92, 246, 0.15);
        }

        .input-group-text {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.1) 0%, rgba(236, 72, 153, 0.1) 100%);
            border: 2px solid #E5E7EB;
            border-right: none;
            border-radius: 12px 0 0 12px;
            color: var(--primary);
            font-weight: 600;
        }

        .btn-submit {
            background: linear-gradient(135deg, var(--warning) 0%, #FBBF24 100%);
            border: none;
            border-radius: 12px;
            padding: 14px 32px;
            color: white;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
            transition: 0.3s;
        }

        .btn-submit:hover { transform: translateY(-3px); box-shadow: 0 8px 25px rgba(245, 158, 11, 0.4); color: white; }

        .btn-cancel {
            background: white;
            border: 2px solid #E5E7EB;
            border-radius: 12px;
            padding: 14px 32px;
            color: var(--dark);
            font-weight: 600;
            transition: 0.3s;
        }

        .customer-info-card {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.05) 0%, rgba(251, 191, 36, 0.05) 100%);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 24px;
            border: 2px solid rgba(245, 158, 11, 0.2);
        }

        .customer-info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .customer-info-label { font-size: 0.75rem; color: #6B7280; text-transform: uppercase; }
        .customer-info-value { font-size: 0.9rem; font-weight: 500; }

        .badge-edited {
            background: rgba(245, 158, 11, 0.1);
            color: var(--warning);
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.75rem;
            border: 1px solid rgba(245, 158, 11, 0.3);
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 768px) {
            .customer-info-grid { grid-template-columns: 1fr; }
            .button-group { flex-direction: column; }
            .btn-submit, .btn-cancel { width: 100%; }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light navbar-custom sticky-top">
        <div class="container">
            <a href="{{ route('pelanggan.index') }}" class="navbar-brand">
                <i class="bi bi-arrow-left-circle me-2"></i> Kembali ke Daftar Pelanggan
            </a>
            <h5 class="navbar-title d-none d-md-block">Edit Pelanggan</h5>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-xl-6">
                <div class="form-container">
                    <div class="form-header">
                        <h2 class="form-title">
                            <i class="bi bi-pencil-square"></i> Edit Pelanggan
                        </h2>
                    </div>

                    <div class="customer-info-card">
                        <div class="customer-info-grid">
                            <div class="customer-info-item">
                                <span class="customer-info-label">ID Pelanggan</span>
                                <span class="customer-info-value">#{{ str_pad($pelanggan->id, 5, '0', STR_PAD_LEFT) }}</span>
                            </div>
                            <div class="customer-info-item">
                                <span class="customer-info-label">Terdaftar</span>
                                <span class="customer-info-value">{{ $pelanggan->created_at->format('d M Y') }}</span>
                            </div>
                            <div class="customer-info-item">
                                <span class="customer-info-label">Update Terakhir</span>
                                <span class="customer-info-value">{{ $pelanggan->updated_at->diffForHumans() }}</span>
                            </div>
                            <div class="customer-info-item">
                                <span class="customer-info-label">Status</span>
                                <span><span class="badge-edited">Mode Edit</span></span>
                            </div>
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><i class="bi bi-exclamation-circle-fill me-2"></i>Terjadi Kesalahan!</strong>
                            <ul class="mt-2 mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST" id="customerEditForm">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap <span class="required">*</span></label>
                            <input type="text" name="name" id="name" 
                                class="form-control @error('name') is-invalid @enderror" 
                                value="{{ old('name', $pelanggan->name) }}" required minlength="3">
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email <span class="required">*</span></label>
                                <input type="email" name="email" id="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    value="{{ old('email', $pelanggan->email) }}" required>
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">No. Handphone <span class="required">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">+62</span>
                                    <input type="tel" name="phone" id="phone" 
                                        class="form-control @error('phone') is-invalid @enderror" 
                                        value="{{ old('phone', $pelanggan->phone) }}" required>
                                </div>
                                @error('phone') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat Lengkap</label>
                            <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" 
                                rows="3" maxlength="200">{{ old('address', $pelanggan->address) }}</textarea>
                            <div class="text-end">
                                <small class="text-muted" id="charCount">0/200</small>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="city" class="form-label">Kota/Kabupaten</label>
                            <input type="text" name="city" id="city" list="cityList"
                                class="form-control @error('city') is-invalid @enderror" 
                                value="{{ old('city', $pelanggan->city) }}">
                            <datalist id="cityList">
                                <option value="Bandung">
                                <option value="Jakarta">
                                <option value="Surabaya">
                                <option value="Medan">
                            </datalist>
                        </div>

                        <div class="d-flex gap-2 button-group">
                            <button type="submit" class="btn btn-submit">
                                <i class="bi bi-check-circle-fill me-2"></i> Simpan Perubahan
                            </button>
                            <a href="{{ route('pelanggan.index') }}" class="btn btn-cancel">
                                <i class="bi bi-x-circle me-2"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Logic character counter, phone formatting, and unsaved changes warning
        const addressField = document.getElementById('address');
        const charCount = document.getElementById('charCount');
        const form = document.getElementById('customerEditForm');
        let formChanged = false;

        if (addressField) {
            addressField.addEventListener('input', function() {
                charCount.textContent = `${this.value.length}/200`;
                charCount.style.color = this.value.length >= 180 ? '#DC2626' : '#6B7280';
            });
        }

        document.querySelectorAll('input, textarea').forEach(input => {
            input.addEventListener('change', () => formChanged = true);
        });

        form.addEventListener('submit', (e) => {
            if(!confirm('Simpan perubahan data pelanggan?')) {
                e.preventDefault();
            } else {
                formChanged = false;
                const btn = form.querySelector('.btn-submit');
                btn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i> Menyimpan...';
                btn.disabled = true;
            }
        });

        window.addEventListener('beforeunload', (e) => {
            if (formChanged) {
                e.preventDefault();
                e.returnValue = '';
            }
        });
    </script>
</body>
</html>