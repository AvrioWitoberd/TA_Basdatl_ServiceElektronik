<?php
function getConnection() {
    $host = "localhost";
    $port = "5433";
    $dbname = "aplikasi_service_elektronik";
    $user = "postgres";
    $password = "sekiro25";

    try {
        return new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    } catch (PDOException $e) {
        echo "Koneksi database gagal: " . $e->getMessage();
        return null;
    }
}
?>
