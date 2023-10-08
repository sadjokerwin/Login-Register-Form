<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "root";
$dbName = "loginRegister";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

if (!$conn) {
    die("Something went wrong;");
}

?>