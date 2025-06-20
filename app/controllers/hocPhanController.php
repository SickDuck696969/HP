<?php
require_once 'app/models/hocPhan.php';
class hocPhanController {
    public function index() {
        $hocPhanList = HocPhan::all();
        require_once 'app/views/hocPhan/index.php';
    }
}
?> 