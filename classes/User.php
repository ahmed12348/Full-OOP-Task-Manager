<?php

class User {
    private $id;
    private $name;
    private $email;
    private $password;

    public function __construct($name, $email, $password, $id = null) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->id = $id;
    }

    public function save(PDO $pdo) {
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$this->name, $this->email, password_hash($this->password, PASSWORD_DEFAULT)]);
    }

    public static function findByEmail(PDO $pdo, $email) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getId() {
        return $this->id;
    }
}

