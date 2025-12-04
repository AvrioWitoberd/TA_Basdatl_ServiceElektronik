<?php
session_start();
require_once "../config/db.php";
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Elektronik</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .hero {
            background: url('assets/img/hero-bg.jpg') center/cover no-repeat;
            padding: 100px 20px;
            color: white;
            text-shadow: 0 0 8px rgba(0, 0, 0, 0.6);
        }

        .feature-card:hover {
            transform: scale(1.03);
            transition: 0.3s;
        }
    </style>
</head>

<body class="bg-light">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="index.php">Service Elektronik</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="ms-auto d-flex gap-2">

                <?php if (!isset($_SESSION['user'])): ?>
                    <a href="login.php" class="btn btn-outline-primary">Login</a>
                    <a href="register.php" class="btn btn-primary">Daftar</a>
                <?php else: ?>
                    <a href="dashboard_<?php echo $_SESSION['role']; ?>.php"
                        class="btn btn-success">
                        Dashboard
                    </a>
                <?php endif; ?>

            </div>
        </div>
    </div>
</nav>

<!-- HERO -->
<section class="hero mt-5">
    <div class="container text-center">
        <h1 class="display-4 fw-bold">Layanan Service Elektronik</h1>
        <p class="lead mt-3">
            Perbaikan cepat & terpercaya untuk HP, Laptop, Printer, dan perangkat elektronik lainnya.
        </p>

        <a href="<?php echo isset($_SESSION['user']) ? 'form-service.php' : 'login.php'; ?>"
           class="btn btn-primary btn-lg mt-3">Ajukan Service</a>
    </div>
</section>

<!-- FITUR -->
<section class="container my-5">
    <div class="row g-4">

        <div class="col-md-4">
            <div class="p-4 bg-white shadow-sm rounded feature-card">
                <h4>Penerimaan Service</h4>
                <p>Form pengambilan data perangkat, keluhan, dan estimasi biaya.</p>
                <a href="form-service.php" class="btn btn-outline-primary">Buka Form</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-4 bg-white shadow-sm rounded feature-card">
                <h4>Tracking Perbaikan</h4>
                <p>Lacak status perbaikan dari diagnosa sampai selesai.</p>
                <a href="tracking.php" class="btn btn-outline-primary">Lacak</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-4 bg-white shadow-sm rounded feature-card">
                <h4>Manajemen Teknisi</h4>
                <p>Admin dapat menugaskan teknisi dan memantau progres.</p>
                <button class="btn btn-secondary" disabled>Untuk Admin</button>
            </div>
        </div>

    </div>
</section>

<!-- TRACKING -->
<section class="container my-5">
    <div class="p-4 bg-white shadow-sm rounded mx-auto" style="max-width: 500px;">
        <h4 class="text-center mb-3 fw-bold">Cek Status Service</h4>

        <form action="tracking.php" method="GET" class="d-flex gap-2">
            <input type="text" name="kode" required 
                   class="form-control" placeholder="Masukkan Kode Service">
            <button class="btn btn-dark">Cek</button>
        </form>
    </div>
</section>

<!-- FOOTER -->
<footer class="bg-dark text-light text-center py-3 mt-5">
    © <?= date('Y') ?> Service Elektronik — All Rights Reserved
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
