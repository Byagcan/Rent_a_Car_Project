<?php
include('../connect.php');

$result = mysqli_query($connection, "SELECT * FROM user_details where `role`='User'");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DoSDScument</title>
  <link rel="stylesheet" href="manager_css/users_manager.css" />
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

  <!-- Users Start -->
  <div class="feedback-container">

    <?php
    while ($user = mysqli_fetch_assoc($result)) {
    ?>
      <div class="box anime-top">
        <div class="user">
          <p>User <?php echo $user['userid'] ?></p>
        </div>
        <div class="user_photo">
          <img class="" src="../images/<?php echo $user['image'] ?>" alt="" />
        </div>
        <div class="details">
          <p><span style="color: black">Name:</span> <?php echo $user['name_surname'] ?></p>
          <p><span style="color: black">Mail:</span> <?php echo $user['email'] ?> </p>
          <p><span style="color: black">Phone Number:</span><?php echo $user['phone_number'] ?></p>
        </div>
        <div class="boxsubmit">
          <a href="userprofile_manager.php?userid=<?php echo $user["userid"] ?>"><input type="text" value="Show Info"></a>
          <!-- I send userid to userprofile page with get method -->
        </div>
      </div>
    <?php } ?>


  </div>

  <!-- Users Finish -->
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
<script>
  window.sr = ScrollReveal();
  sr.reveal(".anime-bottom", {
    origin: "bottom",
    duration: 1000,
    distance: "25rem",
    delay: 300,
  });
</script>

</html>