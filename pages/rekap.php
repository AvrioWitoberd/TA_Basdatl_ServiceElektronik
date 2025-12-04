<?php
include '../config/db.php';
session_start();

$query = "SELECT * FROM tb_service ORDER BY service_id DESC";
$result = pg_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Rekap Service</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<?php include '../components/navbar.php'; ?>

<div class="container" style="margin-top:120px;">
    <h2 class="title">Rekap Data Service</h2>

    <a href="service-form.php" class="btn btn-primary">+ Tambah Service</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pelanggan</th>
                <th>Barang</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($row = pg_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['service_id']; ?></td>
                    <td><?= $row['nama_pelanggan']; ?></td>
                    <td><?= $row['jenis_barang']; ?></td>
                    <td>
                        <span class="status <?= strtolower($row['status']); ?>">
                            <?= $row['status']; ?>
                        </span>
                    </td>
                    <td><?= $row['tanggal_masuk']; ?></td>
                    <td>
                        <a class="btn-sm btn-info" href="service-detail.php?id=<?= $row['service_id']; ?>">Detail</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>

    </table>
</div>

</body>
</html>
