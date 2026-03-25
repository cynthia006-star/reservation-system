<?php

include "db.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];
$guests = $_POST['guests'];

# Check if table already reserved

$sql = "SELECT * FROM reservations 
        WHERE reservation_date='$date' 
        AND reservation_time='$time'";

$result = $conn->query($sql);

if($result->num_rows > 0){

echo "<h2>Table Not Available</h2>";
echo "<p>Sorry, this time slot is already reserved.</p>";
echo "<a href='reservation.html'>Try Another Time</a>";

}
else{

$insert = "INSERT INTO reservations 
(name,email,phone,reservation_date,reservation_time,guests)

VALUES('$name','$email','$phone','$date','$time','$guests')";

if($conn->query($insert) === TRUE){

echo "<h2>Reservation Successful</h2>";
echo "<p>Your table has been reserved.</p>";
echo "<a href='reservation.html'>Reserve Another Table</a>";

}else{

echo "Error: ".$conn->error;

}

}

$conn->close();

}

?>