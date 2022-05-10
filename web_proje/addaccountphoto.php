<?php
session_start();
include("connect.php");
if (!empty($_SESSION["email"])) {
    $email = $_SESSION["email"];
    $result = mysqli_query($connection, "SELECT * FROM user_details WHERE email='$email'");
    $row = mysqli_fetch_assoc($result);
    if ($_POST) {
        $control = getimagesize($_FILES['file']['tmp_name']);
        $filename = $_FILES['file']['tmp_name'];
        $imagename = $_FILES['file']['name'];
        $imagesize = $_FILES['file']['size'];
        if ($control == TRUE) {
            if ($imagesize < 1024 * 512) {
                $image_ex = pathinfo($imagename, PATHINFO_EXTENSION);
                $exlower = strtolower($image_ex);
                $imagetype = array("png", "jpg", "jpeg");
                if (in_array($exlower, $imagetype)) {
                    $newimagename = uniqid("image-", TRUE) . "." . $image_ex;
                    $imageaddress = 'images/' . $newimagename;
                    move_uploaded_file($filename, $imageaddress);
                    $result2 = mysqli_query($connection, "UPDATE user_details SET image='$newimagename' WHERE email='$email'");
                    echo "<script type='text/javascript'>window.location.href='account.php';</script>";
                } else {
                    echo "Image Type Must Be png,jpg or jpeg";
                }
            } else {
                echo "İmage Size Is Too Big.";
            }
        } else {
            echo "dfdf";
        }
    }
}
