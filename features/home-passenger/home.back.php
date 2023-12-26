<?php
$err = "";
include "../../connection.php";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $passengerID = $_COOKIE['id'];

    //get the currently logged name 

    $getname="SELECT name FROM passenger WHERE passengerID= '$passengerID'";
    $nameResult = mysqli_query($conn, $getname);
    if ($nameResult) {
        // Fetch the result
        $row = mysqli_fetch_assoc($nameResult);
        $name = $row['name'];

        // Echo the name
        echo "<p>Name: $name</p>";
    } else {
        // Handle query error
        echo "Error retrieving name: " . mysqli_error($conn);
    }
    $getemail="SELECT email FROM passenger WHERE passengerID= '$passengerID'";
    $emailResult = mysqli_query($conn, $getemail);
    if ($emailResult) {
        // Fetch the result
        $row = mysqli_fetch_assoc($emailResult);
        $email = $row['email'];

        // Echo the name
        echo "<p>Email: $email</p>";
    } else {
        // Handle query error
        echo "Error retrieving email: " . mysqli_error($conn);
    }
    $gettel="SELECT tel FROM passenger WHERE passengerID= '$passengerID'";
    $telResult = mysqli_query($conn, $gettel);
    if ($telResult) {
        // Fetch the result
        $row = mysqli_fetch_assoc($telResult);
        $tel = $row['tel'];

        // Echo the name
        echo "<p>TEL: $tel</p>";
    } else {
        // Handle query error
        echo "Error retrieving tel: " . mysqli_error($conn);
    }


    $getphoto="SELECT photo FROM passenger WHERE passengerId= '$passengerID'";
    $photoResult = mysqli_query($conn, $getphoto);

    if ($photoResult) {
        // Fetch the result
        $row = mysqli_fetch_assoc($photoResult);
        $photo = $row['photo'];

        // Echo the logo path
        echo "<p> Photo: $photo</p>";
    } else {
        // Handle query error
        echo "Error retrieving photo: " . mysqli_error($conn);
    }



}


?>