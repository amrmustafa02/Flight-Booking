<?php
$err = "";
// Check if the form is submitted
echo "saa";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include("../../connection.php");
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    //$hashed_password = md5($password);

   
    $sql = "select * from company , passenger where email = '$email'";
$result = mysqli_query($conn,$sql);
$count_email = mysqli_num_rows($result);

if($count_email != 0)
{
    $err = "email already exist";
}
if($password != $cpassword)
{
    $err = "password dont match";
}

$hashedpass = password_hash($password,PASSWORD_DEFAULT);


if($type == 'company')
{
    $sql = "insert into company(username,email,password,tel,type) values('$username','$email','$tel','$type')";
    $result = mysqli_query($conn,$sql);
}
else if($type == 'passenger')
{
    $sql = "insert into passenger(username,email,password,tel,type) values('$username','$email','$tel','$type')";
    $result = mysqli_query($conn,$sql);

}
// if($result){
//     header("Location: login.php"); // msh 3arf ht7tago wla l2 
// }



    // TODO:add new user in database

    // if success state 
    //go to home page
    // TODO: this path will replace when finish home scrren 
    header("Location: ../../index.php");
    exit;

    // else
    // TODO:set err varaible with error get from database
    


}
?>