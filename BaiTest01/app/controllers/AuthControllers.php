<?php
require_once "app/config/db.php";

class AuthController {
    public function login() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $maSV = $_POST['username'];
            $password = $_POST['password'];

            global $conn;
            $stmt = $conn->prepare("SELECT * FROM SinhVien WHERE MaSV = ? AND Password = ?");
            $stmt->execute([$maSV, $password]);
            $sv = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($sv) {
                session_start();
                $_SESSION['user'] = $sv;
                header("Location: index.php");
            } else {
                $error = "Sai mã sinh viên hoặc mật khẩu";
                include "app/view/auth/login.php";
            }
        } else {
            include "app/view/auth/login.php";
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php?action=login");
    }
}