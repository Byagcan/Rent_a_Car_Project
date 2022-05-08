<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <script src="https://unpkg.com/scrollreveal"></script>
  <link rel="stylesheet" href="user_css/signup.css" />
</head>

<body class="signup-body">
  <!-- Header start -->
  <header id="header">
    <div class="header">
      <div class="container">
        <div class="header-navbar">
          <div class="header-logo">
            <a href="index.php" style="cursor: pointer"><img id="logo" src="images/1.png" alt="" /></a>
            <div class="header-name">
              <h1>Rent A Car</h1>
            </div>
          </div>
          <div class="header-menu">
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="log_ın.php">Log In</a></li>
              <li><a href="index.php#about">About</a></li>
              <li><a href="conditions.php">Conditions</a></li>
              <li><a href="carlist.php">Car List</a></li>
              <li id="lasthref"><a href="account.php">Account</a></li>
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
        <div class="signup-content signupanime-top">
          <h1>SIGN UP</h1>
          <div class="form">
            <form action="sign_up.php" method="post">
              <input type="text" required name="namesurname" placeholder="Enter your Name Surname" id="name" />
              <input type="email" required name="email" placeholder="Enter your Email" id="email" />
              <input type="password" required name="password" placeholder="Enter your password" id="password" />
              <input type="password" required name="passwordagain" placeholder="Enter your password again" id="passwordagain" />
              <input type="submit" name="" value="Sign Up" id="submit" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Sign up in Finish -->

  <!-- Footer Start -->
  <footer class="footer" style="margin-top: 700px">
    <div class="footer-container">
      <div class="footer-row">
        <div class="footer-col">
          <h4>Company</h4>
          <ul class="footer-ul">
            <li><a href="index.php">Home</a></li>
            <li><a href="conditions.php">Conditions</a></li>
            <li><a href="carlist.php">Car List</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Contact Us</h4>
          <ul>
            <li><a href="#">05945242061</a></li>
            <li><a href="#">rentacar@gmail.com</a></li>
            <li><a href="#">Akdeniz Üniversitesi</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Follow Us</h4>
          <ul>
            <li><a href="#">instagram.com/rentacar</a></li>
            <li><a href="#">twitter.com/rentacar</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Feedback</h4>
          <ul class="footer-ul">
            <p style="font-family: Raleway, sans-serif; color: white">
              Write your feedback
            </p>
            <input type="text" style="border-radius: 5px" />
            <input type="submit" value="submit" style="border-radius: 15px; padding: 2.5px; cursor: pointer" />
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Footer Finish -->
</body>

<script>
  window.sr = ScrollReveal();
  sr.reveal(".signupanime-top", {
    origin: "top",
    duration: 1000,
    distance: "25rem",
    delay: 600,
  });
</script>

</html>

<?php
include("connect.php");

if (isset($_POST["namesurname"], $_POST["email"], $_POST["password"], $_POST["passwordagain"])) {
  $namesurname = $_POST["namesurname"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $date = date("Y-m-d");
  $passwordagain = $_POST["passwordagain"];

  if ($password === $passwordagain) {
    $password = md5($password);
    $sql = "INSERT INTO user_details (name_surname, email, `password`, `registrationdate`)
    VALUES ('$namesurname','$email','$password','$date')";

    if ($connection->query($sql) === TRUE) {
      echo "<script> alert('Registration successfully completed')</script>";
      echo "<script type='text/javascript'>window.location.href='log_ın.php';</script>";
    } else {
      echo "<script> alert('Registration not be completed') </script>";
    }
    $connection->close();
  } else {
    echo "<script> alert('Password matching error') </script>";
  }
}
?>