<?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
<?php } ?>

<hr>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th scope="col">Mã đánh giá</th>
      <th scope="col">Mã sản phẩm</th>
      <th scope="col">Mã người dùng</th>
      <th scope="col">Đánh giá</th>
      <th scope="col">Bình luận</th>
      <th scope="col">Ngày tạo</th>

    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $row) { ?>
      <tr>
        <td><?= $row['ReviewID'] ?></td>
        <td><?= $row['ProductID'] ?></td>
        <td><?= $row['UserID'] ?></td>
        <td><?= $row['Rating'] ?></td>
        <td><?= $row['Comment'] ?></td>
        <td><?= $row['CreatedAt'] ?></td>
        
      </tr>
    <?php } ?>
</table>

<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
</script>

