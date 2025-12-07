<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Elektronik Terpercaya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        /* --- Global Styles --- */
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        section {
            padding: 60px 0; /* Jarak antar section */
        }
        .section-title {
            text-align: center;
            margin-bottom: 40px;
            font-weight: 700;
            color: #333;
        }

        /* --- Navbar --- */
        .navbar {
            background-color: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(5px);
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .navbar-brand {
            color: #0d6efd !important;
            font-weight: 800;
            font-size: 1.35rem;
        }

        /* --- Hero Section dengan Gambar Background --- */
        .hero-section {
            /* Gambar Background Placeholder (Ganti url ini dengan gambar asli Anda nanti) */
            background-image: url('https://source.unsplash.com/1600x900/?electronics,repair,circuit');
            background-size: cover;
            background-position: center;
            position: relative;
            padding: 120px 0;
            color: white;
        }
        /* Overlay gelap agar teks terbaca */
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 0, 0, 0.65); /* Opasitas 65% */
        }
        .hero-content {
            position: relative; /* Agar berada di atas overlay */
            z-index: 1;
        }
        .hero-title {
            font-weight: 800;
            font-size: 3.5rem;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        .hero-lead {
            font-size: 1.2rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        /* --- Card Styles (General) --- */
        .hover-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            height: 100%;
            background: white;
        }
        .hover-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        /* --- Keunggulan (Features) Icons --- */
        .feature-icon {
            font-size: 3rem;
            color: #0d6efd;
            margin-bottom: 20px;
        }

        /* --- Kategori Layanan Images --- */
        .service-img-card {
            overflow: hidden;
            border-radius: 12px 12px 0 0;
            height: 180px;
        }
        .service-img-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }
        .hover-card:hover .service-img-card img {
            transform: scale(1.05);
        }

        /* --- Footer --- */
        .footer {
            background-color: #212529;
            color: #adb5bd;
            padding: 30px 0;
            margin-top: 0;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="bi bi-tools"></i> Service Elektronik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav me-3">
                    <li class="nav-item"><a class="nav-link" href="#keunggulan">Keunggulan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#layanan">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#sistem">Sistem</a></li>
                </ul>
                <a href="dashboard.php" class="btn btn-primary fw-bold px-4">Login / Dashboard</a>
            </div>
        </div>
    </nav>

    <section class="hero-section text-center">
        <div class="container hero-content">
            <h1 class="hero-title">Solusi Kerusakan Elektronik Anda</h1>
            <p class="hero-lead">Profesional, Cepat, dan Bergaransi. Kami mengembalikan perangkat Anda berfungsi normal seperti baru.</p>
            <div class="d-flex gap-3 justify-content-center">
                <a href="#sistem" class="btn btn-primary btn-lg px-5 rounded-pill fw-bold">Ajukan Service Sekarang</a>
                <a href="#layanan" class="btn btn-outline-light btn-lg px-4 rounded-pill">Lihat Layanan</a>
            </div>
        </div>
    </section>

    <section id="keunggulan" class="bg-white">
        <div class="container">
            <h2 class="section-title">Mengapa Memilih Kami?</h2>
            <div class="row g-4 text-center">
                <div class="col-md-4">
                    <div class="p-3">
                        <i class="bi bi-shield-check feature-icon"></i>
                        <h4 class="fw-bold">Bergaransi Resmi</h4>
                        <p class="text-muted">Setiap perbaikan kami berikan garansi purna service untuk kenyamanan Anda.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3">
                        <i class="bi bi-person-gear feature-icon"></i>
                        <h4 class="fw-bold">Teknisi Ahli</h4>
                        <p class="text-muted">Ditangani oleh teknisi tersertifikasi yang berpengalaman di bidangnya.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3">
                        <i class="bi bi-lightning-charge feature-icon"></i>
                        <h4 class="fw-bold">Pengerjaan Cepat</h4>
                        <p class="text-muted">Kami mengutamakan kecepatan tanpa mengurangi kualitas hasil perbaikan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="layanan">
        <div class="container">
            <h2 class="section-title">Perangkat yang Kami Tangani</h2>
            <div class="row g-4">
                <div class="col-md-3 col-sm-6">
                    <div class="hover-card h-100">
                        <div class="service-img-card">
                            <img src="https://source.unsplash.com/400x300/?laptop,repair" alt="Service Laptop">
                        </div>
                        <div class="card-body p-4 text-center">
                            <h5 class="fw-bold">Laptop & PC</h5>
                            <p class="text-muted small mb-0">Install ulang, ganti sparepart, mati total, dll.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="hover-card h-100">
                        <div class="service-img-card">
                            <img src="https://source.unsplash.com/400x300/?smartphone,repair" alt="Service HP">
                        </div>
                        <div class="card-body p-4 text-center">
                            <h5 class="fw-bold">Smartphone</h5>
                            <p class="text-muted small mb-0">Ganti LCD, baterai, sinyal hilang, bootloop.</p>
                        </div>
                    </div>
                </div>
                 <div class="col-md-3 col-sm-6">
                    <div class="hover-card h-100">
                        <div class="service-img-card">
                            <img src="https://source.unsplash.com/400x300/?printer" alt="Service Printer">
                        </div>
                        <div class="card-body p-4 text-center">
                            <h5 class="fw-bold">Printer & Scanner</h5>
                            <p class="text-muted small mb-0">Isi tinta, macet, error system, maintenance.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="hover-card h-100">
                        <div class="service-img-card">
                            <img src="https://source.unsplash.com/400x300/?television,remote" alt="Service Elektronik Rumah">
                        </div>
                        <div class="card-body p-4 text-center">
                            <h5 class="fw-bold">Elektronik Lain</h5>
                            <p class="text-muted small mb-0">TV LED, Speaker aktif, dan perangkat rumah lainnya.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="sistem" class="bg-white">
        <div class="container">
            <h2 class="section-title">Akses Cepat Sistem Layanan</h2>
            <p class="text-center text-muted mb-5">Gunakan fitur di bawah ini untuk memulai atau memantau service Anda.</p>
            
            <div class="row g-4 justify-content-center mb-5">
                <div class="col-md-4">
                    <div class="card hover-card p-3 border-primary border-2 border-top-0 border-end-0 border-bottom-0 h-100">
                        <div class="card-body">
                            <i class="bi bi-file-earmark-plus fs-1 text-primary mb-3 d-block"></i>
                            <h5 class="card-title fw-bold">Penerimaan Service Baru</h5>
                            <p class="card-text text-muted">Isi formulir untuk mendaftarkan perangkat rusak Anda dan dapatkan estimasi.</p>
                            <a href="#" class="btn btn-primary btn-sm px-4 rounded-pill mt-2 stretched-link">Buka Form</a>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="card hover-card p-3 border-success border-2 border-top-0 border-end-0 border-bottom-0 h-100">
                        <div class="card-body">
                            <i class="bi bi-search fs-1 text-success mb-3 d-block"></i>
                            <h5 class="card-title fw-bold">Tracking Status</h5>
                            <p class="card-text text-muted">Pantau sejauh mana progres perbaikan perangkat Anda secara real-time.</p>
                            <a href="#cek-status" class="btn btn-success btn-sm px-4 rounded-pill mt-2">Lacak Sekarang</a>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="card hover-card p-3 bg-light h-100">
                        <div class="card-body">
                            <i class="bi bi-gear-wide-connected fs-1 text-secondary mb-3 d-block"></i>
                            <h5 class="card-title fw-bold">Area Teknisi & Admin</h5>
                            <p class="card-text text-muted small">Login khusus untuk manajemen tugas dan update progres.</p>
                            <a href="dashboard.php" class="btn btn-outline-secondary btn-sm px-4 rounded-pill mt-2">Login Internal</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center" id="cek-status">
                <div class="col-md-8 col-lg-6">
                    <div class="card p-5 text-center hover-card border-0 bg-primary text-white" style="background: linear-gradient(45deg, #0d6efd, #0a58ca);">
                        <h4 class="fw-bold mb-4"><i class="bi bi-upc-scan me-2"></i>Cek Status Service Cepat</h4>
                        <form action="" method="GET">
                            <div class="input-group input-group-lg shadow">
                                <input type="text" class="form-control border-0" placeholder="Masukkan Kode Service (Cth: SRV-123)" aria-label="Kode Service" required>
                                <button class="btn btn-dark px-4 fw-bold" type="submit">CEK</button>
                            </div>
                        </form>
                        <p class="mt-3 mb-0 small opacity-75">Kode service tertera pada nota tanda terima.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer class="footer text-center">
        <div class="container">
            <div class="mb-3">
                <a href="#" class="text-decoration-none text-secondary mx-2"><i class="bi bi-facebook fs-5"></i></a>
                <a href="#" class="text-decoration-none text-secondary mx-2"><i class="bi bi-instagram fs-5"></i></a>
                <a href="#" class="text-decoration-none text-secondary mx-2"><i class="bi bi-whatsapp fs-5"></i></a>
            </div>
            <small>&copy; 2025 Service Elektronik. Dibuat dengan <i class="bi bi-heart-fill text-danger"></i> untuk pelanggan terbaik.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>