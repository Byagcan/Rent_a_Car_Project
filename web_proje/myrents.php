<?php

use LDAP\Result;

include('../web_proje/feedback.php');
include('../web_proje/connect.php');
session_start();
if (!empty($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $result = mysqli_query($connection, "SELECT * FROM rents inner join user_details on user_details.userid=rents.userid
    inner join car_details on car_details.carid=rents.carid where user_details.email='$email' ");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="user_css/myrents.css" />
</head>

<body>
    <!-- Header start -->
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

    <!-- Change Password Start -->

    <div class="account">
        <div class="container">
            <div class="content">
                <div class="title">
                    <h1 style="color: black; text-align:center">My Rents</h1>
                </div>
                <div class="rents">

                    <table>
                        <thead>
                            <tr>
                                <th>Car Image</th>
                                <th>Car Brand</th>
                                <th>Car Name</th>
                                <th>Car Segment</th>
                                <th>Car Branch</th>
                                <th>Purchase Date</th>
                                <th>Return Date</th>
                                <th>Rent Date</th>
                                <th>Total Price</th>
                                <th>Proccess</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            while ($details = mysqli_fetch_assoc($result)) {
                                $selectcarimage = mysqli_query($connection, "Select * from car_details inner join car_image on car_details.carimageid=car_image.carimageid where carid='$details[carid]' ");
                                $carimageid = mysqli_fetch_assoc($selectcarimage);
                                $selectcarname = mysqli_query($connection, "Select * from car_details inner join car_name on car_details.carnameid=car_name.carnameid where carid='$details[carid]' ");
                                $carnameid = mysqli_fetch_assoc($selectcarname);
                                $selectcarsegment = mysqli_query($connection, "Select * from car_details inner join car_segment on car_details.segmentid=car_segment.segmentid where carid='$details[carid]'");
                                $segmentid = mysqli_fetch_assoc($selectcarsegment);
                                $selectcarbrand = mysqli_query($connection, "Select * from car_details  inner join car_brand on car_details.brandid=car_brand.brandid where carid='$details[carid]'");
                                $brandid = mysqli_fetch_assoc($selectcarbrand);
                                $selectbranch = mysqli_query($connection, "Select * from car_details  inner join branch on car_details.branchid=branch.branchid where carid='$details[carid]'");
                                $branchid = mysqli_fetch_assoc($selectbranch);

                            ?>
                                <tr>
                                    <td>
                                        <div class="photo">
                                            <img src="images/<?php echo $carimageid['image'] ?>" alt="">
                                        </div>
                                    </td>
                                    <td><?php echo $brandid['brandname'] ?></td>
                                    <td><?php echo $carnameid['carname'] ?></td>
                                    <td><?php echo $segmentid['carsegment'] ?></td>
                                    <td><?php echo $branchid['branchname'] ?></td>
                                    <td><?php echo $details['purchase_date'] ?></td>
                                    <td><?php echo $details['return_date'] ?></td>
                                    <td><?php echo $details['rent_date'] ?></td>
                                    <td><?php echo $details['totalprice'] ?></td>
                                    <td>
                                        <div class="button">
                                            <?php
                                            $date = date("Y-m-d");
                                            if (($date < $details['purchase_date'] and $date < $details['return_date']) or
                                                ($date > $details['purchase_date'] and $date < $details['return_date'])
                                            ) {

                                            ?>
                                                <!-- <a href="#"><input type="submit" value="  Edit  "></a>
                                                <form action="myrents.php" method="post">
                                                    <input name="delete" type="submit" value="Delete">
                                                </form> -->
                                            <?php
                                            } else {
                                            ?>

                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- Change Password Finish -->

    <!-- Footer Start -->
    <footer class="footer">
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

    <!-- Footer Finish -->
</body>

</html>