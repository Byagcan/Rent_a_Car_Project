<?php
$connection = mysqli_connect("localhost", "root", "Mysql123", "web_project");

if (!$connection) {
    die("Connection Failed" . mysqli_connect_error());
}
