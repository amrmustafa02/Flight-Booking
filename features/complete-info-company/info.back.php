<?php
$err = "";
session_start();
include "../../connection.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $receivedData = urldecode($_GET['id']);

    echo "Data received: " . $receivedData;

    // Retrieve data from the form using the $_POST superglobal
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $bio = isset($_POST['bio']) ? $_POST['bio'] : "";
    $address = isset($_POST['address']) ? $_POST['address'] : "";
    $location = isset($_POST['location']) ? $_POST['location'] : "";
    $logo = isset($_FILES['logo']) ? $_FILES['logo']["name"] : "";
    // Check if "logoimg" key exists in the $_FILES array
    if (isset($_FILES['logoimg']['error'])) {
        $uploadError = $_FILES['logoimg']['error'];

        if ($uploadError === UPLOAD_ERR_OK) {
            $logo = $_FILES['logoimg']["name"];

            // File Upload Handling for Logo
            $targetDirectory = "C:\\Users\\Nada\\Downloads";  // Specify your target directory for logos
            $targetFile = $targetDirectory . basename($_FILES["logoimg"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Check if the file is an actual image
            $check = getimagesize($_FILES["logoimg"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }

            // Check if file already exists
            if (file_exists($targetFile)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["logoimg"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            $allowedFormats = array("jpg", "jpeg", "png", "gif");
            if (!in_array($imageFileType, $allowedFormats)) {
                echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            } else {
                if (move_uploaded_file($_FILES["logoimg"]["tmp_name"], $targetFile)) {
                    echo "The file " . basename($_FILES["logoimg"]["name"]) . " has been uploaded.";

                    // Update the database with the file path
                    $updateQuery = "UPDATE company SET username = '$username', bio = '$bio', address = '$address', location = '$location', logoimg = '$targetFile' WHERE companyId = $receivedData";
                    $updateResult = mysqli_query($conn, $updateQuery);

                    if ($updateResult) {
                        echo "Data and logo added successfully!";
                    } else {
                        // Handle update failure
                        echo "Error updating data and logo: " . mysqli_error($conn);
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        } else {
            // Handle upload error
            echo "File upload error: " . $uploadError;
        }
    } else {
        // Handle the case where "logoimg" key is not present in $_FILES
        echo "No logo file submitted.";
    }
}
?>
