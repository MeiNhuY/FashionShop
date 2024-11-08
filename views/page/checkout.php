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
              <div class="row">
                  <div class="col-md-12 text-center mb-5">
                    <h3 class="text-black h4 text-uppercase">Thông tin đặt hàng</h3>
                  </div>
              </div>          
          <div class="p-3 p-lg-5 border">
            <div class="form-group row">
              <div class="col-md-12">
                <label for="c_fname" class="text-black">Tên người nhận <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_fname" name="c_fname" placeholder="Tên người nhận">
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

            <div class="form-group row">
              <div class="col-md-12">
                <label for="c_address" class="text-black">Địa chỉ<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_address" name="c_address" placeholder="Địa chỉ nhận hàng">
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
                <div class="row">
                    <div class="col-md-12 text-center mb-5">
                      <h3 class="text-black h4 text-uppercase">HÓA ĐƠN</h3>
                    </div>
                </div>                 
                <div class="p-3 p-lg-5 border">
                <table class="table site-block-order-table mb-5">

                  <thead>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                  </thead>

                  <tbody>
                    <tr>
                      <td>Áo polo cao cấp</td>
                      <td>1</td>
                      <td>$250.00</td>
                    </tr>
                    <tr>
                      <td class="text-black font-weight-bold"><strong>Giảm giá</strong></td>
                      <td class="text-black">20<span> %</span></td>
                    </tr>
                    <tr>
                      <td class="text-black font-weight-bold"><strong>Vận chuyển</strong></td>
                      <td class="text-black">25000<span> VND</span></td>
                    </tr>
                    <tr>
                      <td class="text-black font-weight-bold"><strong>Tổng thanh toán</strong></td>
                      <td class="text-black">360000<span> VND</span></td>
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
