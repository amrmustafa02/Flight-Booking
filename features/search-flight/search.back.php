<?php
$err = "";
include "../../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have a form with input fields named "fromCity" and "toCity"
    $fromCity = $_POST['fromCity'];
    $toCity = $_POST['toCity'];

    // Select flights based on the provided conditions
    $query = "SELECT * FROM flight f
    WHERE itineraryFrom = '$fromCity' 
    AND itineraryTo = '$toCity'
    AND NOT EXISTS (
      SELECT 1 FROM reservation r 
      WHERE r.flightId = f.flightId
    )";
    $result = mysqli_query($conn, $query);
    // echo "<p>hi</p>";

    if ($result) {
        // Check if any flights match the conditions
        // echo "<p>hi</p>";
        if ($result && mysqli_num_rows($result) > 0) {
            // Output the table header
            echo "<div class='table-container' style='text-align: center; margin: 8px;width: 100%; overflow-x: auto;'>";
            echo "<table style='width: 90%; margin: 8px; table-layout: fixed;'>
            <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Start Date</th>
                        <th>To Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Fees</th>
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
                echo "<td>
                    <form action='../reserve/reserve.ui.php' method='post' style='display: inline-block;'>
                        <input type='hidden' name='flightId' value='" . $row["flightId"] . "'>
                        <button type='submit' class='info-btn' name='action' value='info'>Reserve</button>
                    </form>
                </td>";
                echo "</tr>";
            }

            // Close the table
            echo "</table>";
            echo '</div>';
        } else {
            echo "<h1 style='color:white'>No matching flights found.</h1>";
        }
    } else {
        // Handle query error
        echo "Error executing search: " . mysqli_error($conn);
    }
}
