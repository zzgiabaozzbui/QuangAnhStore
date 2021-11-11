<div class="container-top">
<div class="ct-search">
        <form method="POST">
            <input type="text" name="txtSearchHome" id="txtSearchHome" onchange="layDuLieu()" placeholder="Search.." value="<?php echo isset($_POST['txtSearchHome']) ? $_POST['txtSearchHome'] : '' ?>">
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
            <th>Ngày đặt</th>
            <th class='text-cencter'>Số lượng</th>
            <th>Phương thức thanh toán</th>
            <th>Địa chỉ nhận hàng</th>
            <th class='text-cencter'>Thành tiền</th>
            <th>Trạng thái</th>
        </thead>
        <tbody class="customer-home"></tbody>
    </table>
  


</div>

