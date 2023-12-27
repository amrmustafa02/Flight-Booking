<?php
include "../../connection.php"; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $flightId = $_POST["flightId"];
    $messageContent = $_POST["messageContent"];

    // Assuming passenger ID is retrieved from your authentication method
    $passengerId = $_COOKIE['id'];

    // Get the company ID associated with the flight
    $getCompanyIdQuery = "SELECT compId FROM flight WHERE flightId = $flightId";
    $companyIdResult = mysqli_query($conn, $getCompanyIdQuery);

    if ($companyIdResult && mysqli_num_rows($companyIdResult) > 0) {
        $company = mysqli_fetch_assoc($companyIdResult);
        $companyId = $company['compId'];

        // Insert the message into the messages table
        $insertMessageQuery = "INSERT INTO messages (content, messageBy, messageTo) 
                               VALUES ('$messageContent', '$passengerId', '$companyId')";
        
        if (mysqli_query($conn, $insertMessageQuery)) {
            echo '<h1 style="color:white;padding:8px;text-align:center;width:100vw">Message sent successfully.</h1>';
        } else {
            echo '<h1>Error sending message: ' . mysqli_error($conn) . '</h1>';
        }
    } else {
        echo '<h1>Error retrieving company ID.</h1>';
    }
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="messages.css">
    <title>Add Flight</title>
</head>
 

<body>

</body>

</html>