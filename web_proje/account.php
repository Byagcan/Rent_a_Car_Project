<?php
session_start();
include("connect.php");
if (!empty($_SESSION["email"])) {
  $email = $_SESSION["email"];
  $result = mysqli_query($connection, "SELECT * FROM user_details WHERE email='$email'");
  $row = mysqli_fetch_assoc($result);
  $result2 = mysqli_query($connection, "SELECT * FROM user_feedbacks inner join user_details on user_details.userid=user_feedbacks.userid WHERE user_details.email='$email'");
} else {
  header("Location:log_ın.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="user_css/account.css" />
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

  <!-- Account Start -->

  <section id="account">
    <div class="account">
      <div class="container">
        <div class="account-content anime-top">
          <div class="row">
            <div class="column links">
              <div class="image">
                <img src="images/<?php echo $row['image'] ?>" alt="" />
                <br>
                <p style="color: white; font-size: small;"><?php echo $row['email'] ?></p>
                <br>
                <form action="addaccountphoto.php" method="post" enctype="multipart/form-data">
                  <input type="file" name="file" value="">
                  <input type="submit" name="addphoto" value="Add Photo">
                </form>

              </div>
              <div class="general">
                <form action="account.php">
                  <input type="submit" value="Information" />
                </form>
              </div>
              <div class="myrents">
                <form action="myrents.php">
                  <input type="submit" value="My Rents" />
                </form>
              </div>
              <div class="changepassword">
                <form action="changepassword.php">
                  <input type="submit" name="changepassword" value="Change Password" />
                </form>
              </div>
              <div class="logout">
                <form action="logout.php">
                  <input type="submit" name="logout" value="Log Out" />
                </form>
              </div>
            </div>
            <div class="column information">
              <div class="info">
                <form action="account.php" method="post">
                  <div class="name">
                    <h3>Name Surname</h3>

                    <input type="text" value="<?php echo $row['name_surname'] ?>" name="namesurname" />
                  </div>
                  <div class="phonenumber">
                    <h3>Phone Number</h3>

                    <input type="text" value="<?php echo $row['phone_number'] ?>" name="phonenumber" />
                  </div>
                  <div class="birthdate">
                    <h3>Birthdate</h3>

                    <input type="text" name="birthdate" value="<?php echo $row['birthdate'] ?>" />
                  </div>
                  <div class="tc">
                    <h3>TC</h3>

                    <input type="text" name="tc" value="<?php echo $row['personal_id'] ?>" />
                  </div>
                  <div class="myfeedback">
                    <h3>My Feedback</h3>
                    <textarea id="area" name="area" rows="4" cols="100"><?php while ($row2 = mysqli_fetch_assoc($result2)) {
                                                                          echo  $row2['feedback'] . " (" . $row2['date'] . ")" . "\n";
                                                                        }
                                                                        ?></textarea>
                  </div>
                  <div class="submit">
                    <input type="submit" value="submit" id="submit" name="save" />
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>


  <!-- Account Finish -->

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
if (isset($_POST['save'])) {
  $namesurname = $_POST['namesurname'];
  $phonenumber = $_POST['phonenumber'];
  $birthdate = $_POST['birthdate'];
  $feedbackk = $_POST['area'];
  $id = $row['userid'];
  $tc = $_POST['tc'];
  $email = $row['email'];

  if (!($_POST['namesurname'] == $row['name_surname'])) {
    $result = mysqli_query($connection, "UPDATE user_details SET  name_surname='$namesurname'  where email='$email'");
  }
  if (!($_POST['phonenumber'] == $row['phone_number'])) {
    $result = mysqli_query($connection, "UPDATE user_details SET  phone_number='$phonenumber'  where email='$email'");
  }
  if (!($_POST['birthdate'] == $row['birthdate'])) {
    $result = mysqli_query($connection, "UPDATE user_details SET  birthdate='$birthdate'  where email='$email'");
  }
  if (!($_POST['tc'] == $row['personal_id'])) {
    $result = mysqli_query($connection, "UPDATE user_details SET  personal_id='$tc'  where email='$email'");
  }
}
if (isset($_POST['feedbacks'])) {
  $feedback = $_POST['feedback'];
  $id = $row['userid'];
  $date = date("Y-m-d");
  $result = mysqli_query($connection, "INSERT INTO user_feedbacks (userid, feedback,date) VALUES ($id, '$feedback','$date')");
  echo "<script type='text/javascript'>window.location.href='account.php';</script>";
}
$connection->close();
?>