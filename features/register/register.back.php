<?php
$err = "";
// Check if the form is submitted
include "../../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $tel = $_POST['tel'];
    $userType = $_POST['userType'];
    

    
    if($userType == "company")
    {
        $sql = "select * from company where email = '$email'";
    }
    else
    {
        $sql = "select * from passenger where email = '$email'";
    }
    
    $result = mysqli_query($conn, $sql);
    $count_email = mysqli_num_rows($result);

    if ($count_email != 0) {
        $err = "email already exist";
        echo "<p>$err</p>";
        exit;
    }

    $hashedpass = password_hash($password, PASSWORD_DEFAULT);

   
    if ($userType == 'company') {
        echo "insert";
        $sql = "insert into company(name,email,password,tel,userType) values('$name','$email','$hashedpass','$tel','$userType')";
        $result = mysqli_query($conn, $sql);
    } else if ($userType == 'passenger') {
        $sql = "insert into passenger(name,email,password,tel,userType) values('$name','$email','$hashedpass','$tel','$userType')";
        $result = mysqli_query($conn, $sql);

    }

    //TODO: go to home screen
  

   

}
