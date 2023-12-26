<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Company Home</title>
</head>

<body>
<div class="buttons-div">
    <div class="company-info">
        <span class="company-name">Your Company Name</span>
    </div>
    <form action="../add-flight/add.flight.ui.php">
        <button type="submit" class="home-button">Add Flight</button>
    </form>
    <button class="home-button">Messages</button>
    <button class="home-button">Profile</button>
</div>
<!--<img src="C:\xampp\htdocs\img\658a232626210.png" alt="">-->
<?php
include "home.back.php";
?>


</body>

</html>