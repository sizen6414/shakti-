<?php
session_start();

$loginError = '';
if (!empty($_POST['email']) && !empty($_POST['pwd'])) {
	include 'Invoice.php';
	$invoice = new Invoice();
	$user = $invoice->loginUsers($_POST['email'], $_POST['pwd']);
	if (!empty($user)) {
		$_SESSION['user'] = $user[0]['first_name'] . "" . $user[0]['last_name'];
		$_SESSION['userid'] = $user[0]['id'];
		$_SESSION['email'] = $user[0]['email'];
		$_SESSION['address'] = $user[0]['address'];
		$_SESSION['mobile'] = $user[0]['mobile'];
		header("Location:userpanel.php");
	} else {
		// echo '<script>alert("Invalid Password or Email")</script>';
		
	}
}
?>
<html>

<head>
	<script src="js/invoice.js"></script>
	<link href="home.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
	<style type="text/css">
		.form-control {
			height: 46px;
			border-radius: 46px;
			border: none;
			padding-left: 1.5rem;
			padding-right: 1.5rem;
			margin-top: 1.5rem;
			background: rgb(213, 211, 222);
		}

		body {
			font-family: "Montserrat", sans-serif;

		}

		.box {
			width: 380px;
			margin: auto;
			border-radius: 15px;
			background-color: rgba(0, 0, 0, 0.5);
		}


		.login-form {
			text-align: center;
			padding-top: 50px;

		}

		.login-form h5 {
			color: white;
			font-size: 30px;
			margin-bottom: 20px;
		}

		.main {
			text-align: center;
		}

		.main input,
		button {
			width: 300px;
			height: 40px;
			border: none;
			outline: none;
		}

		button {
			width: 200px;
			padding: 10px 0;
			font-weight: 15px 0;
			text-align: center;
			margin: 20px 20px;
			border-radius: 25px;
			font-weight: bold;
			border: 2px solid #03a9fc;
			background: black;
			color: #fff;
			cursor: pointer;
			position: relative;
			overflow: hidden;
		}

		img {

			height: 100px;
			width: 100px;
		}
	</style>

<body>
	<div class="banner">
		<div class="navbarr">
			<ul>
				<br>
				<li style="color: #03a9fc;"><a href="home.html" class="">
						<h3>SHAKTI GROUP
					</a></h3>
				</li>
			</ul>
		</div>
		<br>
		<div class="box">
			<div class="login-form">
				<img src="user.png">
				<div class="main">
					<form method="post" action="">
						<div class="form-group">
							<?php if ($loginError) { ?>
								<div class="alert alert-warning"><?php echo $loginError; ?></div>
							<?php } ?>
						</div>
						<div class="form-group">
							<input name="email" id="email" type="email" class="form-control" onkeyup="myFunction();"placeholder="Email" required>
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="pwd" placeholder="Password" required>
						</div>
						<div id="message">
							<p style="color:red; margin-top:15px; ">
								<?php
								echo $loginError;
								?>

							</p>
							<script>
								function myFunction() {
									var x = document.getElementById("email").value;
									document.getElementById("message").style.display = 'none';
								}
							</script>
						</div>
						<div class="form-group">
							<button type="submit" name="login" class="btn btn-success">LOGIN</button>
						</div>
					</form>
					<br>
				</div>
			</div>
		</div>
	</div>

	</div>

	</div>

