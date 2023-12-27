<?php
include "../../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['flightId'])) {
    $flightId = $_POST['flightId'];

    $flightQuery = "SELECT * FROM flight WHERE flightId = $flightId";
    $flightResult = mysqli_query($conn, $flightQuery);

    if ($flightResult && mysqli_num_rows($flightResult) > 0) {
        $flight = mysqli_fetch_assoc($flightResult);

        echo "<h1 style='color: white;'>Flight Details</h1>";
        echo "<p style='color: white;'>ID: " . $flight['flightId'] . "</p>";
        echo "<p style='color: white;'>From City: " . $flight['itineraryFrom'] . "</p>";
        echo "<p style='color: white;'>To City: " . $flight['itineraryTo'] . "</p>";
        echo "<p style='color: white;'>Fees: " . $flight['fees'] . "</p>";

        $reservationQuery = "SELECT reservation.*, passenger.name AS passengerName, passenger.email AS passengerEmail
                            FROM reservation
                            JOIN passenger ON reservation.passId = passenger.passengerID
                            WHERE reservation.flightId = $flightId";

        $reservationResult = mysqli_query($conn, $reservationQuery);

        if ($reservationResult && mysqli_num_rows($reservationResult) > 0) {
            echo "<h2 style='color: white;'>Passengers Reserved</h2>";
            echo "<div class='table-container'>";
            echo "<table style='width: 90%; margin: 8px; table-layout: fixed;'>
                    <tr>
                        <th style='color: white;'>Reservation ID</th>
                        <th style='color: white;'>Passenger ID</th>
                        <th style='color: white;'>Passenger Name</th>
                        <th style='color: white;'>Passenger Email</th>
                        <th style='color: white;'>Status</th>
                    </tr>";

            while ($reservation = mysqli_fetch_assoc($reservationResult)) {
                echo "<tr>";
                echo "<td style='color: white;'>" . $reservation["reservationId"] . "</td>";
                echo "<td style='color: white;'>" . $reservation["passId"] . "</td>";
                echo "<td style='color: white;'>" . $reservation["passengerName"] . "</td>";
                echo "<td style='color: white;'>" . $reservation["passengerEmail"] . "</td>";
                echo "<td style='color: white;'>" . $reservation["status"] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
            echo '</div>';
        } else {
            echo "<p style='color: white;'>No passengers have reserved this flight yet.</p>";
        }
    } else {
        echo "<p style='color: white;'>Flight not found.</p>";
    }
} else {
    echo "<p style='color: white;'>Invalid request.</p>";
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Company Home</title>
</head>

</html>