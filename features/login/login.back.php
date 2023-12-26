<?php
$err = "";
include "../../connection.php";

// Check if the form is submitted


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userType = $_POST['userType'];

    $hashedPass = md5($password);
    if ($userType == 'company') {
        $query = "SELECT * FROM company WHERE email='$email' AND password='$hashedPass'";
        $results = mysqli_query($conn, $query);
        if (mysqli_num_rows($results) == 1) {
            $row = mysqli_fetch_assoc($results);
            $companyID = $row['companyId'];
            setcookie('id', $companyID, time() + 3600 * 24, '/');
            header("Location: ../home-company/home.ui.php");
            exit();
        } else {
            $err = "WRONG USERNAME/PASSWORD";
            echo "<p style='color: red'>$err</p>";
        }
    } else {
        $query = "SELECT * FROM passenger WHERE email='$email' AND password='$hashedPass'";
        $results = mysqli_query($conn, $query);
        if (mysqli_num_rows($results) == 1) {
            $result2 = mysqli_query($conn, "SELECT passengerId FROM passenger LIMIT 1");
            if ($result2 && mysqli_num_rows($result2) > 0) {
                $row = mysqli_fetch_assoc($result2);
                $passengerID = $row['passengerId'];
                setcookie('id', $passengerID, time() + 3600 * 24, '/');
                header("Location: ../home-passenger/home.ui.php");
                exit();
            }

        } else {
            $err = "WRONG USERNAME/PASSWORD";
            echo "<p style='color: red'>$err</p>";
        }
    }


}
