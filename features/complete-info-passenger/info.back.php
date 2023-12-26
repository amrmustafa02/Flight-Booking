<?php
$err = "";
session_start();
include "../../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $photo = isset($_FILES['photo']) ? $_FILES['photo']["name"] : "";
    $passport = isset($_FILES['passportimg']) ? $_FILES['passportimg']["name"] : "";
    $passengerID = $_COOKIE['id'];

   
    if(isset($_FILES['photo']['tmp_name']) && empty($_FILES['photo']['tmp_name'])){
        echo
        "<script> alert('Image Does Not Exist'); </script>"
        ;
      }
      else{
        $fileName = $_FILES["photo"]["name"];
        $fileSize = $_FILES["photo"]["size"];
        $tmpName = $_FILES["photo"]["tmp_name"];
    
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
    
          move_uploaded_file($tmpName, 'C:\\Users\\Nada\\Downloads' . $newImageName);
          // Update the database with the file path
                   $updateQuery = "UPDATE passenger SET photo = '$newImageName' WHERE passengerId = $passengerID";
                    $updateResult = mysqli_query($conn, $updateQuery);
          echo
          "
          <script>
            alert('Successfully Added');
           
          </script>
          ";
        //   header("Location: ../compamy-home/home.ui.php?id=" . urlencode($passengerID));
        //     exit();
        }
      }
      if(isset($_FILES['passportimg']['tmp_name']) && empty($_FILES['passportimg']['tmp_name'])){
        echo
        "<script> alert('Image Does Not Exist'); </script>"
        ;
      }
      else{
        $fileName = $_FILES["passportimg"]["name"];
        $fileSize = $_FILES["passportimg"]["size"];
        $tmpName = $_FILES["passportimg"]["tmp_name"];
    
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
    
          move_uploaded_file($tmpName, 'C:\\Users\\Nada\\Downloads' . $newImageName);
          // Update the database with the file path
                   $updateQuery = "UPDATE passenger SET passportimg = '$newImageName' WHERE passengerId = $passengerID";
                    $updateResult = mysqli_query($conn, $updateQuery);
          echo
          "
          <script>
            alert('Successfully Added');
           
          </script>
          ";
          header("Location: ../home-passenger/home.ui.php?id=" . urlencode($passengerID));
            exit();
        }
      }


}
?>