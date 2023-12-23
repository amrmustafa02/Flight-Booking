<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form using the $_POST superglobal

    $userName = isset($_POST['userName']) ? $_POST['userName'] : "";
    $bio = isset($_POST['bio']) ? $_POST['bio'] : "";
    $address = isset($_POST['address']) ? $_POST['address'] : "";
    $location = isset($_POST['location']) ? $_POST['location'] : "";
    $logo = isset($_FILES['logo']) ? $_FILES['logo']["name"] : "";

    // Process the form data as needed

    // For example, you can echo the values or save them to a database
    echo "User Name: " . $userName . "<br>";
    echo "Bio: " . $bio . "<br>";
    echo "Address: " . $address . "<br>";
    echo "Location: " . $location . "<br>";
    echo "logo: " . $logo . "<br>";

    // Handle the uploaded file (if applicable)

//    $uploadDir = "uploads/";
//    $uploadFile = $uploadDir . basename($_FILES['logo']['name']);
//    echo "Location2: " . $location . "<br>";
//
//    // Move the uploaded file to the specified directory
//    if (move_uploaded_file($_FILES['logo']['tmp_name'], $uploadFile)) {
//        echo "Logo successfully uploaded. " . $location . "<br>";
//    } else {
//        echo "error uploaded. " . $location . "<br>";
//    }

    echo "Location2: " . $location . "<br>";

}
?>