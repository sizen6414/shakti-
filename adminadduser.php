  <?php
  session_start();
  include('header.php');
  include('dbcon.php');
  $error = '';
  if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $sql = "insert into invoice_user(id, email,password,first_name,last_name,address,mobile) VALUES('$id','$email','$password','$firstname','$lastname','$address','$mobile')";
    $result = mysqli_query($con, $sql);
    if ($result) {
      echo "<script>alert(data entered sucessfully)</script>";
      header("location:dashboard.php");
    } else {
      $Error = "Invalid Username and Password";
    }
  }

  ?>
  <html>

  <head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="validate.js"></script>
    <div class="banner">
      <?php include('navbar.php'); ?>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title> Shakti billing</title>
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
        <h5>Add User</h5>
        <div class="login-form">
          <div class="main">
            <form method="post" action="">
              <div class="form-group">

                <?php if ($error) { ?>
                  <div class="alert alert-warning"><?php echo $error; ?></div>
                <?php } ?>
                <input type="email" placeholder="Email" id="email" class="form-control" onkeyup="myFunction();" name="email" required>
                <input type="password" placeholder="Create Password" class="form-control" id="password" name="password" required>
                <input type="text" placeholder="First Name" class="form-control" name="firstname" onkeyup="allLetter(inputtxt);" required>
                <input type="text" placeholder="Last Name" class="form-control" name="lastname" onkeyup="allLetter(inputtxt);" required>
                <input type="text" placeholder="address" class="form-control" name="address" onkeyup="allLetter(inputtxt);" required>
                <input type="text" placeholder="phone" class="form-control" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" name="mobile" onkeyup="" required><br>
                <button type="submit" class="btns" class="btn btn-success" name="submit">Add User</button>
              </div>
          </div>
          </form>
        </div>
      </div>

    </section>
    <div>
      <br>
      <?php include('footer.php'); ?>
    </div>
    </div>
    </div>
  </body>

  </html>