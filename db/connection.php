<?php
$host = 'localhost';
$dbname = 'task_manager';
$user = 'root'; // ← غيّرها لو عندك يوزر مختلف
$pass = '';     // ← حط الباسورد هنا لو فيه

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
