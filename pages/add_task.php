<?php
require_once '../classes/Task.php';
require_once '../templates/header.php';

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}


$pdo = new PDO('mysql:host=localhost;dbname=task_manager', 'root', '');
$success = '';
$error = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $userId = 1; // ثابت مؤقتًا، لاحقًا نربطه بالـ login

    if ($title !== '') {
        $task = new Task($title, $userId, 0, null, date('Y-m-d H:i:s'));
        if ($task->save($pdo)) {
            $success = "تمت إضافة المهمة بنجاح!";
        } else {
            $error = "حدث خطأ أثناء الحفظ.";
        }
    } else {
        $error = "العنوان لا يمكن أن يكون فارغًا.";
    }
}

 if ($success): ?>
    <div class="alert alert-success"><?= $success ?></div>
<?php endif; ?>

<?php if ($error): ?>
    <div class="alert alert-danger"><?= $error ?></div>
<?php endif; ?>

<form method="post" class="mb-4">
    <div class="mb-3">
        <label for="title" class="form-label">عنوان المهمة</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">إضافة</button>
    <a href="dashboard.php" class="btn btn-secondary">رجوع</a>
</form>


<?php require_once '../templates/footer.php';?>