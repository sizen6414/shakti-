<?php
session_start();
include('header.php');
include('dbcon.php');

?>

<html>

<body>

	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
	<link href="https://fonts.googleapis.com/css2?family=Anton&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="sidebar.css">
	<style type="text/css">
		* {
			margin: 0;
			padding: 0;
			outline: 0;
			border: 0;
			list-style: none;
			text-decoration: none;

		}

		.banner {
			width: 100%;
			height: 150vh;
			top: 0;
			background-size: cover;
			background-position: center;
			position: absolute;
		}

		body {
			font-family: 'Montserrat', sans-serif;
			line-height: 1.6;
			color: black;
			overflow-x: hidden;
			background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url(tax.jpg);
			font-size: 0.9rem;
		}

		.container {
			width: 88%;
			max-width: 1116px;
			margin-top: 50px;
			border-radius: 20px;
			position: relative;
			margin-left: 150px;


		}

		section {
			margin-top: 3rem;
			width: 100vw;
		}





		.dashboard {
			margin-top: 1rem;

		}

		.dashboard__container {

			grid-template-columns: 14rem auto;
			gap: 1.5rem;
			background: white;
			padding: 2rem;
			margin-bottom: 5rem;
		}




		.dashboard main {
			margin-left: 1.5rem;

		}

		.dashboard main h2 {
			margin: 0 0 2rem 0;
			line-height: 1;
		}

		.dashboard main table {
			width: 100%;
			text-align: left;
			border: none;
		}

		.dashboard main table th {
			background: #4287f5;
			padding: 0.8rem;
			color: white;
		}

		.dashboard main table td {
			padding: 0.8rem;
			border-bottom: 1px solid gray;

		}

		.dashboard main table tr:hover td {
			background: #bbbcbd;
			color: black;
			cursor: default;
			transition: all 300ms ease;

		}

		.btns {
			font-family: "roboto", sans-serif;
			font-size: 14px;
			background: #5eaaf2;
			width: 100px;
			padding: 10px;
			text-align: center;
			text-decoration: none;
			color: #fff;
			border-radius: 5px;
			cursor: pointer;
			margin: auto;
		}

		.btns:hover,
		.btns:focus,
		.btns:active {
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
		}

		* {
			margin: 0;
			padding: 0;
			outline: none;
			border: none;
			text-decoration: none;
			box-sizing: border-box;
			font-family: 'poppins', sans-serif;

		}



		nav {
			z-index: 5;
			position: relative;
			top: 0;
			bottom: 0;
			height: 100%;
			left: 0;
			background: white;
			width: 90px;
			overflow: hidden;
			transition: width 0.2s linear;
			box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
		}

		.logo {
			text-align: center;
			display: flex;
			transition: all 0.5s ease;
			margin: 10px 0 0 10px;
		}

		.logo span {
			width: 45px;
			height: 45px;
			border-radius: 50%;
			font-weight: bold;
			padding: 15px;
			font-size: 30px;
			text-transform: uppercase;
		}

		a {
			position: relative;
			color: ;
			font-size: 14px;
			display: table;
			width: 300px;
			padding: 10px;
		}

		.fas {
			position: relative;
			width: 70px;
			height: 40px;
			top: 14px;
			font-size: 20px;
			text-align: center;
		}

		.nav-item {
			position: relative;
			top: 12px;
			margin-left: 10px;
		}

		a:hover {
			background: #eee;

		}

		nav:hover {
			width: 280px;
			transition: all 0.5s ease;
		}

		.logout {
			position: absolute;

		}

		h2 {
			font-size: 25px;
			text-align: center;
		}
	</style>
	</head>

	<body>
		<div class="banner">
			<nav class="sidebar" id="sidebar">
				<header class="logo"><a href="about.php">SHAKTI GROUP</a></header>
				<ul>

					<li> <a href="admininvoicelist.php"><i class="fas fa-tasks"></i><span class="navitem">Invoice List</span></a></li>
					<li> <a href="adminpurchaselist.php"><i class="fas fa-tasks"></i><span class="navitem">Purchase List</span></a></li>
					<li> <a href="dashboard.php"><i class="fas fa-user"></i><span class="navitem">Users</a></li>
					<li> <a href="adminmanageprod.php"><i class="fas fa-wallet"></i><span class="navitem">Products</span></a></li>
					<li> <a href="adminmanagecompany.php"><i class="fas fa-home"></i><span class="navitem">Companies</span></a></li>
					<li> <a href="reportsales.php"><i class="fas fa-book"></i><span class="navitem">Sales Report</a></li>
					<li><a class="logout" href="action.php?action=logout"><i class="fas fa-sign-out-alt"></i><span class="nav-item"> LOGOUT</span></a></li>
				</ul>
			</nav>
		</div>
		<div class="dashboard">
			<div class="container dashboard__container">
				<main>
					<button onclick="history.back()" class="btns" style="border-radius: 0px; font-size: 20px;">Go Back</button>
					<h2> Sales Report</h2>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="table table-responsive">
								<form method="GET" action="">
									<div class="form-group">
										<label>From Date:</label>
										<input type="date" name="from_date" class="form-control" value="<?php if (isset($_GET['from_date'])) {
																											echo $_GET['from_date'];
																										} ?>">
									</div>

									<div class="form-group">
										<label>To Date:</label>
										<input type="date" name="to_date" class="form-control" value="<?php if (isset($_GET['to_date'])) {
																											echo $_GET['to_date'];
																										} ?>">
									</div>
									<?php
									$query2 = mysqli_query($con, "SELECT * FROM `invoice_order_item`");
									?>

									<?php
									$query1 = mysqli_query($con, "SELECT * FROM `invoice_order`");
									?>
									<div class="form-group">
										<select name="companyName" id="companyName" class="form-control">
											<option selected disabled>Customer</option>
											<?php
											while ($row2 = mysqli_fetch_assoc($query1)) {
											?>
												<option value="<?php echo $row2['order_id']; ?>"><?php echo $row2['order_receiver_name']; ?></option>
											<?php
											}
											?>

										</select>
									</div>
									<div class="form-group">
										<label></label><br>
										<button type="submit" class="btns">Generate</button>
									</div><br>
								</form>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<table id="data-table" class="table table-condensed table-hover table-striped">
								<thead>
									<tr>
										<th>Invoice No.</th>
										<th>Product Name</th>
										<th>Created Date</th>
										<th>Total</th>

								</thead>
								<tbody id="res">

								</tbody>
								<?php
								if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
									$from_date = $_GET['from_date'];
									$to_date = $_GET['to_date'];
									$id = $_GET['companyName'];
									//print_r($company);
									$q = "SELECT * FROM invoice_order WHERE order_id = '$id' AND order_date between '$from_date' AND '$to_date'";
									//print_r($q);
									$run = mysqli_query($con, $q);
									// print_r($run);
									// echo mysqli_num_rows($run);
									// if (mysqli_num_rows($run) > 0) {
									// 	echo "j";
									// }

									//print_r($result);

									if (mysqli_num_rows($run) > 0) {

										$q1 = "SELECT * FROM invoiceitem_save WHERE order_id =$id AND order_date between '$from_date' AND '$to_date'";
										$result = mysqli_query($con, $q1);

										while ($r = mysqli_fetch_assoc($result)) {


								?>
											<tr>
												<td><?= $r['order_id']; ?></td>
												<td><?= $r['item_name']; ?></td>
												<td><?= $r['order_date']; ?></td>
												<td><?= $r['order_item_price'] * $r['order_item_quantity']; ?></td>
											</tr>

								<?php

										}
									} else {
										echo " No records found";
									}
								}

								?>

							</table>
							<br>
							TOTAL SALES:
							<?php
							if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
								$from_date = $_GET['from_date'];
								$to_date = $_GET['to_date'];
								if ($id != '') {
									$results = mysqli_query($con, "select sum(order_total_after_tax) from invoice_order where order_id=$id AND order_date between '$from_date' AND '$to_date'");
									while ($row = mysqli_fetch_array($results)) {
										echo $row['sum(order_total_after_tax)'];
									}
								} else {
									echo "record not created";
								}
							}
							?>

						</div>

					</div>
				</main>


			</div>
		</div>
		<br>
		<?php include('footer.php'); ?>
		</div>





		<script>
			$("#companyName").change(function() {

				var s = $("#companyName_1 option:selected").val();
				// alert(s);
				$.ajax({
					url: "value.php",
					method: 'Post',
					data: {
						name: x
					},
					dataType: 'json',
					success: (data) => {
						$("#productCode_1").val(data[1]);
						$("#price_1").val(data[0]);

					}
				});
			});
		</script>
	</body>

</html>