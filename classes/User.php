<?php

class User {
    protected $id;
    protected $name;
    protected $email;
    protected $password;
    protected $role;

    public function __construct($name, $email, $password, $role = 'user', $id = null) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function getRole() {
        return 'user'; // أو ترجع قيمة من خاصية role لو موجودة
    }



    public function getId() {
        return $this->id;
    }

    public function save(PDO $pdo) {
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
        return $stmt->execute([
            $this->name,
            $this->email,
            password_hash($this->password, PASSWORD_DEFAULT),
            $this->role
        ]);
    }

    public static function findByEmail(PDO $pdo, $email) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            if ($data['role'] === 'admin') {
                return new AdminUser($data['name'], $data['email'], $data['password'], 'admin', $data['id']);
            } else {
                return new User($data['name'], $data['email'], $data['password'], 'user', $data['id']);
            }
        }

        return null;
    }
}

