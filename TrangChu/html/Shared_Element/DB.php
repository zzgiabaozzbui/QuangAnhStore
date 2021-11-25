<?php
require "NameData.php";
function selectListItems($query)
{
    $conn= mysqli_connect("localhost","root","",DATABASE);
    $result= mysqli_query($conn,$query);
    $data=[];
    while($rows=mysqli_fetch_array($result))
    {
        $data[]=$rows;
    }
    mysqli_close($conn);
    return $data;
}
function selectItem($query)
{
    $conn= mysqli_connect("localhost","root","",DATABASE);
    $result= mysqli_query($conn,$query);
    $data=[];
    while($rows=mysqli_fetch_array($result))
    {
        $data[]=$rows;
    }
    mysqli_close($conn);
    return $data;
}
function Change_Refresh($query,$tilte)
{
    $conn= mysqli_connect("localhost","root","",DATABASE);
    $result= mysqli_query($conn,$query);
    if($result==true)
    {
    
        // echo "Bạn đã ".$tilte." thành công";
        echo "<script>";
        echo "alert('Bạn đã ".$tilte." thành công');";
        echo "window.location.href='index.php';";
        echo  "</script>";
        
    }
    else{
        echo "<script>";
        echo "alert('Bạn đã ".$tilte." thất bại');";
        echo  "</script>";
    }
    
    
}
function ChangeData($query,$tilte)
{
    $conn= mysqli_connect("localhost","root","",DATABASE);
    $result= mysqli_query($conn,$query);
    if($result==true)
    {
        
        echo "<script>";
        echo "alert('Bạn đã ".$tilte." thành công!');";
        // echo "window.location.href='index.php';";
        echo "</script>";  
       
    }
    else{
        echo "<script>";
        echo "alert('Bạn đã ".$tilte." thất bại');";
        // echo "window.location.href='index.php';";
        echo  "</script>";
    }
    
    
}
function ChangeDataNoTitle($query)
{
    $conn= mysqli_connect("localhost","root","",DATABASE);
    $result= mysqli_query($conn,$query);
    
    
}