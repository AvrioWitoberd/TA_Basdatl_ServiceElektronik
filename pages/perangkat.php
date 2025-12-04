<?php
require_once "../includes/session.php";
require_once "../models/perangkat.php";

$perangkat = new Perangkat();
$data = $perangkat->getAll();
?>
<?php include "../includes/header.php"; ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">Data Perangkat</h3>
        <a href="perangkat-form.php" class="btn btn-primary">+ Tambah Perangkat</a>
    </div>

    <?php if (count($data) > 0): ?>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Pelanggan</th>
                    <th>Jenis</th>
                    <th>Merek</th>
                    <th>Model</th>
                    <th>Serial Number</th>
                    <th>Status Garansi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $d): ?>
                <tr>
                    <td><?= $d['id_perangkat'] ?></td>
                    <td><?= $d['nama_pelanggan'] ?></td>
                    <td><?= $d['jenis'] ?></td>
                    <td><?= $d['merek'] ?></td>
                    <td><?= $d['model'] ?></td>
                    <td><?= $d['serial_number'] ?></td>
                    <td><?= ($d['garansi'] ? "Masih" : "Tidak") ?></td>
                    <td>
                        <a href="perangkat-form.php?id=<?= $d['id_perangkat'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="../models/perangkat.php?delete=<?= $d['id_perangkat'] ?>" 
                            onclick="return confirm('Yakin menghapus perangkat ini?')"
                            class="btn btn-sm btn-danger">
                            Hapus
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-warning">Belum ada data perangkat</div>
    <?php endif; ?>
</div>

<?php include "../includes/footer.php"; ?>
