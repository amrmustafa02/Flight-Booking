<?php
$err = "";
session_start();
include "../../connection.php";
require_once '../../constant.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form using the $_POST superglobal
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $bio = isset($_POST['bio']) ? $_POST['bio'] : "";
    $address = isset($_POST['address']) ? $_POST['address'] : "";
    $location = isset($_POST['location']) ? $_POST['location'] : "";

    // Get the ID of the recently inserted record
    $companyID = UserData::$userId;

    echo "<p>$companyID </p>"; // Move this line here

    $updateQuery = "UPDATE company SET username = '$username', bio = '$bio', address = '$address', location = '$location' WHERE companyId = $companyID";
    $updateResult = mysqli_query($conn, $updateQuery);

    // if ($updateResult) {
    //     echo "Record updated successfully!";
    //     unset($_SESSION['companyID']);
    // } else {
    //     // Handle update failure
    //     echo "Error updating record: " . mysqli_error($conn);
    // }

    // $logo = isset($_FILES['logo']) ? $_FILES['logo']["name"] : "";
    // TODO: take logo
}
?>
