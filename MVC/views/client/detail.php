<?php include 'widget/widget-css.php'; ?>

<!-- MAIN CONTENT -->
<div class="container text-center mt-5">
    <h3 class="text-danger fw-bold">KIỂM TRA THÔNG TIN LỪA ĐẢO</h3>

    <!-- start: search bar -->
    <?php include 'widget/widget-search-bar.php'; ?>
    <!-- end: search bar -->

    <div class="rating-summary">
        <?php if (isset($msg, $color) && $msg) { ?>
            <div class="rounded p-2 alert alert-<?= $color ?? 'primary' ?>" role="alert">
                <strong><?= $msg ?? '...' ?></strong>
            </div>
        <?php } ?>
        <p class="border rounded text-align-left d-flex justify-content-between"><b>Thống kê về STK: <span style="color: red"><?= $data->account_number ?? null ?></span></b><span><?= $data->account_name ?? null ?>, tố cáo ngày <?=$data->create_date?></span></p>
        <div class="row">
            <div class="col-6 stats justify-content-start gap-3">
                <div class="border rounded p-3"><strong>Hôm nay</strong><br><span class="count">1</span><br>lượt tìm kiếm</div>
                <div class="border rounded p-3"><strong>Hôm qua</strong><br><span class="count">0</span><br>lượt tìm kiếm</div>
                <div class="border rounded p-3"><strong>7 ngày qua</strong><br><span class="count">2</span><br>lượt tìm kiếm</div>
                <div class="border rounded p-3"><strong>30 ngày qua</strong><br><span class="count">4</span><br>lượt tìm kiếm</div>
            </div>
            <div class="col-6">
                <div class="bar">
                    <div class="label">Chưa rõ [3]</div>
                    <div class="value">
                        <div class="fill" style="width: 60%;">60%</div>
                    </div>
                </div>
                <div class="bar">
                    <div class="label">Chưa rõ [3]</div>
                    <div class="value">
                        <div class="fill" style="width: 60%;">60%</div>
                    </div>
                </div>
                <div class="bar">
                    <div class="label">Lưu ý [1]</div>
                    <div class="value">
                        <div class="fill gray" style="width: 20%;">20%</div>
                    </div>
                </div>
                <div class="bar">
                    <div class="label">Tích cực [1]</div>
                    <div class="value">
                        <div class="fill gray" style="width: 20%;">20%</div>
                    </div>
                </div>
            </div>
        </div>
        <form method="POST">
            <textarea class="form-control" name="comment" id="" rows="3" placeholder="NẾU BẠN ĐÃ TỪNG GIAO DỊCH VỚI NGƯỜI NÀY, VUI LÒNG BÌNH LUẬN GIÚP MỌI NGƯỜI BIẾT THÊM NHÉ"></textarea>
            <button type="submit" class="mt-3 container btn btn-warning">Bình luận</button>
        </form>
    </div>
</div>