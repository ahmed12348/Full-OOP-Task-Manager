<?php //if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>Task Manager</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-success mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">مدير المهام</a>

        <div class="d-flex align-items-center gap-2">

            <a class="btn btn-light" href="/TaskManagerOOP/pages/dashboard.php">📋 المهام</a>
            <a class="btn btn-warning" href="/TaskManagerOOP/pages/add_task.php">➕ إضافة مهمة</a>

            <?php if (isset($_SESSION['user'])): ?>
                <span class="text-white mx-3">
                    👤 <?= htmlspecialchars($_SESSION['user']['name']) ?>
                </span>
                <a class="btn btn-danger" href="/TaskManagerOOP/pages/logout.php">🚪 تسجيل الخروج</a>
            <?php else: ?>
                <a class="btn btn-outline-light" href="/TaskManagerOOP/pages/login.php">🔐 تسجيل الدخول</a>
            <?php endif; ?>

        </div>
    </div>
</nav>

<div class="container">
