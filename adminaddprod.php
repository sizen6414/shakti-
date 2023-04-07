<?php
session_start();
include('header.php');
include('dbcon.php');
if (isset($_POST['submit'])) {
  $ic = $_POST['ic'];
  $itemname = $_POST['item_name'];
  $stock = $_POST['stock'];
  $price = $_POST['price'];
  $sql = "insert into invoice_order_item(item_code,item_name,order_item_quantity, order_item_price) VALUES('$ic','$itemname','$stock', '$price')";
  $result = mysqli_query($con, $sql);
  if ($result) {
    echo "<script>alert('data entered sucessfully')</script>";
    header("location:adminmanageprod.php");
  } else {
    echo ("errorrrrr");
  }
}

?>
<html>

<head>
  <div class="banner">
    <?php include 'navbar.php'; ?>
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
      <button onclick="history.back()" class="btns" style="border-radius: 0px; font-size: 20px;">Go Back</button>
      <h5>Add Product</h5>
      <div class="login-form">

        <div class="main">
          <form method="post" action="">
            <div class="form-group">
              <input type="text" placeholder="Item code" class="form-control" name="ic" required>
              <input type="text" placeholder="Item name" class="form-control" name="item_name" required>
              <input type="text" placeholder="quantity" class="form-control" name="stock" required>
              <input type="text" placeholder="price" class="form-control" name="price" required>
              <br>
              <button type="submit" class="btns" class="btn btn-success" name="submit" on>ADD</button>
            </div>
          </form>
        </div>

      </div>

    </div>
    <br><br><br><br> <br><br> <br>
    <div>
      <?php include('footer.php'); ?>
    </div>
    </div>

  </section>

</body>
</div>
</div>
</head>

</html>