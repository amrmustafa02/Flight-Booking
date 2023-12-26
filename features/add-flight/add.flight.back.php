<?php

include "../../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    // Foreign Key from Company 

    $companyId = $_COOKIE['id'];
    $name = $_POST['name'];
    $itineraryFrom = $_POST['fromCity'];
    $itineraryTo = $_POST['toCity'];
    $numberOfPassengers = $_POST['numberOfPassengers'];
    $fees = $_POST['fees'];
    $start_date = $_POST['startDate'];
    $end_date = $_POST['endDate'];
    $start_time = $_POST['startTime'];
    $end_time = $_POST['endTime'];


    $sql = "INSERT INTO Flight (compId,name, itineraryFrom, itineraryTo, numberOfPassengers, fees, start_date, end_date, start_time, end_time)
        VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("sissiissss", $companyId, $name, $itineraryFrom, $itineraryTo, $numberOfPassengers, $fees, $start_date, $end_date, $start_time, $end_time);

    if ($stmt->execute()) {
        echo "<p style='color: green;font-size: 22px'>Flight Added Successfully</p>";
    } else {
        echo "<p>Error</p>" . $stmt->error;
    }

    $stmt->close();


}




