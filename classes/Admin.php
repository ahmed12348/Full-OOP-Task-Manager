<?php

require_once 'User.php';

class Admin extends User {
    private $role;

    public function __construct($name,$email,$role="مشرف")
    {
        parent::__construct($name, $email);
        $this->role=$role;
    }

      public function getRole() {
        return $this->role;
    }

      public function displayInfo() {
        return parent::displayInfo() . " - الدور: {$this->role}";
    }
    public function clearTasks() {
        $this->tasks = []; // حذف كل المهام
    }
}
