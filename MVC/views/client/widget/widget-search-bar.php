      <!-- start: search bar -->
      <div class="search-box mt-4 d-flex">
          <form method="POST" action="<?= mvchref('client', 'index') ?>">
              <input type="text" name="search-account-number" class="form-control search-input" placeholder="Nhập một phần số tài khoản ngân hàng để kiểm tra">
              <div class="d-flex button-box">
                  <button type="submit" name="button" value="searchpost" class="btn btn-success ms-2">TRA CỨU STK NGÂN HÀNG</button>
                  <a href="<?= mvchref('client', 'report') ?>" class="ms-5">TÔI MUỐN TỐ CÁO LỪA ĐẢO</a>
              </div>
          </form>
      </div>
      <!-- end: search bar -->