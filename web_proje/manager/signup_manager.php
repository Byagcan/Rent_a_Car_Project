<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="manager_css/signup_manager.css" />
    <script src="https://unpkg.com/scrollreveal"></script>
  </head>
  <body>
    <!-- Header start -->
    <header id="header">
      <div class="header">
        <div class="container">
          <div class="header-navbar">
            <div class="header-logo">
              <a href="index_manager.php" style="cursor: pointer"
                ><img id="logo" src="../images/1.png" alt=""
              /></a>
              <div class="header-name">
                <h1>Rent A Car</h1>
              </div>
            </div>
            <div class="header-menu">
              <ul>
                <li><a href="edit_manager.php">Edit</a></li>
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

    <!--Sign up Start -->

    <section id="signup">
      <div class="signup">
        <div class="container">
          <div class="signup-content anime-top">
            <h1>SIGN UP</h1>
            <div class="form">
              <form action="index_manager.php">
                <input
                  type="text"
                  name=""
                  placeholder="Enter your Name Surname"
                  id="name"
                />
                <input
                  type="text"
                  name=""
                  placeholder="Enter your Email"
                  id="email"
                />
                <input
                  type="password"
                  name=""
                  placeholder="Company password"
                  id="password"
                />
                <input
                  type="password"
                  name=""
                  placeholder="Company password again"
                  id="passwordagain"
                />
                <input type="submit" name="" value="Sign Up" id="submit" />
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Sign up in Finish -->
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
