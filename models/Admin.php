<?php
require_once __DIR__ . "/../config/db.php";

class Admin {
    private $pdo;

    public function __construct() {
        $this->pdo = getConnection();
    }

    public function getAll() {
        return $this->pdo->query("SELECT * FROM admin")->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
