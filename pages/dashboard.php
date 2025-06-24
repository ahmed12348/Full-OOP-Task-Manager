<?php
require_once '../classes/User.php';
require_once '../classes/AdminUser.php';
require_once '../classes/Task.php';
require_once '../db/connection.php';

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$user = unserialize($_SESSION['user']);

// ✅ استخدم getRole()
if ($user->getRole() === 'admin') {
    $tasks = AdminUser::fetchAllTasks($pdo);
} else {
    $tasks = Task::fetchAllByUser($pdo, $user->getId());
}

?>

<?php include '../templates/header.php'; ?>

<div class="container mt-5">
    <h2 class="mb-4">📋 قائمة المهام</h2>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
        <tr>
            <th>📌 العنوان</th>
            <th>✅ تم التنفيذ</th>
            <th>📅 تاريخ الإنشاء</th>
            <th>⚙️ إجراءات</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= htmlspecialchars($task->getTitle()) ?></td>
                <td><?= $task->isDone() ? '✔️' : '❌' ?></td>
                <td><?= htmlspecialchars($task->getFormattedDate()) ?>
                </td>
                <td>
                    <a href="edit_task.php?id=<?= $task->getId() ?>" class="btn btn-sm btn-warning">✏️ تعديل</a>
                    <a href="delete_task.php?id=<?= $task->getId() ?>" class="btn btn-sm btn-danger">🗑️ حذف</a>
                    <?php if (!$task->isDone()): ?>
                        <a href="dashboard.php?done=<?= $task->getId(); ?>" class="btn btn-success btn-sm">✔ تم</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include '../templates/footer.php'; ?>
