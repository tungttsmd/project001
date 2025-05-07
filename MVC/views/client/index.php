  <style>
      body {
          background-color: #f8f9fa;
      }

      .dashboard-index {
          display: flex;
          flex-direction: row;
          width: 100%;
      }

      .search-box {
          max-width: 600px;
          margin: 20px auto;
          display: flex;
          flex-direction: column;
      }

      .search-box .search-input {
          padding: 10px 20px;
      }

      .search-box .btn {
          border-radius: 30px;
          margin-top: 20px;
          padding: 10px 20px;
      }

      .search-input {
          border-radius: 30px;
          padding-left: 20px;
      }

      .scam-item {
          background: white;
          border-radius: 15px;
          padding: 10px 20px;
          margin-bottom: 10px;
      }

      .scam-icon {
          color: red;
          margin-right: 10px;
      }

      .btn-scam {
          background: red;
          color: white;
      }

      .btn-trust {
          background: green;
          color: white;
      }

      .flex-hor {
          display: flex;
          justify-content: space-between;
          align-items: center;
          gap: 20px;
      }

      .flex-hor p {
          display: flex;
          justify-content: center;
          align-items: center;
          gap: 20px;
          margin: 0;
      }

      .rating-summary {
          border: 1px solid #ccc;
          padding: 20px;
          font-family: Arial, sans-serif;
          max-width: 100%;
          margin: 0 auto;
          background: #fff;
          border-radius: 8px;
      }

      .warning {
          color: red;
          text-align: center;
          font-weight: bold;
          margin-bottom: 20px;
      }

      .stats {
          display: flex;
          justify-content: space-around;
          text-align: center;
          margin-bottom: 20px;
      }

      .stats .count {
          font-size: 24px;
          color: blue;
          font-weight: bold;
      }

      .note {
          text-align: center;
          margin-bottom: 20px;
          font-size: 14px;
      }

      .bar {
          display: flex;
          align-items: center;
          margin: 8px 0;
      }

      .bar .label {
          width: 100px;
          background: #555;
          color: white;
          padding: 4px 8px;
          border-radius: 4px;
          margin-right: 10px;
          text-align: center;
          font-size: 13px;
      }

      .bar .value {
          flex: 1;
          background: #eee;
          height: 20px;
          border-radius: 4px;
          overflow: hidden;
      }

      .bar .fill {
          height: 100%;
          background: #0099b1;
          color: white;
          text-align: right;
          padding-right: 5px;
          line-height: 20px;
          font-size: 12px;
      }

      .bar .fill.gray {
          background: #666;
      }

      .summary {
          margin-top: 20px;
          font-size: 14px;
      }

      .disclaimer {
          margin-top: 10px;
          font-size: 12px;
          color: #333;
      }

      .text-align-left {
          text-align: left !important;
          padding: 10px;
      }

      .button-box {
          align-items: end;
          justify-content: center;
      }

      .button-box a {
          color: red;
          text-decoration: none;
          border: 1px solid red;
          padding: 10px 20px;
          border-radius: 30px;
      }
  </style>

  <!-- MAIN CONTENT -->
  <div class="container text-center mt-5">
      <h3 class="text-danger fw-bold">KIỂM TRA THÔNG TIN LỪA ĐẢO</h3>

      <!-- Search bar -->
      <div class="search-box mt-4 d-flex">
          <input type="text" class="form-control search-input" placeholder="Nhập một phần số tài khoản ngân hàng để kiểm tra">
          <div class="d-flex button-box">
              <button type="submit" class="btn btn-success ms-2">TRA CỨU STK NGÂN HÀNG</button>
              <a href="<?= mvchref('client', 'report') ?>" class="ms-5">TÔI MUỐN TỐ CÁO LỪA ĐẢO</a>
          </div>
      </div>


      <!-- Scam list -->
      <div class="row dashboard-index border rounded p-3">
          <div class="col-12 mt-3">
              <div class="text-center mt-5">
                  <div class="flex-hor">
                      <div class="mb-4">
                          <h3>Đã tìm thấy <b>3</b> kết quả:</h3>
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
              <div class="rating-summary">
                  <p class="border rounded text-align-left"><b>Thống kê chi tiết về người này:</b></p>
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
      </div>
      <!-- Scam list -->
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