<?php
require_once 'app/models/sinhVien.php';

class sinhVienController {

    public function index() {
        $perPage = 4;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($page < 1) $page = 1;
        $offset = ($page - 1) * $perPage;
        $dsSinhVien = SinhVien::paginate($perPage, $offset);
        $total = SinhVien::countAll();
        $totalPages = ceil($total / $perPage);
        $currentPage = $page;
        require_once 'app/views/sinhVien/index.php';
    }

    public function detail($maSV) {
        $sv = SinhVien::find($maSV);
        require_once 'app/views/sinhVien/detail.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            SinhVien::create($_POST);
            header('Location: /QLSV/sinhvien');
            exit;
        }
        require_once 'app/views/sinhVien/create.php';
    }

    public function edit($maSV) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            SinhVien::update($maSV, $_POST);
            header('Location: /QLSV/sinhvien');
            exit;
        }
        $sv = SinhVien::find($maSV);
        require_once 'app/views/sinhVien/edit.php';
    }

    public function delete($maSV) {
        SinhVien::delete($maSV);
        header('Location: /QLSV/sinhvien');
        exit;
    }
}
?>
