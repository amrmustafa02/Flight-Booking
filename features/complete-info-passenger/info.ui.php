<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="info.css">
    <title>Passenger Info</title>

</head>

<body>

<div class="info-container">
    <h2 style="color: white; font-size: 30px;">Complete Info</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <label for="photo">Photo</label>
        <input style="background-color: transparent; border-color: transparent" type="file" accept="image/*"
               name="photo">

        <label for="passport">Passport Image</label>
        <input style="background-color: transparent; border-color: transparent" type="file" accept="image/*"
               name="passport">


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