<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $id = $_POST["id"];
    $fees = $_POST["fees"];
    $numberOfPassengers = $_POST["numberOfPassengers"];
    $fromCity = $_POST["fromCity"];
    $toCity = $_POST["toCity"];
    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];
    $startTime = $_POST["startTime"];
    $endTime = $_POST["endTime"];

    // Perform any additional processing or validation as needed

    // Example: Display the retrieved data (you can replace this with your own logic)
    echo "Name: $name <br>";
    echo "ID: $id <br>";
    echo "Fees: $fees <br>";
    echo "Number of Passengers: $numberOfPassengers <br>";
    echo "From City: $fromCity <br>";
    echo "To City: $toCity <br>";
    echo "Start Date: $startDate <br>";
    echo "End Date: $endDate <br>";
    echo "Start Time: $startTime <br>";
    echo "End Time: $endTime <br>";

    // Now you can perform database operations, file handling, or any other necessary actions with the form data.
    // For security reasons, consider using prepared statements if interacting with a database.
}

?>
