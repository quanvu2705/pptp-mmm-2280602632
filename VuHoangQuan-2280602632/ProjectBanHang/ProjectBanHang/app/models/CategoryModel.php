<?php
class CategoryModel
{
    private $conn;
    private $table_name = "category"; // Already set to "category" as requested

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getCategories()
    {
        try {
            $query = "SELECT id, name, description FROM " . $this->table_name;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            throw new Exception("Error fetching categories from table '$this->table_name': " . $e->getMessage());
        }
    }

    public function getCategoryById($id)
    {
        try {
            $query = "SELECT id, name, description FROM " . $this->table_name . " WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            throw new Exception("Error fetching category with ID $id: " . $e->getMessage());
        }
    }

    public function addCategory($name, $description)
    {
        try {
            $query = "INSERT INTO " . $this->table_name . " (name, description) VALUES (:name, :description)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->execute();
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Error adding category: " . $e->getMessage());
        }
    }

    public function updateCategory($id, $name, $description)
    {
        try {
            $query = "UPDATE " . $this->table_name . " SET name = :name, description = :description WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Error updating category with ID $id: " . $e->getMessage());
        }
    }

    public function deleteCategory($id)
    {
        try {
            $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Error deleting category with ID $id: " . $e->getMessage());
        }
    }
}