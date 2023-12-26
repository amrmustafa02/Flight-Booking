<?php
include "../../connection.php";
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $id = $_COOKIE['id'];
    $sql = "select * from flight where compId = $id";// $id
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        // Output the table header
        echo "<div class='table-container' style='text-align: center; margin: 8px;center;width: 100%;justify-content: center'>";
        echo "<table  style='width: 50%;'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>From City</th>
                    <th>To City</th>
                    <th>Fees</th>
                    <th>Action</th>
                </tr>";

        // Fetch the rows and display the information
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["flightId"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["itineraryFrom"] . "</td>";
            echo "<td>" . $row["itineraryTo"] . "</td>";
            echo "<td>" . $row["fees"] . "</td>";
            echo "<td>
                  <button class='info-btn'>
                   Info
                  </button>
                  <button  class='info-btn'>
                   Cancel
                  </button>
                  </td>";
            echo "</tr>";
        }

        // Close the table
        echo "</table>";
        echo '</div>';

    }
}