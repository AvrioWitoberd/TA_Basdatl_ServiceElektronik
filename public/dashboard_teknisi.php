<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'teknisi') {
    header("Location: login.php");
    exit();
}

require_once "../config/db.php";
$pdo = getConnection();
$id_teknisi = $_SESSION['user_id']; // ID teknisi dari login

// Query mengambil service yang ditugaskan kepada teknisi
$sql = "SELECT s.id_service, p.nama AS nama_pelanggan, s.keluhan, s.biaya_service,
               sp.nama_status, s.tanggal_masuk
        FROM service s
        JOIN pelanggan p ON s.id_pelanggan = p.id_pelanggan
        JOIN status_perbaikan sp ON s.id_status = sp.id_status
        WHERE s.id_teknisi = :id_teknisi
        ORDER BY s.tanggal_masuk DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute(['id_teknisi' => $id_teknisi]);
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Teknisi</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-dark bg-dark px-3">
    <span class="navbar-brand">Dashboard Teknisi</span>
    <span class="text-white">Hi, <?= $_SESSION['nama']; ?></span>
    <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
</nav>

<div class="container mt-4">
    <h3>Daftar Service yang Ditugaskan</h3>
    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>ID Service</th>
                <th>Pelanggan</th>
                <th>Keluhan</th>
                <th>Status</th>
                <th>Biaya</th>
                <th>Tanggal Masuk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($services as $row): ?>
                <tr>
                    <td><?= $row['id_service'] ?></td>
                    <td><?= $row['nama_pelanggan'] ?></td>
                    <td><?= $row['keluhan'] ?></td>
                    <td><span class="badge bg-info"><?= $row['nama_status'] ?></span></td>
                    <td><?= $row['biaya_service'] ?></td>
                    <td><?= $row['tanggal_masuk'] ?></td>
                    <td>
                        <a href="service-update.php?id=<?= $row['id_service'] ?>" class="btn btn-warning btn-sm">
                            Update Status
                        </a>
                        <a href="service-detail.php?id=<?= $row['id_service'] ?>" class="btn btn-primary btn-sm">
                            Detail
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
