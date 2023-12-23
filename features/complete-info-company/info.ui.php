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

    <form classaction="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <label for="userName">User Name</label>
        <input type="text" id="userName" name="userName">

        <label for="bio">Bio</label>
        <input type="text" id="bio" name="bio" required>

        <label for="address">Address</label>
        <input type="text" id="address" name="address" required>

        <label for="location">Location</label>
        <input type="text" id="location" name="location">

        <label for="logo">Logo</label>
        <input style="background-color: transparent; border-color: transparent" type="file" accept="image/*"
               name="logo">


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