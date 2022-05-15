<?php
session_start();
include("connect.php");
if (!empty($_SESSION["email"])) {
  echo "<script> alert('You Must Log Out Of The Account That Is Open.')</script>";
  echo "<script type='text/javascript'>window.location.href='account.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <script src="https://unpkg.com/scrollreveal"></script>
  <link rel="stylesheet" href="user_css/login.css" />
</head>

<body class="login-body">
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
              <li><a href="cars.php">Rent</a></li>
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

  <!-- Log in Start -->

  <section id="Login">
    <div class="login">
      <div class="container">
        <div class="login-content anime-top">
          <h1>Log In</h1>
          <div class="form">
            <form action="log_ın.php" method="post">
              <input type="email" required name="email" placeholder="Enter your Email" id="email" />
              <input type="password" required name="password" placeholder="Enter your password" id="password" />
              <input type="submit" name="login" value="Log In" id="submit" />
            </form>
          </div>
          <div class="signuplink">
            <a href="sign_up.php">Don't have account? Sign Up</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Log in Finish -->

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
            <form action="account.php" method="post">
              <input type="text" name="feedback" style="border-radius: 5px" />
              <input type="submit" name="feedbacks" value="submit" style="border-radius: 15px; padding: 2.5px; cursor: pointer" />
            </form>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Footer Finish -->
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
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password = md5($password);

  $sql = "SELECT * FROM user_details WHERE email='$email' and `role`='User'";

  $result = mysqli_query($connection, $sql);
  $row = mysqli_fetch_assoc($result);

  if (mysqli_num_rows($result) === 1) {
    if ($row['email'] === $email && $row['password'] === $password) {
      $_SESSION["email"] = $row['email'];
      $_SESSION["password"] = $row['password'];
      header("Location:account.php");
      echo "<script type='text/javascript'>window.location.href='account.php';</script>";
    } else {
      echo "<script> alert('Incorrect email or password')</script>";
      exit();
    }
  } else {
    echo "<script> alert('User registration not found')</script>";
    exit();
  }
}
$connection->close();


?>