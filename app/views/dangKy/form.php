<h2>Chọn học phần</h2>
<form method="post" action="/QLSV/dangky/luu">
    <?php foreach ($hocPhanList as $hp): ?>
        <input type="checkbox" name="hocphan[]" value="<?= $hp['MaHP'] ?>"> 
        <?= $hp['TenHP'] ?> (<?= $hp['SoTinChi'] ?> tín chỉ) - Còn: <?= $hp['SoLuong'] ?><br>
    <?php endforeach; ?>
    <button type="submit">Lưu đăng ký</button>
</form>
