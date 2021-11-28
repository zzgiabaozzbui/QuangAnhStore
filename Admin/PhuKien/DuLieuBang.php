<?php


echo "  <th>Mã phụ kiện</th>
        <th>Tên phụ kiện</th>
        <th>Trạng thái</th>
        <th>Giá phụ kiện</th>
        <th>Hãng sản xuất</th>
        <th>Ảnh mô tả</th>
        <th>Sửa</th>
        <th>Xóa</th>";
while ($row=mysqli_fetch_assoc($result)) {
        $GiaFm=number_format($row["Gia"]);    
        echo "<tr>";
        echo "<td>" . $row["Maphukien"] . "</td>";
        echo "<td>" . $row["Tenphukien"] . "</td>";
        echo "<td>" . $row["Trangthai"]  . "</td>";
        echo "<td>" . $GiaFm . "đ"."</td>";
        echo "<td>" . $row["HangSanXuat"] . "</td>";
        echo "<td>" . "<img src='./Image/". $row["Hinhanh"] ."' alt=''>" . "</td>";
        echo "<td><a href='CapNhatPhuKien.php?Maphukien=".$row["Maphukien"]."' class=''><i class='ti-pencil icon--update'></i></a></td>";
        echo "<td><a href=XoaPhuKien.php?Maphukien=".$row["Maphukien"]."' class='' onclick='return confirm(\"Are you sure you want to delete?\")'><i class='ti-trash icon--delete'></i></a></td>";
        echo "</tr>";
        
        
}
?>