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
  <link rel="stylesheet" href="user_css/conditions.css" />
</head>

<body class="conditions-body">
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

  <!-- Conditions Start -->
  <section class="conditions">
    <div class="conditions">
      <h1>Conditions</h1>
      <div class="container">
        <div class="wrapper">
          <button class="toggle">
            Rental Period :
            <img src="images/plus.png" alt="" />
          </button>
          <div class="content">
            <p>The minimum rental period is 24 hours.</p>
          </div>
        </div>
        <div class="wrapper">
          <button class="toggle">
            Driver's License and Age Lower Limit :
            <img src="images/plus.png" alt="" />
          </button>
          <div class="content">
            <p>
              23 years of age and 2 years of driver's license for group E and
              D vehicles (Symbol,Hyundai ), Driver's license for group F and G
              vehicles ( Focus, Megane ) 25 years old and 3 years old, For
              group S and K vehicles (Passat,Mondeo ), a driver's license of
              28 years and 5 years is required.
            </p>
          </div>
        </div>
        <div class="wrapper">
          <button class="toggle">
            Traffic Fines:
            <img src="images/plus.png" alt="" />
          </button>
          <div class="content">
            <p>
              All kinds of traffic fines and liability that may occur during
              the contract period belong to the tenant.
            </p>
          </div>
        </div>
        <div class="wrapper">
          <button class="toggle">
            Services and products that are excluded from car rental prices:
            <img src="images/plus.png" alt="" />
          </button>
          <div class="content">
            <p>
              Fuel, Additional Driver, Baby and Child Seats, Requests for
              Changes to the Lease Agreement
            </p>
          </div>
        </div>
        <div class="wrapper">
          <button class="toggle">
            Booking Conditions:
            <img src="images/plus.png" alt="" />
          </button>
          <div class="content">
            <p>
              If you request to change the booking conditions that you have
              made, the request may not be met, october if it is met, an
              additional fee may be charged or a discount on the rental price
              may not be made.The Booking Conditions for Renting a Car that
              you have made on our site are valid if the price Conditions and
              the Terms of Use of the site are read and accepted by you.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Conditions Finish -->

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
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script>
  let toggles = document.getElementsByClassName("toggle");
  let contentDiv = document.getElementsByClassName("content");

  for (let i = 0; i < toggles.length; i++) {
    toggles[i].addEventListener("click", () => {
      if (
        parseInt(contentDiv[i].style.height) != contentDiv[i].scrollHeight
      ) {
        contentDiv[i].style.height = contentDiv[i].scrollHeight + "px";
        toggles[i].style.color = "#0084e9";
        img[i].classList.remove("images/plus.png");
        img[i].classList.add("images/subs.png");
      } else {
        contentDiv[i].style.height = "0px";
        toggles[i].style.color = "#111130";
        img[i].classList.remove("images/plus.png");
        img[i].classList.add("images/subs.png");
      }

      for (let j = 0; j < contentDiv.length; j++) {
        if (j !== i) {
          contentDiv[j].style.height = "0px";
          toggles[j].style.color = "#111130";
          img[j].classList.remove("images/subs.png");
          img[j].classList.add("images/plus.png");
        }
      }
    });
  }
</script>

</html>