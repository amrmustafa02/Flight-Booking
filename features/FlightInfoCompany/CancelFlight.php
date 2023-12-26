<?php

include"./connection.php";

//$flight_id = 4; // Replace with the actual flight ID or retrieve dynamically

// Retrieve the flight ID from the form
$flight_id = $_POST['flight_id'];

// Update Flight status to 'canceled'
$update_flight_sql = "UPDATE flight SET cancelled = TRUE WHERE flightId = $flight_id";
if ($conn->query($update_flight_sql) === TRUE) {
    echo "Flight canceled successfully<br>";

$refund = "SELECT fees FROM flight WHERE flightId=$flight_id";

 // Update Passenger account with refund 
$update_passenger_sql = "UPDATE passengers SET account = account + $refund WHERE flightId = $flight_id";
        if ($conn->query($update_passenger_sql) === TRUE) {
            echo "Refund added to passengers' accounts<br>";
        } else {
            echo "Error updating passenger accounts: " . $conn->error;
        }

}
else {
    echo "Error canceling flight: " . $conn->error;
}







?>