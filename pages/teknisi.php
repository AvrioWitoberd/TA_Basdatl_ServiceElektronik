<?php
require_once "../includes/session.php";
require_once "../includes/header.php";
require_once "../models/teknisi.php";

$teknisi = Teknisi::getAll();
?>

<div class="container mt-4">
    <h2>Data Teknisi</h2>
    <a href="teknisi-form.php" class="btn btn-primary mb-3">+ Tambah Teknisi</a>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>No HP</th>
                <th>Email</th>
                <th>Keahlian</th>
                <th width="150px">Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($teknisi as $t): ?>
            <tr>
                <td><?= $t['id'] ?></td>
                <td><?= $t['nama'] ?></td>
                <td><?= $t['no_hp'] ?></td>
                <td><?= $t['email'] ?></td>
                <td><?= $t['keahlian'] ?></td>

                <td>
                    <a href="teknisi-form.php?id=<?= $t['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="teknisi.php?hapus=<?= $t['id'] ?>" class="btn btn-sm btn-danger"
                       onclick="return confirm('Yakin ingin menghapus teknisi ini?');">
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
    Teknisi::delete($_GET['hapus']);
    header("Location: teknisi.php");
    exit;
}
?>
