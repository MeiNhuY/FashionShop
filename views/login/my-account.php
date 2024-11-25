<section class="vh-100" style="background-color: #FFFFFF; margin-top: 70px; margin-bottom:300px;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card">
                    <div class="row g-0">
                        <!-- Cột trái: Nhập thông tin -->
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                                <div class="d-flex align-items-center mb-3 pb-1">
                                <img src="public/images/logo/logo2.png" alt="Logo" style="width: 50px; height: auto;">
                                <span class="h1 fw-bold mb-0">Aura Fashion <h4 class="fw-normal mb pb-3" style="letter-spacing: 1px;">Tài khoản của bạn</h4></span> 
                                </div>
                                <!-- Form Cập Nhật Thông Tin -->
                                <h4 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Cập nhật thông tin cá nhân</h4>
                                <form action="?act=taikhoan&xuli=update" method="post" id="form1">

                                    <div class="form-outline mb-4">
                                        <?php if (isset($_COOKIE['msg1'])) { ?>
                                            <div class="alert alert-success">
                                                <strong>Thông báo</strong> <?= $_COOKIE['msg1'] ?>
                                            </div>
                                        <?php } ?>

                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form2ExampleName">Họ</label>
                                                <input type="text" name="Ho" class="form-control form-control-lg" placeholder="Họ" value="<?= $data['FirstName'] ?>" required />
                                            </div>

                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form2ExampleName">Tên</label>
                                                <input type="text" name="Ten" class="form-control form-control-lg" placeholder="Tên" value="<?= $data['LastName'] ?>" required />
                                            </div>

                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form2ExampleName">Tên Người Dùng</label>
                                                <input type="text" name="TaiKhoan" class="form-control form-control-lg" placeholder="Tên người dùng" value="<?= $data['Username'] ?>" required />
                                            </div>

                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form2ExamplePhone">Số Điện Thoại</label>
                                                <input type="tel" name="SĐT" class="form-control form-control-lg" placeholder="Số điện thoại" value="<?= $data['PhoneNumber'] ?>" required />
                                            </div>

                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form2ExampleAddress">Địa Chỉ</label>
                                                <input type="text" name="DiaChi" class="form-control form-control-lg" placeholder="Địa chỉ" value="<?= $data['Address'] ?>" required />
                                            </div>

                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form2Example17">Email</label>
                                                <input
                                                    type="email"
                                                    name="Email"
                                                    class="form-control form-control-lg"
                                                    pattern="[a-zA-Z0-9._%+-]+@gmail\.com"
                                                    title="Hãy nhập đúng địa chỉ email '@gmail.com'"
                                                    placeholder="example@gmail.com"
                                                    value="<?= $data['Email'] ?>"
                                                    required
                                                />
                                            </div>

                                            <div class="pt-1 mb-4">
                                                <button class="btn btn-dark btn-lg btn-block" type="submit" name="submit">Cập nhật</button>
                                            </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Cột phải: Đổi mật khẩu -->
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black" style="margin-top: -195px;">
                                <!-- Form Đổi Mật Khẩu -->
                                <h4 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Đổi mật khẩu</h4>
                                <form action="?act=taikhoan&xuli=update" method="post" id="form2">
                                <div class="form-outline mb-4">
                                        <?php if (isset($_COOKIE['msg1'])) { ?>
                                            <div class="alert alert-success">
                                                <strong>Thông báo</strong> <?= $_COOKIE['msg1'] ?>
                                            </div>
                                        <?php } ?>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="oldPassword">Mật khẩu cũ</label>
                                            <input type="password" name="MatKhau" class="form-control form-control-lg" placeholder="Nhập mật khẩu cũ" required />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="newPassword">Mật khẩu mới</label>
                                            <input type="password" name="MatKhauMoi" class="form-control form-control-lg" placeholder="Nhập mật khẩu mới" required />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="confirmPassword">Xác nhận mật khẩu mới</label>
                                            <input type="password" name="MatKhauXN" class="form-control form-control-lg" placeholder="Nhập lại mật khẩu mới" required />
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit" name="submit">Đổi mật khẩu</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div> <!-- Kết thúc row -->
                </div>
            </div>
        </div>
    </div>
</section>
