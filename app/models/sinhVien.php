<?php
require_once __DIR__ . '/../config/db.php';

class SinhVien {
    public static function all() {
        global $conn;
        return $conn->query("SELECT * FROM SinhVien");
    }

    public static function find($maSV) {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM SinhVien WHERE MaSV = ?");
        $stmt->bind_param("s", $maSV);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function create($data) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO SinhVien VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $data['MaSV'], $data['HoTen'], $data['GioiTinh'], $data['NgaySinh'], $data['Hinh'], $data['Password'], $data['MaNganh']);
        return $stmt->execute();
    }

    public static function update($maSV, $data) {
        global $conn;
        $stmt = $conn->prepare("UPDATE SinhVien SET HoTen=?, GioiTinh=?, NgaySinh=?, Hinh=?, Password=?, MaNganh=? WHERE MaSV=?");
        $stmt->bind_param("sssssss", $data['HoTen'], $data['GioiTinh'], $data['NgaySinh'], $data['Hinh'], $data['Password'], $data['MaNganh'], $maSV);
        return $stmt->execute();
    }

    public static function delete($maSV) {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM SinhVien WHERE MaSV=?");
        $stmt->bind_param("s", $maSV);
        return $stmt->execute();
    }

    public static function paginate($limit, $offset) {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM SinhVien LIMIT ? OFFSET ?");
        $stmt->bind_param("ii", $limit, $offset);
        $stmt->execute();
        return $stmt->get_result();
    }

    public static function countAll() {
        global $conn;
        $result = $conn->query("SELECT COUNT(*) as total FROM SinhVien");
        return $result->fetch_assoc()['total'];
    }

    
}
?>
