<?php
require_once __DIR__ . '/../config/database.php';

class Pembayaran {
    private $db;
    public function __construct(){
        global $pdo;
        $this->db = $pdo;
    }

    public function getAll() {
        $sql = "SELECT p.id_pembayaran, p.id_service, s.nama_pelanggan, p.total, p.metode,
                p.tanggal_bayar
                FROM pembayaran p
                JOIN service s ON s.id_service = p.id_service
                ORDER BY tanggal_bayar DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($data){
        $sql = "INSERT INTO pembayaran(id_service, total, metode, tanggal_bayar)
                VALUES(?,?,?,?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['id_service'],
            $data['total'],
            $data['metode'],
            $data['tanggal_bayar']
        ]);
    }

    public function getById($id){
        $sql = "SELECT * FROM pembayaran WHERE id_pembayaran=?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
