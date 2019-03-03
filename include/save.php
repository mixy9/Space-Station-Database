<?php
include_once 'connect.php';

$type = $_POST['type'];
$name = $_POST['name'];

$sql = "INSERT INTO record (type, name) VALUES ('$type', '$name')";

if (mysqli_query($conn, $sql)) {
    $last_id = mysqli_insert_id($conn);
    echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

header("Location: ../index.php?save=success");
?>
