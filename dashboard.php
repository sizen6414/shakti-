<?php
session_start();
include('header.php');
include('Invoice.php');
$invoice = new Invoice();
$invoice->checkLoggedIn();
?>
<?php
include_once('dbcon.php');

$query = "SELECT * FROM invoice_user";
$res = mysqli_query($con, $query);
?>

<html>

<body>

	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
	<link href="https://fonts.googleapis.com/css2?family=Anton&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

	<style type="text/css">
		.navbar {
			width: 85%;
			margin: auto;
			padding: 35px 0;
			display: flex;
			align-items: center;
			justify-content: space-between;
		}

		.navbar ul li {
			list-style: none;
			display: inline-block;
			margin: 0 20px;
			position: relative;
		}

		.navbar ul li a {
			text-decoration: none;
			color: #fff;
			text-transform: uppercase;
		}

		.navbar ul li::after {
			content: '';
			height: 3px;
			width: 0;
			background: #009688;
			position: absolute;
			left: 0;
			bottom: -10px;
			transition: 0.5s;
		}

		.navbar ul li:hover::after {
			width: 100%;

		}

		.navbar-brand {
			color: white;
		}

		.root {
			color: #6f6af8;
			transition: all 300ms ease;

		}

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
			height: 140vh;
			background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url(tax.jpg);
			background-size: cover;
			background-position: center;
		}

		body {
			font-family: 'Montserrat', sans-serif;
			line-height: 1.6;
			color: black;
			overflow-x: hidden;
			background: #63767a;
			font-size: 0.9rem;
		}

		.container {
			width: 88%;
			max-width: 1800px;
			margin: auto;
			border-radius: 20px;
		}

		section {
			margin-top: 3rem;
			width: 100vw;
		}

		h1,
		h2,
		h3,
		h4,
		h5 {
			color: white;
			line-height: 1.3;
		}

		h1 {
			font-size: 3rem;
			margin: 1rem 0;
		}

		h2 {
			font-size: 1.7rem;
			margin: 1rem 0;
			color: black;
			text-align: center;
		}

		a {
			text-decoration: none;
			color: white;
			transition: all 300ms ease;
		}

		.dashboard {
			margin-top: 1rem;
		}

		.dashboard__container {
			display: grid;
			grid-template-columns: 14rem auto;
			gap: 1.5rem;
			background: white;
			padding: 2rem;
			margin-bottom: 2rem;
			padding-top: 2rem;
			padding-bottom: 2rem;
		}

		.dashboard aside a {
			background-color: #5eaaf2;
			;
			display: flex;
			gap: 1rem;
			align-items: center;
			padding: 1.6rem;
		}

		.dashboard aside ul li:not(:last-child) a {
			border-bottom: 1px solid black;
		}

		.dashboard aside a:hover {
			background: #4287f5;
			text-decoration: none;
		}

		.dashboard aside a.active {
			background-color: #4287f5;
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
	</style>
	<link rel="stylesheet" href="css/datatables-sytle.css">
	<script src="js/datatables-simple-demo.js"></script>
	<script src="js/simple-datatables@latest"></script>
	</head>

	<body class="">
		<div class="banner">

			<?php include('navbar.php'); ?>


			<div class="dashboard">
				<div class="container dashboard__container">
					<aside>
						<ul>
							<li><a href="admininvoicelist.php"><i class="uil uil-notebooks"></i></i>
									<h5>Invoice List</h5>
								</a>
							</li>
							<li><a href="adminpurchaselist.php"><i class="uil uil-notebooks"></i></i>
									<h5>Purchase List</h5>
								</a>
							</li>
							<li><a href="dashboard.php"><i class="uil uil-users-alt"></i></i>
									<h5>Manage User</h5>
								</a>
							</li>
							<li><a href="adminmanagecompany.php"><i class="uil uil-ellipsis-h"></i></i>
									<h5>Manage Companies</h5>
								</a>
							</li>
							<li>
								<a href="adminmanageprod.php"><i class="uil uil-ellipsis-h"></i></i>
									<h5>Manage Products</h5>
								</a>
							</li>

							<li><a href="reportsales.php"><i class="uil uil-notebooks"></i></i>
									<h5>Sales Report</h5>
								</a>
							</li>

						</ul>
					</aside>
					<main>
					<button onclick="history.back()" class="btns" style="border-radius: 0px; font-size: 20px;">Go Back</button>
						<h2>Manage Users</h2>

						<table id="datatablesSimple" class="table table-condensed table-hover table-striped table-reponsive-sm">
							<thead>
								<tr>
									<th>UserID</th>
									<th>Email</th>
									<th>First name</th>
									<th>Last name</th>
									<th>Phone</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>

							<?php
							$query = "SELECT * FROM invoice_user order by id desc";
							$res = mysqli_query($con, $query);
							if ($res) {
								while ($rows = mysqli_fetch_assoc($res)) {
									$id = $rows['id'];
									$email = $rows['email'];
									$firstname = $rows['first_name'];
									$lastname = $rows['last_name'];
									$mobile = $rows['mobile'];
									echo '
						<tr>
							<td> ' . $id . '</td>
							<td>' . $email . '</td>
							<td>' . $firstname . '</td>
							<td>' . $lastname . '</td>
							<td>' . $mobile . '</td>
							<td><a href="update-user.php?updateid=' . $id . '"  title="Update Invoice"><button class="btns"><i class="fa fa-edit"></i></button></a></td>
								
								
									<td><a href="delete-user.php?deleteid=' . $id . '"  title="Delete User"><button class="btns"><i class="fa fa-trash"></i></button></a></td>
								
							</tr>';
								}
							}

							?>
						</table><br>
						<a href="adminadduser.php"><button style="margin-left: 30rem;" class="btns" name="Add Company"><i class=""></i>Add</button></a>


					</main>
				</div>
			</div>
			<br>
			<?php include('footer.php'); ?>
		</div>
		</div>
	</body>

</html>