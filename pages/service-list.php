<?php
require_once "../includes/session.php";
require_once "../models/service.php";
$service = new Service();
$data = $service->getAll();  // ambil semua data service
?>

<?php include "../includes/header.php"; ?>

<h2>Daftar Service</h2>
<a href="service-form.php" class="btn btn-primary">+ Tambah Service</a>
<br><br>

<table border="1" width="100%" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Pelanggan</th>
        <th>Teknisi</th>
        <th>Perangkat</th>
        <th>Status</th>
        <th>Estimasi</th>
        <th>Aksi</th>
    </tr>

    <?php foreach($data as $row): ?>
    <tr>
        <td><?= $row['id']; ?></td>
        <td><?= $row['nama_pelanggan']; ?></td>
        <td><?= $row['nama_teknisi']; ?></td>
        <td><?= $row['nama_perangkat']; ?></td>
        <td><?= $row['status']; ?></td>
        <td><?= $row['estimasi_selesai']; ?></td>
        <td>
            <a href="service-detail.php?id=<?= $row['id']; ?>">Detail</a> |
            <a href="service-form.php?id=<?= $row['id']; ?>">Edit</a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

<?php include "../includes/footer.php"; ?>
