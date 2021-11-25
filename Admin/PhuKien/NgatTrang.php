<?php

use function PHPSTORM_META\type;

if(isset($key))
{ 
    if($currentpage>3)
  {
    $first=1;
    echo"<a href='?PageSearch=".$first."&key=".$key."' class='pageNumber'>First</a>";
 }
 for($num=1;$num<=$totalpage;$num++)
 {
    if($num>$currentpage-3 && $num<$currentpage+3)
    {
    if($num!=$currentpage)
    {
        echo"<a href='?PageSearch=".$num."&key=".$key."' class='pageNumber'>".$num."</a>";
    }
    else
    {
        echo"<a href='?PageSearch=".$num."&key=".$key."' class='pageCurrent'>".$num."</a>";
    }
    }
    
 }
 if($currentpage<=$totalpage-3)
    {
        $last=$totalpage;
        echo"<a href='?PageSearch=".$last."&key=".$key."' class='pageNumber'>Last</a>";
    }

}
else if(isset($type))
{
    if($currentpage>3)
  {
    $first=1;
    echo"<a href='?PageFilter=".$first."&key=".$type."' class='pageNumber'>First</a>";
 }
 for($num=1;$num<=$totalpage;$num++)
 {
    if($num>$currentpage-3 && $num<$currentpage+3)
    {
    if($num!=$currentpage)
    {
        echo"<a href='?PageFilter=".$num."&type=".$type."' class='pageNumber'>".$num."</a>";
    }
    else
    {
        echo"<a href='?PageFilter=".$num."&type=".$type."' class='pageCurrent'>".$num."</a>";
    }
    }
    
 }
 if($currentpage<=$totalpage-3)
    {
        $last=$totalpage;
        echo"<a href='?PageFilter=".$last."&type=".$type."' class='pageNumber'>Last</a>";
    }
}
else
{
    if($currentpage>3)
    {
       $first=1;
       echo"<a href='?Page=".$first."' class='pageNumber'>First</a>";
    }
    for($num=1;$num<=$totalpage;$num++)
    {
       if($num>$currentpage-3 && $num<$currentpage+3)
       {
       if($num!=$currentpage)
       {
           echo"<a href='?Page=".$num."' class='pageNumber'>".$num."</a>";
       }
       else
       {
           echo"<a href='?Page=".$num."' class='pageCurrent'>".$num."</a>";
       }
       }
       
    }
    if($currentpage<=$totalpage-3)
       {
           $last=$totalpage;
           echo"<a href='?Page=".$last."' class='pageNumber'>Last</a>";
       }
}   
?>
