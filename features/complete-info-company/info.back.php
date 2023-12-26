<?php
$err = "";
session_start();
include "../../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $companyID = $_COOKIE['id'];

    // Retrieve data from the form using the $_POST superglobal
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $bio = isset($_POST['bio']) ? $_POST['bio'] : "";
    $address = isset($_POST['address']) ? $_POST['address'] : "";
    $location = isset($_POST['location']) ? $_POST['location'] : "";
    $logo = isset($_FILES['logoimg']) ? $_FILES['logoimg']["name"] : "";
   
    if(isset($_FILES['logoimg']['tmp_name']) && empty($_FILES['logoimg']['tmp_name'])){
        echo
        "<script> alert('Image Does Not Exist'); </script>"
        ;
      }
      else{
        $fileName = $_FILES["logoimg"]["name"];
        $fileSize = $_FILES["logoimg"]["size"];
        $tmpName = $_FILES["logoimg"]["tmp_name"];
    
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if ( !in_array($imageExtension, $validImageExtension) ){
          echo
          "
          <script>
            alert('Invalid Image Extension');
          </script>
          ";
        }
        else if($fileSize > 1000000){
          echo
          "
          <script>
            alert('Image Size Is Too Large');
          </script>
          ";
        }
        else{
          $newImageName = uniqid();
          $newImageName .= '.' . $imageExtension;
    
          move_uploaded_file($tmpName, '../../.images/' . $newImageName);
          // Update the database with the file path
                   $updateQuery = "UPDATE company SET username = '$username', bio = '$bio', address = '$address', location = '$location', logoimg = '$newImageName' WHERE companyId = $companyID";
                    $updateResult = mysqli_query($conn, $updateQuery);
          echo
          "
          <script>
            alert('Successfully Added');
           
          </script>
          ";
          header("Location: ../company-home/home.ui.php?id=" . urlencode($companyID));
            exit();
        }
      }
}

