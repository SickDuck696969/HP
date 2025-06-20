<style>
    body {
        background-color: #1a1a2e;
        color: #e6e6e6;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    h2 {
        color: #ff4d4d;
        text-align: center;
        font-size: 2.5rem;
        margin-bottom: 20px;
        text-shadow: 0 0 10px rgba(255, 77, 77, 0.5);
        position: relative;
    }

    h2::after {
        content: "";
        display: block;
        width: 100px;
        height: 3px;
        background: linear-gradient(90deg, #ff4d4d, transparent);
        margin: 10px auto;
    }

    .add-btn {
        display: inline-block;
        padding: 10px 20px;
        background: linear-gradient(135deg, #ff4d4d, #cc0000);
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-weight: bold;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .add-btn:hover {
        background: linear-gradient(135deg, #ff6666, #ff0000);
        transform: translateY(-2px);
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
    }

    .student-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin-top: 20px;
        background-color: #16213e;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    }

    .student-table th {
        background: linear-gradient(135deg, #ff4d4d, #990000);
        color: white;
        padding: 15px;
        text-align: left;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .student-table td {
        padding: 12px 15px;
        border-bottom: 1px solid #2a2a3c;
        vertical-align: middle;
    }

    .student-table tr:last-child td {
        border-bottom: none;
    }

    .student-table tr:hover {
        background-color: #2a2a3c;
    }

    .student-table img {
        width: 80px;
        height: 80px;
        border-radius: 4px;
        object-fit: cover;
        border: 2px solid #ff4d4d;
        box-shadow: 0 0 10px rgba(255, 77, 77, 0.3);
    }

    .action-links a {
        display: inline-block;
        padding: 6px 12px;
        margin-right: 8px;
        border-radius: 3px;
        font-weight: 500;
        transition: all 0.2s ease;
        text-decoration: none;
    }

    .action-links a:nth-child(1) { /* Edit */
        background-color: rgba(255, 193, 7, 0.2);
        color: #ffc107;
        border: 1px solid #ffc107;
    }

    .action-links a:nth-child(2) { /* Details */
        background-color: rgba(13, 110, 253, 0.2);
        color: #0d6efd;
        border: 1px solid #0d6efd;
    }

    .action-links a:nth-child(3) { /* Delete */
        background-color: rgba(220, 53, 69, 0.2);
        color: #dc3545;
        border: 1px solid #dc3545;
    }

    .action-links a:hover {
        transform: translateY(-2px);
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 30px;
        gap: 10px;
    }

    .pagination a, .pagination strong {
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .pagination a {
        background-color: #2a2a3c;
        color: #e6e6e6;
        border: 1px solid #ff4d4d;
    }

    .pagination a:hover {
        background-color: #ff4d4d;
        color: white;
    }

    .pagination strong {
        background-color: #ff4d4d;
        color: white;
        border: 1px solid #ff4d4d;
    }

    .separator {
        color: #ff4d4d;
    }

    /* Nikke-themed decorative elements */
    .nikke-decoration {
        position: absolute;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: -1;
        overflow: hidden;
    }

    .nikke-decoration::before {
        content: "";
        position: absolute;
        top: -50px;
        right: -50px;
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, rgba(255, 77, 77, 0.1) 0%, transparent 70%);
    }

    .nikke-decoration::after {
        content: "";
        position: absolute;
        bottom: -100px;
        left: -100px;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(255, 77, 77, 0.05) 0%, transparent 70%);
    }
</style>

<div class="nikke-decoration"></div>
<div class="container">
    <h2>TRANG SINH VIÊN</h2>
    <a href="/QLSV/sinhvien/create" class="add-btn">Thêm sinh viên</a>

    <table class="student-table">
        <tr>
            <th>MSSV</th>
            <th>Họ và tên</th>
            <th>Giới tính</th>
            <th>Ngày sinh</th>
            <th>Hình ảnh</th>
            <th>Mã Ngành</th>
            <th>Thao tác</th>
        </tr>
        <?php while ($sv = $dsSinhVien->fetch_assoc()): ?>
            <tr>
                <td><?= $sv['MaSV'] ?></td>
                <td><?= $sv['HoTen'] ?></td>
                <td><?= $sv['GioiTinh'] ?></td>
                <td><?= isset($sv['NgaySinh']) ? date('d/m/Y h:i:s A', strtotime($sv['NgaySinh'])) : '' ?></td>
                <td>
                    <?php if (!empty($sv['Hinh'])): ?>
                        <img src="/QLSV/public/images/<?= $sv['Hinh'] ?>" alt="Student photo">
                    <?php endif; ?>
                </td>
                <td><?= $sv['MaNganh'] ?? '' ?></td>
                <td class="action-links">
                    <a href="/QLSV/sinhvien/edit/<?= $sv['MaSV'] ?>">Edit</a>
                    <a href="/QLSV/sinhvien/detail/<?= $sv['MaSV'] ?>">Details</a>
                    <a href="/QLSV/sinhvien/delete/<?= $sv['MaSV'] ?>" onclick="return confirm('Bạn có chắc muốn xoá?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <?php if (isset($totalPages) && $totalPages > 1): ?>
        <div class="pagination">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <?php if ($i == $currentPage): ?>
                    <strong><?= $i ?></strong>
                <?php else: ?>
                    <a href="/QLSV/sinhvien?page=<?= $i ?>"><?= $i ?></a>
                <?php endif; ?>
                <?php if ($i < $totalPages): ?>
                    <span class="separator">|</span>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    <?php endif; ?>
</div>