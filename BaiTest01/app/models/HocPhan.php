<?php
require_once "app/config/db.php";

class HocPhan {
    public static function all() {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM HocPhan");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function register($maSV, $maHP) {
        global $conn;

        // Tạo mã đăng ký mới nếu chưa có
        $stmt = $conn->prepare("SELECT MaDK FROM DangKy WHERE MaSV = ?");
        $stmt->execute([$maSV]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $maDK = $row['MaDK'];
        } else {
            $stmt = $conn->prepare("INSERT INTO DangKy(NgayDK, MaSV) VALUES (NOW(), ?)");
            $stmt->execute([$maSV]);
            $maDK = $conn->lastInsertId();
        }

        // Đăng ký học phần
        $stmt = $conn->prepare("INSERT IGNORE INTO ChiTietDangKy(MaDK, MaHP) VALUES (?, ?)");
        return $stmt->execute([$maDK, $maHP]);
    }
    public static function getDangKy($maSV) {
        global $conn;
        $stmt = $conn->prepare("
            SELECT ctdk.MaHP, TenHP, SoTinChi
            FROM DangKy dk
            JOIN ChiTietDangKy ctdk ON dk.MaDK = ctdk.MaDK
            JOIN HocPhan hp ON ctdk.MaHP = hp.MaHP
            WHERE dk.MaSV = ?
        ");
        $stmt->execute([$maSV]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function getTotalTinChi($maSV) {
        global $conn;
        $stmt = $conn->prepare("
            SELECT SUM(SoTinChi) as tongTinChi
            FROM DangKy dk
            JOIN ChiTietDangKy ctdk ON dk.MaDK = ctdk.MaDK
            JOIN HocPhan hp ON ctdk.MaHP = hp.MaHP
            WHERE dk.MaSV = ?
        ");
        $stmt->execute([$maSV]);
        return $stmt->fetchColumn();
    }
    
    public static function removeHocPhan($maSV, $maHP) {
        global $conn;
        // Lấy MaDK
        $stmt = $conn->prepare("SELECT MaDK FROM DangKy WHERE MaSV = ?");
        $stmt->execute([$maSV]);
        $maDK = $stmt->fetchColumn();
    
        $stmt = $conn->prepare("DELETE FROM ChiTietDangKy WHERE MaDK = ? AND MaHP = ?");
        return $stmt->execute([$maDK, $maHP]);
    }
    
    public static function clearDangKy($maSV) {
        global $conn;
        $stmt = $conn->prepare("SELECT MaDK FROM DangKy WHERE MaSV = ?");
        $stmt->execute([$maSV]);
        $maDK = $stmt->fetchColumn();
    
        if ($maDK) {
            $stmt = $conn->prepare("DELETE FROM ChiTietDangKy WHERE MaDK = ?");
            return $stmt->execute([$maDK]);
        }
        return false;
    }
    public static function getMaDK($maSV) {
        global $conn;
        $stmt = $conn->prepare("SELECT MaDK FROM DangKy WHERE MaSV = ?");
        $stmt->execute([$maSV]);
        return $stmt->fetchColumn();
    }
    
    public static function capNhatNgayDK($maDK) {
        global $conn;
        $stmt = $conn->prepare("UPDATE DangKy SET NgayDK = NOW() WHERE MaDK = ?");
        return $stmt->execute([$maDK]);
    }

    public static function giamSoLuong($maHP) {
        global $conn;
        $stmt = $conn->prepare("UPDATE HocPhan SET SoLuong = SoLuong - 1 WHERE MaHP = ? AND SoLuong > 0");
        return $stmt->execute([$maHP]);
    }
}