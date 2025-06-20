<?php
require_once __DIR__ . '/../config/db.php';

class HocPhan {
    public static function all() {
        global $conn;
        return $conn->query("SELECT * FROM HocPhan WHERE SoLuong > 0");
    }

    public static function giamSoLuong($maHP) {
        global $conn;
        $stmt = $conn->prepare("UPDATE HocPhan SET SoLuong = SoLuong - 1 WHERE MaHP = ?");
        $stmt->bind_param("s", $maHP);
        return $stmt->execute();
    }
}
?>
