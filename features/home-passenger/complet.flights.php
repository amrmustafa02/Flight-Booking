<?php

include "../../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Assuming you have the passenger ID available (replace 'your_passenger_id' with the actual variable or value)
    $passengerId = $_COOKIE["id"];

    // Query to retrieve flights for the specified passenger ID
    $query = "SELECT flight.*, reservation.status
              FROM flight
              JOIN reservation ON flight.flightId = reservation.flightId
              WHERE reservation.passId = '$passengerId'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        // Output the table header
        echo "<div class='table-container' style='text-align: center; margin: 8px;width: 100%; overflow-x: auto;'>";
        echo "<table style='width: 90%; margin: 8px; table-layout: fixed;'>
            <tr>
                <th>ID</th>
                <th>Flight Name</th>
                <th>Start Date</th>
                <th>To Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Fees</th>
                <th>Status</th>
                <th>Action</th>

            </tr>";

        // Fetch the rows and display the information
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["flightId"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["start_date"] . "</td>";
            echo "<td>" . $row["end_date"] . "</td>";
            echo "<td>" . $row["start_time"] . "</td>";
            echo "<td>" . $row["end_time"] . "</td>";
            echo "<td>" . $row["fees"] . "</td>";
            echo "<td>" . $row["status"] . "</td>";
            echo "<td>
            <form action='../messages/messages.ui.php' method='POST' style='display: inline-block;'>
                <input type='hidden' name='flightId' value='" . $row["flightId"] . "'>
                <button type='submit' class='info-btn' name='action' value='info'>Message </button>
            </form
            </td>";
            echo "</tr>";
        }

        // Close the table
        echo "</table>";
        echo '</div>';
    } else {
        // Handle query error
        echo "Error executing query: " . mysqli_error($conn);
    }
}
