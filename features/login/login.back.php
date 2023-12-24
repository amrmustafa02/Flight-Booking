<?php
$err = "";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userType = $_POST['userType'];

    // TODO:check user found in database

    // if success state 
    //go to home page
    // TODO: this path will replace when finish home scrren 
    header("Location: ../../index.php");
    exit;

    // else
    // TODO:set err varaible with error get from database
    

}
?>