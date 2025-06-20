<?php
require_once __DIR__ . '/../config/db.php';

class DangKy {
    public static function taoPhieuDangKy($maSV) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO DangKy (NgayDK, MaSV) VALUES (CURDATE(), ?)");
        $stmt->bind_param("s", $maSV);
        $stmt->execute();
        return $conn->insert_id;
    }

    public static function themChiTiet($maDK, $maHP) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO ChiTietDangKy (MaDK, MaHP) VALUES (?, ?)");
        $stmt->bind_param("is", $maDK, $maHP);
        return $stmt->execute();
    }

    public static function danhSachDaDangKy($maSV) {
        global $conn;
        $sql = "SELECT hp.MaHP, hp.TenHP, hp.SoTinChi
                FROM DangKy dk
                JOIN ChiTietDangKy ct ON dk.MaDK = ct.MaDK
                JOIN HocPhan hp ON ct.MaHP = hp.MaHP
                WHERE dk.MaSV = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $maSV);
        $stmt->execute();
        return $stmt->get_result();
    }

    public static function xoaMotHocPhan($maSV, $maHP) {
        global $conn;
        $conn->query("DELETE ct FROM ChiTietDangKy ct
                      JOIN DangKy dk ON ct.MaDK = dk.MaDK
                      WHERE dk.MaSV = '$maSV' AND ct.MaHP = '$maHP'");
    }

    public static function xoaTatCa($maSV) {
        global $conn;
        $conn->query("DELETE ct FROM ChiTietDangKy ct
                      JOIN DangKy dk ON ct.MaDK = dk.MaDK
                      WHERE dk.MaSV = '$maSV'");
    }
}
?>
