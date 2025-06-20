<h2>Kết quả đăng ký học phần</h2>
<?php if (isset($message)) echo "<p style='color: green;'>$message</p>"; ?>

<table border="1">
    <tr><th>Mã HP</th><th>Tên học phần</th><th>Tín chỉ</th><th>Xoá</th></tr>
    <?php while ($row = $dsDaDK->fetch_assoc()): ?>
        <tr>
            <td><?= $row['MaHP'] ?></td>
            <td><?= $row['TenHP'] ?></td>
            <td><?= $row['SoTinChi'] ?></td>
            <td><a href="/QLSV/dangky/xoa/<?= $row['MaHP'] ?>">Xoá</a></td>
        </tr>
    <?php endwhile; ?>
</table>

<a href="/QLSV/dangky/xoatatca" onclick="return confirm('Xoá tất cả?')">Xoá tất cả học phần</a>
