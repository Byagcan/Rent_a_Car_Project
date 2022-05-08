<?php
include('feedback.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="user_css/credit-card.css" />
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

  <!-- Log in Start -->

  <section id="credit-card">
    <div class="credit-card">
      <div class="container">
        <div class="credit-card-content anime-top">
          <h1>Credit Card ınformations</h1>
          <div class="form">
            <form action="index.php">
              <input type="text" name="" placeholder="Name and Surname" id="name" />
              <input type="text" name="" placeholder="Credit Card Number" id="password" />

              <input type="text" name="" placeholder="Year" id="password" />
              <input type="text" name="" placeholder="CCV" id="password" />

              <input type="submit" name="" value="Submit" id="submit" />
            </form>
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