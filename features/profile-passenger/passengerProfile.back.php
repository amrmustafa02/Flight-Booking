<?php
include "../../connection.php";
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $err = "";

    // $id = $_COOKIE['id'];
    $sql = "select * from passenger where passengerId = '2' ";  // $id
    $result = mysqli_query($conn, $sql);
    //echo mysqli_fetch_all($result); // show info ? nshoof deh htl3 ehh brdo

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the rows and display the information
        while ($row = mysqli_fetch_assoc($result)) {
            // Display specific information from the fetched rows
            echo $row['passportImg'] . "<br>";
            echo $row['passengerId'] . "<br>";
            echo $row['name'] . "<br>";
            echo $row['email'] . "<br>";
            echo $row['tel'] . "<br>";
            echo $row['account'] . "<br>";

            echo "<hr>"; 
        }
    } else {
        echo "No results found.";
        $err = "No results found.";
    }

}

?>

<?php
// edit 
include "../../connection.php";
//$name = $_POST['name'];
//$id = $_COOKIE['id'];
$password;
$tel;
$account;
$sql = "SELECT * FROM passenger where passengerId = '2'"; //$id

// if there is other company with the same name
if (!empty($_POST['name'])) {
   
   // $name = $_POST['name'];
    $name = "kikks2";
    $sql2 = "SELECT * FROM passenger where name = '$name'";
    $result = mysqli_query($conn, $sql2);
    $r = mysqli_num_rows($result);
    if ($r) {
        echo "name already exist";
    } else {
        $sql = "UPDATE passenger set name = '$name' ";
        mysqli_query($conn, $sql);
    }
}

if (!empty($_POST['password'])) {
    $password = $_POST['password'];
    $hashedPass = md5($password);
    $sql = "UPDATE passenger set password = '$hashedPass' ";
    mysqli_query($conn, $sql);
}

if (!empty($_POST['tel'])) {
    $tel = $_POST['tel'];
    $sql = "UPDATE passenger set tel = '$tel' ";
    mysqli_query($conn, $sql);
}

if (!empty($_POST['account'])) {
    $account = $_POST['account'];
    $sql = "UPDATE passenger set account = '$account' ";
    mysqli_query($conn, $sql);
}

?>


<?php
include "../../connection.php";
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $err = "";

    // $id = $_COOKIE['id'];
    $sql = "select * from passenger where passengerId = '2' ";  // $id
    $result = mysqli_query($conn, $sql);
    //echo mysqli_fetch_all($result); // show info ? nshoof deh htl3 ehh brdo

    if ($result && mysqli_num_rows($result) > 0) {
       
        while ($row = mysqli_fetch_assoc($result)) {
            
            echo $row['passportImg'] . "<br>";
            echo $row['passengerId'] . "<br>";
            echo $row['name'] . "<br>";
            echo $row['email'] . "<br>";
            echo $row['tel'] . "<br>";
            echo $row['account'] . "<br>";

            echo "<hr>"; 
        }
    } else {
        echo "No results found.";
        $err = "No results found.";
    }

}

?>