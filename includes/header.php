<?php
require_once __DIR__ . '/session.php';
cekLogin();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Service Elektronik</title>
    <link href="../public/assets/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">

    <a class="navbar-brand" href="dashboard.php">Service Elektronik</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarText">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item"><a class="nav-link" href="pelanggan.php">Pelanggan</a></li>
        <li class="nav-item"><a class="nav-link" href="teknisi.php">Teknisi</a></li>
        <li class="nav-item"><a class="nav-link" href="perangkat.php">Perangkat</a></li>
        <li class="nav-item"><a class="nav-link" href="service-list.php">Service</a></li>
        <li class="nav-item"><a class="nav-link" href="pembayaran.php">Pembayaran</a></li>
        <li class="nav-item"><a class="nav-link" href="laporan.php">Laporan</a></li>

      </ul>

      <span class="navbar-text text-white me-3">
        Halo, <?= $_SESSION["admin_login"]["username"] ?>
      </span>

      <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>

    </div>

  </div>
</nav>

<div class="container mt-4">
