	 
<head><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
</head>

	<div class="owl-carousel owl-single home-slider">
		<div class="item">
			<div class="untree_co-hero" style="background-image: url('public/images/banner/slider.jpg');">
				<div class="container">		
					<div class="row align-items-center">
						<div class="col-lg-6">
						
							<h1 class="mb-4 heading" data-aos="fade-up" data-aos-duration="300">Hãy để<a href="index.php"> Aura Fashion</a> có cơ hội phục vụ bạn</h1>
							<div class="mb-5 text-white desc mx-auto" data-aos="fade-up" >
							</div>
							

							<p class="mb-0" data-aos="fade-up" data-aos-delay="30"><a href="?act=shop" class="btn btn-outline-black">Khám phá</a></p>

						</div>
					</div>
				</div>
			</div> 
		</div>


		<div class="item">
			<div class="untree_co-hero" style="background-image: url('public/images/banner/balace.jpg');">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-6">

							<h1 class="mb-4 heading" data-aos="fade-up" data-aos-delay="100">Tự tin thể hiện phong cách của bạn bởi <a href="index.php">Aura Fashion</a></h1>
							<div class="mb-5 text-white desc mx-auto" data-aos="fade-up" data-aos-delay="200">
							</div>

							<p class="mb-0" data-aos="fade-up" data-aos-delay="300"><a href="?act=shop" class="btn btn-outline-black">Khám phá</a></p>

						</div>
					</div>
				</div>
			</div> 
		</div>	
	</div>


<!-- Room -->
<div class="untree_co--site-section float-left pb-0 featured-rooms">

    <div class="row justify-content-center text-center">  
        <div class="col-lg-6 section-heading" data-aos="fade-up">
            <h3 class="text-center">Xu hướng thời trang</h3>
        </div>
    </div>

    <div class="container-fluid pt-5">
        <div class="suite-wrap overlap-image-1">
            <div class="suite">
                <div class="image-stack">
                    <div class="image-stack-item image-stack-item-top" data-jarallax-element="-50">
                        <div class="overlay"></div>
                        <img src="public/images/page/maunam.jpg" alt="Image" class="img-fluid pic1">
                    </div>
                    <div class="image-stack-item image-stack-item-bottom">
                        <div class="overlay"></div>
                        <img src="public/images/page/maunu.jpg" alt="Image" class="img-fluid pic2">
                    </div>
                </div>
            </div> 

            <div class="suite-contents" data-jarallax-element="50">
                <h2 class="suite-title" >Thời trang Nam</h2>
                <div class="suite-excerpt">
                    <p>Mẫu mã đa dạng, năng động. </p>
                    <p><a href="#" class="readmore"></a></p>
                </div>
				<h2 class="suite-title">Thời trang Nữ</h2>
                <div class="suite-excerpt">
                    <p>Thiết kế tinh tế giúp tôn lên dáng vóc của bạn. Chất liệu đột phá thông minh mang đến sự mềm mại</p>
                    <p><a href="#" class="readmore"></a></p>
                </div>
            </div>
        </div>
    </div>
</div>



	<!-- product1 -->
	<div class="untree_co-section" id="khoangcach1">
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
						<div class="rating" style="color: #FFD700;">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-half-alt"></i> <!-- half-star for 4.5 rating, or use fa-star for full -->
						</div>
						<h3 class="title"><a href="#"><?=$product['ProductName']?></a></h3>
						<div class="price">
							<span><?=$product['Price']?></span>
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
	
<!-- Product Mới nhất--> 
<div class="untree_co-section" style="padding-bottom: 40%spx;">
    <div class="container">
	  <div class="row justify-content-center text-center">  
					<div class="col-lg-6 section-heading" data-aos="fade-up">
						<h3 class="text-center">Sản phẩm mới nhất</h3>
					</div>
				</div>
        <div class="row mb-5 align-items-center" data-aos="fade-up">
          <div class="col-md-6">  </div>
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
							<div class="price"><span><?= number_format($product['Price']) ?> VNĐ</span></div>
							<!-- Đánh giá -->
							<div class="rating" style="color: #FFD700;">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half-alt"></i>
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






	<!-- giữ khoảng cách -->
	<div class="untree_co-section" id="khoangcach2">
	</div> 
	<div id="overlayer"></div>
	
	
	<!-- loading -->
    <div class="loader">
      <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>


<script>
    AOS.init();
</script>