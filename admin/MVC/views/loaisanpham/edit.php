<?php if (isset($_COOKIE['msg'])) { ?>
    <div class="alert alert-success">
        <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
    </div>
<?php } ?>
<hr>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <form action="?mod=loaisanpham&act=update" method="POST" role="form" enctype="multipart/form-data">
        <input type="hidden" name="MaLSP" value="<?= $data_detail['ProductTypeID'] ?>">
        <div class="form-group">
            <label for="">Tên loại sản phẩm</label>
            <input type="text" class="form-control" id="" placeholder="" name="TenLSP" value="<?=$data_detail['ProductTypeName'] ?>">
        </div>
        <div class="form-group">
            <label for="">Hình ảnh</label>
            <img src="../public/images/company/<?=$data_detail['Image']?>" height="200px" width="200px">
            <input type="file" class="form-control" id="" placeholder="" name="HinhAnh" >
        </div>
        <div class="form-group">
            <label for="">Mô tả</label>
            <input type="text" class="form-control" id="" placeholder="" name="MoTa"  value="<?=$data_detail['Description'] ?>">
        </div>
        <div class="form-group">
            <label for="cars">Danh mục: </label>
            <select id="" name="MaDM" class="form-control">
                <?php foreach ($data as $row) { ?>
                    <option <?= ($data_detail['CategoryID'] == $row['CategoryID'] ) ? 'selected' : '' ?> value="<?= $row['CategoryID'] ?>"> <?=$row['CategoryName']?></option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Sửa</button>
    </form>
</table>