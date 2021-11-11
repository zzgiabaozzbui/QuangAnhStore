<?php
function setTimeout($fn, $timeout){
    // sleep for $timeout milliseconds.
    sleep(($timeout/1000));
    $fn();
}
require_once "../Shared_Element/DB.php";
    $maDong= $_GET["MaDong"];
    $queryDelete= "Delete from tbldongsanpham where Madong='".$maDong."'";
    $result=ChangeData($queryDelete,"xóa");
        

    
?>