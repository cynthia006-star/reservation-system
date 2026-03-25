<?php

$conn = new mysqli("localhost","root","","restaurant_db");

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];
$guests = $_POST['guests'];
$request = $_POST['request'];

$sql = "INSERT INTO reservations (name,email,phone,reservation_date,reservation_time,guests,special_request)
VALUES ('$name','$email','$phone','$date','$time','$guests','$request')";

if($conn->query($sql) === TRUE){
    echo "Reservation Successful!";
}else{
    echo "Error: " . $conn->error;
}

$conn->close();
?>