<?php
require_once "../includes/session.php";
require_once "../models/service.php";
require_once "../models/perangkat.php";
require_once "../models/pelanggan.php";
require_once "../models/teknisi.php";

if (!isset($_GET['id'])) {
    die("ID Service tidak ditemukan!");
}

$id_service = $_GET['id'];
$service = Service::getById($id_service);
$perangkat = Perangkat::getById($service['id_perangkat']);
$pelanggan = Pelanggan::getById($service['id_pelanggan']);
$teknisi = Teknisi::getById($service['id_teknisi']);
?>

<?php include "../includes/header.php"; ?>

<div class="container mt-4">
    <h3>Detail Service</h3>
    <hr>

    <table class="table table-bordered">
        <tr>
            <th>Kode Service</th>
            <td><?= $service['kode_service']; ?></td>
        </tr>
        <tr>
            <th>Nama Pelanggan</th>
            <td><?= $pelanggan['nama']; ?></td>
        </tr>
        <tr>
            <th>Teknisi</th>
            <td><?= $teknisi['nama']; ?></td>
        </tr>
        <tr>
            <th>Nama Perangkat</th>
            <td><?= $perangkat['nama_perangkat']; ?></td>
        </tr>
        <tr>
            <th>Jenis Kerusakan</th>
            <td><?= $service['kerusakan']; ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                <span class="badge bg-primary"><?= ucfirst($service['status']); ?></span>
            </td>
        </tr>
        <tr>
            <th>Tanggal Masuk</th>
            <td><?= $service['tanggal_masuk']; ?></td>
        </tr>
        <tr>
            <th>Tanggal Selesai</th>
            <td><?= $service['tanggal_selesai'] ?: '-'; ?></td>
        </tr>
        <tr>
            <th>Biaya</th>
            <td>
                <?= ($service['biaya'] ? "Rp " . number_format($service['biaya'], 0, ',', '.') : '-'); ?>
            </td>
        </tr>
    </table>

    <a href="service-list.php" class="btn btn-secondary">Kembali</a>

</div>

<?php include "../includes/footer.php"; ?>
