<?php
$err = "";
// Check if the form is submitted
echo "saa";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include("../../connection.php");
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $hashed_password = md5($password);

    // TODO:add new user in database

    // if success state 
    //go to home page
    // TODO: this path will replace when finish home scrren
    header("Location: ../../index.php");
    exit;

    // else
    // TODO:set err varaible with error get from database


}
?>