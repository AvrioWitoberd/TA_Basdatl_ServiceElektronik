<?php
require_once __DIR__ . '/../config/database.php';

class Auth {
    public static function login($username, $password) {
        global $pdo;

        $stmt = $pdo->prepare("SELECT * FROM admin WHERE username = :u LIMIT 1");
        $stmt->execute(['u' => $username]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin && $admin['password'] === $password) {
            return $admin;
        }
        return false;
    }
}
?>
