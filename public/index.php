<?php
session_start();

// Jika sudah login → langsung ke dashboard
if (isset($_SESSION['user'])) {
    header("Location: ../pages/dashboard.php");
    exit;
}

// Kalau belum login → ke halaman home biasa (landing page)
include '../config/db.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Service Elektronik</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include '../components/navbar.php'; ?>

<div class="hero">
    <h1>Selamat Datang di Layanan Service Elektronik</h1>
    <p>Cek progress service Anda di sini.</p>

    <form action="tracking.php" method="GET">
        <input type="text" name="id" placeholder="Masukkan ID Service..." required>
        <button type="submit">Lacak</button>
    </form>
</div>

</body>
</html>
