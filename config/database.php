<?php
$host = "localhost";
$port = "5433";
$dbname = "aplikasi_service_elektronik";
$user = "postgres";
$password = "sekiro25";

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}
?>
