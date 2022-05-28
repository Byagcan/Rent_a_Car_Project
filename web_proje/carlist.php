<?php
include('feedback.php');
include('connect.php');
$result = mysqli_query($connection, "SELECT carid,car_name.carname,car_brand.brandname,branch.branchname,car_image.image,car_segment.carsegment,`description`,capacity,`type`,gears,price FROM car_details 
              inner join car_brand on car_details.brandid=car_brand.brandid 
              inner join car_name on car_details.carnameid=car_name.carnameid 
              inner join car_segment on car_details.segmentid=car_segment.segmentid
              inner join car_image on car_details.carimageid=car_image.carimageid
              inner join branch on car_details.branchid=branch.branchid ");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
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
            <div class="carlist-row">
                <?php
                while ($car = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="carlist-column">
                        <div class="carlist-image">
                            <img id="climage" src="images/<?php echo $car['image'] ?>" alt="" />
                        </div>
                        <div class="informations">
                            <h3><span style="color:rgba(255, 255, 255, 0.356) ;">Car Brand: </span><?php echo $car['brandname'] ?></h3>
                            <h3><span style="color:rgba(255, 255, 255, 0.356) ;">Car Name: </span><?php echo $car['carname'] ?></h3>
                            <h3><span style="color:rgba(255, 255, 255, 0.356) ;">Car Segment: </span><?php echo $car['carsegment'] ?></h3>
                            <h3><span style="color:rgba(255, 255, 255, 0.356) ;">Daily Price: </span><?php echo $car['price'] ?></h3>
                            <h3><span style="color:rgba(255, 255, 255, 0.356) ;">Branch: </span><?php echo $car['branchname'] ?></h3>
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
                        <div class="descriptiontext">
                            <textarea id="area" name="tarea" rows="6" cols="100">"Description"<?php echo "\n" . $car['description'] ?></textarea>
                        </div>
                    </div>
                <?php } ?>
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