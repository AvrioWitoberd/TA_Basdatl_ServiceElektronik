<?php
require_once __DIR__ . '/../config/database.php';

class Perangkat {

    public static function count() {
        global $db;
        $q = $db->query("SELECT COUNT(*) FROM perangkat");
        return $q->fetchColumn();
    }
}