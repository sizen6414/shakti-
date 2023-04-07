<?php

session_start();

include 'dbcon.php';

if (isset($_GET['deleteid']))
{
    $email=$_GET['deleteid'];
    $deleteQuery="DELETE FROM company where email =$email"; 
    $result=mysqli_query($con, $deleteQuery);
    if($result){
        header("location:adminmanagecompany.php");
    echo "deleted!";
} 
else {
    echo "ERR!";
}
}


?>