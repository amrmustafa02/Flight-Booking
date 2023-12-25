<?php

include "../../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    // Foreign Key from Company 
    //$companyId = $_POST['company_Id'];
    $name= $_POST['name'];
    $Id = $_POST["id"];
    $itineraryFrom = $_POST['fromCity'];
    $itineraryTo = $_POST['toCity'];
    //the allowed number passengers for this flight
    $numberOfPassengers = $_POST['numberOfPassengers'];
    // confiremed passengers
    //$registered_pass= $_POST['registered_pass'];
    // pending passengers
    //$pending_pass= $_POST['pending_pass'];
    // price of the flight
    $fees= $_POST['fees'];
    $start_date= $_POST['startDate'];
    $end_date= $_POST['endDate'];
    $start_time= $_POST['startTime'];
    $end_time= $_POST['endTime'];
    // boolean for the allowed number of passengers completed or not 
    //$completed_status;

    /*if ($numberOfPassengers <= $registered_pass) {
        $completed_status = TRUE; // Set completed_status to TRUE
    } else {
        $completed_status = FALSE; // Set completed_status to FALSE
    }*/
    
    //creating the SQL query
    /*$sql = "INSERT INTO Flight (name,itineraryFrom,itineraryTo,numberOfPassengers,registered_pass,pending_pass,fees, start_time, end_time,start_date, end_date,completed_status)
            VALUES (?, ?, ?, ?, ?, ?, ?,?,?,?,?,?,?)";*/
    
    $sql = "INSERT INTO Flight (name,Id,itineraryFrom,itineraryTo,numberOfPassengers,fees,start_date, end_date,start_time,end_time)
            VALUES (?, ?, ?, ?, ?, ?, ?,?,?,?)";
    
    // prepare & execute the query

    $stmt = $conn->prepare($sql);
   // $stmt->blind_param("sssiiidssss",$name,$From,$To,$numberOfPassengers,$registered_pass,$pending_pass,$fees,$start_time,$end_time,$start_date, $end_date,$completed_status);
   $stmt->bind_param("sissidssss",$name,$Id,$itineraryFrom,$itineraryTo,$numberOfPassengers,$fees,$start_date,$end_date,$start_time,$end_time);
 
   if($stmt->execute()){
        echo "Flight Added Successfully";
    }
    else{
        echo "Error while adding Flight". $stmt->error;
    }

    $stmt->close();




    // Perform any additional processing or validation as needed

    // Example: Display the retrieved data (you can replace this with your own logic)
   // echo "ID: $id <br>";
    /*echo "Name: $name <br>";
    echo "Fees: $fees <br>";
    echo "Number of Passengers: $numberOfPassengers <br>";
    echo "From City: $fromCity <br>";
    echo "To City: $toCity <br>";
    echo "Start Date: $startDate <br>";
    echo "End Date: $endDate <br>";
    echo "Start Time: $startTime <br>";
    echo "End Time: $endTime <br>";*/

    // Now you can perform database operations, file handling, or any other necessary actions with the form data.
    // For security reasons, consider using prepared statements if interacting with a database.
}


?>
