<?php

session_start();
include('feedback.php');
include('connect.php');
if (isset($_GET["carid"])) {
  $_SESSION["carid"] = $_GET['carid'];
  $id = $_GET['carid'];
  $result = mysqli_query($connection, "SELECT price,`description`,car_image.image FROM car_details inner join car_image on 
    car_details.carimageid=car_image.carimageid WHERE carid=$id");
  $row = mysqli_fetch_assoc($result);
  $_SESSION["price"] = $row['price'];
}

if (!empty($_SESSION['purchase_date']) and !empty($_SESSION['return_date'])) {
  $purchasedate = $_SESSION['purchase_date'];
  $returndate = $_SESSION['return_date'];
}
if (!empty($_SESSION["email"])) {
  $email = $_SESSION["email"];
  $selectuser = mysqli_query($connection, "SELECT * FROM user_details WHERE email='$email'");
  $user = mysqli_fetch_assoc($selectuser);
  $selectcard = mysqli_query($connection, "SELECT * FROM credit_card inner join user_details on credit_card.userid=user_details.userid
  WHERE email='$email'");
  $card = mysqli_fetch_assoc($selectcard);
  if (empty($card)) {
    $card['namesurname'] = "";
    $card['cardnumber'] = "";
    $card['day'] = "";
    $card['year'] = "";
    $card['ccv'] = "";
  }
} else {
  header("Location:log_ın.php");
}

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

  <!-- Booking Start -->
  <section id="booking">
    <div class="booking">
      <div class="container">
        <div class="booking-content anime-top">
          <h1 style="font-size:xx-large;">Booking</h1>
          <form action="" method="post">
            <div class="booking-row">
              <div class="carimg">
                <img src="images/<?php echo $row['image'] ?>" alt="">
                <div class="price">
                  <div class="descriptiontext">
                    <h3>Description :</h3>
                    <textarea id="area" name="tarea" rows="6" cols="100"><?php echo "\n" . $row['description'] ?></textarea>

                  </div>
                  <h3>Daily Price :</h3>
                  <input type="number" name="price" placeholder=" <?php echo $row['price'] ?>">
                </div>
              </div>

              <div class="credit">
                <h3>Credit Card Information :</h3>
                <input required type="text" name="namesurname" placeholder="Name and Surname" id="name" value="<?php echo $card['namesurname'] ?>" />
                <input type="text" name="cardnumber" placeholder="Credit Card Number" id="password" value="<?php echo $card['cardnumber'] ?>" />
                <input required type="text" name="day" placeholder="Day" id="year" value="<?php echo $card['day'] ?>" />
                <input required type="text" name="year" placeholder="Year" id="year" value="<?php echo $card['year'] ?>" />
                <input required type="text" name="ccv" placeholder="CCV" id="ccv" value="<?php echo $card['ccv'] ?>" />
                <div class="cardbuttons">
                  <input type="submit" value="Add Card" name="addcard">
                </div>
              </div>
              <div class="booking-button">
                <input type="submit" name="bookingsubmit" value="Booking">
                <button><a href="index.php"> Cancel </a></button>
              </div>
            </div>
          </form>
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
<?php
$rentid = $_GET['rentid'];
$carid = $_SESSION['carid'];
if (isset($_POST['addcard'])) {
  $namesurname = $_POST['namesurname'];
  $cardnumber = $_POST['cardnumber'];
  $day = $_POST['day'];
  $year = $_POST['year'];
  $ccv = $_POST['ccv'];
  $selectcardnumber = mysqli_query($connection, "SELECT * FROM credit_card where ccv='$ccv'");
  $selectcardnumber = mysqli_fetch_assoc($selectcardnumber);
  if (empty($selectcardnumber)) {
    $insertcredit = mysqli_query($connection, "INSERT INTO credit_card(userid,namesurname,cardnumber,`day`,`year`,ccv) VALUES('$user[userid]','$namesurname','$cardnumber','$day','$year','$ccv')");
    echo "<script> alert('Your Card Has Been Successfully Added.Please Fiil In the Blank Again For Booking')</script>";
  } else {
    echo "<script> alert('Your Card Has Already Added.')</script>";
  }
}

if (isset($_POST['bookingsubmit'])) {
  if ($rentid) {
    $price =  $_SESSION["price"];
    $days = date_diff(date_create($returndate), date_create($purchasedate));
    $totalprice = ((int)$price) * $days->d;
    $rentdate = date("Y-m-d");
    $namesurname = $_POST['namesurname'];
    $cardnumber = $_POST['cardnumber'];
    $day = $_POST['day'];
    $year = $_POST['year'];
    $ccv = $_POST['ccv'];
    $selectcardnumber = mysqli_query($connection, "SELECT * FROM credit_card where ccv='$ccv'");
    $selectcard = mysqli_fetch_assoc($selectcardnumber);
    if (empty($selectcard)) {
      echo "<script> alert('Your Card Is Not Attached. Please Add Your Card.')</script>";
    } else {
      $update = mysqli_query($connection, "UPDATE rents SET carid='$carid',purchase_date='$purchasedate', return_date='$returndate', 
     rent_date='$rentdate', totalprice='$totalprice',creditid='$selectcard[creditid]' where rentid='$rentid' ");
      echo "<script> alert('Payment successfully updated.')</script>";
      echo "<script> alert('Booking successfully updated.')</script>";
      echo "<script type='text/javascript'>window.location.href='cars.php';</script>";
      $row1 = mysqli_fetch_assoc($update);
    }
  } else {
    $selectrents = mysqli_query($connection, "SELECT * FROM rents where carid='$carid'");
    $price =  $_SESSION["price"];
    $days = date_diff(date_create($returndate), date_create($purchasedate));
    $totalprice = ((int)$price) * $days->d;
    $rentdate = date("Y-m-d");
    $namesurname = $_POST['namesurname'];
    $cardnumber = $_POST['cardnumber'];
    $day = $_POST['day'];
    $year = $_POST['year'];
    $ccv = $_POST['ccv'];
    $selectcardnumber = mysqli_query($connection, "SELECT * FROM credit_card where ccv='$ccv'");
    $selectcard = mysqli_fetch_assoc($selectcardnumber);
    if (empty($selectcard)) {
      echo "<script> alert('Your Card Is Not Attached. Please Add Your Card.')</script>";
    } else {
      try {
        $insert = mysqli_query($connection, "INSERT INTO rents(userid,carid,purchase_date,return_date,rent_date,totalprice,creditid) VALUES('$user[userid]','$carid','$purchasedate','$returndate','$rentdate','$totalprice','$selectcard[creditid]')");
        echo "<script language='javascript'>
        confirm('Total Price:$totalprice')
        </script> ";

        echo "<script> alert('Payment successfully completed.')</script>";
        echo "<script> alert('Booking successfully completed.')</script>";
        echo "<script type='text/javascript'>window.location.href='cars.php';</script>";
        throw new Exception('The Car Has Already Booked.');
      } catch (Exception $e) {
        echo "<script> alert('The Car Has Already Booked.')</script>";
        echo "<script type='text/javascript'>window.location.href='cars.php';</script>";
      }
      $row1 = mysqli_fetch_assoc($insert);
    }
  }
}


$connection->close();
?>