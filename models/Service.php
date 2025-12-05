<?php
require_once __DIR__ . "/../config/db.php";

class Service {
    private $pdo;

    public function __construct() {
        $this->pdo = getConnection();
    }

    public function create($data) {
        $sql = "INSERT INTO service (id_perangkat, id_teknisi, id_admin, id_status, tanggal_masuk, keluhan, id_pelanggan)
                VALUES (?, ?, ?, ?, NOW(), ?, ?)";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $data["id_perangkat"],
            $data["id_teknisi"],
            $data["id_admin"],
            $data["id_status"],
            $data["keluhan"],
            $data["id_pelanggan"]
        ]);
    }

    public function getAll() {
        return $this->pdo->query("SELECT * FROM service ORDER BY id_service DESC")->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
