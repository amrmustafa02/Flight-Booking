<?php
include "../../connection.php";
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $passengerId = $_COOKIE["id"];

    $query = "SELECT * FROM passenger WHERE passengerId = '$passengerId'";
    $result = mysqli_query($conn, $query);

    if ($result) {

        $row = mysqli_fetch_assoc($result);

        $name = $row['name'];
        $email = $row['email'];
        $tel = $row['tel'];
        $account = $row['account'];


        echo "<div class=\"input-group\">";

        // name and email
        echo "  <div class=\"input-pair\">";
        echo "    <label for=\"name\">Name</label>";
        echo '    <input type="text" id="name" name="name" value="' . $row["name"] . '">';
        echo "  </div>";
        echo "  <div class=\"input-pair\">";
        echo "    <label for=\"name\">Email</label>";
        echo '    <input type="text" id="name" name="email" value="' . $row["email"] . '">';
        echo "  </div>";
        echo "</div>";

        // tel and account
        echo "<div class=\"input-group\">";
        echo "  <div class=\"input-pair\">";
        echo "    <label for=\"name\">Tel</label>";
        echo '    <input type="text" id="name" name="tel" value="' . $row["tel"] . '">';
        echo "  </div>";
        echo "  <div class=\"input-pair\">";
        echo "    <label for=\"name\">Account Balance</label>";
        echo '    <input type="number" id="name" name="account" value="' . $row["account"] . '">';
        echo "  </div>";
        echo "</div>";

        echo "<div class=\"div-button\">";
        echo "<button class=\"login-button\" type=\"submit\">Update</button>";
        echo "</div>";
    } else {

        echo "Error executing query: " . mysqli_error($conn);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $account = $_POST['account'];


    $passengerId = $_COOKIE["id"];


    $query = "UPDATE passenger SET name = '$name', email = '$email', tel = '$tel', account = '$account' WHERE passengerId = '$passengerId'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<p style='color: white; font-size: 24px;'>Data updated successfully</p>";
    } else {

        echo "Error updating data: " . mysqli_error($conn);
    }
}
