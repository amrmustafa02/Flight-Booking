<?php
$err = "";
session_start();
include "../../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $photo = isset($_FILES['photo']) ? $_FILES['photo']["name"] : "";
  $passport = isset($_FILES['passportimg']) ? $_FILES['passportimg']["name"] : "";
  $passengerID = $_COOKIE['id'];


  if (isset($_FILES['photo']['tmp_name']) && empty($_FILES['photo']['tmp_name'])) {
    echo
    "<script> alert('Image Does Not Exist'); </script>";
  } else {
    $fileName = $_FILES["photo"]["name"];
    $fileSize = $_FILES["photo"]["size"];
    $tmpName = $_FILES["photo"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if (!in_array($imageExtension, $validImageExtension)) {
      echo
      "<script>
       alert('Invaild image');
      </script>";
      exit();
    } else if ($fileSize > 1000000) {
      echo
      "<script>
       alert('Image Size Is Too Large');
      </script>";
      exit();
    } else {
      $newImageName = uniqid();
      $newImageName .= '.' . $imageExtension;

      move_uploaded_file($tmpName, '../../.images/' . $newImageName);
      $updateQuery = "UPDATE passenger SET photo = '$newImageName' WHERE passengerId = $passengerID";
      $updateResult = mysqli_query($conn, $updateQuery);
    }
  }


  if (isset($_FILES['passportimg']['tmp_name']) && empty($_FILES['passportimg']['tmp_name'])) {
    echo
    "<script> alert('Image Does Not Exist'); </script>";
  } else {
    $fileName = $_FILES["passportimg"]["name"];
    $fileSize = $_FILES["passportimg"]["size"];
    $tmpName = $_FILES["passportimg"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if (!in_array($imageExtension, $validImageExtension)) {
      echo"<script>alert('Invalid Image Extension')</script>";
    } else if ($fileSize > 1000000) {
      echo"<script>alert('Image Size is Large')</script>";
    } else {
      $newImageName = uniqid();
      $newImageName .= '.' . $imageExtension;

      move_uploaded_file($tmpName, '../../.images/' . $newImageName);
      $updateQuery = "UPDATE passenger SET passportimg = '$newImageName' WHERE passengerId = $passengerID";
      $updateResult = mysqli_query($conn, $updateQuery);
      header("Location: ../home-passenger/home.ui.php");
      exit();
    }
  }
}
