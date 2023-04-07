
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Search bar</title>
	<style type="text/css">
		label{
			color: white;
			font-size: 15px;
		}
		input{
			width: 400px;
			border-radius: 10px;
			height: 30px;
		}
		.searchb{
			align-content: center;
			margin-left: 500px;
		}
		.button{
			font-family: "roboto" , sans-serif;
  			font-size: 15px;
 	 		background: #5eaaf2;
 			width: 80px;
  			height: 32px;
  			padding:5px ;
  			text-align: center;
 			text-decoration: none;
  			color: #fff;
 			border-radius: 10px;
  			cursor: pointer;
  			margin: auto;
		}
	</style>
</head>
<body>
<div class="searchb">

<form method="post">
	<div class="form-group">
		<label> Search Date:</label>&nbsp;
		<input type="date" name="date" class="">
		<button type="submit" class="button"><b>Search</b></button>
	</div>
	
	
</form>
</div>
</body>
</html>
<?php
include 'dbcon.php';

		if (isset($_POST['submit']))
			{
					$str = $_POST['date'];
						$query="SELECT * from invoice_order where order_date='$str'";
						$res=mysqli_query($con, $query);
								if($res)
								{
									while($rows = mysqli_fetch_assoc($res))
											{
												$id=$rows['order_id'];
												$name=$rows['order_receiver_name'];
												$dates=$rows['orderdate'];
												$total=$rows['order_total_after_tax'];
												
												echo'
												<tr>
												<td> '.$id.'</td>
												<td>'.$name.'</td>
												<td>'.$dates.'</td>
												<td>'.$total.'</td>
						
												</tr>';
											}
								}
			}
?>