<?php
require_once __DIR__ . "/../config/db.php";

class Auth {
    private $pdo;

    public function __construct() {
        $this->pdo = getConnection();
    }

    // cek login berdasarkan role
    public function login($email, $password) {
        $roles = [
            "admin"     => "admin",
            "pelanggan" => "pelanggan",
            "teknisi"   => "teknisi"
        ];

        foreach ($roles as $role => $table) {
            $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE email = ?");
            $stmt->execute([$email]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data && $data["password"] === $password) {
                $data["role"] = $role;
                return $data;
            }
        }

        return null;
    }

    public function register($nama, $email, $no_hp, $alamat, $password, $role) {
    try {
        $pdo = getConnection();

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        if ($role === "pelanggan") {
            $stmt = $pdo->prepare("INSERT INTO pelanggan (nama, email, no_hp, alamat, tanggal_daftar)
                                   VALUES (?, ?, ?, ?, NOW())");
            $stmt->execute([$nama, $email, $no_hp, $alamat]);
        } elseif ($role === "teknisi") {
            $stmt = $pdo->prepare("INSERT INTO teknisi (nama_teknisi, email, no_hp, keahlian, status_aktif)
                                   VALUES (?, ?, ?, '-', 'aktif')");
            $stmt->execute([$nama, $email, $no_hp]);
        }

        return true;
    } catch (PDOException $e) {
        return false;
    }
}
}
?>
