<?php
session_start();
include ('dbcon.php');

$fromuser =$_POST['fromuser'];
$touser =$_POST['touser'];
$message =$_POST['message']; 

$output="";
$sql = "INSERT into messages (fromuser, touser, message) values ('$fromuser', '$touser','$message')";

if($con -> query($sql))
{ 
	$output.="";
}
else
{
	$output.="error, try again";
}
echo $output;

	?>
