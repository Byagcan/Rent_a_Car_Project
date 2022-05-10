<?php
include('../web_proje/feedback.php');

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
                            <li><a href="index.php#about">About</a></li>
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

    <!-- My Rents Start -->
    <div class="myrents-container">
        <h1>MY RENTS</h1>
        <div class="box">
            <div class="myrents">

                <div class="image">
                    <img id="climage" src="images/cl6.png" alt="" />
                </div>
                <h2>A</h2>
                <h3 style="text-align: center">A Segment</h3>
                <div class="description">
                    <h4>Purchase Date:2001-02-02</h4>
                    <h4>Return Date:2001-02-02</h4>
                    <h4>Total Price:1587tl</h4>

                </div>
                <div class="button">
                    <form action="#">
                        <input type="submit" value="Cancel" name="cancel" />
                        <input type="submit" value="Update" name="update" />
                    </form>
                </div>
            </div>

        </div>
        <h1>MY PAST RENTS</h1>
        <div class="box">
            <div class="mypastrents">
                <div class="myrents">

                    <div class="image">
                        <img id="climage" src="images/cl6.png" alt="" />
                    </div>
                    <h2>A</h2>
                    <h3 style="text-align: center">A Segment</h3>
                    <div class="description">
                        <h4>Purchase Date:2001-02-02</h4>
                        <h4>Return Date:2001-02-02</h4>
                        <h4>Total Price:1587tl</h4>

                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>

    <!-- My Rents Finish -->

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
                        <input type="text" style="border-radius: 5px" />
                        <input type="submit" value="submit" style="border-radius: 15px; padding: 2.5px; cursor: pointer" />
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Footer Finish -->



</body>

</html>