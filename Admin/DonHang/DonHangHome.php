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
    <link rel="stylesheet" type="text/css" href="../Frontend/css/jquery-ui.min.css" />


</head>

<body>

    <div class="main-app">
        <div class="container-sidebar">
            <?php
            require "../../Admin/Shared_Element/sideBar.php";
            ?>
        </div>
        <div class="container-content">
            <?php
            require "../Shared_Element/Name.php";
            
            ?>
           


            <div class="container-title">
                <h2>ĐƠN HÀNG</h2>
            </div>

            <div class="container-header">

            </div>
            <div class="tab-content">
                <?php
                $conn = mysqli_connect("localhost", "root", "", "qldt");


                if ($conn == true) {
                    $query = "SELECT h.Mahoadon,h.Ten, h.SDT,h.Email,h.Luuy,h.Ngaydat,h.Thanhtoan,h.Diachi,h.ThanhTien,h.Trangthai FROM hoadon h";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        echo "<table id='customers'><thead>";
                        echo "<th class='text-cencter'>Mã hóa đơn</th><th>Tên khách hàng</th><th class='text-cencter'>Số điện thoại</th><th class='text-cencter'>Email</th><th>Lưu ý</th><th class='text-cencter'>Ngày đặt hàng</th><th>Phương thức thanh toán</th><th>Địa chỉ</th><th class='text-cencter' >Thành tiền</th><th class='text-cencter' >Trạng thái</th>";
                        echo "</thead>";
                        while ($row = mysqli_fetch_assoc($result)) {

                            echo "<tr>";
                            echo "<td class='text-cencter'>" . $row["Mahoadon"] . "</td>";
                            echo "<td>" . $row["Ten"] . "</td>";
                            echo "<td class='text-right size-td'>" . $row["SDT"] . "</td>";
                            echo "<td class='text-right size-td'>" . $row["Email"] . "</td>";
                           
                            echo "<td class='text-right'>" . $row["Luuy"] . "</td>";
                            $date = $row["Ngaydat"];  
                        
                            echo "<td>" .date(" d-m-Y s:i:H", strtotime($date)) . "</td>";
                            echo "<td>" . $row["Thanhtoan"] . "</td>";
                            echo "<td>" . $row["Diachi"] . "</td>";
                            echo "<td>" . number_format($row["ThanhTien"]) . "đ</td>";
                            echo "<td>" . $row["Trangthai"] . "</td>";
                        
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
        <script rel="text/javascript" src="../Frontend/js/jquery-ui.min.js"></script>
        
</body>

</html>