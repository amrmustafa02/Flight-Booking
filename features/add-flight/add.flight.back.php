<?php

include "../../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    // Foreign Key from Company 

    $companyId = $_COOKIE['id'];
    $name= $_POST['name'];
    $Id = $_POST["id"];
    $itineraryFrom = $_POST['fromCity'];
    $itineraryTo = $_POST['toCity'];
    $numberOfPassengers = $_POST['numberOfPassengers'];
    $fees= $_POST['fees'];
    $start_date= $_POST['startDate'];
    $end_date= $_POST['endDate'];
    $start_time= $_POST['startTime'];
    $end_time= $_POST['endTime'];


    $sql = "INSERT INTO Flight (name,Id,itineraryFrom,itineraryTo,numberOfPassengers,fees,start_date, end_date,start_time,end_time)
            VALUES (?, ?, ?, ?, ?, ?, ?,?,?,?)";
    
    // prepare & execute the query

    $stmt = $conn->prepare($sql);
   $stmt->bind_param("sissidssss",$name,$Id,$itineraryFrom,$itineraryTo,$numberOfPassengers,$fees,$start_date,$end_date,$start_time,$end_time);
 
   if($stmt->execute()){
        echo "<p>Flight Added Successfully</p>";
    }
    else{
        echo "<p>Error</p>". $stmt->error;
    }

    $stmt->close();


}


?>

