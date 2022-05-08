<?php
session_start();
include("connect.php");
if (!empty($_SESSION["email"])) {
  $email = $_SESSION["email"];
  $result = mysqli_query($connection, "SELECT * FROM user_details WHERE email='$email'");
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
  <link rel="stylesheet" href="user_css/changepassword.css" />
  <script src="https://unpkg.com/scrollreveal"></script>
</head>

<body>
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

  <!-- Change Password Start -->

  <section id="account">
    <div class="account">
      <div class="container">
        <div class="account-content anime-top">
          <div class="row">
            <div class="column links">
              <div class="image">
                <img src="images/user.png" alt="" />
                <h1>Change Password</h1>
              </div>
              <div class="general">
                <form action="account.php">
                  <input type="submit" value="Information" />
                </form>
              </div>
              <div class="changepassword">
                <form action="changepassword.php">
                  <input type="submit" value="Change Password" />
                </form>
              </div>
              <div class="logout">
                <form action="index.php">
                  <input type="submit" value="Log Out" />
                </form>
              </div>
            </div>
            <div class="column information">
              <div class="info">
                <form action="changepassword.php" method="post">
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

  <!-- Footer Start -->
  <footer class="footer">
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
        $result = mysqli_query($connection, "UPDATE user_details SET  password='$password'  where email='$email'");
        $connection->close();
        echo "<script> alert('Password Changed Successfully')</script>";
        echo "<script type='text/javascript'>window.location.href='log_ın.php';</script>";
      } else {
        echo "<script> alert('Passwords Not Match')</script>";
      }
    } else {
      echo "<script> alert('The Old Password and The New Password Cannot Be The Same')</script>";
    }
  } else {
    echo "<script> alert('Wrong Old Password')</script>";
  }
}
if (isset($_POST['feedbacks'])) {
  $feedback = $_POST['feedback'];
  $email = $row['email'];
  $result = mysqli_query($connection, "UPDATE user_details SET  feedback='$feedback'  where email='$email'");
  echo "<script type='text/javascript'>window.location.href='account.php';</script>";
}
$connection->close();
?>