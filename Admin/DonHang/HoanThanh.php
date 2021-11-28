<div class="container-top">

    <div class="ct-search">
        <form method="POST">
            <input type="text" name="txtSearch5" id="txtSearch5" onchange="layDuLieu()" placeholder="Tìm kiếm..." value="<?php echo isset($_POST['txtSearch5']) ? $_POST['txtSearch5'] : '' ?>">
        </form>
    </div>
</div>


<div class="container-table duyet">
    <table id='customers'>
        <thead>
            <th class='check-box-indexs'><input type='checkbox' id='' name='' value=''> </th>
            <th class='text-cencter'>Mã hóa đơn</th>
            <th>Tên khách hàng</th>
            <th class='text-cencter'>SDT</th>
            <th class='text-cencter'>Email</th>
            <th class='text-cencter'>Lưu ý</th>
            <th class='text-cencter size-d'>Ngày đặt hàng</th>
            <th class='text-cencter'>Ngày vận chuyển</th>
            <th class='text-cencter'>Ngày giao hàng</th>
            <th class='text-cencter'>Phương thức thanh toán</th>
            <th class='text-cencter'>Địa chỉ nhận hàng</th>
            <th class='text-cencter'>Thành tiền</th>
            <th class='text-cencter'>Trạng thái</th>
        </thead>
        <tbody class="customer-hoanthanh"></tbody>
    </table>

</div>
<div class="export">
    <?php
    $a = 1;
    ?>
    <form action="export.php?" method="post" id="Form_excel">
        <button name="btnExcel" type="submit" onclick="hienThiId()">
            <i class="far fa-file-excel"></i>
            Xuất excel
        </button>
    </form>

</div>