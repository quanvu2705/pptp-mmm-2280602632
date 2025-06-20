<?php
$host = "localhost";
$db = "test1";
$user = "root";
$pass = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
} catch (PDOException $e) {
    die("Lỗi kết nối: " . $e->getMessage());
}
?>