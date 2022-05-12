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
                <form action="index_manager.php">
                  <input type="submit" value="Log Out" />
                </form>
              </div>
            </div>
            <div class="column information">
              <div class="info">
                <div class="name">
                  <h3>Name Surname</h3>
                  <br />
                  <input type="text" placeholder="Buse Yağcan" />
                </div>
                <div class="phonenumber">
                  <h3>Phone Number</h3>
                  <br />
                  <input type="text" placeholder="0524876521" />
                </div>
                <div class="email">
                  <h3>Email</h3>
                  <br />
                  <input type="text" placeholder="buseyagcan@gmail.com" />
                </div>
                <div class="birthdate">
                  <h3>Birthdate</h3>
                  <br />
                  <input type="text" placeholder="yy/mm/dd" />
                </div>
                <div class="tc">
                  <h3>TC</h3>
                  <br />
                  <input type="text" />
                </div>
                <div class="submit">
                  <form action="index_manager.php">
                    <input type="submit" value="submit" id="submit" />
                  </form>
                </div>
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