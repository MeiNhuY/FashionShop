<div class="page-heading bg-light" style="background-image: url('public/images/page/banner5.png'); background-size: cover; height: 400px;">
  <div class="container">
    <div class="row align-items-end text-center">
      <div class="col-lg-7 mx-auto">
        <h1>Liên hệ</h1>  
        <p class="mb-4"><a href="index.php">Trang chủ</a> / <strong>Liên hệ</strong></p>        
      </div>
    </div>
  </div>
</div>

<div class="untree_co-section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-lg-4 mb-5 order-2 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
        <div class="contact-info">
          <div class="address mt-4">
            <i class="icon-room"></i>
            <h4 class="mb-2">Địa chỉ</h4>
            <p>152, Hai Phong, Thach Thang, Hai Chau, Da Nang, Viet Nam</p>
          </div>
          <div class="open-hours mt-4">
            <i class="icon-clock-o"></i>
            <h4 class="mb-2">Giờ mở cửa:</h4>
            <p>Sunday-Friday: 7:00 AM - 23:00 PM</p>
          </div>
          <div class="email mt-4">
            <i class="icon-envelope"></i>
            <h4 class="mb-2">Email:</h4>
            <p>Aurafashion@gmail.com</p>
          </div>
          <div class="phone mt-4">
            <i class="icon-phone"></i>
            <h4 class="mb-2">SĐT</h4>
            <p>0999003777</p>
          </div>
        </div>
      </div>
      <div class="col-lg-7 mr-auto order-1" data-aos="fade-up" data-aos-delay="200">
      <form action="?act=contact&method=gui" method="post">
        <div class="row">
        <div class="col-6 mb-3">
            <input 
                type="text" 
                class="form-control" 
                name="NguoiNhan" 
                placeholder="Họ và tên" 
                value="<?php echo isset($_SESSION['login']) ? $_SESSION['login']['FirstName'] . ' ' . $_SESSION['login']['LastName'] : ''; ?>" 
                required>
        </div>
        <div class="col-6 mb-3">
          <input 
              type="email" 
              class="form-control" 
              name="Email" 
              placeholder="Email" 
              value="<?php echo isset($_SESSION['login']) ? $_SESSION['login']['Email'] : ''; ?>" 
              required>
              </div>
              <div class="col-12 mb-3">
                  <input type="text" class="form-control" name="subject" placeholder="Tiêu đề" required>
              </div>
              <div class="col-12 mb-3">
                  <textarea name="message" cols="30" rows="7" class="form-control" placeholder="Nội dung" required></textarea>
              </div>
              <div class="col-12">
                  <input type="submit" value="Gửi" class="btn btn-primary">
              </div>

      </form>

      </div>
    </div>
  </div>
</div>
<?php 
    require_once 'contact.php';
?>