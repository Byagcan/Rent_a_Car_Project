<?php
session_start();
include("../connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="manager_css/addcar_manager.css" />
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
              <li><a href="edit_manager.php">Edit</a></li>
              <li><a href="login_manager.php">Log In</a></li>
              <li><a href="addcar_manager.php">Add Car</a></li>
              <li><a href="users_manager.php">Users</a></li>
              <li><a href="carlist.html">Car List</a></li>
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

  <!-- Add Car -->
  <section id="add">
    <div class="add">
      <div class="add-container anime-top">
        <div class="add-row">
          <h1 style="
                color: white;
                text-align: center;
                font-size: 32px;
                margin-bottom: 8px;
              ">
            ADD CAR
          </h1>
          <div class="image">
            <img src="../images/camera.png" alt="" />
            <form action="addcar_manager.php" method="post" enctype="multipart/form-data">
              <input type="file" name="file" value="">
              <input type="submit" name="addphoto" value="Add Photo">
            </form>
          </div>
          <form action="addcar_manager.php" method="post">
            <div class="descriptiontext">
              <h4 style="color: white;">Description</h4>
              <textarea id="area" name="tarea" rows="4" cols="100"></textarea>
            </div>
            <div class="description">

              <div class="label">
                <label for="1">Brand :</label>
                <input type="text" name="brand" id="1" />
              </div>
              <div class="label">
                <label for="3">Name :</label>
                <input type="text" name="name" id="3" />
              </div>
              <div class="label">
                <label for="2">Segment :</label>
                <input type="text" name="segment" id="2" />
              </div>
              <div class="label">
                <label for="4">Daily Price :</label>
                <input type="text" name="price" id="4" />
              </div>
              <br />
              <div class="icon">
                <img src="../images/wgroup.png" alt="" />
                <input type="text" name="capacity" placeholder="Number Of Person" />
                <img src="../images/wpetrol.png" alt="" />
                <select name="type" id="3">
                  <option value="diesel">Diesel</option>
                  <option value="fuel">Fuel</option>
                </select>
                <img src="../images/wsetting.png" alt="" />
                <select name="gears" id="3">
                  <option value="manuel">Manuel</option>
                  <option value="automatic">Automatic</option>
                </select>
              </div>
              <div class="submit">
                <input type="submit" value="Add Car" name="addcar" />
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
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

if (isset($_POST['addphoto'])) {
  $control = getimagesize($_FILES['file']['tmp_name']);
  $filename = $_FILES['file']['tmp_name'];
  $imagename = $_FILES['file']['name'];
  $imagesize = $_FILES['file']['size'];
  if ($control == TRUE) {
    if ($imagesize < 1024 * 512) {
      $image_ex = pathinfo($imagename, PATHINFO_EXTENSION);
      $exlower = strtolower($image_ex);
      $imagetype = array("png", "jpg", "jpeg");
      if (in_array($exlower, $imagetype)) {
        $newimagename = uniqid("image-", TRUE) . "." . $image_ex;
        $imageaddress = '../images/' . $newimagename;
        move_uploaded_file($filename, $imageaddress);
        $result2 = mysqli_query($connection, "INSERT INTO car_image(`image`) VALUES ('$newimagename')");
        $result3 = mysqli_query($connection, "Select * from car_image where image='$newimagename' ");
        $imagerow = mysqli_fetch_assoc($result3);
        $_SESSION['imageid'] = $imagerow['carimageid'];
      } else {
        echo "Image Type Must Be png,jpg or jpeg";
      }
    } else {
      echo "İmage Size Is Too Big.";
    }
  } else {
    echo "dfdf";
  }
}
if (isset($_POST['addcar'])) {
  $name = $_POST['name'];
  $brand = $_POST['brand'];
  $segment = $_POST['segment'];
  $tarea = $_POST['tarea'];
  $capacity = $_POST['capacity'];
  if ($_POST) {
    $type = $_POST['type'];
    if ($type == 'diesel') {
      $typeoption = 'diesel';
    }
    if ($type == 'fuel') {
      $typeoption = 'fuel';
    }
    $gears = $_POST['gears'];
    if ($gears == 'manuel') {
      $gearsoption = 'manuel';
    }
    if ($gears == 'automatic') {
      $gearsoption = 'automatic';
    }
  }
  $status = 0;
  $price = $_POST['price'];
  $insertcarname = mysqli_query($connection, "INSERT INTO car_name(carname) VALUES ('$name')");
  $selectcarname = mysqli_query($connection, "Select * from car_name where carname='$name'");
  $carnameid = mysqli_fetch_assoc($selectcarname);
  $insertcarsegment = mysqli_query($connection, "INSERT INTO car_segment(carsegment) VALUES ('$segment')");
  $selectcarsegment = mysqli_query($connection, "Select * from car_segment where carsegment='$segment'");
  $segmentid = mysqli_fetch_assoc($selectcarsegment);
  $insertcarbrand = mysqli_query($connection, "INSERT INTO car_brand(brandname) VALUES ('$brand')");
  $selectcarbrand = mysqli_query($connection, "Select * from car_brand where brandname='$brand'");
  $brandid = mysqli_fetch_assoc($selectcarbrand);
  $result = mysqli_query($connection, "INSERT INTO car_details(carnameid,brandid,carimageid,segmentid,`description`,capacity,`type`,gears,`status`,price) VALUES ('$carnameid[carnameid]','$brandid[brandid]',$_SESSION[imageid],'$segmentid[segmentid]','$tarea','$capacity','$typeoption','$gearsoption','$status','$price')");

  echo "<script type='text/javascript'>window.location.href='addcar_manager.php';</script>";
  $row = mysqli_fetch_assoc($result);
  echo "<script> alert('Successfully') </script>";
}
$connection->close();
?>