
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST["ma"];

    $conn = new mysqli("localhost", "root", "", "qldt", 3306);

    if ($conn) {
        $query = "DELETE FROM tbltintuc WHERE MaTinTuc in (". $id .")";
   $result = mysqli_query($conn, $query);
        echo $result;
    } else {
        echo "Kết nối thất bại!" . mysqli_connect_error();
    }
}
?>
?>