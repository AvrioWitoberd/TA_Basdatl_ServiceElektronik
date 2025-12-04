<?php
require_once "../config/database.php";

class Pelanggan {

    public static function getAll() {
        global $pdo;
        return $pdo->query("SELECT * FROM pelanggan ORDER BY id DESC")
                    ->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM pelanggan WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function insert($data) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO pelanggan (nama, no_hp, email, alamat) VALUES (?, ?, ?, ?)");
        $stmt->execute([
            $data['nama'],
            $data['no_hp'],
            $data['email'],
            $data['alamat']
        ]);
    }

    public static function update($data) {
        global $pdo;
        $stmt = $pdo->prepare("
            UPDATE pelanggan
               SET nama = ?, no_hp = ?, email = ?, alamat = ?
             WHERE id = ?
        ");
        $stmt->execute([
            $data['nama'],
            $data['no_hp'],
            $data['email'],
            $data['alamat'],
            $data['id']
        ]);
    }

    public static function delete($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM pelanggan WHERE id = ?");
        $stmt->execute([$id]);
    }

    public static function count() {
        global $pdo;
        return $pdo->query("SELECT COUNT(*) FROM pelanggan")->fetchColumn();
    }
}
