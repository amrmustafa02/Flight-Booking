<?php
$err = "";
include "../../connection.php";
require_once '../../constant.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $tel = $_POST['tel'];
    $userType = $_POST['userType'];

    // Check if the email already exists
    if ($userType == "company") {
        $sql = "SELECT * FROM company WHERE email = '$email'";
    } else {
        $sql = "SELECT * FROM passenger WHERE email = '$email'";
    }

    $result = mysqli_query($conn, $sql);
    $count_email = mysqli_num_rows($result);

    if ($count_email != 0) {
        $err = "Email already exists";
        echo "<p>$err</p>";
        exit;
    }

    // Hash the password
    $hashedpass=md5($password);

    // Perform the insertion
    if ($userType == 'company') {
        // $hu = "hello:";
        // echo "<p>$hu</p>";
        $sql = "INSERT INTO company (name, email, password, tel, userType) VALUES ('$name', '$email', '$hashedpass', '$tel', '$userType')";
        // $hu = "hello:";
        // echo "<p>$hu</p>";
        $result = mysqli_query($conn, $sql);
        // $hu = "hello:";
        // echo "<p>$hu</p>";
        if ($result) {
            // Retrieve the last inserted company ID
            // $hu = "hello:";
            // echo "<p>$hu</p>";
            // echo "hello: " ;
            $result2 = mysqli_query($conn, "SELECT companyId FROM company ORDER BY companyId DESC LIMIT 1");

            if ($result2 && mysqli_num_rows($result2) > 0) {
                // $hu = "hello:";
                // echo "<p>$hu</p>";
                $row = mysqli_fetch_assoc($result2);
                $companyID = $row['companyId'];
                UserData::$userId = $companyID;
                echo UserData::$userId;
                // Set the company ID in the session
                // $_SESSION['companyId'] = $companyID;
                // echo "Company ID: " . $_SESSION['companyId'];

                // Redirect to the home screen
                // header("Location: ../../index.php");
            }
        }
    } else if ($userType == 'passenger') {
        $sql = "INSERT INTO passenger (name, email, password, tel, userType) VALUES ('$name', '$email', '$hashedpass', '$tel', '$userType')";
        $result = mysqli_query($conn, $sql);
    }

    // TODO: Redirect to the home screen or handle as needed
}
?>
