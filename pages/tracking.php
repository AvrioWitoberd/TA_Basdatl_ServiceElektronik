<?php
require_once "../includes/session.php";
require_once "../models/service.php";

if (!isset($_GET['kode'])) {
    die("Kode tracking tidak ditemukan");
}

$kode = $_GET['kode'];
$service = new Service();
$data = $service->getByKode($kode);

?>
<?php include "../includes/header.php"; ?>

<h3 class="mb-4">Tracking Service</h3>

<?php if (!$data) : ?>
    <div class="alert alert-danger">Data tidak ditemukan!</div>
<?php else : ?>
    <table class="table table-bordered">
        <tr><th>Kode Service</th><td><?= $data['kode_service'] ?></td></tr>
        <tr><th>Nama Pelanggan</th><td><?= $data['nama'] ?></td></tr>
        <tr><th>Jenis Perangkat</th><td><?= $data['jenis'] ?></td></tr>
        <tr><th>Kendala</th><td><?= $data['keluhan'] ?></td></tr>
        <tr><th>Status</th><td><b><?= $data['status'] ?></b></td></tr>
        <tr><th>Tanggal Masuk</th><td><?= $data['tgl_masuk'] ?></td></tr>
        <tr><th>Estimasi</th><td><?= $data['estimasi'] ?></td></tr>
    </table>
<?php endif; ?>

<div>
    <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
</div>

<?php include "../includes/footer.php"; ?>
