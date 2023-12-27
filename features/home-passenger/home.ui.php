<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Passenger Home</title>
</head>

<body>
    <?php
    include "home.header.back.php";
    ?>

    <div class="buttons-div">
        <form action="../search-flight/search.ui.php">
            <button type="submit" class="home-button">Search</button>
        </form>
        <form action="../profile-passenger/profile.ui.php">
            <button class="home-button">Profile</button>
        </form>
    </div>

    <?php
    include "complet.flights.php";
    ?>
    
</body>
</html>