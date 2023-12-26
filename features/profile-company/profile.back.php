<?php

include "../../connection.php";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_COOKIE['id'];
    $sql = "select * from company where companyId = $id ";  // $id
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the rows and display the information
        while ($row = mysqli_fetch_assoc($result)) {


            // name and user name
            echo "<div class=\"input-group\">";
            echo "  <div class=\"input-pair\">";
            echo "    <label for=\"name\">Name</label>";
            echo '    <input type="text" id="name" name="name" value="' . $row["name"] . '">';
            echo "  </div>";
            echo "  <div class=\"input-pair\">";
            echo "    <label for=\"name\">User Name</label>";
            echo '    <input type="text" id="name" name="username" value="' . $row["username"] . '">';
            echo "  </div>";
            echo "</div>";

            // bio
            echo "<div class=\"input-group\">";
            echo "  <div class=\"input-pair\">";
            echo "    <label for=\"name\">BIO</label>";
            echo '  <input type="text" id="name" name="username" value="' . $row["bio"] . '">';
            echo "</div>";
            echo "</div>";

            // address and location
            echo "<div class=\"input-group\">";
            echo "  <div class=\"input-pair\">";
            echo "    <label for=\"name\">Address</label>";
            echo '    <input type="text" id="name" name="address" value="' . $row["address"] . '">';
            echo "  </div>";
            echo "  <div class=\"input-pair\">";
            echo "    <label for=\"name\">Location</label>";
            echo '    <input type="text" id="name" name="location" value="' . $row["location"] . '">';
            echo "  </div>";
            echo "</div>";


            // account balance
            echo "<div class=\"input-group\">";
            echo "  <div class=\"input-pair\">";
            echo "    <label for=\"name\">Account Balance</label>";
            echo '  <input type="text" id="name" name="account" value="' . $row["account"] . '">';
            echo "</div>";
            echo "</div>";


            // email and tel
            echo "<div class=\"input-group\">";
            echo "  <div class=\"input-pair\">";
            echo "    <label for=\"name\">Email</label>";
            echo '    <input type="text" id="name" name="email" value="' . $row["email"] . '">';
            echo "  </div>";
            echo "  <div class=\"input-pair\">";
            echo "    <label for=\"name\">Tel</label>";
            echo '    <input type="text" id="name" name="tel" value="' . $row["tel"] . '">';
            echo "  </div>";
            echo "</div>";

            echo "<div class=\"div-button\">";
            echo "<button class=\"login-button\" type=\"submit\">Update</button>";
            echo "</div>";

        }
    } else {
        echo "No results found.";
        $err = "";
    }

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission (update data in the database)
    $companyId = $_COOKIE['id'];
    $newName = $_POST['name'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $account = $_POST['account'];
    $location = $_POST['location'];
    $address = $_POST['address'];
    $username = $_POST['username'];

    // Check if the email already exists
    $checkEmailQuery = "SELECT companyId FROM company WHERE email='$email' AND companyId != $companyId";
    $emailCheckResult = mysqli_query($conn, $checkEmailQuery);

    if ($emailCheckResult && mysqli_num_rows($emailCheckResult) > 0) {
        // Email already exists for another company
        echo "<p style='color: red; font-size: 18px;'>Email already exists. Please choose a different email.</p>";
    } else {
        // Perform the update query using the collected data
        $updateQuery = "UPDATE company SET 
            name='$newName',
            tel='$tel',
            email='$email',
            account='$account',
            location='$location',
            address='$address',
            username='$username'
            WHERE companyId=$companyId";

        $updateResult = mysqli_query($conn, $updateQuery);

        if ($updateResult) {
            echo "<p style='color: green; font-size: 24px;'>Data updated successfully</p>";
        } else {
            echo "<p>Error updating data: " . mysqli_error($conn) . "</p>";
        }
    }
}




