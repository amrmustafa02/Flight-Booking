<?php

include"./connection.php";

//Retrive flight details based on the ID sent via a URL Parameter
if (isset($_GET['flight_id'])) {
    $flight_id = $_GET['flight_id'];
}
// Replace with the actual flight ID or retrieve dynamically
//$flight_id = 2; 
//Query to select flights details

$sql = "SELECT * FROM flight WHERE flightId = $flight_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
    $row = $result->fetch_assoc();
    // Display flight details
    echo "<h2>Flight Details</h2>";
    echo "ID: " . $row['flightId'] . "<br>";
    echo "Name: " . $row['name'] . "<br>";
    echo "From: " . $row['itineraryFrom'] . "<br>";
    echo "To: " . $row['itineraryTo'] . "<br>";
    // Query to fetch pending passengers for the specified flight
    $sql = "SELECT * FROM passengers WHERE flightId = $flight_id AND status = 'registered'";
    $result = $conn->query($sql);
   // Display pending passengers list
   if ($result->num_rows > 0) 
   {
    echo "<h3>Registered Passengers List</h3>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) 
    {
        echo "<li>Passenger ID: " . $row["passengerId"] . " | Name: " . $row["name"] . "</li>";
        // Display other passenger details as needed
    }
    echo "</ul>";
   } 
   else 
   {
    echo "No registered passengers for this flight.";
   }

  // Query to fetch registered passengers for the flight
  $sql = "SELECT * FROM passengers WHERE flightId = $flight_id AND status = 'pending'";
  $result = $conn->query($sql);
 
 // Display registered passengers list
 if ($result->num_rows > 0) 
 {
    echo "<h3>Pending Passengers List</h3>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) 
    {
        echo "<li>Passenger ID: " . $row["passengerId"] . " | Name: " . $row["name"] . "</li>";
        // Display other passenger details as needed
    }
    echo "</ul>";
}
else 
{
    echo "No pending passengers for this flight.";
}
//============== cancel functionality is missing ========================= 
}
else{
    echo "Flight Not Found";
}



?>