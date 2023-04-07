<?php

session_start();

include 'dbcon.php';

if (isset($_GET['deleteid']))
{
    $id=$_GET['deleteid'];
    $deleteQuery="DELETE FROM invoice_user where id=$id"; 
    $result=mysqli_query($con, $deleteQuery);
    if($result){
        header("location:dashboard.php");
    echo "deleted!";
} else {
    echo "ERR!";
}
}


?>