<?php
$err = "";
include "../../connection.php";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    //get the currently logged name
    $receivedData = $_COOKIE['id'];
    $getName = "SELECT name FROM company WHERE companyId= '$receivedData'";
    $nameResult = mysqli_query($conn, $getName);
    $name ='';
    if ($nameResult) {
        // Fetch the result
        $row = mysqli_fetch_assoc($nameResult);
        $name = $row['name'];

    } else {
        echo "Error retrieving name: " . mysqli_error($conn);
    }
    $getlogo = "SELECT logoimg FROM company WHERE companyId= '$receivedData'";
    $logoResult = mysqli_query($conn, $getlogo);

    if ($logoResult) {

        $row = mysqli_fetch_assoc($logoResult);
        $logo = $row['logoimg'];

        echo '<img class="image"  src="../../.images/' . $logo . '">';
        echo "<h1 style='font-size: 30px; color: white'>$name</h1>";
    } else {

        echo "Error retrieving logo: " . mysqli_error($conn);
    }

}



