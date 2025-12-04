<?php
require_once "../config/database.php";

class Service {

    public static function count() {
        global $pdo;
        return $pdo->query("SELECT COUNT(*) FROM service")->fetchColumn();
    }

    public static function getLatest($limit = 5) {
        global $pdo;
        $stmt = $pdo->prepare("
            SELECT s.id, p.nama AS pelanggan, pr.nama AS perangkat, s.status, s.tanggal_masuk
            FROM service s
            JOIN pelanggan p ON s.pelanggan_id = p.id
            JOIN perangkat pr ON s.perangkat_id = pr.id
            ORDER BY s.id DESC
            LIMIT ?
        ");
        $stmt->execute([$limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
