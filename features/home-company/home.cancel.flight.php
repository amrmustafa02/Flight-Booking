<?php
include "../../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'cancel') {
    // Retrieve flight ID from the hidden input
    $flightId = $_POST['flightId'];

    // Perform actions for canceling the flight
    // Update the status to true in the flight table
    $updateQuery = "UPDATE flight SET cancelled = true WHERE flightId = $flightId";

    if (mysqli_query($conn, $updateQuery)) {
        echo "<h1>Flight $flightId has been canceled.</h1>";
    } else {
        echo "<h1>Error updating flight status: " . mysqli_error($conn) . "</h1>";
    }

    exit;
}
?>
