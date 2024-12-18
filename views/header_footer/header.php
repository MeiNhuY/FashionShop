<div class="search-form" id="search-form">
		<form action="?act=shop" method="post">
			<input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm...">
			<button class="button" type="submit">
				<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
					<path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
				</svg>
			</button>
			<button class="button">
				<div class="close-search">
					<span class="icofont-close js-close-search"></span>
				</div>
			</button>
		</form>
	</div>

	<div class="site-mobile-menu">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close">
				<span class="icofont-close js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body"></div>
	</div>



	<nav class="site-nav mb-5">
		<div class="sticky-nav js-sticky-header">

			<div class="container position-relative">
				<div class="site-navigation text-center dark">
					<a href="?act=home" class="logo menu-absolute m-0">Aura Fashion<span class="text-primary"></span></a>

					<ul class="js-clone-nav pl-0 d-none d-lg-inline-block site-menu">
						<li class="active"><a href="?act=home">Trang Chủ</a></li>
						<li class="has-children" >
							<a href="?act=shop">Cửa Hàng</a>
							<ul class="dropdown">
									<li class="has-children"><a href="?act=shop&sp=1">Áo</a></li>
									<li class="has-children"><a href="?act=shop&sp=3">Váy</a></li>
									<li class="has-children"><a href="?act=shop&sp=2">Quần</a></li>
							</ul>
						</li>

						<li><a href="?act=shop&gtinh=1">Thời Trang Nam</a></li>
						<li><a href="?act=shop&gtinh=0">Thời Trang Nữ</a></li></li>

						
						<li class="has-children">
							<a href="?act=page">Chi Tiết</a>
							<ul class="dropdown">
								<li><a href="?act=intro">Giới Thiệu</a></li>
								<li><a href="?act=contact">Liên Hệ</a></li>
								<li><a href="?act=cart">Giỏ Hàng</a></li>
								<li><a href="?act=checkout">Thanh Toán</a></li>
								
						
							</ul>
						</li>


						
					</ul>

					<div class="menu-icons">

						<a href="#" class="btn-custom-search" id="btn-search">
							<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
								<path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
							</svg>
						</a>


						<div class="profile-dropdown">
					<a href="?act=taikhoan" class="user-profile">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
						</svg>
					</a>
					<ul class="dropdown-menu">
						<?php if (isset($_SESSION['login'])) { ?>
							<li><b>Chào <?=$_SESSION['login']['Username']?></b></li>
							<li><a href="?act=taikhoan&xuli=account">Tài khoản</a></li>
							<li><a href="?act=taikhoan&xuli=dangxuat">Đăng xuất</a></li>
							<?php if (isset($_SESSION['isLogin_Admin'])) { ?>
								<li><a href="admin/?mod=login">Trang quản lý</a></li>
							<?php } ?>
						<?php } else { ?>
							<li><b>Khách hàng</b></li>
							<li><a href="?act=taikhoan&xuli=login">Đăng nhập</a></li>
						<?php } ?>
					</ul>
				</div>

							

						<a href="?act=cart" class="cart">
							<span class="item-in-cart">
								<?php 
								$soluong = 0;
								$thanhtien = 0;
								if(isset($_SESSION['product'])){
								foreach ($_SESSION['product'] as $value) {
									$soluong +=1;
								}}
							?>
                        	<?= $soluong ?>
							</span>
							<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
							</svg>
						</a>

					</div>
						
				


					<a href="?act=home" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none" data-toggle="collapse" data-target="#main-navbar">
						<span></span>
					</a>

				</div>
			</div>
		</div>
	</nav>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
    const menuItems = document.querySelectorAll('.site-menu > li > a');
    menuItems.forEach(item => {
        if (item.href === window.location.href) {
            item.parentElement.classList.add('active');
        } else {
            item.parentElement.classList.remove('active');
        }
    });
});

	</script>