<?php
include_once 'connect.php';

$name = $_POST['ShipName'];
$type = $_POST['Type'];

$last_id = mysqli_insert_id($connect);

$sql = "INSERT INTO ship (Shipname, TypeID) VALUES ('$name', (SELECT TypeID FROM type WHERE type.Type = '$type'))";
$query = mysqli_query($connect, $sql) or die(mysqli_error($connect));


header("Location: ../index.php?save=success");
