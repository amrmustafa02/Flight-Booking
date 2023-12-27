<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="search.ui.css">
    <title> Search </title>
</head>

<body >

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="input-group">
            <div class="input-pair">
                <label style="color: white" for="fromCity">From City</label>
                <input type="text" id="fromCity" name="fromCity" required>
            </div>
            <div class="input-pair">
                <label style="color:white" for="toCity">To City</label>
                <input type="text" id="toCity" name="toCity" required>
            </div>
        </div>
        <div class="search-button" style="text-align: center">
            <button type="submit" class="login-button">Search</button>
        </div>
    </form>
<?php
include "search.back.php";
?>

</body>

</html>

