<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>contact us</title>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			font-family: "montserrat",sans-serif;
		}
		body{
				background: url(contact.png);
			background-size: cover;
			padding: 40px 0;
		}
		.contact-section{
		margin-top: 8%;
		box-sizing: border-box;

		}
		.contact-section h1{
			text-align: center;
			color: #fff;
		}
		.border{
			width: 100px;
			height: 10px;
			background: ;
			margin: 40px auto;
		}
		.contact-form{
			max-width:600px ;
			margin: auto;
			padding: 0 10px;
			overflow: hidden;
		}
		.contact-form-text{
			display: block;
			width: 100%;
			height: 50px;
			box-sizing: border-box;
			margin: 10px;
			text-align: center;
			background: #fff;
			outline: none;
			color: ;
			transition: 0.5s;
			border-radius: 28px;
		}
		textarea.contact-form-text{
			resize: none;
			height: 150px;
			text-align: center;
		}

		.contact-form-btn{
			float: right;
			border: 0;
			background: #111;
			color: #fff;
			padding: 12px 50px;
			border-radius: 28px;
			cursor: pointer;
			transition: 0.5s;
		}
		.contact-form-btn:hover{
			background: #2980b9;
		}
		.box{
			width: 800px;
			margin:auto;
			border-radius: 15px;
			background-color: rgba(0, 0, 0, 0.65);
			align-content: center;
			padding-top: 15px;
			padding-bottom: 15px;
		}
	</style>
</head>
<body>
	<div class="box">
	<div class="contact-section">
		<h1>CONTACT US</h1><br>
		<form class="contact-form" action="index.html" method="post">
			<input type="text" class="contact-form-text" placeholder="Your Name">
			<input type="email" class="contact-form-text" placeholder="Email Address">
			<input type="text" class="contact-form-text" placeholder="Phone Number">
			<textarea class="contact-form-text" placeholder="Your Message"></textarea>
			<input type="submit" class="contact-form-btn" value="SEND">
			
		</form>

	</div>
</div>
</body>
</html>