<?php
session_start();
include("connect.php");
if (!empty($_SESSION["email"])) {
  $email = $_SESSION["email"];
  $result = mysqli_query($connection, "SELECT * FROM user_details WHERE email='$email'");
  $row = mysqli_fetch_assoc($result);
} else {
  header("Location:log_ın.php");
}

if (isset($_POST['feedbacks'])) {
    $feedback = $_POST['feedback'];
    $email = $row['email'];
    $result = mysqli_query($connection, "UPDATE user_details SET  feedback='$feedback'  where email='$email'");
    echo "<script type='text/javascript'>window.location.href='account.php';</script>";
  }
  $connection->close();
