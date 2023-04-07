<head>
<?php
include('header.php');
?>
  <style type="text/css">
    .navbar{
      width: 85%;
      margin: auto;
      padding: 35px 0;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .navbar ul li{
      list-style: none;
      display: inline-block;
      margin: 0 20px;
      position: relative;
    }
    .navbar ul li a{
      text-decoration: none;
      color: #fff;
      text-transform: uppercase;
    }
    .navbar ul li::after{
      content: '';
      height: 3px;
      width: 0;
      background: #5eaaf2;
      position: absolute;
      left: 0;
      bottom: -10px;
      transition: 0.5s;
    }
    .navbar ul li:hover::after{
      width: 100%;

    }
    .navbar-brand{
      color:white ;
    }
  </style>
</head>
<body class="">

    <nav class="navbar">
<a href="about.php" class="navbar-brand" style="font-size: 25px;"><b>SHAKTI GROUP</b></a>

 <div>

  <!-- Navbar links -->

    <ul>
     
       <li> <a class="nav-link" href="userpanel.php">CREATE</a></li>
       <li><a class="nav-link" href="invoice_list.php">SALES LIST</a></li>
         <li><a class="nav-link" href="purchase_list.php">PURCHASE LIST</a></li>
        <li><a class="nav-link" href="list_product.php">PRODUCTS</a></li>
         <li><a class="nav-link" href="list_company.php">COMPANY</a></li>
   

<?php 
if($_SESSION['userid']) { ?>
  <li class="dropdown" style="text-decoration: none;">
    <button class="btn2 btn-secondary dropdown-toggle border-0" type="button" style="background: #5eaaf2; border-radius: 0px;" data-toggle="dropdown">User: <?php echo $_SESSION['user']; ?>
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="background: whitesmoke; border-radius: 0px; ">
    
      <li style=" height: 14%; width: 255px;"> <a class="dropdown-item"  style="text-align: center; color:  #5eaaf2; font-size: 20px   ; text-decoration: none;" href="action.php?action=logout"><b>LOGOUT</b></a></li>      
    </ul>
  </li>
<?php } ?>



      </li>
    </ul>
  </div> 
</nav>


</body></HEAD>