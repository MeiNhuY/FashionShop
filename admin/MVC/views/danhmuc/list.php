<?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
<a href="?mod=danhmuc&act=add" type="button" class="btn btn-success">Thêm mới</a>
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
      <th scope="col">Mã danh mục</th>
      <th scope="col">Tên danh mục</th>
      <th scope="col">Tùy chọn</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $row) { ?>
      <tr>
        <td><?= $row['CategoryID'] ?></td>
        <td><?= $row['CategoryName'] ?></td>
        <td>
          <a href="?mod=danhmuc&act=detail&id=<?= $row['CategoryID'] ?>" class="btn btn-success">Xem</a>
          <?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
          <a href="?mod=danhmuc&act=edit&id=<?= $row['CategoryID'] ?>" class="btn btn-warning">Sửa</a>
          <a href="?mod=danhmuc&act=delete&id=<?= $row['CategoryID'] ?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" class="btn btn-danger">Xóa</a>
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