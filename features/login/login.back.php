<?php
$err = "";
include "../../connection.php";
// Check if the form is submitted


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userType = $_POST['userType'];
   
    // function password_verify(string $password,string $hash): bool {}
    //check if user enter empty 
    // if(empty($email)){array_push($err,"Email is required");}
    // if(empty($password)){array_push($err,"Password is required");}

    // TODO:check user found in database
        $hashedPass=md5($password);
     if($userType=='company'){
        $val = "enter";
        echo "<p>$val</p>";
        $query="SELECT * FROM company WHERE email='$email' AND password='$hashedPass'";
        $results=mysqli_query($conn,$query);
        if(mysqli_num_rows($results)==1){
            $_SESSION['email']=$email;
            $val = "you are now logged in";
            echo "<p>$val</p>";
            $_SESSION['success']="you are now logged in";
        }else{
            $err = "WRONG USERNAME/PASSWORD";
            echo "<p>$err</p>";
            // array_push($err,"WRONG USERNAME/PASSWORD");
        }
     }else{
        $val = "enter";
        echo "<p>$val</p>";
        $query="SELECT * FROM passenger WHERE email='$email' AND password='$hashedPass'";
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