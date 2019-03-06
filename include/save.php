<?php
include_once 'connect.php';

$type = $_POST['type'];
$name = $_POST['name'];
$points = $_POST['points'];

$sql = "INSERT INTO record (type, name, points) VALUES ('$type', '$name', '$points')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

header("Location: ../index.php?save=success");
