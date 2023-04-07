<?php
session_start();
include('header.php');
include('dbcon.php');

$name = $_GET['updateid'];
$q = "SELECT * FROM `company` WHERE `name`='$name'";
// print_r($q);
$res = mysqli_query($con, $q);
$r = mysqli_fetch_assoc($res);
// print_r($r);
// die;

if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];


  $sql = "update company set name='$name', address='$address', email='$email', contact='$contact' where name='$name'";
  $result = mysqli_query($con, $sql);
  if ($result) {
    echo "updated sucessfully";
    header("location:adminmanagecompany.php");
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
      <h5>Update Company</h5>
      <div class="login-form">

        <div class="main">
          <form method="post" action="">
            <div class="form-group">
              <input type="text" placeholder="Name" class="form-control" name="name" value="<?php echo $r['name']; ?>">
              <input type="text" placeholder="Email" class="form-control" name="email" value="<?php echo $r['email']; ?>">
              <input type="text" placeholder="Address" class="form-control" name="address" value="<?php echo $r['address']; ?>">
              <input type="text" placeholder="Contact" class="form-control" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" name="contact" value="<?php echo $r['contact']; ?>">
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