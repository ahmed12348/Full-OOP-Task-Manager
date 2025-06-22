<?php

require_once __DIR__ . '/../db/connection.php';
require_once __DIR__ . '/../classes/Task.php';

if (isset($_GET['id'])) {
    $taskId = (int)$_GET['id'];
    Task::deleteById($pdo, $taskId);
}

// بعد الحذف نرجع لـ dashboard
header('Location: dashboard.php');
exit;
