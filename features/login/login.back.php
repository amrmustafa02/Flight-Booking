<?php
$err = "";
include "../../connection.php";
// require_once '../../constant.php';
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userType = $_POST['userType'];

    // TODO:check user found in database
        $hashedPass=md5($password);
     if($userType=='company'){
        $query="SELECT * FROM company WHERE email='$email' AND password='$hashedPass'";
        $results=mysqli_query($conn,$query);
        if(mysqli_num_rows($results)==1){
            $_SESSION['email']=$email;
            $val = "you are now logged in";
            echo "<p>$val</p>";
            $result2 = mysqli_query($conn, "SELECT companyId FROM company LIMIT 1");

            if ($result2 && mysqli_num_rows($result2) > 0) {
                $row = mysqli_fetch_assoc($result2);
                $companyID = $row['companyId'];
                UserData::$userId = $companyID;
                echo UserData::$userId;
                 header("Location: ../compamy-home/home.ui.php?id=" . urlencode($companyID));
                 exit();
            }
        }else{
            $err = "WRONG USERNAME/PASSWORD";
            echo "<p>$err</p>";
        }
     }else{
        $query="SELECT * FROM passenger WHERE email='$email' AND password='$hashedPass'";
        $results=mysqli_query($conn,$query);
        if(mysqli_num_rows($results)==1){
            $_SESSION['email']=$email;
            $val = "you are now logged in";
            echo "<p>$val</p>";
            
        }else{
            $err = "WRONG USERNAME/PASSWORD";
            echo "<p>$err</p>";
        }
     }
    

    // if success state 
    //go to home page
    // TODO: this path will replace when finish home scrren 
    // header("Location: ../../index.php");
    // exit;

    // else
    // TODO:set err varaible with error get from database
    

}
?>