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
  <link rel="stylesheet" href="user_css/carlist.css" />
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <style>
    html,
    .swiper {
      margin: 50px, 460px;
    }
  </style>
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

  <!-- Car List Start -->

  <section id="carlist">
    <div class="carlist">
      <div class="carlist-container">
        <div class="carlist-content">
          <div class="carlist-row">
            <div class="slideshow-container">
              <div class="mySlides fade">
                <img src="images/asegmentcar.png" style="width: 100%" />
                <div class="text" style="text-align: center">
                  <h1>A SEGMENT CAR</h1>
                </div>
              </div>

              <div class="mySlides fade">
                <img src="images/bsegmentcar.png" style="width: 100%" />
                <div class="text" style="text-align: center">
                  <h1>B SEGMENT CAR</h1>
                </div>
              </div>

              <div class="mySlides fade">
                <img src="images/dsegmentcar.png" style="width: 100%" />
                <div class="text" style="text-align: center">
                  <h1>D SEGMENT CAR</h1>
                </div>
              </div>

              <div class="mySlides fade">
                <img src="images/esegmentcar.png" style="width: 100%" />
                <div class="text" style="text-align: center">
                  <h1>E SEGMENT CAR</h1>
                </div>
              </div>

              <div class="mySlides fade">
                <img src="images/fsegmentcar.png" style="width: 100%" />
                <div class="text" style="text-align: center">
                  <h1>F SEGMENT CAR</h1>
                </div>
              </div>

              <div class="mySlides fade">
                <img src="images/gsegmentcar.png" style="width: 100%" />
                <div class="text" style="text-align: center">
                  <h1>G SEGMENT CAR</h1>
                </div>
              </div>

              <div class="mySlides fade">
                <img src="images/ssegmentcar.png" style="width: 100%" />
                <div class="text" style="text-align: center">
                  <h1>S SEGMENT CAR</h1>
                </div>
              </div>

              <a class="prev" onclick="plusSlides(-1)">❮</a>
              <a class="next" onclick="plusSlides(1)">❯</a>
            </div>
            <br />
          </div>
          <div class="carlist-row">
            <div class="carlist-column column1">
              <div class="carlist-image">
                <img id="climage" src="images/cl6.png" alt="" />
              </div>
              <h2>A</h2>
              <h3 style="text-align: center">A Segment</h3>
              <div class="description">
                <img src="images/group.png" alt="" />
                <img src="images/petrol.png" alt="" />
                <img src="images/setting.png" alt="" />
              </div>
              <div class="imgp">
                <h4>x5</h4>
                <h4>diesel</h4>
                <h4>manuel</h4>
              </div>
              <div class="button">
                <form action="booking.php">
                  <input type="submit" value="Booking" />
                </form>
              </div>
            </div>
            <div class="carlist-column column2">
              <div class="carlist-image">
                <img id="climage" src="images/cl8.png" alt="" />
              </div>
              <h2>B</h2>
              <h3 style="text-align: center">G Segment</h3>
              <div class="description">
                <img src="images/group.png" alt="" />
                <img src="images/petrol.png" alt="" />
                <img src="images/setting.png" alt="" />
              </div>
              <div class="imgp">
                <h4>x5</h4>
                <h4>diesel</h4>
                <h4>manuel</h4>
              </div>
              <div class="button">
                <form action="booking.php">
                  <input type="submit" value="Booking" />
                </form>
              </div>
            </div>
            <div class="carlist-column column3">
              <div class="carlist-image">
                <img id="climage" src="images/cl3.png" alt="" />
              </div>
              <h2>C</h2>
              <h3 style="text-align: center">A Segment</h3>
              <div class="description">
                <img src="images/group.png" alt="" />
                <img src="images/petrol.png" alt="" />
                <img src="images/setting.png" alt="" />
              </div>
              <div class="imgp">
                <h4>x5</h4>
                <h4>diesel</h4>
                <h4>manuel</h4>
              </div>
              <div class="button">
                <form action="booking.html">
                  <input type="submit" value="Booking" />
                </form>
              </div>
            </div>
            <div class="carlist-column column4">
              <div class="carlist-image">
                <img id="climage" src="images/cl4.png" alt="" />
              </div>
              <h2>D</h2>
              <h3 style="text-align: center">F Segment</h3>
              <div class="description">
                <img src="images/group.png" alt="" />
                <img src="images/petrol.png" alt="" />
                <img src="images/setting.png" alt="" />
              </div>
              <div class="imgp">
                <h4>x5</h4>
                <h4>diesel</h4>
                <h4>manuel</h4>
              </div>
              <div class="button">
                <form action="booking.php">
                  <input type="submit" value="Booking" />
                </form>
              </div>
            </div>
            <div class="carlist-column column5">
              <div class="carlist-image">
                <img id="climage" src="images/cl5.png" alt="" />
              </div>
              <h2>E</h2>
              <h3 style="text-align: center">D Segment</h3>
              <div class="description">
                <img src="images/group.png" alt="" />
                <img src="images/petrol.png" alt="" />
                <img src="images/setting.png" alt="" />
              </div>
              <div class="imgp">
                <h4>x5</h4>
                <h4>diesel</h4>
                <h4>manuel</h4>
              </div>
              <div class="button">
                <form action="booking.php">
                  <input type="submit" value="Booking" />
                </form>
              </div>
            </div>
            <div class="carlist-column column6">
              <div class="carlist-image">
                <img id="climage" src="images/cl7.png" alt="" />
              </div>
              <h2>F</h2>
              <h3 style="text-align: center">B Segment</h3>
              <div class="description">
                <img src="images/group.png" alt="" />
                <img src="images/petrol.png" alt="" />
                <img src="images/setting.png" alt="" />
              </div>
              <div class="imgp">
                <h4>x5</h4>
                <h4>diesel</h4>
                <h4>manuel</h4>
              </div>
              <div class="button">
                <form action="booking.php">
                  <input type="submit" value="Booking" />
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Car List Finish -->

  <!-- Footer Start -->
  <footer class="footer" style="margin-top: 100px">
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

<script>
  let slideIndex = 1;
  showSlides(slideIndex);

  function plusSlides(n) {
    showSlides((slideIndex += n));
  }

  function currentSlide(n) {
    showSlides((slideIndex = n));
  }

  function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {
      slideIndex = 1;
    }
    if (n < 1) {
      slideIndex = slides.length;
    }
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
  }
</script>

</html>