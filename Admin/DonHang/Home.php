<div class="container-top">
<div class="ct-search">
        <form method="POST">
            <input type="text" name="txtSearchHome" id="txtSearchHome" onchange="layDuLieu()" placeholder="Tìm kiếm..." value="<?php echo isset($_POST['txtSearchHome']) ? $_POST['txtSearchHome'] : '' ?>">
        </form>
    </div>
</div>


<div class="container-table duyet">
    </table>
    <table id='customers'>
        <thead>
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
            <th class='text-cencter'> Xem </th>
        </thead>
        <tbody class="customer-home"></tbody>
    </table>
    


</div>

