<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="info.css">
    <title>Company Info</title>
</head>

<body>
    <div class="info-container">
        <h2 style="color: white; font-size: 30px;">Complete Info</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <label for="username">User Name</label>
            <input type="text" id="username" name="username">

            <label for="bio">Bio</label>
            <input type="text" id="bio" name="bio" required>

            <label for="address">Address</label>
            <input type="text" id="address" name="address" required>

            <label for="location">Location</label>
            <input type="text" id="location" name="location">

            <label for="logo">Logo</label>
            <input style="background-color: transparent; border-color: transparent" type="file" accept="image/*"
                name="logoimg">

            <div class="div-button">
                <button class="login-button" type="submit">Submit</button>
            </div>
        </form>

        <?php
        include('info.back.php');
        ?>
    </div>
</body>

</html>