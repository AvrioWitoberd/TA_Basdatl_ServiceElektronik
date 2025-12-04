<?php
require_once "../includes/session.php";
require_once "../models/perangkat.php";

$perangkat = new Perangkat();

// Cek apakah ada id untuk edit
$id = isset($_GET['id']) ? $_GET['id'] : null;
$data = $id ? $perangkat->getById($id) : null;

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $payload = [
        'nama_perangkat' => $_POST['nama_perangkat'],
        'jenis'          => $_POST['jenis'],
        'kerusakan'      => $_POST['kerusakan']
    ];

    if ($id) {
        $perangkat->update($id, $payload);
        header("Location: perangkat.php?msg=updated");
    } else {
        $perangkat->create($payload);
        header("Location: perangkat.php?msg=created");
    }
    exit;
}
?>

<?php include "../includes/header.php"; ?>

<div class="container">
    <h2><?= $id ? "Edit Perangkat" : "Tambah Perangkat" ?></h2>

    <form method="POST">
        <div class="form-group">
            <label>Nama Perangkat</label>
            <input type="text" name="nama_perangkat" required
                value="<?= $data['nama_perangkat'] ?? '' ?>">
        </div>

        <div class="form-group">
            <label>Jenis</label>
            <select name="jenis" required>
                <option value="">-- Pilih Jenis --</option>
                <option value="Laptop" <?= isset($data['jenis']) && $data['jenis']=='Laptop' ? 'selected':'' ?>>Laptop</option>
                <option value="HP" <?= isset($data['jenis']) && $data['jenis']=='HP' ? 'selected':'' ?>>HP</option>
                <option value="TV" <?= isset($data['jenis']) && $data['jenis']=='TV' ? 'selected':'' ?>>TV</option>
                <option value="Printer" <?= isset($data['jenis']) && $data['jenis']=='Printer' ? 'selected':'' ?>>Printer</option>
            </select>
        </div>

        <div class="form-group">
            <label>Kerusakan</label>
            <textarea name="kerusakan" rows="3" required><?= $data['kerusakan'] ?? '' ?></textarea>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="perangkat.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php include "../includes/footer.php"; ?>