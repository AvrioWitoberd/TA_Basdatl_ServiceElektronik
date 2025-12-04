<?php
// public/index.php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Service Elektronik - Beranda</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<nav class="navbar">
  <div class="container" style="display:flex;align-items:center;justify-content:space-between;">
    <div class="logo">Service Elektronik</div>
    <div>
      <a href="login.php" class="btn btn-sm btn-primary">Login</a>
      <a href="register.php" class="btn btn-sm btn-secondary">Daftar</a>
      <a href="form-service.php" class="btn btn-sm btn-info">Ajukan Service</a>
      <a href="tracking.php" class="btn btn-sm" style="background:#333;color:#fff;padding:7px 12px;border-radius:6px;margin-left:6px;">Tracking</a>
    </div>
  </div>
</nav>

<header class="hero" style="padding:80px 20px 60px;">
  <div class="container" style="text-align:center; color:#fff;">
    <h1 style="font-size:40px; margin-bottom:12px;">Solusi Service Elektronik Cepat & Terpercaya</h1>
    <p style="max-width:760px;margin:auto;font-size:18px;opacity:0.95;">
      Kami melayani perbaikan smartphone, laptop, printer, dan elektronik rumah tangga.
      Lacak perbaikan Anda, ajukan service online, dan lihat laporan di dashboard admin.
    </p>

    <div style="margin-top:22px;">
      <a href="form-service.php" class="btn btn-primary">Ajukan Service Sekarang</a>
      <a href="tracking.php" class="btn btn-secondary" style="margin-left:10px;">Cek Status Service</a>
    </div>
  </div>
</header>

<section class="container" style="padding:36px 0;">
  <div style="display:flex;gap:20px;flex-wrap:wrap;justify-content:space-between;">
    <div style="flex:1;min-width:240px;background:#fff;padding:20px;border-radius:8px;box-shadow:0 6px 18px rgba(0,0,0,0.06);">
      <h3>Penerimaan Service</h3>
      <p>Form cepat untuk terima barang dan catat keluhan, estimasi biaya, dan data pelanggan.</p>
      <p><a href="form-service.php" class="btn btn-info">Buka Form</a></p>
    </div>

    <div style="flex:1;min-width:240px;background:#fff;padding:20px;border-radius:8px;box-shadow:0 6px 18px rgba(0,0,0,0.06);">
      <h3>Tracking Perbaikan</h3>
      <p>Lacak status perbaikan berdasarkan ID service (diagnosa → proses → selesai).</p>
      <p><a href="tracking.php" class="btn btn-info">Lacak Sekarang</a></p>
    </div>

    <div style="flex:1;min-width:240px;background:#fff;padding:20px;border-radius:8px;box-shadow:0 6px 18px rgba(0,0,0,0.06);">
      <h3>Manajemen Teknisi</h3>
      <p>Admin dapat menugaskan teknisi dan memantau kinerja melalui dashboard admin.</p>
      <p><span class="btn btn-secondary">Untuk Admin</span></p>
    </div>
  </div>
</section>

<footer style="padding:20px 0;background:#111;color:#fff;margin-top:40px;">
  <div class="container" style="display:flex;justify-content:space-between;align-items:center;">
    <div>© <?= date('Y') ?> Service Elektronik</div>
    <div><small>Jl. Contoh No.1 - Telp: 0812xxxxxxx</small></div>
  </div>
</footer>

<script src="assets/js/main.js"></script>
</body>
</html>
