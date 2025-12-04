<?php
include '../config/db.php';
$id = $_GET['id'] ?? 0;

$query = "SELECT * FROM tb_service WHERE service_id = $1";
$result = pg_query_params($conn, $query, [$id]);
$data = pg_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tracking Service</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<?php include '../components/navbar.php'; ?>

<div class="container" style="margin-top:120px; max-width:700px;">
    <h2 class="title">Tracking Service</h2>

    <?php if (!$data) { ?>
        <h3>Data tidak ditemukan!</h3>
    <?php } else { ?>

    <div class="card detail-card">
        <p><b>Nama:</b> <?= $data['nama_pelanggan']; ?></p>
        <p><b>Barang:</b> <?= $data['jenis_barang']; ?></p>
        <p><b>Status:</b> <span class="status <?= strtolower($data['status']); ?>"><?= $data['status']; ?></span></p>
        <p><b>Tanggal Masuk:</b> <?= $data['tanggal_masuk']; ?></p>
        <p><b>Keluhan:</b> <?= $data['keluhan']; ?></p>
    </div>

    <?php } ?>
</div>

</body>
</html>
