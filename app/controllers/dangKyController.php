<?php
require_once 'app/models/hocPhan.php';
require_once 'app/models/dangKy.php';

class dangKyController {

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['maSV'])) {
            header("Location: /QLSV/login.php");
            exit;
        }
    }

    public function index() { // Default action
        $hocPhanList = HocPhan::all();
        require_once 'app/views/dangKy/form.php';
    }

    public function luu() {
        $maSV = $_SESSION['maSV'];
        if (!empty($_POST['hocphan'])) {
            $maDK = DangKy::taoPhieuDangKy($maSV);
            foreach ($_POST['hocphan'] as $maHP) {
                DangKy::themChiTiet($maDK, $maHP);
                // HocPhan::giamSoLuong($maHP); // This might need review
            }
            $message = "Đăng ký thành công!";
        }
        $dsDaDK = DangKy::danhSachDaDangKy($maSV);
        require_once 'app/views/dangKy/ketQua.php';
    }

    public function xoa($maHP) {
        $maSV = $_SESSION['maSV'];
        DangKy::xoaMotHocPhan($maSV, $maHP);
        header("Location: /QLSV/dangky/ketqua");
        exit;
    }

    public function xoatatca() {
        $maSV = $_SESSION['maSV'];
        DangKy::xoaTatCa($maSV);
        header("Location: /QLSV/dangky/ketqua");
        exit;
    }

    public function ketqua() {
        $maSV = $_SESSION['maSV'];
        $dsDaDK = DangKy::danhSachDaDangKy($maSV);
        require_once 'app/views/dangKy/ketQua.php';
    }
}
?>
