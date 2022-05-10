<?php
include('feedback.php');
include('connect.php');
if (isset($_GET["carid"])) {
  $id = $_GET["carid"];
  $result = mysqli_query($connection, "SELECT price,`description`,car_image.image FROM car_details inner join car_image on 
  car_details.carimageid=car_image.carimageid WHERE carid=$id");
  $row = mysqli_fetch_assoc($result);
} else
  header("location:carlist.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://unpkg.com/scrollreveal"></script>
  <link rel="stylesheet" href="user_css/booking.css" />

</head>

<body>
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

  <!-- Booking Start -->
  <section id="booking">
    <div class="booking">
      <div class="container">
        <div class="booking-content anime-top">
          <h1>Booking</h1>
          <div class="booking-row">
            <div class="booking-column">
              <div class="carimg">
                <img src="images/<?php echo $row['image'] ?>" alt="">
              </div>
              <div class="price">
                <div class="1">
                  <input type="text" placeholder="Daily Price : <?php echo $row['price'] ?>">
                </div>
                <div class="4">
                  <input type="text" placeholder="Total : 100tl">
                </div>
                <div class="descriptiontext">
                  <textarea id="area" name="tarea" rows="4" cols="100">"Description"<?php echo "\n" . $row['description'] ?></textarea>
                </div>
                <div class="booking-button">
                  <input type="submit" name="bookingsubmit" value="Booking">
                </div>
              </div>
            </div>
            <div class="booking-row">
              <div class="booking-column">
                <div class="p-information">
                  <h3>Purchase Information</h3>
                  <div class="select-part">
                    <div class="city">
                      <select name="city" id="city" aria-placeholder="Select City">
                        <option value="İstanbul">İstanbul</option>
                        <option value="Antalya">Antalya</option>
                        <option value="Yalova">Yalova</option>
                        <option value="İzmir">İzmir</option>
                      </select>
                    </div>
                    <div class="office">
                      <select name="office" id="office">
                        <option value="Central Office">Central Office</option>
                        <option value="Airport domestic flights">Airport domestic flights</option>
                      </select>
                    </div>
                  </div>
                  <div class="date-part">
                    <input type="date">
                    <input type="time">
                  </div>

                </div>
                <div class="r-information">
                  <h3>Return Information</h3>
                  <div class="select-part">
                    <div class="city">
                      <select name="city" id="city" aria-placeholder="Select City">
                        <option value="İstanbul">İstanbul</option>
                        <option value="Antalya">Antalya</option>
                        <option value="Yalova">Yalova</option>
                        <option value="İzmir">İzmir</option>
                      </select>
                    </div>
                    <div class="office">
                      <select name="office" id="office">
                        <option value="Central Office">Central Office</option>
                        <option value="Airport domestic flights">Airport domestic flights</option>
                      </select>
                    </div>
                  </div>
                  <div class="date-part">
                    <input type="date">
                    <input type="time">
                  </div>
                </div>

              </div>
            </div>
            <div class="booking-row">
              <div class="booking-column">
                <div class="radio-type">
                  <input type="radio" value="BabySeat" id="BabySeat" style="cursor: pointer;">
                  <label for="BabySeat">Baby Seat (8tl for each day)</label>
                  <input type="radio" value="RoadMap" id="RoadMap" style="cursor: pointer;">
                  <label for="RoadMap">Road Map (free)</label>
                  <input type="radio" value="CAS" id="CAS" style="cursor: pointer;">
                  <label for="CAS">CAS (20tl for rent)</label>

                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

  </section>


  <!-- Booking Finish -->

  <!-- Footer Start -->
  <footer class="footer" style="margin-top: 900px">
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
</body>
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