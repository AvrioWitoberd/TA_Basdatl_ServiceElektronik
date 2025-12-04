<?php
require_once "../includes/session.php";
require_once "../includes/header.php";
require_once "../models/pelanggan.php";

$pelanggan = Pelanggan::getAll();
?>

<div class="container mt-4">
    <h2>Data Pelanggan</h2>
    <a href="pelanggan-form.php" class="btn btn-primary mb-3">+ Tambah Pelanggan</a>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>No HP</th>
                <th>Email</th>
                <th>Alamat</th>
                <th width="150px">Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($pelanggan as $p): ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= $p['nama'] ?></td>
                <td><?= $p['no_hp'] ?></td>
                <td><?= $p['email'] ?></td>
                <td><?= $p['alamat'] ?></td>

                <td>
                    <a href="pelanggan-form.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="pelanggan.php?hapus=<?= $p['id'] ?>" class="btn btn-sm btn-danger"
                       onclick="return confirm('Yakin ingin menghapus?');">
                       Hapus
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>

<?php require_once "../includes/footer.php"; ?>

<?php
// proses hapus
if (isset($_GET['hapus'])) {
    Pelanggan::delete($_GET['hapus']);
    header("Location: pelanggan.php");
    exit;
}
?>
