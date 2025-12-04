<?php
require_once "../config/database.php";

class Teknisi {

    public static function getAll() {
        global $pdo;
        return $pdo->query("SELECT * FROM teknisi ORDER BY id DESC")
                   ->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM teknisi WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function insert($data) {
        global $pdo;
        $stmt = $pdo->prepare("
            INSERT INTO teknisi (nama, no_hp, email, keahlian)
            VALUES (?, ?, ?, ?)
        ");
        $stmt->execute([
            $data['nama'],
            $data['no_hp'],
            $data['email'],
            $data['keahlian']
        ]);
    }

    public static function update($data) {
        global $pdo;
        $stmt = $pdo->prepare("
            UPDATE teknisi
               SET nama = ?, no_hp = ?, email = ?, keahlian = ?
             WHERE id = ?
        ");
        $stmt->execute([
            $data['nama'],
            $data['no_hp'],
            $data['email'],
            $data['keahlian'],
            $data['id']
        ]);
    }

    public static function delete($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM teknisi WHERE id = ?");
        $stmt->execute([$id]);
    }

    public static function count() {
        global $pdo;
        return $pdo->query("SELECT COUNT(*) FROM teknisi")->fetchColumn();
    }
}
