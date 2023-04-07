<?php
session_start();
include("dbcon.php");
include('container.php');
include("header.php");

$users = mysqli_query($con, "select * from invoice_user where id = '" . $_SESSION['userid'] . "' ");
$user = mysqli_fetch_assoc($users);
?>
<!DOCTYPE html>
<html>
<meta name=”viewport” content=”width=device-width, initial-scale=1.0”>

<head>

	<title>chatbox</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<style type="text/css">
		.msgbod {
			background-color: white;
			width: 450px;
			margin-left: 38%;
			height: 400px;
			overflow-y: scroll;
			overflow-x: hidden;
			
			height: 500px;

		}
		.details{
			text-align: center;
			float: left;
			background-color: white;
			width: 200px;
			font-size: 18px;
			margin-left: 25%;
		}
		.messagebox {
			
			margin-left: 20px;
			margin-left: 38%;

		}
		.btns{}

		@media screen and (max-width: 500px) {
			.msgbod {
				background-color: white;
				width: 500px;
				margin-left: 35%;
				height: 400px;
				overflow-y: scroll;
				overflow-x: hidden;
				border-radius: 5px;
				position: relative;

			}
			.messagebox {
			position: absolute;
			margin-left: 20px;
			margin-left: 38%;
		}


		}
	</style>

</head>

<body>
	<div class="banner">
		<br>
		<div class="details">
						<a href="message.php">
				<-- Back</a><br>
			<p> Hello! <?php echo $user["first_name"];?></p>
			<p>Send message to:</p>
			<ul>
				<?php
				$msgs = mysqli_query($con, "select *from invoice_admin");

				while ($msg = mysqli_fetch_assoc($msgs)) {
					echo '<li><a href="?touser=' . $msg["id"] . '"">' . $msg["first_name"] . '</a></li>';
				}
				?>
			</ul>

		</div>
		<div>
			<?php

			if (isset($_GET["touser"])) {
				$username = mysqli_query($con, "select *from invoice_user where id ='" . $_GET["touser"] . "' ");

				$uname = mysqli_fetch_assoc($username);

				echo '<input type="text" value=' . $_GET["touser"] . ' id="touser" hidden/>';
				echo $uname["first_name"];
			} else {
				$username = mysqli_query($con, "select *from invoice_user");

				$uname = mysqli_fetch_assoc($username);
				$_SESSION['touser'] = $uname["id"];
				echo '<input type="text" value=' . $_SESSION["touser"] . ' id="touser" hidden/>';
				
			}
			?>
		</div>
		<div class="msgbod" id="msgbody">
			<?php
			echo $uname["first_name"];
			if (isset($_GET['touser'])) {
				$chats = mysqli_query($con, "select *from messages where(fromuser = '" . $_SESSION["userid"] . "' AND touser= '" . $_GET['touser'] . "') OR fromuser = '" . $_GET["touser"] . "' AND touser= '" . $_SESSION['userid'] . "')");
			} else {
				$chats = mysqli_query($con, "select *from messages where(fromuser = '" . $_SESSION["userid"] . "' AND touser= '" . $_SESSION['touser'] . "') OR fromuser = '" . $_SESSION["touser"] . "' AND touser= '" . $_SESSION['userid'] . "'");

				while ($chat = mysqli_fetch_assoc($chats)); {
					if ($chat = ["fromuser"] == $_SESSION['userid']) {
						echo '<div style="text-align :right;">
			
			<p style"background-color:lightblue; word-warp: break-word; display: inline-block;".$chat["message"]."</p></div>';
					} else {

						echo '<div style="text-align :left;">
			<p style"background-color:lightblue; word-warp: break-word; display: inline-block;".$chat["message"]."</p></div>';
					}
				}
			}

			?>
		</div>
		<div class="messagebox">
				<textarea id="message" class="" style="height:5%; width: 450px; background-color: #dce0dd;"></textarea><br><br>
				<button id="send" class="btns" style="height:3%; float: left; ">SEND</button>

			</div>
	</div>
</body>
<script >
	$(document).ready(function () {
		$("#send").on("click", function(){
			$.ajax({
				url:"insertmsg.php",
				method:"POST",
				data:{
					fromuser: $("#fromuser").val(),
					touser:$("#touser").val(),
					message: $("#message").val()
				},
				dateType:"text",
				{
					$("#message").val("");
				}

			});
		});
		// body...
	});
</script>
</html>