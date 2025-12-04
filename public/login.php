<?php
include '../config/db.php';
session_start();

if (isset($_POST['login'])) {

    $u = $_POST['user'];
    $p = $_POST['pass'];

    $query = "SELECT * FROM tb_admin WHERE username=$1 AND password=$2";
    $result = pg_query_params($conn, $query, [$u, $p]);

    if (pg_num_rows($result) > 0) {
        $_SESSION['admin'] = $u;
        header("Location: ../pages/rekap.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
<div class="login-box">
    <h2>Login Admin</h2>

    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>

    <form method="POST">
        <input type="text" name="user" placeholder="Username" required>
        <input type="password" name="pass" placeholder="Password" required>

        <button type="submit" name="login" class="btn btn-primary">Masuk</button>
    </form>
</div>
</body>
</html>
