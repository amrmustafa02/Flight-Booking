<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Company Home</title>
</head>

<body>
<div class="company-info">
    <?php
    include "home.header.back.php";
    ?>
</div>
<div class="buttons-div">

    <form action="../add-flight/add.flight.ui.php">
        <button type="submit" class="home-button">Add Flight</button>
    </form>
    <form action="../add-flight/add.flight.ui.php">
        <button class="home-button">Messages</button>
    </form>
    <form action="../profile-company/profile.ui.php">
        <button class="home-button">Profile</button>
    </form>
</div>
<!--<img src="C:\xampp\htdocs\img\658a232626210.png" alt="">-->
<?php
include "home.back.php";
//?>


</body>

</html>