<?php
include('../web_proje/connect.php');
if (isset($_GET['rentid'])) {
    $rentid = $_GET['rentid'];
    $result = mysqli_query($connection, "Delete from rents where rentid='$rentid'");
    echo "<script> alert('Booking Has Been Deleted.')</script>";
    echo "<script type='text/javascript'>window.location.href='myrents.php';</script>";
    $row = mysqli_fetch_assoc($result);
}
