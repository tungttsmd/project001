<?php include 'widget/widget-css.php'; ?>

<div class="container text-center mt-5">
    <h3 class="title text-danger row mb-3 fw-bold ">BÁO CÁO LỪA ĐẢO</h3>
    <form method="POST">
        <div class="bg-white p-4 report-form border rounded mt-4">
            <?php if (isset($msg, $color) && $msg) { ?>
                <div class="row p-2 alert alert-<?= $color ?? 'primary' ?>" role="alert">
                    <strong class="d-flex gap-3 align-items-center"><?= $msg ?? '...' ?></strong>
                </div>
            <?php } ?>

            <div class="d-flex justify-content-between mb-3 p-0">
                <p class="row d-flex mb-0 align-items-center"><b>Thông tin đối tượng:</b></p>
                <a class="d-flex row btn-custom no-underline" href="<?= mvchref('client', 'report') ?>"><button class="btn-custom" type="button">Làm mới</button></a>
            </div>
            <div class="grid-2 row">
                <input type="text" name="account_name" placeholder="Họ tên đối tượng *" value="<?= $data->account_name ?? '' ?>">
            </div>
            <div class=" grid-2 row">
                <input type="text" name="account_number" placeholder="Số tài khoản *" value="<?= $data->account_number ?? '' ?>">
                <input type="text" name="account_bank" placeholder="Ngân hàng *" value="<?= $data->account_bank ?? '' ?>">
            </div>

            <div class="full-width row">
                <textarea name="account_note" placeholder="Nội dung tố cáo *" rows="2"><?= $data->account_note ?? '' ?></textarea>
            </div>

            <p class="row d-flex mt-4 mb-3 align-items-center text-left"><b>Thông tin của bạn (nội dùng này chỉ dùng xác thực):</b></p>

            <div class="grid-2 row">
                <input type="text" name="reporter_name" placeholder="Họ & tên *" value="<?= $data->reporter_name ?? '' ?>">
                <input type="text" name="reporter_contact" placeholder="Zalo hoặc link facebook (để xác thực) *" value="<?= $data->reporter_contact ?? '' ?>">
            </div>
        </div>
        <div class="bg-white p-4 report-form border rounded mt-4">

            <p class="row d-flex mb-3 align-items-center text-left"><b>Thông tin đối tượng bổ sung:</b></p>

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