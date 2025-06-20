<h2>Sửa Sinh viên</h2>
<form method="post">
    <input name="HoTen" value="<?= $sv['HoTen'] ?>"><br>
    <input name="GioiTinh" value="<?= $sv['GioiTinh'] ?>"><br>
    <input name="NgaySinh" type="date" value="<?= $sv['NgaySinh'] ?>"><br>
    <input name="Hinh" value="<?= $sv['Hinh'] ?>"><br>
    <input name="Password" value="<?= $sv['Password'] ?>"><br>
    <input name="MaNganh" value="<?= $sv['MaNganh'] ?>"><br>
    <button type="submit">Cập nhật</button>
</form>
