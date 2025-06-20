<?php
require_once './app/config/db.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $maSV = $_POST['maSV'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM SinhVien WHERE MaSV=? AND Password=?");
    $stmt->bind_param("ss", $maSV, $password);
    $stmt->execute();
    if ($stmt->get_result()->num_rows) {
        $_SESSION['maSV'] = $maSV;
        header("Location: /QLSV/dangky");
        exit;
    } else {
        $error = "Sai thông tin!";
    }
}
?>
<form method="post">
    <h2>Đăng nhập</h2>
    <input name="maSV" placeholder="Mã sinh viên" required><br>
    <input name="password" type="password" required><br>
    <button>Đăng nhập</button>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</form>
