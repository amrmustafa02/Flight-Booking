<?php
include "../../connection.php";
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $id = $_COOKIE['id'];
    $sql = "select * from flight where compId = $id"; // $id
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {

        echo "<div class='table-container' style='text-align: center; margin: 8px;width: 100%; overflow-x: auto;'>";
        echo "<table style='width: 90%; margin: 8px; table-layout: fixed;'>
        <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>From City</th>
                    <th>To City</th>
                    <th>Fees</th>
                    <th>Action</th>
                </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["flightId"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["itineraryFrom"] . "</td>";
            echo "<td>" . $row["itineraryTo"] . "</td>";
            echo "<td>" . $row["fees"] . "</td>";
            echo "<td>
                <form action='flight.details.php' method='post' style='display: inline-block;'>
                    <input type='hidden' name='flightId' value='" . $row["flightId"] . "'>
                    <button type='submit' class='info-btn' name='action' value='info'>Info</button>
                </form>
                <form action='home.cancel.flight.php' method='post' style='display: inline-block;'>
                    <input type='hidden' name='flightId' value='" . $row["flightId"] . "'>
                    <button type='submit' class='info-btn' name='action' value='cancel'>Cancel</button>
                </form>
            </td>";
            echo "</tr>";
        }

        echo "</table>";
        echo '</div>';
    }
}
