<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "spaceapp";


//Create connection
$connect = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// MySql dynamic select/option structure
$query1 = "SELECT DISTINCT Type FROM type";
$result1 = mysqli_query($connect, $query1);
