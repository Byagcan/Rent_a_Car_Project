<?php
session_start();
include("../connect.php");
if (!empty($_SESSION["email"])) {
  $email = $_SESSION["email"];
  $result = mysqli_query($connection, "SELECT * FROM admin_details WHERE email='$email' and role='Admin'");
  $row = mysqli_fetch_assoc($result);
} else {
  header("Location:login_manager.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="manager_css/account_manager.css" />
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

  <!-- Account Start -->

  <section id="account">
    <div class="account">
      <div class="container">
        <div class="account-content anime-top">
          <div class="row">
            <div class="column links">
              <div class="image">
                <img src="../images/user.png" alt="" />
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
                <form action="logout_manager.php">
                  <input type="submit" value="Log Out" />
                </form>
              </div>
            </div>
            <div class="column information">
              <div class="info">
                <form action="account_manager.php" method="post">
                  <div class="name">
                    <h3>Name Surname</h3>
                    <br />
                    <input type="text" name="namesurname" value="<?php echo $row['name_surname'] ?>" />
                  </div>
                  <div class="phonenumber">
                    <h3>Phone Number</h3>
                    <br />
                    <input type="text" name="phonenumber" value="<?php echo $row['phone_number'] ?>" />
                  </div>
                  <div class="email">
                    <h3>Email</h3>
                    <br />
                    <input type="text" name="email" value="<?php echo $row['email'] ?>" />
                  </div>
                  <div class="birthdate">
                    <h3>Birthdate</h3>
                    <br />
                    <input type="text" name="birthdate" placeholder="yy/mm/dd" value="<?php echo $row['birthdate'] ?>" />
                  </div>
                  <div class="tc">
                    <h3>TC</h3>
                    <br />
                    <input type="text" name="tc" value="<?php echo $row['personal_id'] ?>" />
                  </div>
                  <div class="submit">
                    <form action="index_manager.php">
                      <input type="submit" name="save" value="submit" id="Save" />
                    </form>
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
  $tc = $_POST['tc'];
  $email = $row['email'];

  if (!($_POST['namesurname'] == $row['name_surname'])) {
    $result = mysqli_query($connection, "UPDATE admin_details SET  name_surname='$namesurname'  where email='$email' and `role`='Admin'");
  }
  if (!($_POST['phonenumber'] == $row['phone_number'])) {
    $result = mysqli_query($connection, "UPDATE admin_details SET  phone_number='$phonenumber'  where email='$email' and `role`='Admin'");
  }
  if (!($_POST['birthdate'] == $row['birthdate'])) {
    $result = mysqli_query($connection, "UPDATE admin_details SET  birthdate='$birthdate'  where email='$email' and `role`='Admin'");
  }
  if (!($_POST['tc'] == $row['personal_id'])) {
    $result = mysqli_query($connection, "UPDATE admin_details SET  personal_id='$tc'  where email='$email' and `role`='Admin'");
  }
  echo "<script type='text/javascript'>window.location.href='account_manager.php';</script>";
  $connection->close();
}
?>