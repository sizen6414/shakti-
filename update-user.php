<?php
session_start();
include('header.php');
include('dbcon.php');

$id = $_GET['updateid'];
$q = "SELECT * FROM invoice_user WHERE id = $id";
$res = mysqli_query($con, $q);
$r = mysqli_fetch_assoc($res);

if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $address = $_POST['address'];
  $mobile = $_POST['mobile'];

  $sql = "update invoice_user set id=$id,email='$email', password='$password', first_name='$firstname', last_name='$lastname', address='$address', mobile='$mobile' where id=$id";
  $result = mysqli_query($con, $sql);
  if ($result) {
    echo "updated successfully";
    header("location:dashboard.php");
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
      <h5>Update User</h5>
      <div class="login-form">

        <div class="main">
          <form method="post" action="">
            <div class="form-group">
              <input type="email" placeholder="Email" class="form-control" name="email" value=<?php echo $r['email'] ?>>
              <input type="text" placeholder="Create Password" class="form-control" id="password" name="password" value=<?php echo $r['password'] ?>>
              <input type="text" placeholder="First Name" class="form-control" name="firstname" value=<?php echo $r['first_name'] ?>>
              <input type="text" placeholder="Last Name" class="form-control" name="lastname" value=<?php echo $r['last_name'] ?>>
              <input type="text" placeholder="address" class="form-control" name="address" value=<?php echo $r['address'] ?>>
              <input type="number" placeholder="phone" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" class="form-control" name="mobile" value=<?php echo $r['mobile'] ?>><br>
              <button type="submit" class="btns" class="btn btn-success" name="submit">Update User</button>
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