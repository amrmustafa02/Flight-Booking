<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">

</head>

<body>

    <div class="login-container">
        <h2 style="color: white; font-size: 30px;">Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <div class="div-button">
                <button class="login-button" type="submit">Login</button>

            </div>

            <a class = "register-button"href="../../features/register/register.ui.php">Don't have an account ? Register</a>

        </form>
        <?php
        // Include the PHP file
        include('login.back.php');
        ?>

    </div>
    <!-- Your content goes here -->
</body>

</html>