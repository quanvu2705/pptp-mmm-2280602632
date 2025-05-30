<?php
// Require necessary files
require_once('app/config/database.php');
require_once('app/models/CategoryModel.php');

class CategoryController
{
    private $categoryModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->categoryModel = new CategoryModel($this->db);
    }

    public function list()
    {
        $categories = $this->categoryModel->getCategories();
        include 'app/views/category/list.php';
    }

    public function add()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = isset($_POST['name']) ? trim($_POST['name']) : '';
            $description = isset($_POST['description']) ? trim($_POST['description']) : '';

            if (empty($name)) {
                $errors[] = "Tên danh mục không được để trống.";
            }

            if (empty($errors)) {
                try {
                    $this->categoryModel->addCategory($name, $description);
                    header("Location: /pptp-mmm-2280602632/VuHoangQuan-2280602632/ProjectBanHang/ProjectBanHang/Category/list");
                    exit();
                } catch (Exception $e) {
                    $errors[] = "Lỗi khi thêm danh mục: " . $e->getMessage();
                }
            }
        }
        include 'app/views/category/add.php';
    }

    public function edit($id)
    {
        $errors = [];
        $category = $this->categoryModel->getCategoryById($id);
        if (!$category) {
            $errors[] = "Danh mục không tồn tại.";
            include 'app/views/category/list.php';
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = isset($_POST['name']) ? trim($_POST['name']) : '';
            $description = isset($_POST['description']) ? trim($_POST['description']) : '';

            if (empty($name)) {
                $errors[] = "Tên danh mục không được để trống.";
            }

            if (empty($errors)) {
                try {
                    $this->categoryModel->updateCategory($id, $name, $description);
                    header("Location: /pptp-mmm-2280602632/VuHoangQuan-2280602632/ProjectBanHang/ProjectBanHang/Category/list");
                    exit();
                } catch (Exception $e) {
                    $errors[] = "Lỗi khi cập nhật danh mục: " . $e->getMessage();
                }
            }
        }
        include 'app/views/category/edit.php';
    }

    public function delete($id)
    {
        try {
            $this->categoryModel->deleteCategory($id);
            header("Location: /pptp-mmm-2280602632/VuHoangQuan-2280602632/ProjectBanHang/ProjectBanHang/Category/list");
            exit();
        } catch (Exception $e) {
            // Handle error (e.g., redirect with error message)
            header("Location: /pptp-mmm-2280602632/VuHoangQuan-2280602632/ProjectBanHang/ProjectBanHang/Category/list?error=Xóa danh mục thất bại: " . urlencode($e->getMessage()));
            exit();
        }
    }
}