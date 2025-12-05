<?php
session_start();
require_once "../models/Auth.php";

$auth = new Auth();
$message = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $hp = trim($_POST['no_hp']);
    $alamat = trim($_POST['alamat']);
    $password = trim($_POST['password']);
    $role = trim($_POST['role']);

    if ($auth->register($nama, $email, $hp, $alamat, $password, $role)) {
        $message = "Registrasi berhasil! Silakan login.";
    } else {
        $error = "Registrasi gagal! Email mungkin sudah terdaftar.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi - Service Elektronik</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5" style="max-width:500px;">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="text-center mb-4">Daftar Akun Baru</h3>

            <?php if($message): ?>
                <div class="alert alert-success"><?= $message ?></div>
            <?php endif; ?>

            <?php if($error): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>No. HP</label>
                    <input type="text" name="no_hp" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Daftar Sebagai</label>
                    <select name="role" class="form-select" required>
                        <option value="pelanggan">Pelanggan</option>
                        <option value="teknisi">Teknisi</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success w-100">Daftar</button>
            </form>

            <div class="text-center mt-3">
                <small>Sudah punya akun? <a href="login.php">Login disini</a></small>
            </div>
        </div>
    </div>
</div>

</body>
</html>
