<?php
include('../connect.php');
if (isset($_GET["userid"])) {
    $id = $_GET["userid"];
    $result = mysqli_query($connection, "SELECT * FROM user_details WHERE userid=$id");
    $result2 = mysqli_query($connection, "SELECT * FROM user_feedbacks inner join user_details on user_details.userid=user_feedbacks.userid WHERE user_feedbacks.userid='$id'");
    $row = mysqli_fetch_assoc($result);
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
    <link rel="stylesheet" href="manager_css/userprofile_manager.css" />
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

    <!--User Profile Start -->

    <section id="user_profile">
        <div class="user_profile">
            <div class="profilecontainer">
                <div class="profile">
                    <div class="image">
                        <img src="../images/user.png" alt="">
                    </div>

                    <div class="information">
                        <div class="label">
                            <label for="1">Name Surname :</label>
                            <input type="text" id="1" value="<?php echo $row['name_surname'] ?>" />
                        </div>
                        <div class="label">
                            <label for="2">Email :</label>
                            <input type="text" id="2" value="<?php echo $row['email'] ?>" />
                        </div>
                        <div class="label">
                            <label for="3">Phone Number :</label>
                            <input type="text" id="3" value="<?php
                                                                if (empty($row['phone_number'])) {
                                                                    echo "undefined";
                                                                } else {
                                                                    echo $row['phone_number'];
                                                                } ?>" />
                        </div>
                        <div class="label">
                            <label for="4">Birthdate :</label>
                            <input type="text" id="4" value="<?php
                                                                if (empty($row['birthdate'])) {
                                                                    echo "undefined";
                                                                } else {
                                                                    echo $row['birthdate'];
                                                                } ?>" />
                        </div>
                    </div>
                </div>
                <div class="feedback">
                    <h3 style="color: white;">Feedback</h3>
                    <textarea id="area" name="area" rows="6" cols="100"><?php while ($row2 = mysqli_fetch_assoc($result2)) {
                                                                            echo  $row2['feedback'] . " (" . $row2['date'] . ")" . "\n";
                                                                        } ?></textarea>
                </div>
                <div class="rents">
                    <h3 style="color: white;">Rents</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Purchase Date</th>
                                <th>Return Date</th>
                                <th>Car that Rent</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>16</td>
                                <td>14</td>
                                <td>10</td>
                                <td>10</td>
                            </tr>
                    </table>
                </div>

            </div>
        </div>
    </section>


    <!--User Profile Finish -->

</body>

</html>