<?php
require_once "../includes/session.php";
require_once "../includes/header.php";
require_once "../models/teknisi.php";

$edit = false;

if (isset($_GET['id'])) {
    $data = Teknisi::getById($_GET['id']);
    $edit = true;
}
?>

<div class="container mt-4">
    <h2><?= $edit ? "Edit Teknisi" : "Tambah Teknisi" ?></h2>

    <form method="POST">
        <input type="hidden" name="id" value="<?= $edit ? $data['id'] : "" ?>">

        <div class="mb-3">
            <label>Nama Teknisi</label>
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
            <label>Keahlian</label>
            <input type="text" name="keahlian" class="form-control"
                   value="<?= $edit ? $data['keahlian'] : "" ?>" required>
        </div>

        <button class="btn btn-success" type="submit">Simpan</button>
        <a href="teknisi.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php require_once "../includes/footer.php"; ?>

<?php
if ($_POST) {
    if ($edit) {
        Teknisi::update($_POST);
    } else {
        Teknisi::insert($_POST);
    }
    header("Location: teknisi.php");
    exit;
}
?>
