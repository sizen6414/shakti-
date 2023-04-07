<?php

include 'dbcon.php';
// echo "hello";
// die;
$id = $_POST['name'];

$query = "SELECT * FROM `invoice_order_item` WHERE item_name='$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$data = [$row['order_item_price'], $row['item_code']];
echo (json_encode($data));
?>
