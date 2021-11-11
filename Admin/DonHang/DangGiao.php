<div class="container-top">
<div class="ct-search">
        <form method="POST">
            <input type="text" name="txtSearch3" id="txtSearch3" onchange="layDuLieu()" placeholder="Search.." value="<?php echo isset($_POST['txtSearch3']) ? $_POST['txtSearch3'] : '' ?>">
        </form>
    </div>

    <div class="ct-button">
        <form id="form-data" method="post">
            <button id="btnDaGiao" disabled>Đã Giao</button>

        </form>
    </div>
</div>


<div class="container-table duyet">
    <table id='customers'>
        <thead>
            <th class='check-box-indexs'><input type='checkbox' id='' name='' value=''> </th>
            <th class='text-cencter'>Mã hóa đơn</th>
            <th class='text-cencter'>Tên đơn hàng</th>
            <th class='text-cencter'>Mã khách hàng</th>
            <th class='text-cencter'>Mã sản phầm</th>
            <th class='text-cencter'>Ngày đặt</th>
            <th class='text-cencter'>Ngày vận chuyển</th>
            <th class='text-cencter'>Số lượng</th>
            <th class='text-cencter'>Phương thức thanh toán</th>
            <th class='text-cencter'>Địa chỉ nhận hàng</th>
            <th class='text-cencter'>Thành tiền</th>
            <th class='text-cencter'>Trạng thái</th>
        </thead>
        <tbody class="customer-dang-giao"></tbody>
    </table>



</div>