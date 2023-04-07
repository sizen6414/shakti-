<?php
session_start();
include('header.php');
include('dbcon.php');

$id = $_GET['updateid'];

$id = $_GET['updateid'];
$q = "SELECT * FROM `invoice_order_item` WHERE `order_id`='$id'";
$res = mysqli_query($con, $q);
$r = mysqli_fetch_assoc($res);

if (isset($_POST['submit'])) {

  $itemcode = $_POST['item_code'];
  $name = $_POST['item_name'];
  $stock = $_POST['stock'];
  $price = $_POST['price'];

  $sql = "update invoice_order_item set  item_code='$itemcode', item_name='$name', order_item_quantity='$stock', order_item_price='$price' where order_id=$id";
  $result = mysqli_query($con, $sql);
  if ($result) {
    echo "updated sucessfully";
    header("location:adminmanageprod.php");
  } else {
    echo ("errorrrrr");
  }
}

?>
<html>

<head>
  <div class="banner">
    <nav class="navbar">
      <a href="about.php" class="navbar-brand">SHAKTI GROUP</a>
      <div>
        <ul>
          <li><a class="nav-link" href="dashboard.php">DASHBOARD</a></li>
          <li><a class="nav-link" href="action.php?action=logout">LOGOUT</a></li>
        </ul>
      </div>
    </nav>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Shakti billing</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style type="text/css">
      .banner {
        width: 100%;
        height: 110vh;
        background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url(tax.jpg);
        background-size: cover;
        background-position: center;
      }
    </style>
</head>

<body>
  <section class="form_section">

    <div class="box">
      <h5>Update Product</h5>
      <div class="login-form">

        <div class="main">
          <form method="post" action="">
            <div class="form-group">
              <input type="text" placeholder="Item code" class="form-control" name="item_code" oninput="this.value = 
 !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" value="<?php echo $r['item_code']; ?>">
              <input type="text" placeholder="Item name" class="form-control" name="item_name" value="<?php echo $r['item_name']; ?>">
              <input type="text" placeholder="quantity" oninput="this.value = 
 !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" class="form-control" name="stock" value="<?php echo $r['order_item_quantity']; ?>">
              <input type="text" placeholder="price" class="form-control" oninput="this.value = 
 !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" name="price" value="<?php echo $r['order_item_price']; ?>">
              <br>
              <button type="submit" class="btns" class="btn btn-success" name="submit" on>UPDATE</button>
            </div>
          </form>
        </div>

      </div>
    </div>
    <br><br><br><br> <br>
    <div>

      <?php include('footer.php'); ?>
    </div>
    </div>
    </div>
  </section>
</body>
</div>
</div>
</head>

</html>