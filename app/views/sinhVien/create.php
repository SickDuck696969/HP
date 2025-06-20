<style>
    .form-container {
        max-width: 600px;
        margin: 30px auto;
        padding: 30px;
        background-color: #16213e;
        border-radius: 10px;
        box-shadow: 0 0 30px rgba(255, 77, 77, 0.2);
    }

    h2 {
        color: #ff4d4d;
        text-align: center;
        font-size: 2.2rem;
        margin-bottom: 25px;
        text-shadow: 0 0 10px rgba(255, 77, 77, 0.5);
        position: relative;
    }

    h2::after {
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
</style>

<div class="form-container">
    <h2>Thêm Sinh viên</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="MaSV">Mã Sinh viên</label>
            <input type="text" class="form-control" id="MaSV" name="MaSV" placeholder="Nhập mã sinh viên" required>
        </div>

        <div class="form-group">
            <label for="HoTen">Họ và tên</label>
            <input type="text" class="form-control" id="HoTen" name="HoTen" placeholder="Nhập họ và tên" required>
        </div>

        <div class="form-group">
            <label>Giới tính</label>
            <div class="gender-options">
                <div class="gender-option">
                    <input type="radio" id="Nam" name="GioiTinh" value="Nam" checked>
                    <label for="Nam">Nam</label>
                </div>
                <div class="gender-option">
                    <input type="radio" id="Nu" name="GioiTinh" value="Nữ">
                    <label for="Nu">Nữ</label>
                </div>
                <div class="gender-option">
                    <input type="radio" id="Khac" name="GioiTinh" value="Khác">
                    <label for="Khac">Khác</label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="NgaySinh">Ngày sinh</label>
            <input type="date" class="form-control" id="NgaySinh" name="NgaySinh">
        </div>

        <div class="form-group">
            <label for="Hinh">Hình ảnh</label>
            <div class="file-upload">
                <input type="file" class="file-upload-input" id="Hinh" name="Hinh" accept="image/*">
                <label for="Hinh" class="file-upload-label">Chọn hình ảnh...</label>
            </div>
        </div>

        <div class="form-group">
            <label for="MaNganh">Mã ngành</label>
            <input type="text" class="form-control" id="MaNganh" name="MaNganh" placeholder="Nhập mã ngành">
        </div>

        <button type="submit" class="btn-submit">Lưu thông tin</button>
    </form>
</div>

<script>
    // Update file input label to show selected filename
    document.getElementById('Hinh').addEventListener('change', function(e) {
        const fileName = e.target.files[0] ? e.target.files[0].name : 'Chọn hình ảnh...';
        document.querySelector('.file-upload-label').textContent = fileName;
    });
</script>