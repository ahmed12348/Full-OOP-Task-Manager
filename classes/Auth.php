<?php
//require_once 'AdminUser.php';
//require_once __DIR__ . '/User.php';
require_once __DIR__ . '/AdminUser.php';
class Auth {
    public static function login(PDO $pdo, $email, $password) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userData && password_verify($password, $userData['password'])) {
            if ($userData['role'] === 'admin') {
                $user = new AdminUser($userData['name'], $userData['email'], '', $userData['id']);
            } else {
                $user = new User($userData['name'], $userData['email'], '', $userData['id']);
            }

            $_SESSION['user'] = serialize($user); // ✅ Store as string
            return true;
        }

        return false;
    }

    public static function logout() {
        session_destroy();
    }

    public static function check() {
        return isset($_SESSION['user']);
    }
}
