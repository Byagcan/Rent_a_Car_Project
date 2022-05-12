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
                <div class="oldpassword">
                  <h3>Old Password</h3>
                  <br />
                  <input type="password" />
                </div>
                <div class="newpassword">
                  <h3>New Password</h3>
                  <br />
                  <input type="password" />
                </div>
                <div class="newpasswordagain">
                  <h3>New Password Again</h3>
                  <br />
                  <input type="password" />
                </div>
                <div class="submit">
                  <form action="index_manager.php">
                    <input type="submit" value="Change" id="submit" />
                  </form>
                </div>
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