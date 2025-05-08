<?php include 'widget/widget-css.php'; ?>

<!-- MAIN CONTENT -->
<div class="container text-center mt-5">
    <h3 class="text-danger fw-bold">KIỂM TRA THÔNG TIN LỪA ĐẢO</h3>

    <!-- start: search bar -->
    <?php include 'widget/widget-search-bar.php'; ?>
    <!-- end: search bar -->


    <?php if ($html->searchResult ?? false) { ?>
        <!-- start: search list -->
        <div class="row dashboard-index border rounded p-3">
            <div class="col-12 mt-3">
                <div class="text-center mt-5">
                    <div class="flex-hor">
                        <div class="mb-4">
                            <h3>Đã tìm thấy <b><?= count((array)$data ?? null) ?></b> kết quả:</h3>
                        </div>
                        <div class="flex-hor mb-4">
                            <!-- Star Rating -->
                            <p>Đánh giá của bạn về kết quả:</p>
                            <div class="mb-0" style="font-size: 1.5rem; color: orange;">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                            </div>
                            <p>4/5 - (2 đánh giá)</p>
                        </div>
                    </div>

                </div>
                <?php if (isset($data)) {
                    foreach ($data as $value) { ?>
                        <a href="<?= mvchref('client', 'detail', '&id=' . $value->id) ?>">
                            <div class="scam-item d-flex align-items-center justify-content-between">
                                <div><i class="bi bi-person-fill scam-icon"></i><?= $value->account_name ?></div>
                                <div class="d-flex">
                                    <small class="me-2 text-muted">Trạng thái: <?= $value->is_confirm === (string) 1 ? '<span style="color: red">Đã xác minh</span>' : '<span style="color: orange">Chưa xác minh</span>' ?></small>
                                    <small class="me-2 text-muted">Ngày báo cáo: <?= $value->account_number ?></small>
                                    <small class="me-2 text-muted">STK: <?= $value->account_number ?></small>
                                    <small class="me-2 text-warning"><span style="color: blue">Bank: <?= $value->account_bank ?></span></small>
                                    <small class="me-2 text-muted">(<?= $value->account_name ?>) Lượt bình luận</small>
                                </div>
                            </div>
                        </a>
                <?php }
                } ?>
            </div>
        </div>
        <!-- end: search list -->
    <?php } ?>

    <div class="mt-3 row dashboard-index border rounded p-3">
        <div class="col-6 mt-3">
            <h3>Danh sách tra cứu ngày 07/05/2025</h3>
            <div class="scam-item d-flex align-items-center justify-content-between">
                <div><i class="bi bi-person-fill scam-icon"></i> Công Lực</div>
                <div>
                    <small class="me-2 text-muted">20-11-2024</small>
                    <small class="me-2 text-warning">💰 MB Bank</small>
                    <small class="me-2 text-muted">(11) Lượt bình luận</small>
                </div>
            </div>
            <div class="scam-item d-flex align-items-center justify-content-between">
                <div><i class="bi bi-person-fill scam-icon"></i> công lực</div>
                <div>
                    <small class="me-2 text-muted">10-11-2024</small>
                    <small class="me-2 text-warning">💰 mb bank</small>
                    <small class="me-2 text-muted">(4) Lượt bình luận</small>
                </div>
            </div>
            <div class="scam-item d-flex align-items-center justify-content-between">
                <div><i class="bi bi-person-fill scam-icon"></i> Vo Nhat Long</div>
                <div>
                    <small class="me-2 text-muted">23-10-2024</small>
                    <small class="me-2 text-warning">💰 Mbbank</small>
                    <small class="me-2 text-muted">(2) Lượt bình luận</small>
                </div>
            </div>
        </div>
        <div class="col-6 mt-3">
            <h3>Báo cáo lừa đảo ngày 07/05/2025</h3>
            <div class="scam-item d-flex align-items-center justify-content-between">
                <div><i class="bi bi-person-fill scam-icon"></i> Công Lực</div>
                <div>
                    <small class="me-2 text-muted">20-11-2024</small>
                    <small class="me-2 text-warning">💰 MB Bank</small>
                    <small class="me-2 text-muted">(1) Lượt bình luận</small>
                </div>
            </div>
            <div class="scam-item d-flex align-items-center justify-content-between">
                <div><i class="bi bi-person-fill scam-icon"></i> công lực</div>
                <div>
                    <small class="me-2 text-muted">10-11-2024</small>
                    <small class="me-2 text-warning">💰 mb bank</small>
                    <small class="me-2 text-muted">(2) Lượt bình luận</small>
                </div>
            </div>
            <div class="scam-item d-flex align-items-center justify-content-between">
                <div><i class="bi bi-person-fill scam-icon"></i> Vo Nhat Long</div>
                <div>
                    <small class="me-2 text-muted">23-10-2024</small>
                    <small class="me-2 text-warning">💰 Mbbank</small>
                    <small class="me-2 text-muted">(1) Lượt bình luận</small>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3 row dashboard-index list-group border rounded p-4 gap-3">
        <h3 class="text-align-left">Danh sách chức năng chưa hiểu/chưa đụng:</h3>
        <a href="#" class="text-align-left list-group-item list-group-item-action rounded">Trang chủ: Cho phép người dùng đánh giá kết quả</a>
        <a href="#" class="text-align-left list-group-item list-group-item-action rounded">Trang chủ: Thanh tra cứu STK</a>
        <a href="#" class="text-align-left list-group-item list-group-item-action rounded">Trang chủ: Nút chuyển sang form tố cáo</a>
        <a href="#" class="text-align-left list-group-item list-group-item-action rounded">Chưa hiểu: Auto get UID Facebook (qua API)</a>
        <a href="#" class="text-align-left list-group-item list-group-item-action rounded">Trang tố cáo: Bấm nút gửi -> lưu vào SQL với trangthai = choduyet</a>
        <a href="#" class="text-align-left list-group-item list-group-item-action rounded">Trang chi tiết tố cáo: Dùng .htaccess để tạo URL dạng scams/cong-luc</a>
        <a href="#" class="text-align-left list-group-item list-group-item-action rounded">Trang chi tiết tố cáo: Giao diện giống: https://admin.vn/scams/cong-luc</a>
        <a href="#" class="text-align-left list-group-item list-group-item-action rounded">Trang chi tiết tố cáo: Có chức năng comment không cần đăng nhập, nhưng kiểm tra IP & session để chống spam.</a>
        <a href="#" class="text-align-left list-group-item list-group-item-action rounded">NỘI DUNG ĐỂ SAU TÍNH</a>
        <p>
        <pre style="text-align: left">
            5. Quỹ bảo hiểm
              Giao diện như: https://admin.vn/trust-services

              Tìm kiếm theo tên

              6. Chi tiết bảo hiểm
              Dùng .htaccess với URL như trust-service/huynh-trung-tin

              Giao diện như: https://admin.vn/trust-service/huynh-trung-tin

              7. BOT (API hoặc mini tool)
              Kiểm tra UID:

              Có phải scam không?

              Có phải giao dịch viên không?

              Kiểm tra STK:

              Có phải scam không?

              Có phải giao dịch viên không?

              Giới hạn gửi request: chờ 10s mới được gửi tiếp</pre>
        </p>
    </div>

</div>

</div>

<!-- BOOTSTRAP ICONS + JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>