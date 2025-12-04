<?php
require_once "../includes/session.php";
require_once "../includes/header.php";
require_once "../models/pelanggan.php";

// mode edit
$edit = false;
if (isset($_GET['id'])) {
    $data = Pelanggan::getById($_GET['id']);
    $edit = true;
}
?>

<div class="container mt-4">
    <h2><?= $edit ? "Edit Pelanggan" : "Tambah Pelanggan" ?></h2>

    <form method="POST">
        <input type="hidden" name="id" value="<?= $edit ? $data['id'] : "" ?>">

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control"
                   value="<?= $edit ? $data['nama'] : "" ?>" required>
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control"
                   value="<?= $edit ? $data['no_hp'] : "" ?>" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control"
                   value="<?= $edit ? $data['email'] : "" ?>" required>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required><?= $edit ? $data['alamat'] : "" ?></textarea>
        </div>

        <button class="btn btn-success" type="submit">Simpan</button>
        <a href="pelanggan.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php require_once "../includes/footer.php"; ?>

<?php
// proses submit
if ($_POST) {
    if ($edit) {
        Pelanggan::update($_POST);
    } else {
        Pelanggan::insert($_POST);
    }
    header("Location: pelanggan.php");
    exit;
}
?>
