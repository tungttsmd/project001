<style>
    body {
        background-color: #f8f9fa;
    }

    .report-form {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    .report-form .btn {
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        margin: 0;
        padding: 0;
    }

    .section-title {
        color: red;
        text-align: center;
        margin: 30px 0 10px;
        font-weight: bold;
        position: relative;
    }

    .section-title::after {
        content: "";
        display: block;
        width: 60px;
        height: 3px;
        background: red;
        margin: 10px auto 0;
    }

    .grid-1 {
        display: flex;
        gap: 20px;
        margin-bottom: 15px;
    }

    .grid-2 {
        display: flex;
        gap: 20px;
        margin-bottom: 15px;
    }

    .grid-2 input {
        flex: 1;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 6px;
    }

    .full-width {
        margin-bottom: 15px;
    }

    .full-width textarea,
    .full-width input[type="file"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 6px;
    }

    .upload-label {
        font-weight: bold;
        display: block;
        margin-bottom: 8px;
        text-align: left;
        padding-left: 0;
    }

    small {
        color: #666;
        display: block;
        margin-top: 5px;
    }

    .title {
        display: block;
        text-align: center !important;
    }

    .rounded {
        border-radius: 16px !important;
    }
</style>
<div class="container text-center mt-5">
    <h3 class="title text-danger row mb-3 fw-bold ">BÁO CÁO LỪA ĐẢO</h3>

    <div class="bg-white p-4 report-form border rounded mt-4">

        <p class="row">Thông tin đối tượng:</p>

        <div class="grid-2 row">
            <input type="text" placeholder="Số tài khoản *" required>
            <input type="text" placeholder="Ngân hàng *" required>
        </div>
        <div class="grid-2 row">
            <input type="text" placeholder="Họ tên đối tượng *">
        </div>
        <div class="full-width row">
            <textarea placeholder="Nội dung tố cáo *" rows="2" required></textarea>
        </div>

        <p class="row">Thông tin của bạn (nội dùng này chỉ dùng xác thực):</p>

        <div class="grid-2 row">
            <input type="text" placeholder="Họ & tên *" required>
            <input type="text" placeholder="Zalo hoặc link facebook (để xác thực) *">
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
        <button class="btn btn-danger pt-2 pb-2" type="submit">Tiến hành tố cáo</button>
    </div>
</div>