<?php
$con = mysqli_connect("localhost", "root", "", "shaktibilling");

// Check connection
if (mysqli_connect_error()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
if(!$con)
{
  die(mysql_error($con));
}
}
