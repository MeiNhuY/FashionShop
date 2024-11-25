 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800">Thống Kê</h1>
   </div>

   <!-- Content Row -->
   <div class="row">

     <!-- Earnings (Monthly) Card Example -->
     <div class="col-xl-3 col-md-6 mb-4">
       <div class="card border-left-success shadow h-100 py-2">
         <div class="card-body">
           <div class="row no-gutters align-items-center">
             <div class="col mr-2">
               <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Doanh thu tháng này</div>
               <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($data_countM['Count']) ?> VNĐ</div>
             </div>
             <div class="col-auto">
               <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
             </div>
           </div>
         </div>
       </div>
     </div>

     <!-- Earnings (Monthly) Card Example -->
     <div class="col-xl-3 col-md-6 mb-4">
       <div class="card border-left-success shadow h-100 py-2">
         <div class="card-body">
           <div class="row no-gutters align-items-center">
             <div class="col mr-2">
               <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Doanh thu năm nay</div>
               <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($data_countM['Count']) ?> VNĐ</div>
             </div>
             <div class="col-auto">
               <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
             </div>
           </div>
         </div>
       </div>
     </div>

     <!-- Earnings (Monthly) Card Example -->
     <div class="col-xl-3 col-md-6 mb-4">
       <div class="card border-left-primary shadow h-100 py-2">
         <div class="card-body">
           <div class="row no-gutters align-items-center">
             <div class="col mr-2">
               <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Khách hàng</div>
               <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data_nguoidung['Count'] ?></div>
             </div>
             <div class="col-auto">
               <i class="fas fa-calendar fa-2x text-gray-300"></i>
             </div>
           </div>
         </div>
       </div>
     </div>

   </div>

   <div class="row">

   <div class="col-xl-3 col-md-6 mb-4">
       <div class="card border-left-info shadow h-100 py-2">
         <div class="card-body">
           <div class="row no-gutters align-items-center">
             <div class="col mr-2">
               <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Áo</div>
               <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$data_tksp1['Count']?></div>
             </div>
             <div class="col-auto">
               <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
             </div>
           </div>
         </div>
       </div>
     </div>

     <div class="col-xl-3 col-md-6 mb-4">
       <div class="card border-left-info shadow h-100 py-2">
         <div class="card-body">
           <div class="row no-gutters align-items-center">
             <div class="col mr-2">
             <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Quần</div>
               <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$data_tksp2['Count']?></div>
             </div>
             <div class="col-auto">
               <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
             </div>
           </div>
         </div>
       </div>
     </div>

     <!-- Earnings (Monthly) Card Example -->
     <div class="col-xl-3 col-md-6 mb-4">
       <div class="card border-left-info shadow h-100 py-2">
         <div class="card-body">
           <div class="row no-gutters align-items-center">
             <div class="col mr-2">
             <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Váy</div>
               <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$data_tksp3['Count']?></div>
             </div>
             <div class="col-auto">
               <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
             </div>
           </div>
         </div>
       </div>
     </div>

     <!-- Pending Requests Card Example -->
     <div class="col-xl-3 col-md-6 mb-4">
       <div class="card border-left-warning shadow h-100 py-2">
         <div class="card-body">
           <div class="row no-gutters align-items-center">
             <div class="col mr-2">
               <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Hóa đơn chưa duyệt</div>
               <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data_hd['Count'] ?></div>
             </div>
             <div class="col-auto">
               <i class="fas fa-comments fa-2x text-gray-300"></i>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>

 </div>

 <div class="row">
  <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Doanh thu</h6>
          </div>
          <div class="card-body">
              <canvas id="revenueChart"></canvas>
          </div>
      </div>
  </div>

  <div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Sản phẩm</h6>
        </div>
        <div class="card-body">
            <canvas id="productChart"></canvas>
        </div>
    </div>
</div>
 </div>

 <!-- JavaScript cho biểu đồ -->
 <script>
    // Lấy màu từ :root
    const rootStyles = getComputedStyle(document.documentElement);

    // Dữ liệu cho biểu đồ doanh thu
    const revenueData = {
        labels: ["Tháng này", "Năm nay"],
        datasets: [{
            label: "Doanh thu tháng này (VNĐ)",
            data: [<?= $data_countM['Count'] ?>, <?= $data_countY['Count'] ?>],
            backgroundColor: [
                rootStyles.getPropertyValue('--primary').trim(),
                rootStyles.getPropertyValue('--success').trim()
            ],
            borderColor: [
                rootStyles.getPropertyValue('--primary').trim(),
                rootStyles.getPropertyValue('--success').trim()
            ],
            borderWidth: 1,
            barThickness: 90, // Độ dày cố định của cột
            maxBarThickness: 100 // Độ dày tối đa
        }]
    };

  const revenueConfig = {
    type: 'bar',
    data: revenueData,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            legend: {
                display: true,
                position: 'top'
            }
        },
        elements: {
            bar: {
                categoryPercentage: 0.6, // Giảm không gian giữa các danh mục (mặc định là 0.8)
                barPercentage: 0.6       // Giảm chiều rộng của cột (mặc định là 0.9)
            }
        }
    }
};

// Biểu đồ doanh thu
new Chart(document.getElementById('revenueChart'), revenueConfig);


    // Dữ liệu cho biểu đồ sản phẩm
    const productData = {
        labels: ["Áo", "Quần", "Váy"],
        datasets: [{
            label: "Số lượng sản phẩm",
            data: [<?= $data_tksp1['Count'] ?>, <?= $data_tksp2['Count'] ?>, <?= $data_tksp3['Count'] ?>],
            backgroundColor: [
                rootStyles.getPropertyValue('--success').trim(),
                rootStyles.getPropertyValue('--primary').trim(),
                rootStyles.getPropertyValue('--cyan').trim()
            ],
            borderColor: [
                rootStyles.getPropertyValue('--success').trim(),
                rootStyles.getPropertyValue('--primary').trim(),
                rootStyles.getPropertyValue('--cyan').trim()
            ],
            borderWidth: 1
        }]
    };

    const productConfig = {
        type: 'pie',
        data: productData,
        options: {
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            }
        }
    };

    // Biểu đồ sản phẩm
    new Chart(document.getElementById('productChart'), productConfig);
</script>


 <!-- /.container-fluid -->