<?php
require_once "../includes/session.php";
require_once "../includes/header.php";
require_once "../models/pembayaran.php";

$pembayaranModel = new Pembayaran();
$dataPembayaran = $pembayaranModel->getAll();
?>

<div class="container">
    <h2 class="mt-3">Data Pembayaran</h2>
    <a href="pembayaran-form.php" class="btn btn-primary mb-3">+ Tambah Pembayaran</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID Pembayaran</th>
                <th>ID Service</th>
                <th>Tanggal</th>
                <th>Total Bayar</th>
                <th>Metode</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($dataPembayaran as $row): ?>
            <tr>
                <td><?= $row['id_pembayaran']; ?></td>
                <td><?= $row['id_service']; ?></td>
                <td><?= $row['tanggal']; ?></td>
                <td>Rp <?= number_format($row['total'],0,",","."); ?></td>
                <td><?= $row['metode']; ?></td>
                <td>
                    <?php if($row['status']=='lunas'): ?>
                        <span class="badge bg-success">Lunas</span>
                    <?php else: ?>
                        <span class="badge bg-warning">Pending</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once "../includes/footer.php"; ?>
