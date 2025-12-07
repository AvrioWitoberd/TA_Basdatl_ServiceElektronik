<?php
require_once __DIR__ . "/../config/db.php";

class Auth {
    private $pdo;

    public function __construct() {
        $this->pdo = getConnection();
    }

    // Login
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

            // Jika tabel tidak punya kolom password → skip
            if (!$data || !isset($data["password"])) {
                continue;
            }

            // Password plaintext sementara
            if ($data["password"] === $password) {
                $data["role"] = $role;
                return $data;
            }
        }

        return null;
    }

    // Register
    public function register($nama, $email, $no_hp, $alamat, $password, $role) {
        try {
            $hashed_password = $password; // sementara plaintext

            if ($role === "pelanggan") {
                $stmt = $this->pdo->prepare("
                    INSERT INTO pelanggan (nama, email, no_hp, alamat, password, tanggal_daftar)
                    VALUES (?, ?, ?, ?, ?, NOW())");
                $stmt->execute([$nama, $email, $no_hp, $alamat, $hashed_password]);

            } elseif ($role === "teknisi") {
                $stmt = $this->pdo->prepare("
                    INSERT INTO teknisi (nama_teknisi, email, no_hp, keahlian, status_aktif, password)
                    VALUES (?, ?, ?, '-', 'aktif', ?)");
                $stmt->execute([$nama, $email, $no_hp, $hashed_password]);
            }

            return true;

        } catch (PDOException $e) {
            return false;
        }
    }
}
?>
