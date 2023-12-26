<?php
$err = "";
include "../../connection.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get data from user
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $tel = $_POST['tel'];
    $userType = $_POST['userType'];

    // prepare statement sql
    if ($userType == "company") {
        $sql = "SELECT * FROM company WHERE email = '$email'";
    } else {
        $sql = "SELECT * FROM passenger WHERE email = '$email'";
    }

    $result = mysqli_query($conn, $sql);
    $count_email = mysqli_num_rows($result);


    // check if email already exsit
    if ($count_email != 0) {
        $err = "Email already exist";
        echo "<script>
                alert('$err')
              </script>";
//        echo "<p style='color: black'>$err</p>";
        exit();
    }

    // Hash the password
    $hashedPass = md5($password);

    // Perform the insertion
    if ($userType == 'company') {
        $sql = "INSERT INTO company (name, email, password, tel, userType) VALUES ('$name', '$email', '$hashedPass', '$tel', '$userType')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $result2 = mysqli_query($conn, "SELECT companyId FROM company ORDER BY companyId DESC LIMIT 1");
            if ($result2 && mysqli_num_rows($result2) > 0) {
                $row = mysqli_fetch_assoc($result2);
                $companyID = $row['companyId'];
                setcookie('id', $companyID, time() + 3600 * 24, '/');
                header("Location: ../complete-info-company/info.ui.php");
                exit();
            }
        }
    } else if ($userType == 'passenger') {
        $sql = "INSERT INTO passenger (name, email, password, tel, userType) VALUES ('$name', '$email', '$hashedPass', '$tel', '$userType')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $result2 = mysqli_query($conn, "SELECT passengerId FROM passenger ORDER BY passengerId DESC LIMIT 1");
            if ($result2 && mysqli_num_rows($result2) > 0) {
                $row = mysqli_fetch_assoc($result2);
                $passengerID = $row['passengerId'];
                setcookie('id', $passengerID, time() + 3600 * 24, '/');
                header("Location: ../complete-info-passenger/info.ui.php");
                exit();
            }
        }
    }


}

