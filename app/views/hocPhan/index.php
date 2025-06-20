<h2>DANH SÁCH HỌC PHẦN</h2>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>Mã Học Phần</th>
        <th>Tên Học Phần</th>
        <th>Số Tín Chỉ</th>
        <th></th>
    </tr>
    <?php foreach ($hocPhanList as $hp): ?>
    <tr>
        <td><?= $hp['MaHP'] ?></td>
        <td><?= $hp['TenHP'] ?></td>
        <td><?= $hp['SoTinChi'] ?></td>
        <td>
            <form method="post" action="/QLSV/dangky/luu" style="margin:0;">
                <input type="hidden" name="hocphan[]" value="<?= $hp['MaHP'] ?>">
                <button type="submit" style="background: #4CAF50; color: white; border: none; padding: 5px 10px; border-radius: 3px;">Đăng Kí</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table> 