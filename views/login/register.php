
  <head>
  <style>
    /* Apply red border when the email format is invalid */
    input:invalid {
      border-color: red;
    }
    /* Facebook and Google button styling */
    .btn-facebook {
      background-color: #3b5998;
      color: white;
    }
    .btn-facebook:hover {
      background-color: #334d84;
    }
    .btn-google {
      background-color: #db4437;
      color: white;
    }
    .btn-google:hover {
      background-color: #c33d2e;
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<section class="vh-100" style="background-color: #FFFFFF; margin-top: 70px; margin-bottom: 25%;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="../public/images/page/mau1.jpg" alt="login form" class="img-fluid" style="height: 100%; object-fit: cover;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
                <form>

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <img src="../public/images/logo/logo2.png" alt="Logo" style="width: 50px; height: auto;">
                    <span class="h1 fw-bold mb-0">Aura Fashion</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Đăng ký</h5>

                  <div class="form-outline mb-4">
                    <input type="text" id="form2ExampleName" class="form-control form-control-lg" />
                    <label class="form-label" for="form2ExampleName">Tên đăng kí</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example27" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example27">Mật khẩu</label>
                  </div>


                  <div class="form-outline mb-4">
                    <input type="tel" id="form2ExamplePhone" class="form-control form-control-lg" />
                    <label class="form-label" for="form2ExamplePhone">Số Điện thoại</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="text" id="form2ExampleAddress" class="form-control form-control-lg" />
                    <label class="form-label" for="form2ExampleAddress">Địa chỉ</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input 
                      type="email" 
                      id="form2Example17" 
                      class="form-control form-control-lg" 
                      pattern="[a-zA-Z0-9._%+-]+@gmail\.com" 
                      title="Hãy nhập đúng địa chỉ email '@gmail.com' "
                      required 
                    />
                    <label class="form-label" for="form2Example17">Email</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="button">Đăng ký</button>
                  </div>

                  <!-- Social Register Buttons -->
                  <div class="pt-1 mb-4">
                    <a href="https://www.facebook.com/">
                      <button class="btn btn-facebook btn-lg btn-block mb-2" type="button">
                        <i class="fab fa-facebook-f me-2"></i> Đăng ký với Facebook
                      </button>
                    </a>
                    <a href="https://accounts.google.com/v3/signin/identifier?authuser=0&continue=https%3A%2F%2Fmyaccount.google.com%2F%3Fhl%3Dvi&ec=GAlAwAE&hl=vi&service=accountsettings&flowName=GlifWebSignIn&flowEntry=AddSession&dsh=S-1727659088%3A1731079062414342&ddm=1">
                      <button class="btn btn-google btn-lg btn-block" type="button">
                        <i class="fab fa-google me-2"></i> Đăng ký với Google
                      </button>
                    </a>
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
