
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST["ma"];

    $conn = new mysqli("localhost", "root", "", "qldt", 3306);
    $stmt = $conn->prepare("SELECT t.MaTinTuc,t.HinhAnh,t.TieuDe,t.NgayDangTin,t.TomTat,t.TacGia,t.NoiDung FROM tbltintuc t WHERE t.MaTinTuc = " . $id . "");
    $stmt->execute();
    $result = $stmt->get_result();
    $outp = $result->fetch_all(MYSQLI_ASSOC);

    echo json_encode($outp);
}
?>