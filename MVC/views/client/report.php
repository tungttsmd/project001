<?php include 'widget/widget-css.php'; ?>

<div class="container text-center mt-5">
    <h3 class="title text-danger row mb-3 fw-bold ">BÁO CÁO LỪA ĐẢO</h3>
    <form method="POST">
        <div class="bg-white p-4 report-form border rounded mt-4">
            <?php if (isset($msg, $color) && $msg) { ?>
                <div class="row p-2 alert alert-<?= $color ?? 'primary' ?>" role="alert">
                    <strong><?= $msg ?? '...' ?></strong>
                </div>
            <?php } ?>

            <div class="d-flex justify-content-between">
                <p class="row">Thông tin đối tượng:</p>
                <a href="<?= mvchref('client', 'report', '&clean=true') ?>"><button class="rounded p-2 pt-21 pb-1 btn btn-danger" type="button">Làm mới</button></a>
            </div>
            <div class="grid-2 row">
                <input type="text" name="account_name" placeholder="Họ tên đối tượng *" value="<?= $data->account_name ?? '' ?>" required>
            </div>
            <div class=" grid-2 row">
                <input type="text" name="account_number" placeholder="Số tài khoản *" value="<?= $data->account_number ?? '' ?>" required>
                <input type="text" name="account_bank" placeholder="Ngân hàng *" value="<?= $data->account_bank ?? '' ?>" required>
            </div>

            <div class="full-width row">
                <textarea name="account_note" placeholder="Nội dung tố cáo *" rows="2" required><?= $data->account_note ?? '' ?></textarea>
            </div>

            <p class="row">Thông tin của bạn (nội dùng này chỉ dùng xác thực):</p>

            <div class="grid-2 row">
                <input type="text" name="reporter_name" placeholder="Họ & tên *" value="<?= $data->reporter_name ?? '' ?>" required>
                <input type="text" name="reporter_contact" placeholder="Zalo hoặc link facebook (để xác thực) *" value="<?= $data->reporter_contact ?? '' ?>" required>
            </div>
        </div>
        <div class="bg-white p-4 report-form border rounded mt-4">

            <p class="row">Thông tin đối tượng bổ sung:</p>

            <div class="full-width row">
                <small class="upload-label">Upload bill chuyển tiền & ảnh đoạn chat lừa đảo (Có thể gửi nhiều ảnh)</small>
                <input type="file" multiple>
            </div>
            <div class="grid-2 row">
                <input type="number" placeholder="Số điện thoại">
            </div>

        </div>
        <div class="p-0 mb-5 row report-form  mt-4">
            <button class="btn btn-danger pt-2 pb-2" name="button" value="reportpost" type="submit">Tiến hành tố cáo</button>
        </div>
    </form>
</div>