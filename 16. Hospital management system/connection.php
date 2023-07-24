<?php
$conn=mysqli_connect('localhost','root','','patient_db');

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>

