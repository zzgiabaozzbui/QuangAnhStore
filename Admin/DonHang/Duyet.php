<div class="container-top">
    <div class="ct-search">
        <form method="POST">
            <input type="text" name="txtSearch1" id="txtSearch1" onchange="layDuLieu()" placeholder="Search.." value="<?php echo isset($_POST['txtSearch1']) ? $_POST['txtSearch1'] : '' ?>">
        </form>
    </div>
    <div class="ct-button">
        <form id="form-data" method="post">
            <button id="btnCheck" disabled>Xác nhận</button>
            <button id="btnDelete" disabled>Hủy</button>
        </form>
    </div>
</div>


<div class="container-table duyet">
    <table id='customers'>
        <thead>
            <th class='check-box-indexs'><input type='checkbox' id='' name='' value=''> </th>
            <th class='text-cencter'>Mã hóa đơn</th>
            <th>Tên đơn hàng</th>
            <th class='text-cencter'>Mã khách hàng</th>
            <th class='text-cencter'>Mã sản phầm</th>
            <th class='text-cencter'>Ngày đặt hàng</th>
            <th class='text-cencter'>Số lượng</th>
            <th class='text-cencter'>Phương thức thanh toán</th>
            <th class='text-cencter'>Địa chỉ nhận hàng</th>
            <th class='text-cencter'>Thành tiền</th>
            <th class='text-cencter'>Trạng thái</th>
        </thead>
        <tbody class="customer-choxacnhan"></tbody>
    </table>
</div>