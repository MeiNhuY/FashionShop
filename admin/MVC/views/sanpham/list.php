<?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
<a href="?mod=sanpham&act=add" type="button" class="btn btn-success">Thêm mới</a>
<?php } ?>
<?php if (isset($_COOKIE['msg'])) { ?>
  <div class="alert alert-success">
    <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
  </div>
<?php } ?>
<hr>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th scope="col">Mã sản phẩm</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Đơn giá</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Hình Ảnh</th>
      <th scope="col">Hình Ảnh 2</th>
      <th scope="col">Trạng thái</th>
      <th>Tùy chọn</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $row) { ?>
      <tr>
        <th scope="row"><?= $row['ProductID'] ?></th>
        <td><?= $row['ProductName'] ?></td>
        <td><?= $row['Price'] ?> VNĐ</td>
        <td><?= $row['Quantity'] ?></td>
        <td><?= $row['Image'] ?></td>
        <td><?= $row['Image2'] ?></td>
        <td><?= $row['Status'] ?></td>
        <td>
          <a href="../index.php?act=detail&id=<?= $row['ProductID'] ?>" type="button" class="btn btn-success" target="_blank">Xem</a>
          <?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
          <a href="?mod=sanpham&act=edit&id=<?= $row['ProductID'] ?>" type="button" class="btn btn-warning">Sửa</a>
          <a href="?mod=sanpham&act=delete&id=<?= $row['ProductID'] ?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" class="btn btn-danger">Xóa</a>
          <?php } ?>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
</script>