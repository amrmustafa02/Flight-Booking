<?php
$err = "";
include "../../connection.php";
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $passengerID = $_COOKIE['id'];

    // Select all required information in a single query
    $query = "SELECT * FROM passenger WHERE passengerID= '$passengerID'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Fetch the result
        $row = mysqli_fetch_assoc($result);

        // Extract data from the row
        $name = $row['name'];
        $email = $row['email'];
        $tel = $row['tel'];
        $photo = $row['photo'];

        // Echo the information with HTML structure
        echo "<div style='display: flex; justify-content: center; align-items: center; text-align: center;'>";
        echo '<img class="image"  src="../../.images/' . $photo . '">';
        echo "<div style='text-align: start; margin:8px'>";
        echo "<p style='color:white;font-size:18px'>Name: $name</p>";
        echo "<p style='color:white;font-size:18px'>Email: $email</p>";
        echo "<p style='color:white;font-size:18px'>Tel: $tel</p>";
        echo "</div>";
        echo "</div>";
    } else {
        // Handle query error
        echo "Error retrieving data: " . mysqli_error($conn);
    }
}
