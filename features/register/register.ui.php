<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">

</head>

<body>

    <div class="login-container">
        <h2 style="color: white; font-size: 30px;">Register</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

       
            
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="name">tel:</label>
            <input type="text" id="name" name="name" required>
            
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <div class="div-button">
                <button class="login-button" type="submit">Register</button>
            </div>

            <a class="register-button" href="../../features/login/login.ui.php">Already have an account ? Login</a>

        </form>
        <?php
        // Include the PHP file
        include('register.back.php');
        ?>

    </div>
    <!-- Your content goes here -->
</body>

</html>