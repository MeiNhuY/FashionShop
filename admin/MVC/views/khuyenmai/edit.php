<?php if (isset($_COOKIE['msg'])) { ?>
    <div class="alert alert-success">
        <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
    </div>
<?php } ?>
<hr>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <form action="?mod=khuyenmai&act=update" method="POST" role="form" enctype="multipart/form-data">
        <input type="hidden" name="MaKM" value="<?= $data['PromotionID'] ?>">
        <div class="form-group">
            <label for="">Tên khuyến mãi</label>
            <input type="text" class="form-control" id="" placeholder="" name="TenKM" value="<?= $data['PromotionName'] ?>">
        </div>
        <div class="form-group">
            <label for="">Loại khuyến mãi</label>
            <input type="text" class="form-control" id="" placeholder="" name="LoaiKM" value="<?= $data['PromotionType'] ?>">
        </div>
        <div class="form-group">
            <label for="">Giá trị Khuyến mãi</label>
            <input type="text" class="form-control" id="" placeholder="" name="GiaTriKM" value="<?= $data['PromotionValue'] ?>">
        </div>
        <div class="form-group">
               <label for="">Trạng thái</label>
               <select id="" name="TrangThai" class="form-control">
                    <option <?= ($data['Status'] == '0')?'selected':''?> value="0"> Ẩn</option>
                    <option <?= ($data['Status'] == '1')?'selected':''?> value="1"> Hiện</option>
               </select>
           </div>
        <button type="submit" class="btn btn-primary">Sửa</button>
    </form>
</table>