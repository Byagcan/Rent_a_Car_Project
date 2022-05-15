<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="manager_css/signup_manager.css" />
  <script src="https://unpkg.com/scrollreveal"></script>
</head>

<body>
  <!-- Header start -->
  <header id="header">
    <div class="header">
      <div class="container">
        <div class="header-navbar">
          <div class="header-logo">
            <a href="index_manager.php" style="cursor: pointer"><img id="logo" src="../images/1.png" alt="" /></a>
            <div class="header-name">
              <h1>Rent A Car</h1>
            </div>
          </div>
          <div class="header-menu">
            <ul>
              <li><a href="index_manager.php">Home</a></li>
              <li><a href="login_manager.php">Log In</a></li>
              <li><a href="addcar_manager.php">Add Car</a></li>
              <li><a href="users_manager.php">Users</a></li>
              <li><a href="condition_manager.php">Conditions</a></li>
              <li id="lasthref">
                <a href="account_manager.php">Account</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- Header Finish -->

  <!--Sign up Start -->

  <section id="signup">
    <div class="signup">
      <div class="container">
        <div class="signup-content anime-top">
          <h1>SIGN UP</h1>
          <div class="form">
            <form action="signup_manager.php" method="post">
              <input type="text" name="namesurname" placeholder="Enter your Name Surname" id="name" />
              <input type="text" name="email" placeholder="Enter your Email" id="email" />
              <input type="password" name="password" placeholder="Company password" id="password" />
              <input type="password" name="passwordagain" placeholder="Company password again" id="passwordagain" />
              <input type="submit" name="signup" value="Sign Up" id="submit" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Sign up in Finish -->
</body>
<script>
  window.sr = ScrollReveal();
  sr.reveal(".anime-top", {
    origin: "top",
    duration: 1000,
    distance: "25rem",
    delay: 300,
  });
</script>

</html>
<?php
include("../connect.php");
//$_POST["namesurname"], $_POST["email"], $_POST["password"], $_POST["passwordagain"]
if (isset($_POST['signup'])) {
  $namesurname = $_POST["namesurname"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $date = date("Y-m-d");
  $passwordagain = $_POST["passwordagain"];

  if ($password === $passwordagain) {
    $password = md5($password);
    $sql = "INSERT INTO admin_details (name_surname, email, `password`, `registrationdate`,`role`)
    VALUES ('$namesurname','$email','$password','$date','Admin')";

    if ($connection->query($sql) === TRUE) {
      echo "<script> alert('Registration successfully completed')</script>";
      echo "<script type='text/javascript'>window.location.href='login_manager.php';</script>";
    } else {
      echo "<script> alert('Registration not be completed') </script>";
    }
    $connection->close();
  } else {
    echo "<script> alert('Password matching error') </script>";
  }
}
?>