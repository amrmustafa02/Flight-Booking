<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Your validation logic (e.g., check against a database)
    // For demonstration purposes, a simple check is performed here.
    $validUser = ($email == "user@example.com" && $password == "password");

    if ($validUser) {
        // Redirect to a success page or perform other actions
        header("Location: success.php");
        exit();
    } else {
        // Display an error message or redirect to a login error page
        echo "Invalid email or password.";
    }
}
?>
