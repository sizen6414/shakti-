<?php 
session_start();
include('header.php');
include ('dbcon.php');
include 'Invoice.php';

?>
<html>
<title>shakti billing</title>
<head>
  <?php include('links.php');?>

  <style type="text/css">
    .banner
      {
      width: 100%;
      height: 100vh;
      background-image: linear-gradient(rgba(0, 0, 0,0.75), rgba(0, 0, 0, 0.75)), url(tax.jpg);
      background-size: cover;
      background-position: center;
      }
    .container
    {
      background-color: white;
      padding-top: ;
      border-radius: 25px;
      }
      .messagebox{
        border-radius: 10px;
        height: 40px;
        width: 300px;
      }
      .messages{
        width: 300px;
        height:150px;
        border-radius: 10px;
      }
  </style>
</head>
<body>
  <div class="banner">
    <?php include('container.php');?>
  
    <section class="form_section">

     <div class="box">
      <h5>select Message</h5>
      <div class="login-form">
        <div class="main">
          <ol>
        <?php 
        $users= mysqli_query($con, "select * from invoice_user") or die ("Failed to query database". mysql_error());
        while ($user = mysqli_fetch_assoc($users))
        {
          echo '<li>
          <a href ="message.php?id='.$user["id"].'">' .$user["first_name"].'</a>
          </li>';
        }
        ?>
      </ol>
   </div>
 </div>
</div>
</div>
</section>
</body>
</html>



