<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../Frontend/font/themify-icons/themify-icons.css" />
    <link rel="stylesheet" type="text/css" href="../Frontend/css/navbar.css" />
    <link rel="stylesheet" type="text/css" href="../Frontend/font/fontawesome-free-5.15.4/fontawesome-free-5.15.4-web/css/all.css" />
    <link rel="stylesheet" type="text/css" href="../Frontend/css/DonHang.css" />

</head>

<body>

    <div class="main-app">
        <div class="container-sidebar">
            <?php
            require "../Shared_Element/sideBar.php";
            ?>
        </div>
        <div class="container-content">


            <div class="container-title">
                <h2>ĐƠN HÀNG</h2>


            </div>

            <div class="container-header">

            </div>
            <div class="tab-content">
                <?php
                $conn = mysqli_connect("localhost", "root", "", "qldienthoai");


                if ($conn == true) {
                    $query = "SELECT d.MaDH,d.TenDonHang,d.MaKH,d.Masanpham,d.ThoiGianDat,d.soLuongDH,d.PhuongThucThanhToan,d.DiaChi,d.ThanhTien,d.TrangThai FROM donhang d";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        echo "<table id='customers'><thead>";
                        echo "<th class='text-cencter'>Mã hóa đơn</th><th>Tên đơn hàng</th><th class='text-cencter'>Mã khách hàng</th><th class='text-cencter'>Mã sản phầm</th><th>Ngày đặt hàng</th><th class='text-cencter'>Số lượng</th><th>Phương thức thanh toán</th><th>Địa chỉ nhận hàng</th><th class='text-cencter' >Thành tiền</th><th>Trạng thái</th>";
                        echo "</thead>";
                        while ($row = mysqli_fetch_assoc($result)) {

                            echo "<tr>";
                            echo "<td class='text-cencter'>" . $row["MaDH"] . "</td>";
                            echo "<td>" . $row["TenDonHang"] . "</td>";
                            echo "<td class='text-right size-td'>" . $row["MaKH"] . "</td>";
                            echo "<td class='text-right size-td'>" . $row["Masanpham"] . "</td>";
                            $date = $row["ThoiGianDat"];
                            echo "<td>" .  date("d/m/Y", strtotime($date)) . "</td>";
                            echo "<td class='text-right'>" . $row["soLuongDH"] . "</td>";
                            echo "<td>" . $row["PhuongThucThanhToan"] . "</td>";
                            echo "<td>" . $row["DiaChi"] . "</td>";
                            echo "<td class='text-right'>" . $row["ThanhTien"] . "</td>";
                            echo "<td>" . $row["TrangThai"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "No data";
                    }
                } else {
                    echo "Connect is error " . mysqli_connect_error();
                }
                mysqli_close($conn);
                ?>


            </div>


        </div>

        <script rel="text/javascript" src="../Frontend/js/jquery-3.6.0.min.js"></script>
        <script rel="text/javascript" src="../Frontend/js/navbar.js"></script>
        <script rel="text/javascript" src="../Frontend/js/moment.js"></script>
</body>

</html>