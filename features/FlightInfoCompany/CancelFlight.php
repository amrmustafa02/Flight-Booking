<?php

$err = "";
include "../../connection.php";
//for testing purpose
//should get flight_id from the data im pressing cancel on 
$flight_id = 1; // Replace with the actual flight ID or retrieve dynamically
$passengerId = 4;

$updatePassengerQuery = "UPDATE passenger SET flightId = $flight_id WHERE passengerId = $passengerId";
$insertQuery = $conn->query($updatePassengerQuery);
// Update Flight status to 'canceled'
$update_flight_sql = "UPDATE flight SET cancelled = TRUE WHERE flightId = $flight_id";

if ($conn->query($update_flight_sql) === TRUE) {
    echo "Flight canceled successfully<br>";

    // Check refund amount
    $refundQuery = "SELECT fees FROM flight WHERE flightId = $flight_id";
    $refundResult = $conn->query($refundQuery);

    if ($refundResult !== false && $refundResult->num_rows > 0) {
        $row = $refundResult->fetch_assoc();
        $refundAmount = $row['fees'];

        echo "Refund Amount: $refundAmount<br>";

        // Update Passenger account with refund
        $update_passenger_sql = "UPDATE passenger SET account = account + $refundAmount WHERE flightId = $flight_id";
        if ($conn->query($update_passenger_sql) === TRUE) {
            echo "Refund added to passengers' accounts: $refundAmount<br>";
        } else {
            echo "Error updating passenger accounts: " . $conn->error;
        }
    } else {
        echo "Error retrieving refund amount: " . $conn->error;
    }
} else {
    echo "Error canceling flight: " . $conn->error;
}







?>