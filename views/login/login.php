<section class="vh-100" style="background-color: #FFFFFF; margin-top: 70px; margin-bottom: 70px;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="public/images/page/mau1.jpg" alt="login form" class="img-fluid" style="height: 100%; object-fit: cover;" />
                        </div>

                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                                <form action="?act=taikhoan&xuli=dangnhap" method="post" id="form1">

                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <img src="public/images/logo/logo2.png" alt="Logo" style="width: 50px; height: auto;">
                                        <span class="h1 fw-bold mb-0">Aura Fashion <h4 class="fw-normal mb pb-3" style="letter-spacing: 1px;">Đăng nhập</h4></span> 
                                        </div>

                                    <div class="form-outline mb-4">
                                        <p>Nếu bạn đã có tài khoản, vui lòng đăng nhập!</p>
                                        <?php if (isset($_COOKIE['msg1'])) { ?>
                                            <div class="alert alert-success">
                                                <strong>Thông báo</strong> <?= $_COOKIE['msg1'] ?>
                                            </div>
                                        <?php } ?>
                                
                                        <div class="form-outline mb-4">
                                            <input type="text" name="taikhoan" id="form2ExampleName" class="form-control form-control-lg" placeholder="" required />
                                            <label class="form-label" for="form2ExampleName">Tên Đăng Nhập</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" name="matkhau" id="form2Example27" class="form-control form-control-lg" required />
                                            <label class="form-label" for="form2Example27">Mật khẩu</label>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit" name="submit">Đăng nhập</button>
                                        </div>

                                        <a class="small text-muted" href="?act=taikhoan&xuli=quenmatkhau">Quên mật khẩu?</a>
                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Bạn chưa có tài khoản? <a href="?act=taikhoan&xuli=dangky" style="color: #393f81;">Đăng kí tại đây</a></p>
                                        <a href="#!" class="small text-muted">Điều khoản sử dụng.</a>
                                        <a href="#!" class="small text-muted">Chính sách bảo mật</a>

                                        </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
