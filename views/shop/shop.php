<?php foreach ($data_banner as  $value) { 
 if($value['BannerID'] == 2) {?>
<div class="page-heading bg-light animated-banner" style="height: 500px;">
    <div class="slide active" style="background-image: url('public/<?= $value['Image'] ?>'); background-position: cover; "></div>
    <div class="slide" style="background-image: url('public/<?= $value['Image2'] ?>');background-position: auto;"></div>
    <div class="slide" style="background-image: url('public/<?= $value['Image3'] ?>');background-position: auto;"></div>
    <div class="container">
        <div class="row align-items-end text-center">
            <div class="col-lg-7 mx-auto">
                <h1 style="font-size: 50px;"><b>Cửa hàng</b></h1>
                <p class="mb-4" font-size: 30px;><a href="index.php">Trang chủ</a> / <strong>Cửa hàng</strong></p>
            </div>
        </div>
    </div>
</div>
<?php 
    break; // Thoát khỏi vòng lặp sau lần đầu thỏa mãn
    }
}
?>


  <div class="untree_co-section pt-3">
    <div class="container">

      <div class="row align-items-center mb-5">
        <div class="col-lg-8">
          <h2 class="mb-3 mb-lg-0"><b>Sản phẩm</b></h2>
        </div>
        <div class="col-lg-4">
        <div class="d-flex sort align-items-center justify-content-lg-end">
            <strong class="mr-2"><b>Sắp xếp sản phẩm: </b></strong>
            <form action="" method="GET"> 
                <!-- Luôn gửi act=shop -->
                <input type="hidden" name="act" value="shop">
                
                <!-- Select để sắp xếp -->
                <select name="sort" onchange="this.form.submit()">
                    <option value="">Sắp xếp theo</option>
                    <option value="price_low">Giá &lt; 300.000VND</option>
                    <option value="price_high">Giá &gt; 300.000VND</option>
                    <option value="price_asc">Giá: tăng dần</option>
                    <option value="price_desc">Giá: giảm dần</option>
                </select>
            </form>
          </div>
        </div>
      </div>

      <div class="row">

      <div class="col-md-2">
          <?php 
          $i = 1; 
          $displayedNames = []; // Mảng lưu trữ các tên đã hiển thị
          foreach ($data_chitietDM as $row) { ?>
              <ul class="list-unstyled categories">
                  <li>
                      <?php foreach ($row as $value) { 
                          // Kiểm tra nếu tên chưa được hiển thị
                          if (!in_array($value['Name'], $displayedNames)) {
                              echo '<label for="" style="text-transform: uppercase; "><b>' . $value['Name'] . '</b></label>';
                              echo '<hr>';
                              $displayedNames[] = $value['Name']; // Thêm tên vào mảng đã hiển thị
                          }
                      ?>
                          <a href="?act=shop&sp=<?= $value['CategoryID'] ?>&loai=<?= $value['ProductTypeName'] ?>"><?= $value['ProductTypeName'] ?></a>
                      <?php } ?>
                  </li>
              </ul>
          <?php $i++; } ?>
      </div>

        <div class="col-md-10">
            <div class="row" data-aos="fade-up">
              <?php 
              if (isset($data) && $data != NULL) {
                  foreach ($data as $value) {		
              ?>
              <div class="col-6 col-sm-6 col-md-6 mb-4 col-lg-4" data-aos="fade-up">
                <!-- product -->
                <div class="product-item" id="anhshop">
                    <a href="?act=detail&id=<?=$value['ProductID']?>" class="product-img">
                        <div class="label new top-right"><div class='content'><?=$value['PromotionID']?></div></div>
                        <img src="public/<?=$value['Image']?>" alt="Image" class="img-fluid">
                        <div class="overlay">
                            <div class="icons">
                                <a href="?act=detail&xuli=list&id=<?=$value['ProductID']?>" class="favorite"><i class="fa-solid fa-eye"></i></a>
                                
                                <a href="?act=cart&xuli=add&id=<?=$value['ProductID']?>" class="add-to-cart"><i class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                    </a>

                    <p style="font-size: 20px;"><a href="?act=detail&id=<?=$value['ProductID']?>"><?=$value['ProductName']?></a></p>
                    <div class="price"><h5><span><?=number_format($value['Price'])?> VNĐ</span></h5></div>
                    <div class="rating" style="color: #FFD700;">
                    <?php
                      // Kiểm tra nếu không có giá trị averageRating, gán giá trị mặc định là 0
                      $averageRating = isset($value['averageRating']) ? $value['averageRating'] : 0;

                      for ($i = 1; $i <= 5; $i++) {
                          if ($i <= floor($averageRating)) {
                              echo '<i class="fa fa-star"></i>'; // Sao đầy
                          } elseif ($i - $averageRating < 1) {
                              echo '<i class="fa fa-star-half-alt"></i>'; // Sao nửa
                          } else {
                              echo '<i class="fa fa-star-o"></i>'; // Sao trống
                          }
                      }
                      ?>

                    </div>
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


          <div class="row mt-5 pb-5" data-aos="fade-up">
                <div class="col-lg-12">
                    <table class="table-pagination">
                        <tr>
                            <!-- Cột trái -->
                            <td class="left-column"></td>

                            <!-- Cột giữa (Phân trang) -->
                            <td class="center-column">
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
                                        if ($data_tong > 9 && isset($test)) {
                                            parse_str($_SERVER['QUERY_STRING'], $query);
                                            unset($query['trang']);

                                            for ($i = 1; $i <= ceil($data_tong / 9); $i++) { 
                                                if (isset($data)) {
                                                    $query['trang'] = $i;
                                                    $new_query = http_build_query($query);
                                                    ?>
                                                    <li><a href="?<?= $new_query ?>"><?= $i ?></a></li>
                                        <?php   }
                                            }
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
                            </td>

                            <!-- Cột phải -->
                            <td class="right-column"></td>
                        </tr>
                    </table>
                </div>
            </div>



      </div>

      <div class="container">

        <div class="row justify-content-center text-center">  
            <div class="col-lg-6 section-heading" data-aos="fade-up">
              <h3 class="text-center">Sản phẩm bán chạy</h3>
            </div>
        </div>

          <div class="row">
          <?php if (!empty($data_sp_best_seller)): ?>
            <?php foreach ($data_sp_best_seller as $product): ?>
            <div class="col-6 col-sm-6 col-md-6 mb-4 col-lg-4" data-aos="fade-up">
              <div class="product-item">
                <a href="?act=product_detail" class="product-img">

                  <div class="label new top-right">
                    <div class='content'><?=$product['PromotionID']?></div>
                  </div>
                  <img src="public/<?=$product['Image']?>" alt="Image" class="img-fluid">
                  <div class="overlay" style=" margin-top: -30px;">
                  <div class="icons">
                  <a href="?act=detail&id=<?= $product['ProductID'] ?>" class="favorite"><i class="fa-solid fa-eye" style="font-size: 50px;"></i></a>
                    <a href="?act=cart&xuli=add&id=<?= $product['ProductID'] ?>" class="add-to-cart">
                      <i class="fa fa-shopping-cart" style="font-size: 50px;"></i>
                    </a>
                  </div>
                </div>
                </a>
                <p style="font-size: 20px;"><a href="#"><?=$product['ProductName']?></a></p>
                <div class="price">
                  <h5><span><?=$product['Price']?>VND</span></h5>
                </div>
                <div class="rating" style="color: #FFD700;">
                <?php
                      // Kiểm tra nếu không có giá trị averageRating, gán giá trị mặc định là 0
                      $averageRating = isset($product['averageRating']) ? $product['averageRating'] : 0;

                      for ($i = 1; $i <= 5; $i++) {
                          if ($i <= floor($averageRating)) {
                              echo '<i class="fa fa-star"></i>'; // Sao đầy
                          } elseif ($i - $averageRating < 1) {
                              echo '<i class="fa fa-star-half-alt"></i>'; // Sao nửa
                          } else {
                              echo '<i class="fa fa-star-o"></i>'; // Sao trống
                          }
                      }
                      ?>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
              <?php else: ?>
                <p>Không có sản phẩm mới.</p>
            <?php endif; ?>
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
        <?php foreach ($data_banner as  $value) { 
          if($value['BannerID'] == 2) {?>
        <ul class="image-list">
          <img class="image-item" src="public/<?= $value['Image4'] ?>" alt="img-1" />
          <img class="image-item" src="public/<?= $value['Image2'] ?>" alt="img-2" />
          <img class="image-item" src="public/<?= $value['Image5'] ?>" alt="img-3" />
          <img class="image-item" src="public/<?= $value['Image6'] ?>" alt="img-4" />
          <img class="image-item" src="public/<?= $value['Image'] ?>" alt="img-5" />
          <img class="image-item" src="public/<?= $value['Image7'] ?>" alt="img-6" />
          <img class="image-item" src="public/<?= $value['Image8'] ?>" alt="img-7" />
          <img class="image-item" src="public/<?= $value['Image9'] ?>" alt="img-8" />
          <img class="image-item" src="public/<?= $value['Image10'] ?>" alt="img-9" />
          <img class="image-item" src="public/<?= $value['Image4'] ?>" alt="img-10" />
        </ul>
        <?php 
              break; // Thoát khỏi vòng lặp sau lần đầu thỏa mãn
              }
          }
          ?>
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
        <div class="row mb-5 align-items-center" data-aos="fade-up">
          <div class="col-md-6">
            <h1 class="h3"><b>Sản phẩm mới nhất</b></h1>        
          </div>
          <div class="col-sm-6 carousel-nav text-sm-right" >
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
       
        <div class="owl-carousel owl-theme owl-3-slider">
          <?php if (!empty($data_sanpham1)): ?>
            <?php foreach ($data_sanpham1 as $product): ?>
              <div class="item">
                <div class="product-item">
                  <!-- Hình ảnh sản phẩm -->
                  <div class="label new top-right"><div class='content'><?=$product['PromotionID']?></div></div>
                  <a href="?act=detail&id=<?= $product['ProductID'] ?>" class="product-img">
                    <img src="public/<?= $product['Image'] ?>" alt="<?= $product['ProductName'] ?>" class="img-fluid" style="border-radius: 10px;"/>
                    <div class="overlay" style=" margin-top: -30px;">
                      <div class="icons">
                        <a href="?act=detail&id=<?= $product['ProductID'] ?>" class="favorite"><i class="fa-solid fa-eye" style="font-size: 50px;"></i></a>
                        <a href="?act=cart&xuli=add&id=<?= $product['ProductID'] ?>" class="add-to-cart"><i class="fa fa-shopping-cart" style="font-size: 50px;"></i></a>
                      </div>
                    </div>
                  </a>
                  <!-- Tên sản phẩm -->
                  <p style="font-size: 19px; margin-top: 20px;">
                    <a href="?act=detail&id=<?= $product['ProductID'] ?>"><?= $product['ProductName'] ?></a>
                  </p>
                  <!-- Giá sản phẩm -->
                  <div class="price"><h5><span><?= number_format($product['Price']) ?> VNĐ</span></h5></div>
                  <!-- Đánh giá -->
                  <div class="rating" style="color: #FFD700;">
                  <?php
                      // Kiểm tra nếu không có giá trị averageRating, gán giá trị mặc định là 0
                      $averageRating = isset($product['averageRating']) ? $product['averageRating'] : 0;

                      for ($i = 1; $i <= 5; $i++) {
                          if ($i <= floor($averageRating)) {
                              echo '<i class="fa fa-star"></i>'; // Sao đầy
                          } elseif ($i - $averageRating < 1) {
                              echo '<i class="fa fa-star-half-alt"></i>'; // Sao nửa
                          } else {
                              echo '<i class="fa fa-star-o"></i>'; // Sao trống
                          }
                      }
                      ?>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <p>Không có sản phẩm mới.</p>
          <?php endif; ?>
        </div>


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
