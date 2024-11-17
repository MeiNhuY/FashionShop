<?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
<a href="?mod=nguoidung&act=add" type="button" class="btn btn-success">Thêm mới</a>
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
      <th scope="col">Mã Người Dùng</th>
      <th scope="col">Tài khoản</th>
      <th scope="col">SĐT</th>
      <th scope="col">Email</th>
      <th scope="col">Giới tính</th>
      <th scope="col">Vai trò</th>
      <th>Tùy chọn</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $row) { ?>
      <tr>
        <th scope="row"><?= $row['UserID'] ?></th>
        <td><?= $row['Username'] ?></td>
        <td><?= $row['PhoneNumber'] ?></td>
        <td><?= $row['Email'] ?></td>
        <td><?= $row['Gender'] ?></td>
        <td>
          <?php
          if ($row['RoleID'] == 2) {
            echo 'Khách hàng';
          } else {
              echo 'Quản trị viên';
            }
          ?>
        </td>
        <td>
          <a href="?mod=nguoidung&act=detail&id=<?= $row['UserID'] ?>" type="button" class="btn btn-success">Xem</a>
          <?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
          <a href="?mod=nguoidung&act=edit&id=<?= $row['UserID'] ?>" type="button" class="btn btn-warning">Sửa</a>
          <a href="?mod=nguoidung&act=delete&id=<?= $row['UserID'] ?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" class="btn btn-danger">Xóa</a>
          <?php }?>
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