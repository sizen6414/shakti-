<?php
session_start();
include('header.php');
include('dbcon.php');
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $sql = "insert into company(name, address,email, contact) VALUES('$name','$address','$email', '$contact')";
  $result = mysqli_query($con, $sql);
  if ($result) {
    echo "data entered sucessfully";
    header("location:adminmanagecompany.php");
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
      <h5>Add Company</h5>
      <div class="login-form">

        <div class="main">
          <form method="post" action="">
            <div class="form-group">
              <input type="text" placeholder="Name" class="form-control" name="name">
              <input type="text" placeholder="Address" class="form-control" name="address">
              <input type="text" placeholder="Email" class="form-control" name="email">
              <input type="text" placeholder="Contact" oninput="this.value = 
 !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" class="form-control" name="contact">
              <br>
              <button type="submit" class="btns" class="btn btn-success" name="submit" on>ADD</button>
            </div>
          </form>
        </div>

      </div>

    </div><br><br><br><br> <br>
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