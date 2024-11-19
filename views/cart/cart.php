
  <div class="page-heading bg-light" style="background-image: url('public/images/banner/bannerCart.png'); background-size: cover;  height: 400px;">
    <div class="container">
      <div class="row align-items-end text-center">
        <div class="col-lg-7 mx-auto">
          <h1>Giỏ hàng</h1>  
          <p class="mb-4"><a href="act=?shop">Trang chủ</a> / <strong>Giỏ hàng</strong></p>        
        </div>
      </div>
    </div>
  </div>


  <div class="untree_co-section">
    <div class="container">

    <div class="row">
     <div class="col-md-12 text-left mb-2">
        <h3 class="text-black h4 text-uppercase">Giỏ hàng của bạn</h3>
     </div>
   </div>  

      <div class="row mb-5">
        <form class="col-md-12" method="post">
          <div class="site-blocks-table">
            <table class="table table-bordered" id="dxd">
              <thead>
                <tr>
                  <th class="product-thumbnail">Hình ảnh</th>
                  <th class="product-name">Sản phẩm</th>
                  <th class="product-price">Giá</th>
                  <th class="product-quantity">Số lượng</th>
                  <th class="product-total">Thành tiền</th>
                  <th class="product-remove">Xóa</th>
                </tr>
              </thead>
              <tbody>
               
            <!-- product -->
            <?php
							if (isset($_SESSION['product'])) {
								foreach ($_SESSION['product'] as $value) { ?>
                <tr>
                    <td class="product-thumbnail">
                        <a href="?act=detail&id=<?= $value['ProductID'] ?>"><img src="public/<?= $value['Image']?>" alt="Image" class="img-fluid"/></a>
                    </td>
                    <td class="product-name">
                       <h2 class="h5 text-black"><a href="?act=detail&id=<?= $value['ProductID'] ?>"><?= $value['ProductName'] ?></a></h2>
                    </td>
                    <td><?= number_format($value['Price']) ?> VNĐ</td>
      
                    <td>
											<form action="" method="POST">
												<div class="plus-minus">
													<a href="?act=cart&xuli=delete&id=<?=$value['ProductID']?>" class="dec qtybutton" type="button">-</a>
													<b class="plus-minus-box"><?= $value['Quantity'] ?></b>
													<a href="?act=cart&xuli=update&id=<?=$value['ProductID']?>" class="inc qtybutton" type="button">+</a>
												</div>
											</form>
										</td>
                    

                    <td><strong><?= number_format($value['TotalPrice']) ?> VNĐ</strong></td>
                    <td><a href="?act=cart&xuli=deleteall&id=<?= $value['ProductID'] ?>"><i class="btn fa-solid fa-trash-can" title="Remove this product" style="font-size: x-large;color: #a35f0c;"></i></a></td>
                </tr>
                <?php }
							} ?>
            <!-- product -->

              </tbody>
            </table>
          </div>
        </form>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="row mb-5">
            <div class="col-md-6 mb-3 mb-md-0">
              <button class="btn btn-black btn-sm btn-block" type="submit">Thêm sản phẩm</button>
            </div>
            <div class="col-md-6">
              <button class="btn btn-outline-black btn-sm btn-block" type="submit">Quay lại cửa hàng</button>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                      <div class="col-md-12 text-left mb-3">
                        <h3 class="text-black h4 text-uppercase">Mã giảm giá</h3>
                      </div>
                </div>                 
                <p>Nhập mã giảm giá của bạn nếu có</p>
            </div>
            <div class="col-md-8 mb-3 mb-md-0">
              <input type="text" class="form-control py-3" id="coupon" placeholder="Nhập mã giảm giá tại đây">
            </div>
            <div class="col-md-4">
              <button class="btn btn-black" type="submit">Áp dụng</button>
            </div>
          </div>
        </div>
        <div class="col-md-6 pl-5">
          <div class="row justify-content-end">
            <div class="col-md-7">
              <div class="row">
                <div class="col-md-12 text-center border-bottom mb-5">
                  <h3 class="text-black h4 text-uppercase">Chi tiết thanh toán</h3>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-6">
                  <strong class="text-black">Tổng giỏ hàng</strong>
                </div>
                <div class="col-md-6 text-right">
                  <span class="text-black"><?= number_format($count) ?> VNĐ</spp></span>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-6">
                  <strong class="text-black">Giảm giá</strong>
                </div>
                <div class="col-md-6 text-right">
                  <span class="text-black">0<span> %</span></span>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-6">
                  <strong class="text-black" >Vận chuyển</strong>
                </div>
                <div class="col-md-6 text-right">
                  <span class="text-black">25000<span> VND</span></span>
                </div>
              </div>

              <div class="row mb-3 border-top mb-5">
                <div class="col-md-6">
                  <strong class="text-black"style="padding-top: 50px;" >Tổng cộng</strong>
                </div>
                <div class="col-md-6 text-right">
                  <span class="text-black" style="color:brown;"><?($count+25000)?><span> VND</span></span>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <!-- <button class="btn btn-black btn-lg py-3 btn-block" onclick="window.location='?act=checkout.php'">Mua hàng</button> -->
                  <button class="btn btn-black btn-lg py-3 btn-block" href="?act=checkout.php" aria-label="Mua hàng">Đặt hàng</button>

                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 
