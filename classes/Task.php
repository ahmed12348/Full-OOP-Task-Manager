<?php

class Task
{
    private $id;
    private $title;
    private $isDone;
    private $userId;
    private  $created_at;
    public function __construct($title, $userId, $isDone = 0,   $id = null ,$created_at = null)
    {
        $this->title = $title;
        $this->userId = $userId;
        $this->isDone = $isDone;
        $this->id = $id;
        $this->created_at = $created_at;

    }

    public function getId(): int {
        return (int) $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getCreatedAt() {
        return $this->created_at;
    }

    public function isDone()
    {
        return $this->isDone;
    }

    public function save(PDO $pdo)
    {
        $stmt = $pdo->prepare("INSERT INTO tasks (title, is_done, user_id) VALUES (?, ?, ?)");
        return $stmt->execute([$this->title, $this->isDone, $this->userId]);
    }

    public static function deleteById(PDO $pdo, int $id): bool {
        $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function fetchAllByUser(PDO $pdo, $userId)
    {
        $stmt = $pdo->prepare("SELECT * FROM tasks WHERE user_id = ?");
        $stmt->execute([$userId]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $tasks = [];
        foreach ($rows as $row) {
            $tasks[]  = new Task($row['title'], $row['user_id'], $row['is_done'], $row['id'],$row['created_at'] ?? null);
        }
        return $tasks;
    }
    public function getFormattedDate()
    {
        if (!empty($this->created_at) && strtotime($this->created_at)) {
            return date('Y-m-d', strtotime($this->created_at));
        }
        return 'تاريخ غير صالح';
    }
}
