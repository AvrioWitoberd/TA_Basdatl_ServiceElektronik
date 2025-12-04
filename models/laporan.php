<?php
require_once __DIR__ . '/../config/database.php';

class Laporan {
    private $conn;

    public function __construct() {
        global $pdo;
        $this->conn = $pdo;
    }

    // Ambil seluruh data laporan service
    public function getAll() {
        $sql = "SELECT 
                    s.id_service,
                    p.nama AS nama_pelanggan,
                    t.nama AS nama_teknisi,
                    s.permasalahan,
                    s.status,
                    s.tanggal_masuk,
                    s.tanggal_selesai,
                    s.biaya_service
                FROM service s
                LEFT JOIN pelanggan p ON s.id_pelanggan = p.id_pelanggan
                LEFT JOIN teknisi t ON s.id_teknisi = t.id_teknisi
                ORDER BY s.tanggal_masuk DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ambil total service bulan ini
    public function totalServiceBulanIni() {
        $sql = "SELECT COUNT(*) AS total 
                FROM service 
                WHERE EXTRACT(MONTH FROM tanggal_masuk) = EXTRACT(MONTH FROM CURRENT_DATE)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Total pemasukan bulan ini
    public function totalPemasukanBulanIni() {
        $sql = "SELECT SUM(biaya_service) AS pemasukan
                FROM service
                WHERE status = 'selesai'
                AND EXTRACT(MONTH FROM tanggal_selesai) = EXTRACT(MONTH FROM CURRENT_DATE)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
