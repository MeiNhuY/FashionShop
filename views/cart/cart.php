<?php
// Kiểm tra giỏ hàng và lấy PromotionID
$promotionID = ''; // Khởi tạo biến PromotionID

if (isset($_SESSION['product']) && !empty($_SESSION['product'])) {
    // Lấy PromotionID của sản phẩm đầu tiên (hoặc sản phẩm bất kỳ nếu có nhiều hơn)
    $promotionID = current($_SESSION['product'])['PromotionID'];
}

// Kiểm tra xem có sản phẩm trong giỏ hàng và mã giảm giá có được áp dụng hay không
$hasPromotion = isset($_SESSION['promotion']) && !empty($_SESSION['promotion']);
?>

 
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
            <?php if (isset($_SESSION['product']) && !empty($_SESSION['product'])): ?>
              <?php foreach ($_SESSION['product'] as $value): ?>
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
                <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">Không có sản phẩm nào</td>
                        </tr>
                    <?php endif; ?>
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
              <a href="?act=shop"><button class="btn btn-black btn-sm btn-block" type="submit">Thêm sản phẩm</button>
              </a>
          </div>
            <div class="col-md-6">
              <a href="?act=history_order"><button class="btn btn-outline-black btn-sm btn-block" type="submit">Lịch Sử Đơn Hàng</button></a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                      <div class="col-md-12 text-left mb-3">
                        <h3 class="text-black h4 text-uppercase">Mã giảm giá</h3>
                      </div>
                </div>                 
            </div>
            
            <div class="col-md-8 mb-3 mb-md-0">
              <input type="text" class="form-control py-3" id="coupon" placeholder="Thêm sản phẩm để có mã giảm giá" name="coupon" value="<?= isset($value['PromotionID']) ? $value['PromotionID'] : ''; ?>">
            </div>
            <form action="?act=promotion&id=<?=$value['PromotionID']?>" method="POST">
            <div class="col-md-5">
              <button class="btn btn-black" style="width: 150px;" type="submit">Áp dụng</button>
            </div>
            </form>
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
                  <span class="text-black"><?= number_format($totalPrice) ?> VNĐ</spp></span>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-6">
                    <strong class="text-black">Giảm giá</strong>
                </div>
                <div class="col-md-6 text-right">
                    <?php if ($hasPromotion): ?>
                        <span class="text-black"><?= number_format($_SESSION['promotion']) ?> VND</span>
                    <?php else: ?>
                        <span class="text-black">0</span>
                    <?php endif; ?>
                </div>
            </div>


              <div class="row mb-3">
                <div class="col-md-6">
                  <strong class="text-black" >Vận chuyển</strong>
                </div>
                <div class="col-md-6 text-right">
                  <span class="text-black">25,000 <span> VND</span></span>
                </div>
              </div>

              <div class="row mb-3 border-top mb-5">
                <div class="col-md-6">
                  <strong class="text-black"style="padding-top: 50px;" >Tổng cộng</strong>
                </div>
                <div class="col-md-6 text-right">
                  <span class="text-black" style="color:brown;"><?= number_format($finalTotal) ?><span> VND</span></span>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                <?php
                    // Kiểm tra xem giỏ hàng (session['product']) có sản phẩm không
                    if (isset($_SESSION['product']) && !empty($_SESSION['product'])) {
                        // Nếu có sản phẩm trong giỏ hàng, hiển thị nút đặt hàng
                        echo '<a href="?act=checkout"><button class="btn btn-black btn-lg py-3 btn-block" aria-label="Mua hàng" type="submit">Đặt hàng</button></a>';
                    } else {
                        // Nếu không có sản phẩm trong giỏ hàng, hiển thị thông báo yêu cầu thêm sản phẩm
                        echo '<div class="alert alert-warning" role="alert">Bạn cần thêm sản phẩm vào giỏ hàng trước khi thanh toán!</div>';
                    }
                ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 
