<div class="page-heading bg-light" style="background-image: url('../public/images/banner/banner5.png'); background-size: cover;  height: 400px;">
    <div class="container">
      <div class="row align-items-end text-center">
        <div class="col-lg-7 mx-auto">
          <h1>Thanh Toán</h1>  
          <p class="mb-4"><a href="index.php">Trang chủ</a> / <strong>Thanh Toán</strong></p>        
        </div>
      </div>
    </div>
  </div>

  

  <div class="untree_co-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-12">
          <div class="border p-4 rounded" role="alert">
            <a href="?act=login">Click here để Đăng Nhập</a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-5 mb-md-0">
          <h2 class="h3 mb-3 text-black">Thông tin nhận hàng</h2>
          <div class="p-3 p-lg-5 border">
    
            <div class="form-group row">
              <div class="col-md-12">
                <label for="c_fname" class="text-black">Tên người nhận <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_fname" name="c_fname" placeholder="Tên người nhận">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <label for="c_address" class="text-black">Địa chỉ<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_address" name="c_address" placeholder="Địa chỉ nhận hàng">
              </div>
            </div>

            <div class="form-group row mb-5">
              <div class="col-md-6">
                <label for="c_email_address" class="text-black">Email<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_email_address" name="c_email_address" placeholder="Email">
              </div>

              <div class="col-md-6">
                <label for="c_phone" class="text-black">Số điện thoại<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="Số điện thoại">
              </div>
            </div>

            <div class="form-group"></div>
            <div class="form-group"></div>

            <div class="form-group">
              <label for="c_order_notes" class="text-black">Chú ý</label>
              <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Lưu ý cho shop"></textarea>
            </div>

          </div>
        </div>
       

        <div class="col-md-6">
          <div class="row mb-6">
            <div class="col-md-12">
              <h2 class="h3 mb-3 text-black">Đơn hàng của bạn</h2>
              <div class="p-3 p-lg-5 border">
                <table class="table site-block-order-table mb-5">
                  <thead>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Top Up T-Shirt</td>
                      <td>1</td>
                      <td>$250.00</td>
                    </tr>
                    <tr>
                      <td>Polo Shirt</td>
                      <td>2</td>
                      <td>$100.00</td>
                    </tr>
                    <tr>
                      <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                      <td class="text-black">$350.00</td>
                    </tr>
                    <tr>
                      <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                      <td class="text-black font-weight-bold"><strong>$350.00</strong></td>
                    </tr>
                  </tbody>
                </table>

                <div class="form-group">
                  <button class="btn btn-black btn-lg py-3 btn-block" onclick="window.location='thankyou.php'">Thanh toán khi nhận hàng</button>
                </div>

                <div class="form-group">
                  <button class="btn btn-black btn-lg py-3 btn-block" onclick="window.location='thankyou.php'">Thanh toán trực tuyến</button>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>
      <!-- </form> -->
    </div>
  </div>
