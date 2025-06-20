<?php
require_once "app/controllers/SinhVienControllers.php";
require_once "app/controllers/AuthControllers.php";
require_once "app/controllers/HocPhanControllers.php";

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'login':
        (new AuthController())->login();
        break;
    case 'logout':
        (new AuthController())->logout();
        break;
    case 'hocphan':
        (new HocPhanController())->index();
        break;
    case 'dangky':
        (new HocPhanController())->dangky();
        break;
    case 'giohang':
        (new HocPhanController())->giohang();
        break;
    case 'xoaHocPhan':
        (new HocPhanController())->xoaHocPhan();
        break;
    case 'xoaTatCa':
        (new HocPhanController())->xoaTatCa();
        break;
    default:
        (new SinhVienController())->$action();
    
}