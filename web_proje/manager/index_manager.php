<?php
include('../connect.php');
$date = date("Y-m-d");
//I select only cars that are not rented or rented in the past
$result = mysqli_query($connection, "SELECT car_details.carid,car_name.carname,car_brand.brandname,car_image.image FROM car_details 
inner join car_brand on car_details.brandid=car_brand.brandid 
inner join car_name on car_details.carnameid=car_name.carnameid
inner join car_image on car_details.carimageid=car_image.carimageid where  car_details.carid not in (Select rents.carid from rents inner join car_details on rents.carid=car_details.carid 
                where (('$date' < rents.purchase_date and '$date' < rents.return_date) or
                                                ('$date' > rents.purchase_date and '$date' < rents.return_date)
                                            ));");
$bookedcar = mysqli_query($connection, "SELECT car_details.carid,car_name.carname,car_brand.brandname,car_image.image FROM car_details 
inner join car_brand on car_details.brandid=car_brand.brandid 
inner join car_name on car_details.carnameid=car_name.carnameid
inner join car_image on car_details.carimageid=car_image.carimageid where  car_details.carid  in (Select rents.carid from rents inner join car_details on rents.carid=car_details.carid 
                where (('$date' < rents.purchase_date and '$date' < rents.return_date) or
                                                ('$date' > rents.purchase_date and '$date' < rents.return_date)
                                            ));");
$countuser = mysqli_query($connection, "SELECT count(userid) as no FROM user_details");
$countusers = mysqli_fetch_assoc($countuser);
$countcar = mysqli_query($connection, "SELECT count(carid) as no FROM car_details");
$countcars = mysqli_fetch_assoc($countcar);
$countrent = mysqli_query($connection, "SELECT count(rentid) as no FROM rents");
$countrents = mysqli_fetch_assoc($countrent);
$countbranch = mysqli_query($connection, "SELECT count(branchid) as no FROM branch");
$countbranches = mysqli_fetch_assoc($countbranch);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="manager_css/index_manager.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
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
              <li id="lasthref"><a href="account_manager.php">Account</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- Header Finish -->

  <section id="manager-index">
    <div class="content">
      <div class="container">

        <div class="info">
          <div class="countuser">
            <span class="material-symbols-outlined"> group</span>
            <h1 class="timer" data-from="0" data-to=<?php echo $countusers['no'] ?> data-speed="1500" data-refresh-interval="5"><?php echo $countusers['no'] ?></h1>
          </div>
          <div class="countcar">
            <span class="material-symbols-outlined">
              directions_car
            </span>
            <h1 class="timer" data-from="0" data-to="<?php echo $countcars['no'] ?>" data-speed="1500" data-refresh-interval="5"><?php echo $countcars['no'] ?></h1>
          </div>
          <div class="countbranch">
            <span class="material-symbols-outlined">
              apartment
            </span>
            <h1 class="timer" data-from="0" data-to="<?php echo $countbranches['no'] ?>" data-speed="1500" data-refresh-interval="5"><?php echo $countbranches['no'] ?></h1>
          </div>
          <div class="countrents">
            <span class="material-symbols-outlined">
              fact_check
            </span>
            <h1 class="timer" data-from="0" data-to="<?php echo $countrents['no'] ?>" data-speed="1500" data-refresh-interval="5"><?php echo $countrents['no'] ?></h1>
          </div>

        </div>
        <div class="row">
          <?php
          while ($car = mysqli_fetch_assoc($result)) {
          ?>
            <div class="column">
              <div class="description">
                <h2 style="text-align:center ;"><?php echo $car['brandname'] ?></h2>
                <h2 style="text-align:center ;"><?php echo $car['carname'] ?></h2>
              </div>
              <div class="image">
                <img id="carimage" src="../images/<?php echo $car['image'] ?>" alt="">
              </div>
              <div class="submit">
                <a href="edit_manager.php?carid=<?php echo $car["carid"] ?>"><input type="submit" value="Edit" /></a>
              </div>
            </div>
          <?php
          }
          ?>


        </div>
        <H2 style="text-align:center; color:white; margin-top:15px; text-decoration:underline; font-size:50px">BOOKED CAR </H2>
        <div class="row">
          <?php
          while ($car2 = mysqli_fetch_assoc($bookedcar)) {
          ?>
            <div class="column">
              <div class="description">
                <h2 style="text-align:center ;"><?php echo $car2['brandname'] ?></h2>
                <h2 style="text-align:center ;"><?php echo $car2['carname'] ?></h2>
              </div>
              <div class="image">
                <img id="carimage" src="../images/<?php echo $car2['image'] ?>" alt="">
              </div>
            </div>
          <?php
          }
          ?>


        </div>
      </div>
    </div>

  </section>


</body>

</html>

</body>

</html>