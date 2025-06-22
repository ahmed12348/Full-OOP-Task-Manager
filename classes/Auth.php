<?php
class Auth {
    public static function login(PDO $pdo, $email, $password)
    {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // ✅ حفظ بيانات المستخدم في الجلسة
            $_SESSION['user'] = [
                'id' => $user['id'],
                'email' => $user['email'],
                'name' => $user['name'] ?? '',
            ];
            return true;
        }

        return false;
    }


    public static function logout() {
    session_destroy();
    }

    public static function check() {
        return isset($_SESSION['user']['id']);
    }
}
