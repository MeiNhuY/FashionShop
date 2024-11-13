<!-- Banner Phần Chi Tiết Sản Phẩm -->
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
  <div class="row" style="margin-left: 70px;">
    <!-- Hình ảnh lật -->
    <div class="col-lg-6">
      <div class="flip-image-container">
        <div class="flip-image">
          <img src="public/images/banner/style.jpg" alt="Ảnh trước" class="front-img">
          <img src="public/images/banner/style_seoul.jpg" alt="Ảnh sau" class="back-img">
        </div>
      </div>
    </div>

    <!-- Thông tin chi tiết sản phẩm -->
    <div class="col-lg-6">
    <div class="row">
     <div class="col-md-12 text-left mb-2">
        <h3 class="text-black h4 text-uppercase">Váy họa tiết chấm bi</h3>
     </div>
   </div>  
      <p class="price"><h4><b>Giá: 1.200.000Đ</b></h4></p>
      <label for=""><b>Mô tả:</b></label>
      <ul class="description">
        <li>Chất liệu: vải đũi mềm mịn không kích ứng da.</li>
        <li>Brand: Lseoul</li>
        <li>Số lượng: 200</li>
        <li>Xuất xứ: Việt Nam</li>
      </ul>
      <label for=""><b>Đánh giá:</b></label>
      <div class="rating" style="color: #FFD700;">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-alt"></i> <!-- half-star for 4.5 rating, or use fa-star for full -->
      </div>
      <!-- Chọn kích thước -->
      <div class="product-option mb-3">
        <label for="size">Kích thước:</label>
        <div class="size-options">
          <button class="size-btn">S</button>
          <button class="size-btn">M</button>
          <button class="size-btn">L</button>
          <button class="size-btn">XL</button>
        </div>
      </div>

      <!-- Chọn màu sắc -->
      <div class="product-option mb-3">
        <label for="color">Màu sắc:</label>
        <div class="color-options">
          <button class="color-btn" style="background-color: red;" title="Đỏ"></button>
          <button class="color-btn" style="background-color: blue;" title="Xanh"></button>
          <button class="color-btn" style="background-color: black;" title="Đen"></button>
          <button class="color-btn" style="background-color: white; border: 1px solid #ccc;" title="Trắng"></button>
        </div>
      </div>

      <!-- Chọn số lượng -->
      <div class="product-option mb-3">
        <label for="quantity">Số lượng:</label>
        <input type="number" id="quantity" class="form-control quantity-input" min="1" value="1" style="width: 50%;">
      </div>

      <a href="?act=cart"><button class="btn btn-primary mt-3">Thêm vào giỏ hàng</button>
      </a>
    </div>
  </div>
</div>




<div class="untree_co-section">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="col-md-6">
            <h1 class="h3"><b>Sản phẩm phổ biến</b></h1>        
          </div>
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
          <div class="item">
            <div class="product-item">
              <a href="shop-single.html" class="product-img">
                <div class="label sale top-right">
                  <div class='content'>Sale</div>
                </div>
                <img src="public/images/products/watch-1-min.jpg" alt="Image" class="img-fluid">
                <div class="overlay">
                          <div class="icons">
                              <a href="?act=shop-single" class="favorite"><i class="fa-solid fa-eye"></i></a>
                              <a href="?act=cart" class="add-to-cart">
                                  <i class="fa fa-shopping-cart"></i>
                                  <span class="cart-count">1</span>
                              </a>
                          </div>
                      </div>
              </a>
              <h3 class="title"><a href="#">The Murray</a></h3>
              <div class="price">
                <del>£99.00</del> &mdash; <span>£69.00</span>
              </div>
            </div>
          </div> <!-- /.item -->


          <div class="item">
            <div class="product-item">
              <a href="shop-single.html" class="product-img">

                <div class="label new top-right">
                  <div class='content'>New</div>
                </div>
                <img src="public/images/products/jacket-1-min.jpg" alt="Image" class="img-fluid">
                <div class="overlay">
                          <div class="icons">
                              <a href="?act=shop-single" class="favorite"><i class="fa-solid fa-eye"></i></a>
                              <a href="?act=cart" class="add-to-cart">
                                  <i class="fa fa-shopping-cart"></i>
                                  <span class="cart-count">1</span>
                              </a>
                          </div>
                      </div>
              </a>
              <h3 class="title"><a href="#">Dark Jacket</a></h3>
              <div class="price">
                <span>£69.00</span>
              </div>
            </div>
          </div> <!-- /.item -->


          <div class="item">
            <div class="product-item">
              <a href="shop-single.html" class="product-img">
                <div class="label new top-right">
                  <div class='content'>New</div>
                </div>

                <div class="label sale top-right second">
                  <div class='content'>Sale</div>
                </div>
                <img src="public/images/products/bottoms-1-min.jpg" alt="Image" class="img-fluid">
                <div class="overlay">
                          <div class="icons">
                              <a href="?act=shop-single" class="favorite"><i class="fa-solid fa-eye"></i></a>
                              <a href="?act=cart" class="add-to-cart">
                                  <i class="fa fa-shopping-cart"></i>
                                  <span class="cart-count">1</span>
                              </a>
                          </div>
                      </div>
              </a>
              <h3 class="title"><a href="#">Chino Bottoms</a></h3>
              <div class="price">
                <del>£99.00</del> &mdash; <span>£69.00</span>
              </div>
            </div>
          </div> <!-- /.item -->

          <div class="item">
            <div class="product-item">
              <a href="shop-single.html" class="product-img">
                <img src="public/images/products/sock-1-min.jpg" alt="Image" class="img-fluid">
                <div class="overlay">
                          <div class="icons">
                              <a href="?act=shop-single" class="favorite"><i class="fa-solid fa-eye"></i></a>
                              <a href="?act=cart" class="add-to-cart">
                                  <i class="fa fa-shopping-cart"></i>
                                  <span class="cart-count">1</span>
                              </a>
                          </div>
                      </div>
              </a>
              <h3 class="title"><a href="#">The Modern Sock</a></h3>
              <div class="price">
                <span>£29.00</span>
              </div>
            </div>
          </div> <!-- /.item -->

        </div>
      </div> 
    </div>

    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>

