<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang - CleanGo Laundry</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary: #8B5CF6;
            --primary-dark: #7C3AED;
            --secondary: #EC4899;
            --success: #10B981;
            --danger: #EF4444;
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
        .cart-container {
            background: white;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            border: 1px solid rgba(139, 92, 246, 0.1);
            margin-bottom: 25px;
        }

        /* Header */
        .cart-header {
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid #F3F4F6;
        }

        .cart-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .cart-title i {
            color: var(--primary);
        }

        .cart-count {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        /* Empty State */
        .empty-cart {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-icon {
            font-size: 5rem;
            color: #D1D5DB;
            margin-bottom: 20px;
        }

        .empty-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 10px;
        }

        .empty-desc {
            color: #6B7280;
            margin-bottom: 30px;
        }

        /* Cart Items */
        .cart-item {
            background: white;
            border: 2px solid #F3F4F6;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 15px;
            transition: all 0.3s;
        }

        .cart-item:hover {
            border-color: var(--primary);
            box-shadow: 0 4px 15px rgba(139, 92, 246, 0.1);
        }

        .service-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: white;
        }

        .service-name {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 5px;
        }

        .service-qty {
            font-size: 0.9rem;
            color: #6B7280;
        }

        .service-price {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary);
        }

        .service-subtotal {
            font-size: 0.85rem;
            color: #6B7280;
            margin-top: 4px;
        }

        /* Summary Box */
        .cart-summary {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.05) 0%, rgba(236, 72, 153, 0.05) 100%);
            border-radius: 15px;
            padding: 25px;
            border: 2px solid rgba(139, 92, 246, 0.2);
            position: sticky;
            top: 100px;
        }

        .summary-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid rgba(139, 92, 246, 0.2);
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 0.95rem;
        }

        .summary-label {
            color: #6B7280;
        }

        .summary-value {
            font-weight: 600;
            color: var(--dark);
        }

        .summary-total {
            display: flex;
            justify-content: space-between;
            padding-top: 15px;
            margin-top: 15px;
            border-top: 2px solid rgba(139, 92, 246, 0.2);
            font-size: 1.25rem;
            font-weight: 700;
        }

        .summary-total .label {
            color: var(--dark);
        }

        .summary-total .value {
            color: var(--primary);
        }

        /* Buttons */
        .btn-checkout {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border: none;
            border-radius: 12px;
            padding: 14px 32px;
            color: white;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(139, 92, 246, 0.3);
            width: 100%;
            margin-top: 20px;
        }

        .btn-checkout:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(139, 92, 246, 0.4);
            color: white;
        }

        .btn-continue {
            background: white;
            border: 2px solid #E5E7EB;
            border-radius: 12px;
            padding: 12px 28px;
            color: var(--dark);
            font-weight: 600;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-continue:hover {
            background: #F3F4F6;
            border-color: #D1D5DB;
            color: var(--dark);
            transform: translateY(-2px);
        }

        .btn-remove {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(239, 68, 68, 0.05) 100%);
            color: var(--danger);
            border: 1px solid rgba(239, 68, 68, 0.3);
            border-radius: 8px;
            padding: 6px 14px;
            font-size: 0.85rem;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-remove:hover {
            background: var(--danger);
            color: white;
            transform: translateY(-2px);
        }

        /* Badge */
        .badge-qty {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.1) 0%, rgba(236, 72, 153, 0.1) 100%);
            color: var(--primary);
            padding: 5px 12px;
            border-radius: 50px;
            font-weight: 500;
            font-size: 0.85rem;
            border: 1px solid rgba(139, 92, 246, 0.2);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .cart-container {
                padding: 25px;
            }

            .cart-summary {
                position: static;
                margin-top: 30px;
            }

            .service-icon {
                width: 50px;
                height: 50px;
                font-size: 1.5rem;
            }

            .btn-checkout, .btn-continue {
                width: 100%;
                margin-bottom: 10px;
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

        .cart-item {
            animation: fadeInUp 0.5s ease-out;
        }
    </style>
</head>
<body>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


    <!-- Navbar -->
    <nav class="navbar navbar-light navbar-custom sticky-top">
        <div class="container">
            <a href="/" class="navbar-brand">
                <i class="bi bi-arrow-left-circle me-2"></i> Kembali ke Beranda
            </a>
            <h5 class="navbar-title d-none d-md-block">Keranjang Belanja</h5>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container mt-4 mb-5">
        <div class="row">
            <div class="col-12">
                <div class="cart-container">
                    <!-- Header -->
                    <div class="cart-header">
                        <h2 class="cart-title">
                            <i class="bi bi-cart-fill"></i> 
                            Keranjang Saya
                            @if ($cart && !$cart->items->isEmpty())
                                <span class="cart-count">{{ $cart->items->count() }} Item</span>
                            @endif
                        </h2>
                    </div>

                    @if (!$cart || $cart->items->isEmpty())
                        <!-- Empty State -->
                        <div class="empty-cart">
                            <div class="empty-icon">
                                <i class="bi bi-cart-x"></i>
                            </div>
                            <h3 class="empty-title">Keranjang Kosong</h3>
                            <p class="empty-desc">Anda belum menambahkan layanan apapun ke keranjang</p>
                            <a href="/" class="btn-continue">
                                <i class="bi bi-arrow-left me-2"></i> Mulai Belanja
                            </a>
                        </div>
                    @else
                        <!-- Cart Content -->
                        <div class="row">
                            <!-- Cart Items -->
                            <div class="col-lg-8">
                                @foreach ($cart->items as $item)
                                    <div class="cart-item">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="service-icon">
                                                    <i class="bi bi-box-seam-fill"></i>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="service-name">{{ $item->paket->nama_paket }}</div>
                                                <div class="service-qty">
                                                    <span class="badge-qty">
                                                        <i class="bi bi-speedometer2 me-1"></i>
                                                        {{ $item->qty }} kg
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-auto text-end">
                                                <div class="service-price">
                                                    Rp {{ number_format($item->price * $item->qty, 0, ',', '.') }}
                                                </div>
                                                <div class="service-subtotal">
                                                    Rp {{ number_format($item->price, 0, ',', '.') }}/kg
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Cart Summary -->
                            <div class="col-lg-4">
                                <div class="cart-summary">
                                    <h3 class="summary-title">Ringkasan Pesanan</h3>
                                    
                                    @php
                                        $subtotal = 0;
                                        foreach ($cart->items as $item) {
                                            $subtotal += $item->price * $item->qty;
                                        }
                                        $tax = 0; // Pajak jika ada
                                        $total = $subtotal + $tax;
                                    @endphp

                                    <div class="summary-row">
                                        <span class="summary-label">Subtotal</span>
                                        <span class="summary-value">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                                    </div>
                                    
                                    <div class="summary-row">
                                        <span class="summary-label">Jumlah Item</span>
                                        <span class="summary-value">{{ $cart->items->count() }} Layanan</span>
                                    </div>

                                    <div class="summary-row">
                                        <span class="summary-label">Total Berat</span>
                                        <span class="summary-value">
                                            {{ $cart->items->sum('qty') }} kg
                                        </span>
                                    </div>

                                    <div class="summary-total">
                                        <span class="label">Total</span>
                                        <span class="value">Rp {{ number_format($total, 0, ',', '.') }}</span>
                                    </div>

                                    <form action="{{ route('checkout') }}" method="POST">
                                    @csrf
                            <button type="submit" class="btn btn-success">
                                Checkout
                            </button>
                                    </form>
                                    <a href="/" class="btn-continue d-block text-center mt-3">
                                        <i class="bi bi-plus-circle me-2"></i> Tambah Layanan
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Remove item from cart (you'll need to implement the backend route)
        function removeItem(itemId) {
            if (confirm('Yakin ingin menghapus item ini dari keranjang?')) {
                // Submit form to remove item
                // You can use AJAX or create a form dynamically
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/cart/remove/${itemId}`;
                
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                
                const methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.name = '_method';
                methodField.value = 'DELETE';
                
                form.appendChild(csrfToken);
                form.appendChild(methodField);
                document.body.appendChild(form);
                form.submit();
            }
        }

        // Smooth animations
        window.addEventListener('DOMContentLoaded', function() {
            const items = document.querySelectorAll('.cart-item');
            items.forEach((item, index) => {
                item.style.animationDelay = `${index * 0.1}s`;
            });
        });
    </script>
</body>
</html>