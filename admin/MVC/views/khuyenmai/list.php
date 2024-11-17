<?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
<a href="?mod=khuyenmai&act=add" type="button" class="btn btn-success">Thêm mới</a>
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
      <th scope="col">Mã khuyến mãi</th>
      <th scope="col">Tên khuyến mãi</th>
      <th scope="col">Loại khuyến mãi</th>
      <th scope="col">Giá trị khuyến mãi</th>
      <th scope="col">Ngày bắt đầu</th>
      <th>Tùy chọn</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $row) { ?>
      <tr>
        <td><?= $row['PromotionID'] ?></td>
        <td><?= $row['PromotionName'] ?></td>
        <td><?= $row['PromotionType'] ?></td>
        <td><?= $row['PromotionValue'] ?></td>
        <td><?= $row['StartDate'] ?></td>
        <td>
          <a href="?mod=khuyenmai&act=detail&id=<?= $row['PromotionID'] ?>" class="btn btn-success">Xem</a>
          <?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
          <a href="?mod=khuyenmai&act=edit&id=<?= $row['PromotionID'] ?>" class="btn btn-warning">Sửa</a>
          <a href="?mod=khuyenmai&act=delete&id=<?= $row['PromotionID'] ?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" class="btn btn-danger">Xóa</a>
          <?php }?>
        </td>
      </tr>
    <?php } ?>
</table>
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
</script>