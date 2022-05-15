<?php
include("connect.php");

if (isset($_POST['feedbacks'])) {
  $feedback = $_POST['feedback'];
  $id = $row['userid'];
  $date = date("Y-m-d");
  $result = mysqli_query($connection, "INSERT INTO user_feedbacks (userid, feedback,date) VALUES ($id, '$feedback','$date')");
  echo "<script type='text/javascript'>window.location.href='account.php';</script>";
}
$connection->close();
