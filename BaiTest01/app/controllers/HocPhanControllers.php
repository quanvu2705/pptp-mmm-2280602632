<?php
require_once "app/models/HocPhan.php";

class HocPhanController {
    public function index() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            return;
        }

        $ds = HocPhan::all();
        include "app/view/hocphan/index.php";
    }

    public function dangky() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            return;
        }

        $maSV = $_SESSION['user']['MaSV'];
        $maHP = $_GET['mahp'];

        HocPhan::register($maSV, $maHP);
        header("Location: index.php?action=hocphan");
    }
    
    public function giohang() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            return;
        }
    
        $maSV = $_SESSION['user']['MaSV'];
        $ds = HocPhan::getDangKy($maSV);
        $tongTinChi = HocPhan::getTotalTinChi($maSV);
    
        // Lấy thông tin sinh viên từ session
        $sinhvien = $_SESSION['user'];
    
        include "app/view/hocphan/giohang.php";
    }

    public function xoaHocPhan() {
        session_start();
        $maSV = $_SESSION['user']['MaSV'];
        $maHP = $_GET['mahp'];

        HocPhan::removeHocPhan($maSV, $maHP);
        header("Location: index.php?action=giohang");
    }

    public function xoaTatCa() {
        session_start();
        $maSV = $_SESSION['user']['MaSV'];

        HocPhan::clearDangKy($maSV);
        header("Location: index.php?action=giohang");
    }

    
    public static function countGioHang() {
        if (!isset($_SESSION)) session_start();

        if (isset($_SESSION['user'])) {
            $maSV = $_SESSION['user']['MaSV'];
            require_once "app/models/HocPhan.php";
            $ds = HocPhan::getDangKy($maSV);
            return is_array($ds) ? count($ds) : 0;
        }
        return 0;
    }

    public function luuDangKy() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            return;
        }
    
        $maSV = $_SESSION['user']['MaSV'];
    
        require_once "app/models/HocPhan.php";
    
        // Lấy mã đăng ký
        $maDK = HocPhan::getMaDK($maSV);
        if (!$maDK) {
            header("Location: index.php?action=giohang");
            return;
        }
    
        // Cập nhật ngày đăng ký
        HocPhan::capNhatNgayDK($maDK);
    
        // Lấy thông tin sinh viên & học phần
        $sinhvien = $_SESSION['user'];
        $ds = HocPhan::getDangKy($maSV);
    
        // ✅ XÓA TOÀN BỘ CHI TIẾT ĐĂNG KÝ SAU KHI LƯU
        HocPhan::clearDangKy($maSV);
    
        foreach ($ds as $hp) {
            HocPhan::giamSoLuong($hp['MaHP']);
        }
        
        // Hiển thị trang thông báo
        include "app/view/hocphan/thanhcong.php";
    }
}