<?php if (isset($_COOKIE['msg'])) { ?>
    <div class="alert alert-success">
        <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
    </div>
<?php } ?>
<hr>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <form action="?mod=sanpham&act=update" method="POST" role="form" enctype="multipart/form-data">
        <input type="hidden" name="MaSP" value="<?= $data['ProductID'] ?>">
        <div class="form-group">
            <label for="cars">Danh mục: </label>
            <select id="" name="MaDM" class="form-control">
                <?php foreach ($data_dm as $row) { ?>
                    <option <?= ($row['CategoryID'] == $data['CategoryID'])?'selected':''?> value="<?= $row['CategoryID'] ?>"><?= $row['CategoryName'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="cars">Loại sản phẩm: </label>
            <select id="" name="MaLSP" class="form-control">
                <?php foreach ($data_lsp as $row) { ?>
                    <option <?= ($row['ProductTypeID'] == $data['ProductTypeID'])?'selected':''?> value="<?= $row['ProductTypeID'] ?>"><?= $row['ProductTypeName'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Tên sản phẩm</label>
            <input type="text" class="form-control" id="" placeholder="" name="TenSP" value="<?=$data['ProductName']?>">
        </div>
        <div class="form-group">
            <label for="">Đơn giá</label>
            <input type="text" class="form-control" id="" placeholder="" name="DonGia" value="<?=$data['Price']?>">
        </div>
        <div class="form-group">
            <label for="">Số lượng</label>
            <input type="text" class="form-control" id="" placeholder="" name="SoLuong" value="<?=$data['Quantity']?>">
        </div>
        <div class="form-group">
            <label for="">Hình ảnh </label>
            <img src="../public/<?=$data['Image']?>" height="200px" width="200px">
            <input type="file" class="form-control" id="" placeholder="" name="HinhAnh" value="<?=$data['Image']?>">
        </div>
        <div class="form-group">
            <label for="">Giới tính</label>
            <input type="text" class="form-control" id="" placeholder="" name="GioiTinh" value="<?=$data['Gender']?>">
        </div>
       
        <div class="form-group">
            <label for="cars">Mã khuyến mãi </label>
            <select id="" name="MaKM" class="form-control">
                <?php foreach ($data_km as $row) { ?>
                    <option <?= ($row['PromotionID'] == $data['PromotionID'])?'selected':''?> value="<?= $row['PromotionID'] ?>"><?= $row['PromotionName'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Xuất xứ</label>
            <input type="text" class="form-control" id="" placeholder="" name="XuatXu" value="<?=$data['Origin']?>">
        </div>
        <div class="form-group">
            <label for="">Chất liệu</label>
            <input type="text" class="form-control" id="" placeholder="" name="ChatLieu" value="<?=$data['Material']?>">
        </div>
        <div class="form-group">
            <label for="">Mô tả</label>
            <textarea class="form-control" id="summernote" placeholder="" name="MoTa"><?=$data['Description']?></textarea>
        </div>
        <div class="form-group">
            <label for="">Trạng thái</label>
            <input <?=($data['Status']==1)?'checked':''?> type="checkbox" id="" placeholder="" value="1" name="TrangThai"><em>(Check cho phép hiện thị sản phẩm)</em>
        </div>
        <button type="submit" class="btn btn-primary">Sửa</button>
    </form>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>