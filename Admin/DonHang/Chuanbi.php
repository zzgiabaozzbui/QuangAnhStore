<div class="container-top">
<div class="ct-search">
        <form method="POST">
            <input type="text" name="txtSearch3" id="txtSearch3" onchange="layDuLieu()" placeholder="Tìm kiếm..." value="<?php echo isset($_POST['txtSearch3']) ? $_POST['txtSearch3'] : '' ?>">
        </form>
    </div>

    <div class="ct-button">
        <form id="form-data" method="post">
            <button id="btnDaChuanBi" disabled>Đã nhận hàng</button>

        </form>
    </div>
</div>


<div class="container-table chuanbi">
    <table id='customers'>
        <thead>
            <th class='check-box-indexs'><input type='checkbox' id='' name='' value=''> </th>
            <th class='text-cencter'>Mã hóa đơn</th>
            <th>Tên khách hàng</th>
            <th class='text-cencter'>SDT</th>
            <th class='text-cencter'>Email</th>
            <th class='text-cencter'>Lưu ý</th>
            <th class='text-cencter'>Ngày đặt hàng</th>
            <th class='text-cencter'>Phương thức thanh toán</th>
            <th class='text-cencter'>Địa chỉ nhận hàng</th>
            <th class='text-cencter'>Thành tiền</th>
            <th class='text-cencter'>Trạng thái</th>
        </thead>
        <tbody class="customer-chuanbi"></tbody>
    </table>
</div>