<?php
require_once '../includes/session.php';
require_once '../includes/header.php';
require_once '../models/laporan.php';

$laporanModel = new Laporan();
$data = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal_dari = $_POST['tanggal_dari'];
    $tanggal_sampai = $_POST['tanggal_sampai'];

    $data = $laporanModel->getLaporanByTanggal($tanggal_dari, $tanggal_sampai);
}
?>

<div class="container">
    <h2>Laporan Service</h2>

    <form method="POST" class="form-group" style="margin-bottom:20px;">
        <label>Dari Tanggal:</label>
        <input type="date" name="tanggal_dari" required>

        <label>Sampai Tanggal:</label>
        <input type="date" name="tanggal_sampai" required>

        <button type="submit">Tampilkan Laporan</button>
    </form>

    <?php if (!empty($data)) { ?>
        <table border="1" width="100%" cellspacing="0" cellpadding="5">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Pelanggan</th>
                <th>Perangkat</th>
                <th>Kerusakan</th>
                <th>Status</th>
                <th>Biaya</th>
            </tr>

            <?php $no = 1; foreach ($data as $row) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['tanggal_service']; ?></td>
                    <td><?= $row['nama_pelanggan']; ?></td>
                    <td><?= $row['nama_perangkat']; ?></td>
                    <td><?= $row['keluhan']; ?></td>
                    <td><?= $row['status']; ?></td>
                    <td>Rp <?= number_format($row['biaya']); ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } else { ?>
        <p>Belum ada data / belum memilih tanggal.</p>
    <?php } ?>
</div>

<?php require_once '../includes/footer.php'; ?>
