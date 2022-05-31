<?php
session_start();
include('../connect.php');
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
    <link rel="stylesheet" href="../user_css/cars.css" />
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
                        <a href="index.php" style="cursor: pointer"><img id="logo" src="../images/1.png" alt="" /></a>
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
                            <div class="searchbutton">
                                <input type="submit" name="searchbutton" value="search">
                            </div>
                        </div>
                    </form>
                    <div class="carlist-row">
                        <?php
                        if (isset($_POST["searchbutton"])) {
                            $city = $_POST['city'];


                            $result = mysqli_query($connection, "SELECT carid,car_name.carname,car_brand.brandname,branch.branchname,car_image.image,car_segment.carsegment,`description`,capacity,`type`,gears,price FROM car_details 
                inner join car_brand on car_details.brandid=car_brand.brandid 
                inner join car_name on car_details.carnameid=car_name.carnameid 
                inner join car_segment on car_details.segmentid=car_segment.segmentid
                inner join car_image on car_details.carimageid=car_image.carimageid
                inner join branch on car_details.branchid=branch.branchid
                where branch.branchname='$city'");

                            while ($car = mysqli_fetch_assoc($result)) {
                        ?>
                                <div class="carlist-column column1">
                                    <div class="carlist-image">
                                        <img id="climage" src="../images/<?php echo $car['image'] ?>" alt="" />
                                    </div>
                                    <div class="informations">
                                        <h2><span style="color:rgba(255, 255, 255, 0.356) ;">Car Model: </span><?php echo $car['brandname'] ?></h2>
                                        <h2><span style="color:rgba(255, 255, 255, 0.356) ;">Car Name: </span><?php echo $car['carname'] ?></h2>
                                        <h2><span style="color:rgba(255, 255, 255, 0.356) ;">Car Segment: </span><?php echo $car['carsegment'] ?></h2>
                                        <h2><span style="color:rgba(255, 255, 255, 0.356) ;">Daily Price: </span><?php echo $car['price'] ?></h2>
                                    </div>
                                    <div class="description">
                                        <img src="../images/group.png" alt="" />
                                        <img src="../images/petrol.png" alt="" />
                                        <img src="../images/setting.png" alt="" />
                                    </div>
                                    <div class="imgp">
                                        <h4>x<?php echo $car['capacity'] ?></h4>
                                        <h4><?php echo $car['type'] ?></h4>
                                        <h4><?php echo $car['gears'] ?></h4>
                                    </div>
                                    <div class="button">
                                        <a href="cars_reserve_details.php?carid=<?php echo $car["carid"] ?>"><input type="submit" value="Show Rents" /></a>
                                    </div>
                                </div>
                        <?php }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Car List Finish -->
</body>


</html>