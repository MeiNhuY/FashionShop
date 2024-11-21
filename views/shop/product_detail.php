<style>
  /* Tạo kiểu dáng cho tem HOT */
.hot{
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 3;
    background-color: #ff4d4d; /* Màu đỏ nổi bật */
    color: white;
    padding: 15px 25px;
    font-size: 25px; /* Kích thước chữ */
    font-weight: bold;
    border-radius: 50px; /* Tạo hình tròn hoặc bo góc cho tem */
    transform: rotate(15deg); /* Nghiêng tem một chút */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Thêm bóng cho tem */
}

/* Tạo hiệu ứng cho chữ trong tem */
.hot .content {
    text-transform: uppercase; /* Viết hoa chữ "HOT" */
    letter-spacing: 2px; /* Khoảng cách giữa các chữ */
}

</style>

<!-- Banner Phần Chi Tiết Sản Phẩm -->
<?php if ($data != null) { ?>
<div class="page-heading bg-light" style="background-image: url('public/images/banner/bannerCart.png'); background-size: cover; height: 400px;">
  <div class="container">
    <div class="row align-items-end text-center">
      <div class="col-lg-7 mx-auto">
        <h1>Chi tiết sản phẩm</h1>  
        <p class="mb-4"><a href="?act=shop">Cửa hàng</a> / <strong>Chi tiết sản phẩm</strong></p>        
      </div>
    </div>
  </div>
</div>

<!-- Phần Chi Tiết Sản Phẩm với Hình Ảnh Lật -->
<div class="product-detail-section container my-5">
  <div class="row" style="margin-left: 70px; ">
    <!-- Hình ảnh lật -->
    <div class="col-lg-6" style="margin-top: 30px;">
      <div class="flip-image-container">
        <div class="hot">
          <div class='content'>HOT</div>
      </div>
        <div class="flip-image">
          <img src="public/<?= $data['Image'] ?>" alt="Ảnh trước" class="front-img">
          <img src="public/<?= $data['Image2'] ?>" alt="Ảnh sau" class="back-img">
        </div>
      </div>
    </div>

    <!-- Thông tin chi tiết sản phẩm -->
    <div class="col-lg-6">
    <div class="row">
     <div class="col-md-12 text-left mb-2" style="margin-top: 30px;">
        <h2 class="text-black h2 text-uppercase"><b style="color: #a35f0c;"><?= $data['ProductName'] ?></b></h2>
     </div>
   </div>  
      <p class="price"><h3 style="color: green;"><b><?=number_format($data['Price'])?> VNĐ</b></h3></p>

      <div class="product-description">
          <p><b>Mã giảm giá: </b></label> <?= $data['PromotionID'] ?></p>
          <p><b>Số lượng: </b></label> <?= $data['Quantity'] ?></p>
          <p><b>Nguồn gốc: </b></label> <?= $data['Origin'] ?></p>
          <p><b>Chất liệu: </b></label> <?= $data['Material'] ?></p>
          <p><b>Mô tả: </b><?=$data['Description']?></p>
      </div>
      

     
      <!-- Chọn kích thước -->
      <!-- <div class="product-option mb-3">
      <h4><label for="">Kích thước: </label> </h4>
      <div class="size-options">
          <button class="size-btn">S</button>
          <button class="size-btn">M</button>
          <button class="size-btn">L</button>
          <button class="size-btn">XL</button>
        </div>
      </div> -->

      <!-- Chọn màu sắc -->
      <!-- <div class="product-option mb-3">
        <h4><label for="color">Màu sắc:</label></h4>
        <div class="color-options">
          <button class="color-btn" style="background-color: red;" title="Đỏ"></button>
          <button class="color-btn" style="background-color: blue;" title="Xanh"></button>
          <button class="color-btn" style="background-color: black;" title="Đen"></button>
          <button class="color-btn" style="background-color: white; border: 1px solid #ccc;" title="Trắng"></button>
        </div>
      </div> -->

      <!-- Chọn số lượng -->
      <!-- <div class="product-option mb-3">
      <h4><label for="quantity">Số lượng:</label></h4>
        <input type="number" id="quantity" class="form-control quantity-input" min="1" value="1" style="width: 50%;">
      </div> -->

      <a href="?act=cart&xuli=add&id=<?=$data['ProductID']?>"><button class="btn btn-primary mt-3">Thêm vào giỏ hàng</button>
      </a>
    </div>
  </div>
</div>


<!-- Mô tả sản phẩm -->

<!-- Phần Bình luận và đánh giá sản phẩm -->
<div class="product-review container my-5">
    <h3><b>Bình luận và đánh giá</b></h3>
    
    <!-- Đánh giá sản phẩm -->
    <div class="rating">
        <label for="rating"><b>Đánh giá sản phẩm: </b></label>
        <div class="stars">
            <i class="fa fa-star" style="color: #FFD700;"></i>
            <i class="fa fa-star" style="color: #FFD700;"></i>
            <i class="fa fa-star" style="color: #FFD700;"></i>
            <i class="fa fa-star-half-alt" style="color: #FFD700;"></i>
            <i class="fa fa-star-half-alt" style="color: #FFD700;"></i>
        </div>
        <p><b>Đánh giá của bạn:</b></p>
        <textarea class="form-control" rows="3" placeholder="Viết bình luận của bạn ở đây..."></textarea>
        <button class="btn btn-primary mt-3">Gửi đánh giá</button>
    </div>

    <!-- Danh sách các bình luận của khách hàng -->
    <div class="comments mt-5">
        <div class="comment">
        <div class="comment-header">
            <img src="public/images/banner/style.jpg" alt="Avatar" class="avatar">
            <p><b>Nguyễn Văn A</b> - 20/11/2024</p>
        </div>
            <div class="stars">
                <i class="fa fa-star" style="color: #FFD700;"></i>
                <i class="fa fa-star" style="color: #FFD700;"></i>
                <i class="fa fa-star" style="color: #FFD700;"></i>
                <i class="fa fa-star-half-alt" style="color: #FFD700;"></i>
                <i class="fa fa-star-half-alt" style="color: #FFD700;"></i>
            </div>
            <p>Sản phẩm tuyệt vời, chất lượng cao và đúng mô tả!</p>
        </div>
    </div>
</div>





<div class="untree_co-section"> 
    <div class="container">
        
       <div class="row mb-5 align-items-center">
          <div class="col-md-6"><h1 class="h3"><b>Sản phẩm tương tự</b></h1>  </div> 
          <div class="col-sm-6 carousel-nav text-sm-right">
            <a href="#" class="prev js-custom-prev-v2">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path fill-rule="evenodd" d="M8.354 11.354a.5.5 0 0 0 0-.708L5.707 8l2.647-2.646a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708 0z"/>
                <path fill-rule="evenodd" d="M11.5 8a.5.5 0 0 0-.5-.5H6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5z"/>
              </svg>
            </a>
            <a href="#" class="next js-custom-next-v2">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path fill-rule="evenodd" d="M7.646 11.354a.5.5 0 0 1 0-.708L10.293 8 7.646 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z"/>
                <path fill-rule="evenodd" d="M4.5 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z"/>
              </svg>
            </a>
          </div>
        </div> <!-- /.heading -->


        <div class="owl-3-slider owl-carousel">
          <?php foreach ($data_lq as $row) { ?>
          <div class="item">
            <div class="product-item"> 
              <a href="shop-single.html" class="product-img">
                  <div class="label sale top-right"><div class='content'>Sale</div> </div>
                  <a href="?act=detail&id=<?= $row['ProductID'] ?>"><img src="public/<?= $row['Image'] ?>" alt="Image" class="img-fluid" style="border-radius:10px;"/></a>
                  <div class="overlay">
                      <div class="icons">
                          <a href="?act=detail&id=<?=$row['ProductID']?>" class="favorite"><i class="fa-solid fa-eye"></i></a>
                          <a href="?act=detail&id=<?= $row['ProductID'] ?>" class="add-to-cart"><i class="fa fa-shopping-cart"></i></a>
                      </div>
                  </div>
              </a>
              <p style="font-size: 19px; margin-top: 20px;"><a href="?act=detail&id=<?=$row['ProductID']?>"><?=$row['ProductName']?></a></p>
              <div class="rating" style="color: #FFD700;">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-half-alt"></i>
              </div>
              <div class="price"><span><?=number_format($row['Price'])?> VNĐ</span></div>
            </div>
          </div> <!-- /.item -->
          <?php } ?>
        </div>


    </div> 
</div>




<!-- 
Loading -->
    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>

    <?php } else {
    require_once("Views/error-404.php");
} ?>

<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId: '2652621865018691',
            xfbml: true,
            version: 'v7.0'
        });
        FB.AppEvents.logPageView();
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<!-- quick view end -->