<?php
$err = "";
include "../../connection.php";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    //get the currently logged name 
    $receivedData = $_COOKIE['id'];
    echo "<p>$receivedData</p>";
    $getName = "SELECT name FROM company WHERE companyId= '$receivedData'";
    $nameResult = mysqli_query($conn, $getName);
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
    $getlogo = "SELECT logoimg FROM company WHERE companyId= '$receivedData'";
    $logoResult = mysqli_query($conn, $getlogo);

    if ($logoResult) {
        // Fetch the result
        $row = mysqli_fetch_assoc($logoResult);
        $logo = $row['logoimg'];

        // Echo the logo path
        echo "<p>Name: $logo</p>";

        // Corrected concatenation for the image source
        echo '<img src="../../.images/' . $logo . '" >';
    } else {
        // Handle query error
        echo "Error retrieving logo: " . mysqli_error($conn);
    }

}



