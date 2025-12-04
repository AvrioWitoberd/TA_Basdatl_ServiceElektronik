<?php
// public/login.php
session_start();
// jika sudah login, redirect sesuai role (contoh)
if (!empty($_SESSION['user_role'])) {
    if ($_SESSION['user_role'] === 'admin') header('Location: dashboard_admin.php');
    if ($_SESSION['user_role'] === 'pelanggan') header('Location: dashboard_pelanggan.php');
    if ($_SESSION['user_role'] === 'teknisi') header('Location: dashboard_teknisi.php');
    exit;
}

// login form submit (sederhana - integrasikan ke DB di models nanti)
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    // sementara: dummy check (ganti dengan cek DB menggunakan PDO nanti)
    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['user_role'] = 'admin';
        $_SESSION['user'] = 'admin';
        header('Location: dashboard_admin.php'); exit;
    }
    $error = 'Username atau password salah.';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <title>Login - Service Elektronik</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container" style="max-width:420px;margin:120px auto;">
  <div class="login-box">
    <h2>Login</h2>
    <?php if($error): ?><div class="alert"><?= htmlspecialchars($error) ?></div><?php endif; ?>
    <form method="post">
      <label>Username</label>
      <input type="text" name="username" required>
      <label>Password</label>
      <input type="password" name="password" required>
      <button class="btn btn-primary" type="submit">Masuk</button>
    </form>
    <p style="margin-top:8px;">Belum punya akun? <a href="register.php">Daftar di sini</a></p>
  </div>
</div>
</body>
</html>
