<?php
session_start();
include('../connect.php');
$result = mysqli_query($connection, "SELECT * FROM car_details where status='1'");
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
                    <h1 style="color: black; text-align:center">BrokeDown Cars</h1>
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
                                <th>Status Purchase Date</th>
                                <th>Status Return Date</th>
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

                                        <img src="../images/<?php echo $carimageid['image'] ?>" alt="">

                                    </td>
                                    <td><?php echo $brandid['brandname'] ?></td>
                                    <td><?php echo $carnameid['carname'] ?></td>
                                    <td><?php echo $segmentid['carsegment'] ?></td>
                                    <td><?php echo $branchid['branchname'] ?></td>
                                    <td><?php echo $details['status_purchasedate'] ?></td>
                                    <td><?php echo $details['status_returndate'] ?></td>
                                    <td>
                                        <div class="button">
                                            <a href="edit_manager.php?carid=<?php echo $details["carid"] ?>">Edit</a>
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