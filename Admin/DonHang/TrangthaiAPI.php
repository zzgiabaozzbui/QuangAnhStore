
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['Mahoadon'];

    $conn = new mysqli("localhost", "root", "", "qldt", 3306);

    if ($conn) {
        $query = "CALL Proc_UpdateTrangThaiDonHang('". $id ."')";

        $result = mysqli_query($conn, $query);
        if ($result) {
            echo 'Cập nhật thành công!';
        } else {
            echo 'Cập nhật thất bại!';
        }
    } else {
        echo "Kết nối thất bại!" . mysqli_connect_error();
    }
}
?>
?>