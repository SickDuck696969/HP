<style>
    .student-detail-container {
        max-width: 800px;
        margin: 40px auto;
        padding: 30px;
        background-color: #16213e;
        border-radius: 10px;
        box-shadow: 0 0 30px rgba(255, 77, 77, 0.2);
        border: 1px solid #ff4d4d;
    }

    .student-detail-header {
        color: #ff4d4d;
        text-align: center;
        font-size: 2.2rem;
        margin-bottom: 30px;
        text-shadow: 0 0 10px rgba(255, 77, 77, 0.5);
        position: relative;
        padding-bottom: 15px;
    }

    .student-detail-header::after {
        content: "";
        display: block;
        width: 100px;
        height: 3px;
        background: linear-gradient(90deg, #ff4d4d, transparent);
        margin: 10px auto;
    }

    .student-info {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 30px;
    }

    .info-item {
        margin-bottom: 15px;
    }

    .info-label {
        color: #ff4d4d;
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }

    .info-value {
        color: #e6e6e6;
        padding: 10px;
        background-color: #2a2a3c;
        border-radius: 5px;
        border-left: 3px solid #ff4d4d;
    }

    .student-image {
        text-align: center;
        margin: 25px 0;
    }

    .student-image img {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius: 50%;
        border: 5px solid #ff4d4d;
        box-shadow: 0 0 20px rgba(255, 77, 77, 0.5);
    }

    .back-link {
        display: inline-block;
        padding: 10px 20px;
        background: linear-gradient(135deg, #ff4d4d, #cc0000);
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        transition: all 0.3s ease;
        margin-top: 20px;
    }

    .back-link:hover {
        background: linear-gradient(135deg, #ff6666, #ff0000);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 77, 77, 0.4);
    }

    /* Nikke decorative elements */
    .corner-decoration {
        position: absolute;
        width: 50px;
        height: 50px;
        border: 2px solid #ff4d4d;
        opacity: 0.3;
    }

    .corner-top-left {
        top: 20px;
        left: 20px;
        border-right: none;
        border-bottom: none;
    }

    .corner-top-right {
        top: 20px;
        right: 20px;
        border-left: none;
        border-bottom: none;
    }

    .corner-bottom-left {
        bottom: 20px;
        left: 20px;
        border-right: none;
        border-top: none;
    }

    .corner-bottom-right {
        bottom: 20px;
        right: 20px;
        border-left: none;
        border-top: none;
    }
</style>

<div class="student-detail-container">
    <div class="corner-decoration corner-top-left"></div>
    <div class="corner-decoration corner-top-right"></div>
    <div class="corner-decoration corner-bottom-left"></div>
    <div class="corner-decoration corner-bottom-right"></div>
    
    <h2 class="student-detail-header">CHI TIẾT SINH VIÊN</h2>
    
    <div class="student-image">
        <?php if (!empty($sv['Hinh'])): ?>
            <img src="/QLSV/public/images/<?= $sv['Hinh'] ?>" alt="Ảnh sinh viên">
        <?php else: ?>
            <img src="https://via.placeholder.com/200?text=No+Image" alt="Không có ảnh">
        <?php endif; ?>
    </div>
    
    <div class="student-info">
        <div class="info-item">
            <span class="info-label">Mã sinh viên:</span>
            <div class="info-value"><?= $sv['MaSV'] ?></div>
        </div>
        
        <div class="info-item">
            <span class="info-label">Họ và tên:</span>
            <div class="info-value"><?= $sv['HoTen'] ?></div>
        </div>
        
        <div class="info-item">
            <span class="info-label">Giới tính:</span>
            <div class="info-value"><?= $sv['GioiTinh'] ?></div>
        </div>
        
        <div class="info-item">
            <span class="info-label">Ngày sinh:</span>
            <div class="info-value">
                <?= isset($sv['NgaySinh']) ? date('d/m/Y', strtotime($sv['NgaySinh'])) : 'N/A' ?>
            </div>
        </div>
        
        <div class="info-item">
            <span class="info-label">Mã ngành:</span>
            <div class="info-value"><?= $sv['MaNganh'] ?? 'N/A' ?></div>
        </div>
    </div>
    
    <div style="text-align: center;">
        <a href="/QLSV/sinhvien" class="back-link">Quay lại danh sách</a>
    </div>
</div>
