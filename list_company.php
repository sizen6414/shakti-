<?php
session_start();
include('header.php');
include 'Invoice.php';
include('dbcon.php');
?>
<title>shakti billing</title>
<script src="js/invoice.js"></script>
<link href="styles.css" rel="stylesheet">
<style type="text/css">
	.banner {
		width: 100%;
		height: 150vh;
		background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url(tax.jpg);
		background-size: cover;
		background-position: center;
	}

	.container {
		background-color: white;
		padding-top: ;
		border-radius: 10px;
	}

	th {
		background: #4287f5;
		color: white;
	}
</style>
<link rel="stylesheet" href="css/datatables-sytle.css">
<script src="js/datatables-simple-demo.js"></script>
<script src="js/simple-datatables@latest"></script>

<body>
	<div class="banner">
		<?php include('container.php'); ?>
		<div class="container"> <br>
			<h2 class="title mt-5">SHAKTI BILLING SYSTEM</h2><br>
			<main>
				<h2>Company</h2>
				<div class="table-responsive">
					<table id="datatablesSimple" class="table table-condensed table-hover table-striped">
						<thead>
							<tr>
								<th>S.N</th>
								<th>Name</th>
								<th>Address</th>
								<th>Email</th>
								<th>Contact</th>
							</tr>
						</thead>
						<?php
						$query = "SELECT * FROM company order by SN desc";
						$res = mysqli_query($con, $query);
						if ($res) {
							while ($rows = mysqli_fetch_assoc($res)) {
								$sn = $rows['SN'];
								$name = $rows['name'];
								$email = $rows['email'];
								$address = $rows['address'];
								$contact = $rows['contact'];

								echo '
						<tr>
						<td>' . $sn . '</td>	
							<td>' . $name . '</td>
							<td>' . $email . '</td>
							<td>' . $address . '</td>
							<td>' . $contact . '</td>
							</tr>';
							}
						}

						?>

					</table>
					<div class="table-responsive"><br>
			</main>
		</div>
	</div>
	</div>
	</div>

	</div>
</body>

</html>