<div class="container-top">
    <div class="ct-search">
        <form method="POST">
            <input type="text" name="txtSearch2" id="txtSearch2" onchange="layDuLieu()" placeholder="Tìm kiếm..." value="<?php echo isset($_POST['txtSearch2']) ? $_POST['txtSearch2'] : '' ?>">
        </form>
    </div>

</div>


<div class="container-table duyet">
    <table id='customers'>
        <thead>
            <th class='text-cencter'>Mã hóa đơn</th>
            <th>Tên đơn hàng</th>
            <th class='text-cencter'>Mã khách hàng</th>
            <th class='text-cencter'>Mã sản phầm</th>
            <th class='text-cencter'>Ngày đặt</th>
            <th class='text-cencter'>Ngày hủy</th>
            <th class='text-cencter'>Số lượng</th>
            <th class='text-cencter'>Phương thức thanh toán</th>
            <th class='text-cencter'>Địa chỉ nhận hàng</th>
            <th class='text-cencter'>Thành tiền</th>
            <th class='text-cencter'>Trạng thái</th>
        </thead>
        <tbody class="customer-huy"></tbody>
    </table>



</div>