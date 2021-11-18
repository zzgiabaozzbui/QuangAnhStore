<?php
    header('Content-Type: application/json');
    $data = array();
    require("../QuanTriHeThong/Quantri/Funcion.php");
    $result = Bieudo();
    foreach ($result as  $value) {
        $data[] = $value;
    }
    echo json_encode($data);
?>