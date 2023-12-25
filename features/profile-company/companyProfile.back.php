<?php

include "../../connection.php";
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $err = "";

    // $id = $_COOKIE['id'];
    $sql = "select * from company where companyId = '2' ";  // $id
    $result = mysqli_query($conn, $sql);
    //$r = mysqli_fetch_array($result,MYSQLI_ASSOC); // mmkn 23ml deh brdo
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the rows and display the information
        while ($row = mysqli_fetch_assoc($result)) {
            //fadel logo
            //  echo $row['imgLogo'] . "<br>";
            echo $row['bio'] . "<br>";
          //  echo $row['companyId'] . "<br>";
            echo $row['name'] . "<br>";
            echo $row['bio'] . "<br>";
            echo $row['address'] . "<br>";
            // fadel hena flights list
            echo "<hr>";
        }
    } else {
        echo "No results found.";
        $err = "";
    }

}

?>


<?php
// edit
include "../../connection.php";

//$id = $_COOKIE['id'];
$sql = "SELECT * FROM company where companyId = '1'"; //$id
if (!empty($_POST['name'])) // ***
{
    $name = $_POST['name'];
    $sql2 = "SELECT * FROM company where name = '$name'";
    $result = mysqli_query($conn, $sql2);
    $r = mysqli_num_rows($result);
// if there is other company with the same name
    if ($r) {
        echo "name already exist";
    } else {
        $sql = "UPDATE company set name = '$name' ";
        mysqli_query($conn, $sql);
    }
}

if (!empty($_POST['address'])) // ***
{
    $address = $_POST['address'];
    $sql = "UPDATE company set address = '$address' ";
    mysqli_query($conn, $sql);
}

if (!empty($_POST['bio'])) // ***
{
    $bio = $_POST['bio'];
    $sql = "UPDATE company set bio = '$bio' ";
    mysqli_query($conn, $sql);
}

if (!empty($_POST['password'])) {
    $password = $_POST['password'];
    $hashedPass = md5($password);
    $sql = "UPDATE company set password = '$hashedPass' ";
    mysqli_query($conn, $sql);
}

if (!empty($_POST['tel'])) {
    $tel = $_POST['tel'];
    $sql = "UPDATE company set tel = '$tel' ";
    mysqli_query($conn, $sql);
}

if (!empty($_POST['account'])) {
    $account = $_POST['account'];
    $sql = "UPDATE company set account = '$account' ";
    mysqli_query($conn, $sql);
}

if (!empty($_POST['username'])) {
    $username = $_POST['username'];
    $sql = "UPDATE company set username = '$username' ";
    mysqli_query($conn, $sql);
}

?>

