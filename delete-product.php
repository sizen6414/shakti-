<?php

session_start();

include 'dbcon.php';

if (isset($_GET['deleteid']))
{
    $id=$_GET['deleteid'];
    $deleteQuery="DELETE FROM invoice_order_item where order_id=$id"; 
    $result=mysqli_query($con, $deleteQuery);
    if($result){
        header("location:adminmanageprod.php");
    echo "deleted!";
} else {
    echo "ERR!";
}
}


?>