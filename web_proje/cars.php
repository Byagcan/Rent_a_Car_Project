<?php
session_start();
include('feedback.php');
include('connect.php');
if (isset($_GET["rentid"])) {
  $rentid = $_GET["rentid"];
  $updatedate = mysqli_query($connection, "UPDATE  rents SET purchase_date='2001-06-22', return_date='2001-06-23'  WHERE rentid='$rentid'");
} else {
  $rentid = "";
}
if (!empty($_SESSION["email"])) {
  $email = $_SESSION["email"];
  $userdetails = mysqli_query($connection, "SELECT * FROM user_details WHERE email='$email'");
  $user = mysqli_fetch_assoc($userdetails);
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
  <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="user_css/cars.css" />
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
              <li><a href="cars.php">Rent</a></li>
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
          <form action="" method="post">
            <div class="carlist-row-info">
              <div class="select-part">
                <select required name="city" id="city" aria-placeholder="Select City">
                  <option value="İstanbul">İstanbul</option>
                  <option value="Antalya">Antalya</option>
                  <option value="Yalova">Yalova</option>
                  <option value="İzmir">İzmir</option>
                </select>
              </div>
              <div class="select-part">
                <select required name="segment" id="segment" aria-placeholder="Select Segment">
                  <option value="A">A Segment</option>
                  <option value="B">B Segment</option>
                  <option value="C">C Segment</option>
                  <option value="D">D Segment</option>
                  <option value="F">F Segment</option>
                  <option value="G">G Segment</option>
                  <option value="S">S Segment</option>
                </select>
              </div>
              <div class="date-part">
                <input required name="date1" type="date" min=<?php echo date("Y-m-d"); ?>>
              </div>
              <div class="date-part">
                <input required name="date2" type="date" min=<?php echo date("Y-m-d"); ?>>
              </div>
              <div class="searchbutton">
                <input type="submit" name="searchbutton" value="search">
              </div>
            </div>
          </form>
          <div class="carlist-row">
            <?php
            if (isset($_POST["searchbutton"])) {
              $city = $_POST['city'];
              $segment = $_POST['segment'];
              if ($_POST['date1'] < $_POST['date2']) {
                $_SESSION['purchase_date'] = $_POST['date1'];
                $_SESSION['return_date']  = $_POST['date2'];


                $result = mysqli_query($connection, "SELECT carid,car_name.carname,car_brand.brandname,branch.branchname,car_image.image,car_segment.carsegment,`description`,capacity,`type`,gears,price FROM car_details 
                inner join car_brand on car_details.brandid=car_brand.brandid 
                inner join car_name on car_details.carnameid=car_name.carnameid 
                inner join car_segment on car_details.segmentid=car_segment.segmentid
                inner join car_image on car_details.carimageid=car_image.carimageid
                inner join branch on car_details.branchid=branch.branchid
                where (branch.branchname='$city' and car_segment.carsegment='$segment') and car_details.carid not in (Select rents.carid from rents inner join car_details on rents.carid=car_details.carid 
                where ( (`status`='0') and ('$_SESSION[purchase_date]' >= purchase_date and '$_SESSION[return_date]' <= return_date) or ('$_SESSION[purchase_date]' <= return_date and '$_SESSION[return_date]' >= return_date) or ('$_SESSION[purchase_date]' <= purchase_date and '$_SESSION[return_date]' >= return_date)))");

                while ($car = mysqli_fetch_assoc($result)) {
            ?>
                  <div class="carlist-column column1">
                    <div class="carlist-image">
                      <img id="climage" src="images/<?php echo $car['image'] ?>" alt="" />
                    </div>
                    <div class="informations">
                      <h2><span style="color:rgba(255, 255, 255, 0.356) ;">Car Model: </span><?php echo $car['brandname'] ?></h2>
                      <h2><span style="color:rgba(255, 255, 255, 0.356) ;">Car Name: </span><?php echo $car['carname'] ?></h2>
                      <h2><span style="color:rgba(255, 255, 255, 0.356) ;">Car Segment: </span><?php echo $car['carsegment'] ?></h2>
                      <h2><span style="color:rgba(255, 255, 255, 0.356) ;">Daily Price: </span><?php echo $car['price'] ?></h2>
                    </div>
                    <div class="description">
                      <img src="images/group.png" alt="" />
                      <img src="images/petrol.png" alt="" />
                      <img src="images/setting.png" alt="" />
                    </div>
                    <div class="imgp">
                      <h4>x<?php echo $car['capacity'] ?></h4>
                      <h4><?php echo $car['type'] ?></h4>
                      <h4><?php echo $car['gears'] ?></h4>
                    </div>
                    <div class="button">
                      <a href="booking.php?carid=<?php echo $car["carid"] ?>&rentid=<?php echo $rentid ?>"><input type="submit" value="Booking" /></a>
                    </div>
                  </div>
            <?php }
              } else {
                echo "<script> alert('Please Enter The Correct Date Type.')</script>";
              }
            } ?>
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


</html>