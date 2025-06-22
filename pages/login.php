<?php
session_start();

require_once '../classes/User.php';
require_once '../classes/Auth.php';
require_once '../db/connection.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (Auth::login($pdo, $email, $password)) {
//        if (isset($_SESSION['user'])) {
//            echo '<pre>';
//            print_r($_SESSION['user']);
//            echo '</pre>';
//        } else {
//            echo '⚠️ لم يتم تسجيل الجلسة.';
//        };

        header('Location: dashboard.php');
        exit;
    } else {
        $error = '❌ البريد الإلكتروني أو كلمة المرور غير صحيحة';
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css">
</head>
<body>
<div class="container mt-5">
    <h3>تسجيل الدخول</h3>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" novalidate>
        <div class="mb-3">
            <label for="email">البريد الإلكتروني</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password">كلمة المرور</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">دخول</button>
        <a href="register.php" class="btn btn-link">إنشاء حساب جديد</a>
    </form>
</div>
</body>
</html>
