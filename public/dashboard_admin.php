<?php
session_start();
require_once "../config/db.php";

// Cek role admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$pdo = getConnection();

// Hitung data ringkasan
$total_service = $pdo->query("SELECT COUNT(*) FROM service")->fetchColumn();
$service_selesai = $pdo->query("SELECT COUNT(*) FROM service WHERE id_status = 3")->fetchColumn();
$pending = $pdo->query("SELECT COUNT(*) FROM service WHERE id_status = 1 OR id_status = 2")->fetchColumn();
$teknisi = $pdo->query("SELECT COUNT(*) FROM teknisi WHERE status_aktif = 'aktif'")->fetchColumn();
$pendapatan = $pdo->query("SELECT COALESCE(SUM(total_bayar),0) FROM pembayaran WHERE status_bayar='lunas'")->fetchColumn();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Admin Panel</a>
    <div>
        <a href="service-list.php" class="btn btn-sm btn-outline-light me-2">Service</a>
        <a href="pelanggan.php" class="btn btn-sm btn-outline-light me-2">Pelanggan</a>
        <a href="teknisi.php" class="btn btn-sm btn-outline-light me-2">Teknisi</a>
        <a href="laporan_service.php" class="btn btn-sm btn-outline-light me-2">Laporan</a>
        <a href="logout.php" class="btn btn-sm btn-danger">Logout</a>
    </div>
  </div>
</nav>

<div class="container mt-4">
    <h2>Dashboard Admin</h2>
    <p>Selamat datang, <b><?= $_SESSION['nama'] ?></b></p>

    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card shadow-sm text-center p-3">
                <h5>Total Service</h5>
                <h2><?= $total_service ?></h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm text-center p-3">
                <h5>Selesai</h5>
                <h2 style="color:green"><?= $service_selesai ?></h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm text-center p-3">
                <h5>Pending</h5>
                <h2 style="color:red"><?= $pending ?></h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm text-center p-3">
                <h5>Teknisi Aktif</h5>
                <h2><?= $teknisi ?></h2>
            </div>
        </div>
    </div>

    <div class="card shadow-sm mt-4 p-3">
        <h5>Total Pendapatan</h5>
        <h2>Rp <?= number_format($pendapatan, 0, ',', '.') ?></h2>
    </div>
</div>

</body>
</html>
