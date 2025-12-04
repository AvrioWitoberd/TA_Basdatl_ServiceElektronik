<?php
include '../config/db.php';
session_start();

if (isset($_POST['submit'])) {

    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];
    $jenis = $_POST['jenis'];
    $keluhan = $_POST['keluhan'];
    $teknisi = $_POST['teknisi'];
    $biaya = $_POST['biaya'];

    $query = "INSERT INTO tb_service (nama_pelanggan, telepon, jenis_barang, keluhan, teknisi, biaya, status, tanggal_masuk)
              VALUES ($1,$2,$3,$4,$5,$6,'Menunggu', CURRENT_DATE)";

    $insert = pg_query_params($conn, $query, [$nama, $telepon, $jenis, $keluhan, $teknisi, $biaya]);

    if ($insert) {
        header("Location: rekap.php");
        exit;
    } else {
        echo "<script>alert('Gagal menambah data!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Service</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<?php include '../components/navbar.php'; ?>

<div class="container" style="margin-top:120px; max-width:800px;">
    <h2 class="title">Tambah Data Service</h2>

    <form method="POST">

        <label>Nama Pelanggan</label>
        <input type="text" name="nama" required>

        <label>Telepon</label>
        <input type="text" name="telepon" required>

        <label>Jenis Barang</label>
        <input type="text" name="jenis" required>

        <label>Keluhan</label>
        <textarea name="keluhan" required></textarea>

        <label>Teknisi</label>
        <input type="text" name="teknisi" required>

        <label>Biaya</label>
        <input type="number" name="biaya" required>

        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        <a href="rekap.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
