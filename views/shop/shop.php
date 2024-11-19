<div class="page-heading bg-light animated-banner" style="height: 500px;">
    <div class="slide active" style="background-image: url('public/images/banner/man_style.jpg'); background-position: cover; "></div>
    <div class="slide" style="background-image: url('public/images/banner/style_seoul.jpg');background-position: auto;"></div>
    <div class="slide" style="background-image: url('public/images/banner/clothes.jpg');background-position: auto;"></div>
    <div class="container">
        <div class="row align-items-end text-center">
            <div class="col-lg-7 mx-auto">
                <h1 style="font-size: 50px;"><b>Cửa hàng</b></h1>
                <p class="mb-4" font-size: 30px;><a href="index.php">Trang chủ</a> / <strong>Cửa hàng</strong></p>
            </div>
        </div>
    </div>
</div>


  <div class="untree_co-section pt-3">
    <div class="container">

      <div class="row align-items-center mb-5">
        <div class="col-lg-8">
          <h2 class="mb-3 mb-lg-0"><b>Sản phẩm</b></h2>
        </div>
        <div class="col-lg-4">
        <div class="d-flex sort align-items-center justify-content-lg-end">
            <strong class="mr-2"><b>Sắp xếp sản phẩm:</b></strong>
            <form action="#">
              <select class="" required>
                <option value="1">Sản phẩm mới nhất</option>
                <option value="2">Sản phẩm bán chạy</option>
                <option value="3">Giá: tăng dần</option>
                <option value="4">Giá: giảm dần</option>
              </select>

            </form>
          </div>
        </div>
      </div>

      <div class="row">

      <div class="col-md-2">
        <?php    $i = 1; foreach ($data_chitietDM as $row) { ?>

          <ul class="list-unstyled categories">
          
            <li>
              <?php foreach ($row as $value) { ?>
                <a href="?act=shop&sp=<?= $value['CategoryID'] ?>&loai=<?= $value['ProductTypeName'] ?>"><?= $value['ProductTypeName'] ?></a>
              <?php } ?>
            </li>

          </ul>
          <?php $i++;
             } ?>
        </div>
        <div class="col-md-10">
            <div class="row">
              <?php 
              if (isset($data) && $data != NULL) {
                  foreach ($data as $value) {		
              ?>
              <div class="col-6 col-sm-6 col-md-6 mb-4 col-lg-4">
                <!-- product -->
                <div class="product-item">
                    <a href="?act=detail&id=<?=$value['ProductID']?>" class="product-img">
                        <div class="label new top-right"><div class='content'>New</div></div>
                        <img src="public/<?=$value['Image']?>" alt="Image" class="img-fluid">
                        <div class="overlay">
                            <div class="icons">
                                <a href="?act=detail&id=<?=$value['ProductID']?>" class="favorite"><i class="fa-solid fa-eye"></i></a>
                                <a href="?act=detail&id=<?= $value['ProductID'] ?>" class="add-to-cart"><i class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                    </a>

                    <p><a href="?act=detail&id=<?=$value['ProductID']?>"><?=$value['ProductName']?></a></p>
                    <div class="rating" style="color: #FFD700;">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-alt"></i>
                    </div>
                    <h3 class="title"><a href="?act=detail&id=<?=$value['ProductID']?>"><?=$value['ProductName']?></a></h3>
                    <div class="price"><span><?=number_format($value['Price'])?> VNĐ</span></div>
                </div>
              </div>
              <?php 
                  }
              } else {
                  echo '<p> KHÔNG CÓ DỮ LIỆU </p>';
              }
              ?>
            </div>
          </div>


          <div class="row mt-5 pb-5">
            <div class="col-lg-12">
              <div class="custom-pagination">
                <ul class="list-unstyled">
                  <li>
                    <a href="#">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.854 4.646a.5.5 0 0 1 0 .708L3.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0z"/>
                        <path fill-rule="evenodd" d="M2.5 8a.5.5 0 0 1 .5-.5h10.5a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                      </svg>                      
                    </a>
                  </li>

                  <?php 
                  if ($data_tong > 9 and isset($test)) {
										for ($i = 1; $i <= $data_tong / 9; $i++) { ?>
                      <li><a href="?act=shop&trang=<?= $i ?>"><?= $i ?></a></li>
                  <?php }
									}
									?>
                  
                  <li>
                    <a href="#">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L12.793 8l-2.647-2.646a.5.5 0 0 1 0-.708z"/>
                        <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5H13a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8z"/>
                      </svg>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>


      </div>
    </div> <!-- /.untree_co-section -->

    <div class="container">
    <div class="row justify-content-center text-center pt-0 pb-5">  
              <div class="col-lg-6 section-heading" data-aos="fade-up">
                <h3 class="text-center"><b>Aura Fashion</b></h3>
              </div>
            </div>
      <div class="slider-wrapper">
        <button id="prev-slide" class="slide-button material-symbols-rounded">
          chevron_left
        </button>
        <ul class="image-list">
          <img class="image-item" src="public/images/banner/Lseoul.jpg" alt="img-1" />
          <img class="image-item" src="public/images/banner/style_seoul.jpg" alt="img-2" />
          <img class="image-item" src="public/images/banner/slider.jpg" alt="img-3" />
          <img class="image-item" src="public/images/banner/style.jpg" alt="img-4" />
          <img class="image-item" src="public/images/banner/man_style.jpg" alt="img-5" />
          <img class="image-item" src="public/images/banner/style_seoul2.jpg" alt="img-6" />
          <img class="image-item" src="public/images/banner/walk_style.jpg" alt="img-7" />
          <img class="image-item" src="public/images/banner/style_winter.jpg" alt="img-8" />
          <img class="image-item" src="public/images/banner/kendall.jpg" alt="img-9" />
          <img class="image-item" src="public/images/banner/Lseoul.jpg" alt="img-10" />
        </ul>
        <button id="next-slide" class="slide-button material-symbols-rounded">
          chevron_right
        </button>
      </div>
      <div class="slider-scrollbar">
        <div class="scrollbar-track">
          <div class="scrollbar-thumb"></div>
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
              <a href="product_detail.php" class="product-img">
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
              <a href="product_detail.php" class="product-img">

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
              <a href="product_detail.php" class="product-img">

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
              <a href="product_detail.php" class="product-img">
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

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/custom.js"></script>
    
  </body>

  </html>
