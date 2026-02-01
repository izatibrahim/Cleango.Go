<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CleanGo - Layanan Laundry Premium</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--dark);
        }

        .navbar {
            background: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-link {
            font-weight: 500;
            color: var(--dark) !important;
            transition: color 0.3s;
            padding: 8px 16px !important;
        }

        .nav-link:hover {
            color: var(--primary) !important;
        }

        .hero {
            background: linear-gradient(135deg, #faf8ff 0%, #f5f3ff 100%);
            padding: 60px 0 80px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(139, 92, 246, 0.1) 0%, transparent 70%);
            border-radius: 50%;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero h1 {
            font-size: 2.75rem;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
            color: var(--dark);
        }

        .hero p {
            font-size: 1.1rem;
            margin-bottom: 30px;
            line-height: 1.6;
            color: #6B7280;
        }

        .btn-hero {
            background: var(--primary);
            color: white;
            padding: 14px 35px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(139, 92, 246, 0.3);
        }

        .btn-hero:hover {
            transform: translateY(-3px);
            color: white;
            box-shadow: 0 6px 20px rgba(139, 92, 246, 0.4);
            background: var(--primary-dark);
        }

        .image-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            position: relative;
            z-index: 2;
        }

        .image-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s;
            aspect-ratio: 1;
        }

        .image-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(139, 92, 246, 0.2);
        }

        .image-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #e8e4f0 0%, #ddd8ea 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .image-content {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            font-size: 4rem;
        }

        /* Decorative wave */
        .wave-decoration {
            position: absolute;
            top: 20%;
            right: 5%;
            width: 80px;
            height: 80px;
            opacity: 0.3;
            z-index: 1;
        }

        .whatsapp-float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 30px;
            right: 30px;
            background: #25D366;
            color: white;
            border-radius: 50%;
            text-align: center;
            font-size: 30px;
            box-shadow: 0 4px 15px rgba(37, 211, 102, 0.4);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            text-decoration: none;
        }

        .whatsapp-float:hover {
            background: #128C7E;
            color: white;
            transform: scale(1.1);
        }

        .features {
            padding: 80px 0;
            background: white;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 50px;
            color: var(--dark);
        }

        .feature-item {
            background: white;
            padding: 40px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
            transition: all 0.3s;
            height: 100%;
            border: 2px solid #f5f3ff;
        }

        .feature-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(139, 92, 246, 0.15);
            border-color: var(--primary);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 20px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .feature-item h4 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .feature-item p {
            color: #6B7280;
            line-height: 1.6;
        }

        .service-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
            height: 100%;
            border: 2px solid #f5f3ff;
        }

        .service-card:hover {
            border: 2px solid var(--primary);
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(139, 92, 246, 0.2);
        }

        .service-card h5 {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 15px;
        }

        .service-card p {
            color: #6B7280;
            margin-bottom: 15px;
        }

        .service-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-top: 15px;
        }

        .testimonials {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            padding: 80px 0;
            color: white;
        }

        .testimonial-card {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 25px;
            backdrop-filter: blur(10px);
            height: 100%;
        }

        .stars {
            color: #FBBF24;
            margin-bottom: 15px;
        }

        .testimonial-card p {
            margin-bottom: 20px;
            font-style: italic;
        }

        .cta {
            padding: 80px 0;
            text-align: center;
            background: #f9fafb;
        }

        .cta h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .cta p {
            color: #6B7280;
            font-size: 1.1rem;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 15px 40px;
            border-radius: 50px;
            border: none;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
        }

        .btn-primary-custom:hover {
            transform: translateY(-3px);
            color: white;
            box-shadow: 0 10px 30px rgba(139, 92, 246, 0.3);
        }

        .footer {
            background: var(--dark);
            color: white;
            padding: 50px 0 20px;
        }

        .footer h5 {
            font-weight: 600;
            margin-bottom: 20px;
        }

        .footer a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer a:hover {
            color: white;
        }

        .footer ul {
            padding: 0;
        }

        .footer ul li {
            margin-bottom: 10px;
        }

        .social-links a {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s;
            margin-right: 10px;
        }

        .social-links a:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(139, 92, 246, 0.4);
        }

        @media (max-width: 768px) {
            .hero h1 { 
                font-size: 2rem; 
            }
            
            .hero { 
                padding: 40px 0 60px; 
            }
            
            .image-grid { 
                margin-top: 40px; 
            }

            .section-title {
                font-size: 2rem;
            }

            .cta h2 {
                font-size: 2rem;
            }
        }

        @media (max-width: 576px) {
            .hero h1 {
                font-size: 1.75rem;
            }

            .image-grid {
                gap: 15px;
            }

            .btn-hero {
                padding: 12px 28px;
                font-size: 0.95rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="bi bi-droplet"></i> CleanGo
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#fitur">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#layanan">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimoni">Testimoni</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section / Beranda -->
    <section class="hero" id="beranda">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="hero-content">
                        <h1>Menyelesaikan Segala Kebutuhan Cucianmu</h1>
                        <p>Temukan layanan laundry yang kamu butuhkan dan buat perlengkapanmu bersih dan higienis</p>
                        <a href="#layanan" class="btn-hero">
                            <i class="bi bi-arrow-right"></i> Lihat Layanan
                        </a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="image-grid">
                        <div class="image-card">
                            <div class="image-placeholder">
                                <div class="image-content">
                                    👕
                                </div>
                            </div>
                        </div>
                        <div class="image-card">
                            <div class="image-placeholder">
                                <div class="image-content">
                                    🧥
                                </div>
                            </div>
                        </div>
                        <div class="image-card">
                            <div class="image-placeholder">
                                <div class="image-content">
                                    🧺
                                </div>
                            </div>
                        </div>
                        <div class="image-card">
                            <div class="image-placeholder">
                                <div class="image-content">
                                    👗
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Decorative Wave -->
        <svg class="wave-decoration" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
            <path d="M 0,50 Q 25,25 50,50 T 100,50" fill="none" stroke="rgba(139, 92, 246, 0.3)" stroke-width="3"/>
            <path d="M 0,60 Q 25,35 50,60 T 100,60" fill="none" stroke="rgba(236, 72, 153, 0.3)" stroke-width="3"/>
        </svg>
    </section>

    <!-- Features Section -->
    <section class="features" id="fitur">
        <div class="container">
            <h2 class="section-title">Mengapa Memilih CleanGo?</h2>
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="bi bi-lightning-charge-fill"></i>
                        </div>
                        <h4>Cepat & Efisien</h4>
                        <p>Layanan laundry express dengan waktu penyelesaian tercepat tanpa mengorbankan kualitas</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4>Aman & Terjamin</h4>
                        <p>Bahan berkualitas premium dan mesin modern untuk menjaga kesehatan pakaian Anda</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="bi bi-tag-fill"></i>
                        </div>
                        <h4>Harga Terjangkau</h4>
                        <p>Berbagai paket layanan dengan harga yang kompetitif dan bersaing di kelasnya</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-5" id="layanan" style="background: #fbf9fb;">
        <div class="container">
            <h2 class="section-title">Paket Layanan Kami</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="service-card">
                        <h5><i class="bi bi-bag-check-fill"></i> Regular Laundry</h5>
                        <p>Layanan cuci standar dengan hasil yang memuaskan. Waktu pengerjaan 3-5 hari.</p>
                        <div class="service-price">Rp 5.000/kg</div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="service-card">
                        <h5><i class="bi bi-lightning-charge-fill"></i> Express Laundry</h5>
                        <p>Cuci kilat dengan garansi siap dalam 6 jam. Sempurna untuk kebutuhan mendesak.</p>
                        <div class="service-price">Rp 8.000/kg</div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="service-card">
                        <h5><i class="bi bi-star-fill"></i> Premium Laundry</h5>
                        <p>Layanan premium dengan perawatan khusus bahan halus dan aroma wangi pilihan.</p>
                        <div class="service-price">Rp 12.000/kg</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials" id="testimoni">
        <div class="container">
            <h2 class="section-title mb-5" style="color: white;">Apa Kata Pelanggan Kami?</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="testimonial-card">
                        <div class="stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p>"Layanan CleanGo sangat cepat dan hasil cucinya luar biasa bersih. Saya sangat puas!"</p>
                        <strong>Siti Rahma</strong>
                        <small class="d-block opacity-75">Pelanggan Setia</small>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="testimonial-card">
                        <div class="stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p>"Harga terjangkau dengan kualitas premium. Pakaian saya selalu kembali dalam kondisi sempurna."</p>
                        <strong>Budi Santoso</strong>
                        <small class="d-block opacity-75">Pelanggan Reguler</small>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="testimonial-card">
                        <div class="stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p>"Express laundry mereka benar-benar kilat. Sangat membantu saat saya membutuhkan baju dengan cepat."</p>
                        <strong>Dewi Kusuma</strong>
                        <small class="d-block opacity-75">Pelanggan Premium</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <h2>Siap Mempercayai Kami?</h2>
            <p class="mb-4">Hubungi kami sekarang untuk mendapatkan penawaran spesial dan diskon menarik.</p>
            <a href="https://wa.me/6281234567890" class="btn-primary-custom" target="_blank">
                <i class="bi bi-whatsapp"></i> Hubungi via WhatsApp
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5><i class="bi bi-droplet"></i> CleanGo</h5>
                    <p class="mb-3">Layanan laundry terpercaya dengan standar kualitas internasional.</p>
                    <div class="social-links">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>Layanan</h5>
                    <ul class="list-unstyled">
                        <li><a href="#layanan">Cuci Reguler</a></li>
                        <li><a href="#layanan">Cuci Ekspres</a></li>
                        <li><a href="#layanan">Cuci Premium</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-4">
                    <h5>Perusahaan</h5>
                    <ul class="list-unstyled">
                        <li><a href="#fitur">Tentang Kami</a></li>
                        <li><a href="#testimoni">Testimoni</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>Kontak</h5>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-telephone-fill"></i> +62 812 345 678</li>
                        <li><i class="bi bi-envelope-fill"></i> info@cleango.com</li>
                        <li><i class="bi bi-geo-alt-fill"></i> Bandung, Indonesia</li>
                    </ul>
                </div>
            </div>
            <hr class="mt-4 opacity-25">
            <div class="text-center opacity-50 py-3">
                <small>&copy; 2026 CleanGo. All rights reserved.</small>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Float Button -->
    <a href="https://wa.me/6281234567890" 
        class="whatsapp-float" 
        target="_blank" 
        title="Chat via WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Smooth scroll for anchor links
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

        // Observe feature items and service cards
        document.querySelectorAll('.feature-item, .service-card, .testimonial-card').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'all 0.6s ease-out';
            observer.observe(el);
        });
    </script>
</body>
</html>