<?php
session_start();
include("../connect.php");
if (!empty($_SESSION["email"])) {
  echo "<script> alert('You Must Log Out Of The Account That Is Open.')</script>";
  echo "<script type='text/javascript'>window.location.href='account_manager.php';</script>";
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
  <link rel="stylesheet" href="manager_css/login_manager.css" />
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

  <!-- Log in Start -->

  <section id="Login">
    <div class="login">
      <div class="container">
        <div class="login-content anime-top">
          <h1>Log In</h1>
          <div class="form">
            <form action="login_manager.php" method="post">
              <input required type="text" name="email" placeholder="Enter your Email" id="email" />
              <input required type="password" name="password" placeholder="Company password" id="password" />
              <input required type="submit" name="login" value="Log In" id="submit" />
            </form>
          </div>
          <div class="signuplink">
            <a href="signup_manager.php">Don't have account? Sign Up</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Log in Finish -->
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

  $sql = "SELECT * FROM admin_details WHERE email='$email' and `role`='Admin'";

  $result = mysqli_query($connection, $sql);
  $row = mysqli_fetch_assoc($result);

  if (mysqli_num_rows($result) === 1) {
    if ($row['email'] === $email && $row['password'] === $password) {
      $_SESSION["email"] = $row['email'];
      $_SESSION["password"] = $row['password'];
      header("Location:account_manager.php");
      echo "<script type='text/javascript'>window.location.href='account_manager.php';</script>";
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
