<?php
require_once __DIR__ . "/../config/db.php";

class Sparepart {
    private $pdo;

    public function __construct() {
        $this->pdo = getConnection();
    }

    public function getAll() {
        return $this->pdo->query("SELECT * FROM sparepart")->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
