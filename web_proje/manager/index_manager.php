<?php
include('../connect.php');

$result = mysqli_query($connection, "SELECT carid,car_name.carname,car_brand.brandname,car_image.image FROM car_details 
inner join car_brand on car_details.brandid=car_brand.brandid 
inner join car_name on car_details.carnameid=car_name.carnameid
inner join car_image on car_details.carimageid=car_image.carimageid");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="manager_css/index_manager.css" />
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
    <div class="container">
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
    </div>

  </section>


</body>

</html>

</body>

</html>