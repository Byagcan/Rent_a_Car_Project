<?php
session_start();
include("../connect.php");
if (!empty($_SESSION["email"])) {
  $email = $_SESSION["email"];
  $result = mysqli_query($connection, "SELECT * FROM user_details WHERE email='$email' and `role`='Admin'");
  $row = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="manager_css/changepassword_manager.css" />
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

  <!-- Change Password Start -->

  <section id="account">
    <div class="account">
      <div class="container">
        <div class="account-content anime-top">
          <div class="row">
            <div class="column links">
              <div class="image">
                <img src="../images/user.png" alt="" />
                <h1>Change Password</h1>
              </div>
              <div class="general">
                <form action="account_manager.php">
                  <input type="submit" value="Information" />
                </form>
              </div>
              <div class="changepassword">
                <form action="changepassword_manager.php">
                  <input type="submit" value="Change Password" />
                </form>
              </div>
              <div class="logout">
                <form action="index_manager.php">
                  <input type="submit" value="Log Out" />
                </form>
              </div>
            </div>
            <div class="column information">
              <div class="info">
                <form action="changepassword_manager.php" method="post">
                  <div class="oldpassword">
                    <h3>Old Password</h3>
                    <br />
                    <input type="password" name="oldpassword" />
                  </div>
                  <div class="newpassword">
                    <h3>New Password</h3>
                    <br />
                    <input type="password" name="password" />
                  </div>
                  <div class="newpasswordagain">
                    <h3>New Password Again</h3>
                    <br />
                    <input type="password" name="passwordagain" />
                  </div>
                  <div class="submit">
                    <input type="submit" value="Change" id="submit" name="change" />
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Change Password Finish -->
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
if (isset($_POST['change'])) {
  $oldpassword = $_POST['oldpassword'];
  $oldpassword = md5($oldpassword);
  $password = $_POST['password'];
  $password = md5($password);
  $passwordagain = $_POST['passwordagain'];
  $passwordagain = md5($passwordagain);
  $email = $row['email'];

  if (($oldpassword == $row['password'])) {
    if (!($oldpassword == $password)) {
      if ($password == $passwordagain) {
        $result = mysqli_query($connection, "UPDATE user_details SET  password='$password'  where email='$email' and `role`='Admin'");
        $connection->close();
        echo "<script> alert('Password Changed Successfully')</script>";
        echo "<script type='text/javascript'>window.location.href='login_manager.php';</script>";
      } else {
        echo "<script> alert('Passwords Not Match')</script>";
      }
    } else {
      echo "<script> alert('The Old Password and The New Password Cannot Be The Same')</script>";
    }
  } else {
    echo "<script> alert('Wrong Old Password')</script>";
    echo "<script type='text/javascript'>window.location.href='changepassword_manager.php';</script>";
  }
  echo "<script type='text/javascript'>window.location.href='account_manager.php';</script>";
}

$connection->close();
?>