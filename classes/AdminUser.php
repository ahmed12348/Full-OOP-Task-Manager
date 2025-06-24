<?php


require_once 'User.php';
require_once 'Task.php';

class AdminUser extends User {

    public function __construct($name, $email, $password, $role = 'admin', $id = null) {
        parent::__construct($name, $email, $password, $role, $id);
    }

    public function getRole() {
        return 'admin';
    }

    public static function fetchAllTasks(PDO $pdo) {
        $stmt = $pdo->query("SELECT * FROM tasks ");
        $tasksData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $tasks = [];
        foreach ($tasksData as $task) {
            $tasks[] = new Task(
                $task['title'],
                $task['user_id'],
                $task['is_done'],
                $task['created_at'],
                $task['id']
            );
        }

        return $tasks;
    }
}


