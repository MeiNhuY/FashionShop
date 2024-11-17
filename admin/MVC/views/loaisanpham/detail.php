<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <h2>Mã LSP: <?= $data['ProductTypeID'] ?></h2>
    <h2>Tên LSP: <?= $data['ProductTypeName'] ?></h2>
    <h2>Hình ảnh: <img src="../public/img/company/<?= $data['Image'] ?>" height="60px"></h2>
    <h2>Mô tả: <?= $data['Description'] ?></h2>
    <h2>Mã danh mục: <?= $data['CategoryID'] ?></h2>
</table>