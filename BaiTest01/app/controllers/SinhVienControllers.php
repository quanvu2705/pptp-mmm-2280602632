<?php
require_once "app/models/SinhVien.php";

class SinhVienController {
    public function index() {
        $limit = 4; // mỗi trang 4 sinh viên
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;
    
        global $conn;
    
        // Đếm tổng số sinh viên
        $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM SinhVien");
        $stmt->execute();
        $totalRows = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
        $totalPages = ceil($totalRows / $limit);
    
        // Lấy sinh viên phân trang
        $stmt = $conn->prepare("SELECT * FROM SinhVien LIMIT $limit OFFSET $offset");
        $stmt->execute();
        $sinhviens = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        include "app/view/sinhvien/index.php";
    }

    public function create() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = $_POST;
            $data['Hinh'] = $_FILES['Hinh']['name'];
            move_uploaded_file($_FILES['Hinh']['tmp_name'], "images/" . $data['Hinh']);
            SinhVien::create($data);
            header("Location: index.php");
        } else {
            include "app/view/sinhvien/create.php";
        }
    }

    public function edit() {
        $id = $_GET['id'];
        $sv = SinhVien::find($id);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = $_POST;
            if (!empty($_FILES['Hinh']['name'])) {
                $data['Hinh'] = $_FILES['Hinh']['name'];
                move_uploaded_file($_FILES['Hinh']['tmp_name'], "images/" . $data['Hinh']);
            } else {
                $data['Hinh'] = $sv['Hinh'];
            }
            SinhVien::update($id, $data);
            header("Location: index.php");
        } else {
            include "app/view/sinhvien/edit.php";
        }
    }

    public function detail() {
        $id = $_GET['id'];
        $sv = SinhVien::find($id);
        include "app/view/sinhvien/detail.php";
    }

    public function confirmDelete() {
        $id = $_GET['id'];
        $sv = SinhVien::find($id);
        include "app/view/sinhvien/delete.php";
    }
    
    public function delete() {
        $id = $_GET['id'];
        SinhVien::delete($id);
        header("Location: index.php");
    }
    
}