<?php
// /models/User.php
require_once '../config/database.php';

class User {
    public static function register($fullname, $email, $password, $gender, $phone) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO users (fullname, email, password, gender, phone) VALUES (?, ?, ?, ?, ?)");
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        return $stmt->execute([$fullname, $email, $hashed_password, $gender, $phone]);
    }

    public static function login($email, $password) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    public static function changePassword($email, $currentPassword, $newPassword) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($currentPassword, $user['password'])) {
            $hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE email = ?");
            return $stmt->execute([$hashed_password, $email]);
        }
        return false;
    }
}
?>
