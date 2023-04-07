<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>About us</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<style type="text/css">
		* {
			margin: 0px;
			padding: opx;
			box-sizing: border-box;
			font-family: sans-serif;
		}

		.section {
			width: 80%;
			min-height: 100vh;
			background-color: white;

			margin: auto;
		}

		.container {
			width: 80%;
			display: block;
			margin: auto;
			padding-top: 100px;
		}

		.content-section {
			float: left;
			width: 55%;
		}

		.image-section {
			float: right;
			width: 40%;
		}

		.image-section img {
			width: 80%;
			height: auto;
		}

		.content-section .title {
			text-transform: uppercase;
			font-size: 28px;
		}

		.content-section .content {
			margin-top: 20px;
			color: #5d5d5d;
			font-size: 21px;
		}

		.content-section .content p {
			margin-top: 10px;
			font-family: sans-serif;
			font-size: 18px;
			line-height: 1.5;
			text-align: justify;
		}

		.content-section .content .button {
			margin-top: 30px;
		}

		.content-section .content .button a {
			background-color: #3d3d3d;
			padding: 12px 40px;
			text-decoration: none;
			color: #fff;
			font-size: 25px;
			letter-spacing: 1.5px;
			border-radius: 28px;
		}

		.content-section .content .button a:hover {
			background-color: #a52a2a;
			color: #fff;
		}

		.content-section {}

		.banner {
			width: 100%;
			height: 100vh;
			background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url(gallery.jpg);
			background-size: cover;
			background-position: center;
		}
	</style>
</head>

<body>

	<div class="banner">
		

		<div class="section">
			<button onclick="history.back()" class="btns" style="border-radius: 0px; font-size: 20px;">Go Back</button>
			<div class="container">

				<div class="content-section">
					<div class="title">
						<h2> SHAKTI GROUP</h2>
					</div>
					<div class="content">
						<p>Shakti Group is a medicine import and distribution company which was established in 1985 AD, registered under the Department of Drug Administration(DDA). This company is located at Lainchaur, Kathmandu. Its main function is to  import  medicines  from foreign manufacturers, provide them to the medicine suppliers and then send them to retailers  present here in Nepal. It not only imports and supplies medicine but also some food products. Shakti group has four firms under it name, they are:<br><br> 
-Shakti medicare suppliers: 
This firm mainly imports allopathic medicines and drugs from foreign  manufacturers.<br>
-Shakti Business House:
This firm imports food products from foreign manufacturers.<br>
-Shakti medicare ayurved distributor:
This firm imports ayurvedic medicines from the foreign manufacturers.<br>
-Shakti Distributors: 
The main work of this firm is to distribute all of the products to the supplier companies that are under all of the above mentioned firms. 
</p>
					
					</div>
				</div>
				<div class="image-section">
					<img src="image/office1.jpg">
				</div>
			</div>
		</div>
	</div>
</body>

</html>