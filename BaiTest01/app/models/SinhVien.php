<?php
require_once "app/config/db.php";

class SinhVien {
    public static function all() {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM SinhVien");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id) {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM SinhVien WHERE MaSV = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO SinhVien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['MaSV'],
            $data['HoTen'],
            $data['GioiTinh'],
            $data['NgaySinh'],
            $data['Hinh'],
            $data['MaNganh']
        ]);
    }

    public static function update($id, $data) {
        global $conn;
        $stmt = $conn->prepare("UPDATE SinhVien SET HoTen = ?, GioiTinh = ?, NgaySinh = ?, Hinh = ?, MaNganh = ? WHERE MaSV = ?");
        return $stmt->execute([
            $data['HoTen'],
            $data['GioiTinh'],
            $data['NgaySinh'],
            $data['Hinh'],
            $data['MaNganh'],
            $id
        ]);
    }
    
    public static function delete($id) {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM SinhVien WHERE MaSV = ?");
        return $stmt->execute([$id]);
    }
    
}