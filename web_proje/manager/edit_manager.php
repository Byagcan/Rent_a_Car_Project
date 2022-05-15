<?php
session_start();
include("../connect.php");
if (isset($_GET["carid"])) {
  $_SESSION['carid'] = $_GET["carid"];
  $id = $_GET["carid"];
  $result = mysqli_query($connection, "SELECT carid,car_name.carname,car_brand.brandname,branch.branchname,car_image.image,car_segment.carsegment,`description`,capacity,`type`,gears,price FROM car_details 
inner join car_brand on car_details.brandid=car_brand.brandid 
inner join car_name on car_details.carnameid=car_name.carnameid 
inner join car_segment on car_details.segmentid=car_segment.segmentid
inner join car_image on car_details.carimageid=car_image.carimageid
inner join branch on car_details.branchid=branch.branchid WHERE carid=$id");
  $row = mysqli_fetch_assoc($result);
  $_SESSION['type'] = $row['type'];
  $_SESSION['gears'] = $row['gears'];
}
if (!empty($_SESSION["email"])) {
  $email = $_SESSION["email"];
} else {
  header("Location:login_manager.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="manager_css/edit_manager.css" />
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
              <li><a href="index_manager.php">Home</a></li>
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

  <!-- Edit -->
  <section id="edit">
    <div class="edit">
      <div class="edit-container anime-top">
        <div class="edit-row">
          <h1 style="
                color: white;
                text-align: center;
                font-size: 32px;
                margin-bottom: 8px;
                font-family: Raleway, sans-serif;
              ">
            EDIT
          </h1>
          <div class="image">
            <img src="../images/<?php echo $row['image'] ?>" alt="" />
            <form action="edit_manager.php" method="post" enctype="multipart/form-data">
              <input type="file" name="file" value="">
              <input type="submit" name="editphoto" value="Edit Photo">
            </form>
          </div>
          <form action="edit_manager.php" method="post">
            <div class="descriptiontext">
              <H4 style="color:white ;">Description</H4>
              <textarea id="area" name="tarea" rows="4" cols="100"><?php echo "\n" . $row['description'] ?></textarea>
            </div>
            <div class="description">
              <div class="label">
                <div class="label">
                  <label for="1">Brand :</label>
                  <input type="text" name="brand" id="1" value="<?php echo $row['brandname'] ?>" />
                </div>
                <div class="label">
                  <label for="3">Name :</label>
                  <input type="text" name="name" id="3" value="<?php echo $row['carname'] ?>" />
                </div>
                <div class="label">
                  <label for="3">Branch :(İstanbul/Antalya/Yalova/İzmir)</label>
                  <input type="text" name="branch" id="3" value="<?php echo $row['branchname'] ?>" />
                </div>
                <div class="label">
                  <label for="2">Segment :(A/B/C/D/F/G/S)</label>
                  <input type="text" name="segment" id="2" value="<?php echo $row['carsegment'] ?>" />
                </div>
                <div class="label">
                  <label for="4">Daily Price :</label>
                  <input type="text" name="price" id="4" value="<?php echo $row['price'] ?>" />
                </div>
                <br />
                <div class="icon">
                  <img src="../images/wgroup.png" alt="" />
                  <input type="text" name="capacity" placeholder="Number Of Person" value="<?php echo $row['capacity'] ?>" />
                  <img src="../images/wpetrol.png" alt="" />
                  <select name="type" id="3">
                    <option value="" selected="selected"><?php echo $row['type'] ?></option>
                    <option value="diesel">Diesel</option>
                    <option value="fuel">Fuel</option>
                  </select>
                  <img src="../images/wsetting.png" alt="" />
                  <select name="gears" id="3">
                    <option value="" selected="selected"><?php echo $row['gears'] ?></option>
                    <option value="manuel">Manuel</option>
                    <option value="automatic">Automatic</option>
                  </select>
                </div>
                <div class="submit">

                  <input type="submit" value="Edit" name="editcar" />
                  <input type="submit" value="Delete" name="deletecar" />

                </div>
              </div>
            </div>
          </form>
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
if (isset($_POST['editphoto'])) {
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
        $result2 = mysqli_query($connection, "UPDATE car_image SET `image`='$newimagename'");
        $result3 = mysqli_query($connection, "Select * from car_image where image='$newimagename'");
        $imagerow = mysqli_fetch_assoc($result3);
        $_SESSION['imageid'] = $imagerow['carimageid'];
        echo "<script type='text/javascript'>window.location.href='index_manager.php';</script>";
      } else {
        echo "Image Type Must Be png,jpg or jpeg";
      }
    } else {
      echo "İmage Size Is Too Big.";
    }
  } else {
    echo "It Is Not Image";
  }
}
if (isset($_POST['deletecar'])) {
  $selectcarname = mysqli_query($connection, "DELETE FROM car_details where carid='$_SESSION[carid]' ");
  echo "<script> alert('Successfully Deleted') </script>";
  echo "<script type='text/javascript'>window.location.href='index_manager.php';</script>";
}
if (isset($_POST['editcar'])) {
  $name = $_POST['name'];
  $brand = $_POST['brand'];
  $branch = $_POST['branch'];
  $segment = $_POST['segment'];
  $tarea = $_POST['tarea'];
  $capacity = $_POST['capacity'];
  $price = $_POST['price'];
  if ($_POST) {
    $type = $_POST['type'];
    if ($type == 'diesel') {
      $typeoption = 'diesel';
    }
    if ($type == 'fuel') {
      $typeoption = 'fuel';
    }
    if ($type == '') {
      $typeoption = $_SESSION['type'];
    }
    $gears = $_POST['gears'];
    if ($gears == 'manuel') {
      $gearsoption = 'manuel';
    }
    if ($gears == 'automatic') {
      $gearsoption = 'automatic';
    }
    if ($gears == '') {
      $gearsoption = $_SESSION['gears'];
    }
  }
  $selectcarname = mysqli_query($connection, "SELECT * FROM car_name inner join car_details on car_name.carnameid=car_details.carnameid where carid='$_SESSION[carid]' ");
  $carnameid = mysqli_fetch_assoc($selectcarname);
  $updatecarname = mysqli_query($connection, "UPDATE car_name SET carname='$name' where carnameid='$carnameid[carnameid]'");

  $selectcarsegment = mysqli_query($connection, "Select * from car_segment where carsegment='$segment'");
  $segmentid = mysqli_fetch_assoc($selectcarsegment);
  $updatecarsegment = mysqli_query($connection, "UPDATE car_details SET segmentid='$segmentid[segmentid]' where  carid='$_SESSION[carid]'");

  $selectcarbrand = mysqli_query($connection, "Select * from car_brand inner join car_details on car_brand.brandid=car_details.brandid where carid='$_SESSION[carid]'");
  $brandid = mysqli_fetch_assoc($selectcarbrand);
  $updatecarbrand = mysqli_query($connection, "UPDATE car_brand SET brandname='$brand' where brandid='$brandid[brandid]'");

  $selectbranch = mysqli_query($connection, "Select * from branch  where branchname='$branch'");
  $branchid = mysqli_fetch_assoc($selectbranch);
  $updatebranch = mysqli_query($connection, "UPDATE car_details SET branchid='$branchid[branchid]'where carid='$_SESSION[carid]'");

  $update = mysqli_query($connection, "UPDATE car_details SET  `description`='$tarea', capacity='$capacity',`type`='$typeoption', gears='$gearsoption', price='$price' where carid='$_SESSION[carid]' ");
  echo "<script> alert('Successfully Edited') </script>";
  echo "<script type='text/javascript'>window.location.href='index_manager.php';</script>";
}
$connection->close();

?>