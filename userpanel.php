<?php 
session_start();
include('header.php');
include 'Invoice.php';
$invoice = new Invoice();
$invoice->checkLoggedIn();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>sliderpage</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	
	<style type="text/css">
		.banner{
  width: 100%;
  height: 120vh;
  background-image: linear-gradient(rgba(0, 0, 0,0.75), rgba(0, 0, 0, 0.6)), url(image/bgimage3.jpg);
  background-size: cover;
  background-repeat: repeat-y;
  background-position: center;

}
		.slider{
			width: 1000px;
			height: 550px;
			border-radius: 10px;
			overflow: hidden ;
			justify-content: center;
			margin-left: 20%;
		}
		.slider figure
		{
			position: relative;
			width: 500%;
			margin: 0;
			left: 0;
			animation: 20s slider infinite;
		}
		#slider figure img{
			width: 20%;
			float: left;
		}
		@keyframes slider
		{
			0%{
				left: 0;

			}
			20%{
				left: 0;
			}
			25%{
				left: -100%;
			}
			45%{
				left: -100%;
			}
			50%{
				left: -200%;
			}
			70%{
				left: -200%;
			}
			75%{
				left: -300%;
			}
			95%{
				left: -300%;
			}
		}
		button{
			margin-left: auto;
			margin-right: auto;
			display: block;
		}
		img	{
			height: 500px;
			width: 	1000px;
		}
		.buttns{
			width: 100px;
			margin-left: 800px;
			display: inline-blocks;
		}
		.button-container{

  height: 100px;
  width: 100%;
  display: flex;
  align-content: center;
  justify-content: center;
  padding: 4px 4px 4px 4px;

}
.button1{
  border-radius: 35px;
  height: 60px;
  width: 20%;
  background-color: #5eaaf2;;
  text-align: center;
  font-size: 20px;
  color: white;
   font-family: 'roboto', sans-serif;
  font-weight: 600;
  }
  
  .button2{
  border-radius: 35px ;
  height: 60px;
  width: 20%;
  text-align: center;
  font-size: 20px;
  color: white;
    font-family: 'roboto', sans-serif;
  font-weight: 600;
  background-color: #5eaaf2;;
	</style>

</head>
<body>
	<div class="banner">
		<?php include ('container.php');?><br>

		<div class="slider" id="slider">
			
			<figure>
				<div class="slide first ">
					<img src="image/board1.jpg" alt="">
				</div>

				<div class="slide ">
					<img src="image/board.jpg" alt="">
				</div>

				<div class="slide ">
					<img src="image/aausadi.jpg" alt="">
				</div>

				<div class="slide ">
					<img src="image/aausadi2.jpg" alt="" >
				</div>
			</figure>

			<div class="navigation-auto">
				<div class="auto-btn1"></div>
				<div class="auto-btn1"></div>
				<div class="auto-btn1"></div>
				<div class="auto-btn1"></div>
				
			</div>
		</div>

		<div class="button-container">
		<button type="button"  class="button1" onclick="document.location='create_invoice.php'" >SALES</button>&nbsp &nbsp
		<button type="button"  class="button2" onclick="document.location='create_purchaseinvoice.php'" >PURCHASE</button>
</div>
<div style="font-size: 25px;">
<?php include 'footer.php' ;?>
</div>
</div>


</body>
</html>