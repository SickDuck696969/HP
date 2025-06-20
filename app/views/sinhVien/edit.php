<style>
    .edit-form-container {
        max-width: 600px;
        margin: 30px auto;
        padding: 30px;
        background-color: #16213e;
        border-radius: 10px;
        box-shadow: 0 0 30px rgba(255, 77, 77, 0.2);
        border: 1px solid #ff4d4d;
    }

    .edit-form-header {
        color: #ff4d4d;
        text-align: center;
        font-size: 2.2rem;
        margin-bottom: 25px;
        text-shadow: 0 0 10px rgba(255, 77, 77, 0.5);
        position: relative;
    }

    .edit-form-header::after {
        content: "";
        display: block;
        width: 80px;
        height: 3px;
        background: linear-gradient(90deg, #ff4d4d, transparent);
        margin: 10px auto;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #e6e6e6;
        font-weight: 500;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        background-color: #2a2a3c;
        border: 1px solid #444;
        border-radius: 5px;
        color: #e6e6e6;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #ff4d4d;
        outline: none;
        box-shadow: 0 0 0 2px rgba(255, 77, 77, 0.3);
    }

    .btn-submit {
        display: block;
        width: 100%;
        padding: 12px;
        background: linear-gradient(135deg, #ff4d4d, #cc0000);
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 20px;
    }

    .btn-submit:hover {
        background: linear-gradient(135deg, #ff6666, #ff0000);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 77, 77, 0.4);
    }

    .file-upload {
        position: relative;
        overflow: hidden;
        margin-bottom: 20px;
    }

    .file-upload-input {
        position: absolute;
        font-size: 100px;
        opacity: 0;
        right: 0;
        top: 0;
        cursor: pointer;
    }

    .file-upload-label {
        display: block;
        padding: 12px 15px;
        background-color: #2a2a3c;
        border: 1px dashed #444;
        border-radius: 5px;
        color: #aaa;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .file-upload-label:hover {
        border-color: #ff4d4d;
        color: #e6e6e6;
    }

    .gender-options {
        display: flex;
        gap: 15px;
        margin-top: 10px;
    }

    .gender-option {
        display: flex;
        align-items: center;
    }

    .gender-option input {
        margin-right: 8px;
    }

    .gender-option label {
        margin-bottom: 0;
        cursor: pointer;
    }

    .current-image {
        text-align: center;
        margin: 15px 0;
    }

    .current-image img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 5px;
        border: 3px solid #ff4d4d;
    }

    .form-actions {
        display: flex;
        justify-content: space-between;
        margin-top: 25px;
    }

    .btn-secondary {
        display: inline-block;
        padding: 10px 20px;
        background: #2a2a3c;
        color: #e6e6e6;
        border: 1px solid #ff4d4d;
        border-radius: 5px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-secondary:hover {
        background: #3a3a4c;
        color: white;
    }
</style>

<div class="edit-form-container">
    <h2 class="edit-form-header">SỬA THÔNG TIN SINH VIÊN</h2>
    
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="HoTen">Họ và tên</label>
            <input type="text" class="form-control" id="HoTen" name="HoTen" value="<?= htmlspecialchars($sv['HoTen'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label>Giới tính</label>
            <div class="gender-options">
                <div class="gender-option">
                    <input type="radio" id="Nam" name="GioiTinh" value="Nam" <?= ($sv['GioiTinh'] ?? '') == 'Nam' ? 'checked' : '' ?>>
                    <label for="Nam">Nam</label>
                </div>
                <div class="gender-option">
                    <input type="radio" id="Nu" name="GioiTinh" value="Nữ" <?= ($sv['GioiTinh'] ?? '') == 'Nữ' ? 'checked' : '' ?>>
                    <label for="Nu">Nữ</label>
                </div>
                <div class="gender-option">
                    <input type="radio" id="Khac" name="GioiTinh" value="Khác" <?= ($sv['GioiTinh'] ?? '') == 'Khác' ? 'checked' : '' ?>>
                    <label for="Khac">Khác</label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="NgaySinh">Ngày sinh</label>
            <input type="date" class="form-control" id="NgaySinh" name="NgaySinh" value="<?= $sv['NgaySinh'] ?? '' ?>">
        </div>

        <div class="form-group">
            <label>Hình ảnh hiện tại</label>
            <div class="current-image">
                <?php if (!empty($sv['Hinh'])): ?>
                    <img src="/QLSV/public/images/<?= $sv['Hinh'] ?>" alt="Ảnh hiện tại">
                <?php else: ?>
                    <p>Không có ảnh</p>
                <?php endif; ?>
            </div>
            <label for="Hinh">Cập nhật hình ảnh</label>
            <div class="file-upload">
                <input type="file" class="file-upload-input" id="Hinh" name="Hinh" accept="image/*">
                <label for="Hinh" class="file-upload-label">Chọn hình ảnh mới...</label>
            </div>
        </div>

        <div class="form-group">
            <label for="MaNganh">Mã ngành</label>
            <input type="text" class="form-control" id="MaNganh" name="MaNganh" value="<?= $sv['MaNganh'] ?? '' ?>">
        </div>

        <div class="form-actions">
            <a href="/QLSV/sinhvien" class="btn-secondary">Hủy bỏ</a>
            <button type="submit" class="btn-submit">Cập nhật thông tin</button>
        </div>
    </form>
</div>

<script>
    // Update file input label to show selected filename
    document.getElementById('Hinh').addEventListener('change', function(e) {
        const fileName = e.target.files[0] ? e.target.files[0].name : 'Chọn hình ảnh mới...';
        document.querySelector('.file-upload-label').textContent = fileName;
    });
</script>