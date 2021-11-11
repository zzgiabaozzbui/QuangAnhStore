<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['MaDH'];

    $conn = new mysqli("localhost", "root", "", "qldienthoai", 3306);

    if ($conn) {
        $query = "UPDATE  donhang d SET d.TrangThai = 'Giao hàng thành công',d.NgayGiaoHang = CURDATE() WHERE d.MaDH = '" . $id . "'";

        $result = mysqli_query($conn, $query);
        if ($result) {
            echo 'Cập nhật thành công!';
        } else {
            echo 'Cập nhật thất bại!';
        }
    } else {
        echo "Ket noi that bai" . mysqli_connect_error();
    }
}
?>
?>