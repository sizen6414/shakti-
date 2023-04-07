<?php 
session_start();
include('header.php');
include 'Invoice.php';
include ('dbcon.php');
?>
<head>
<title>shakti billing</title>
<script src="js/invoice.js"></script>
<link href="styles.css" rel="stylesheet">
<style type="text/css">
	.banner{
		width: 100%;
		height: 100vh;
		background-image: linear-gradient(rgba(0, 0, 0,0.75), rgba(0, 0, 0, 0.75)), url(tax.jpg);
		background-size: cover;
		background-position: center;
	}
	.container{
		background-color: white;
		padding-top: ;
		border-radius: 10px;
	}
	th{
		background: #4287f5;
		color: white;
	}
</style>
<link rel="stylesheet" href="css/datatables-sytle.css">
<script src="js/datatables-simple-demo.js"></script>
<script src="js/simple-datatables@latest"></script>
</head>
<body>
	<div class="banner">
		<?php include('container.php');?>
		<div class="container">		<br>
			<h2 class="title mt-5">SHAKTI BILLING SYSTEM</h2><br>	
			<main>
				<h2>Products</h2>	  
				<table id="datatablesSimple" class="table table-condensed table-hover table-striped">

					<thead>
						<tr>
							<th>Order Id</th>
							<th>Item Code</th>
							<th>Name</th>
							<th>Stock</th>
							<th>Price</th>


						</tr>
					</thead>
					<?php
					$query ="SELECT * FROM invoice_order_item";
					$res=mysqli_query($con, $query);
					if($res){
						while($rows = mysqli_fetch_assoc($res))
						{
							$id=$rows['order_id'];
							$itemcode=$rows['item_code'];
							$name=$rows['item_name'];
							$quantity=$rows['order_item_quantity'];
							$price=$rows['order_item_price'];
							echo'
							<tr>
							<td> '.$id.'</td>
							<td>'.$itemcode.'</td>
							<td>'.$name.'</td>
							<td>'.$quantity.'</td>
							<td>'.$price.'</td>
							
							</tr>';
						}
					}


					?>

				</table><br>

			</main>