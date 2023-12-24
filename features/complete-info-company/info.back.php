<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form using the $_POST superglobal

    $userName = isset($_POST['userName']) ? $_POST['userName'] : "";
    $bio = isset($_POST['bio']) ? $_POST['bio'] : "";
    $address = isset($_POST['address']) ? $_POST['address'] : "";
    $location = isset($_POST['location']) ? $_POST['location'] : "";
//    $logo = isset($_FILES['logo']) ? $_FILES['logo']["name"] : "";
 // TODO:take logo


}
?>