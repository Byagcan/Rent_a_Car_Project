<?php
include('../connect.php');
if (isset($_GET["carid"])) {
    $id = $_GET["carid"];
    $result = mysqli_query($connection, "SELECT * FROM rents where carid=$id");
} else
    header("location:users_manager.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../manager/manager_css/reserve_details.css" />
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

    <!-- Change Password Start -->

    <div class="account">
        <div class="container">
            <div class="content">
                <div class="title">
                    <h1 style="color: black; text-align:center">Car Rents</h1>
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
                                <th>User Name</th>
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
                                $selectuser = mysqli_query($connection, "Select * from user_details where userid='$details[userid]'");
                                $user = mysqli_fetch_assoc($selectuser);

                            ?>
                                <tr>
                                    <td>

                                        <img src="../images/<?php echo $carimageid['image'] ?>" alt="">

                                    </td>
                                    <td><?php echo $brandid['brandname'] ?></td>
                                    <td><?php echo $carnameid['carname'] ?></td>
                                    <td><?php echo $segmentid['carsegment'] ?></td>
                                    <td><?php echo $branchid['branchname'] ?></td>
                                    <td>
                                        <a href="userprofile_manager.php?userid=<?php echo $details["userid"] ?>"><?php echo $user['name_surname'] ?></a>
                                    </td>
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
                                                <h3>BOOKİNG CONTİNUE</h3>
                                            <?php
                                            } else {
                                            ?>
                                                <h3>PAST BOOKİNG</h3>

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
</body>

</html>