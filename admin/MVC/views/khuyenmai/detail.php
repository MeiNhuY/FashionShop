<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<?php if(isset($data) and $data != null) { ?>
    <h2>Mã khuyến mãi: <?= $data['PromotionID'] ?></h2>
    <h2>Tên khuyến mãi: <?= $data['PromotionName'] ?></h2>
    <h2>Loại khuyến mãi: <?= $data['PromotionType'] ?></h2>
    <h2>Giá trị khuyến mãi: <?= $data['PromotionValue'] ?></h2>
    <h2>Ngày bắt đầu: <?= $data['StartDate'] ?></h2>
    <h2>Trạng thái: <?= $data['Status'] ?></h2>
<?php } ?>
</table>