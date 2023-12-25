<html lang="en">
<head>

    <title> Search Flight</title>
    <link rel="stylesheet" href="search.css">

</head>

<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="input-group">
        <div class="input-pair">
            <label style="color: black" for="fromCity">From City</label>
            <input type="text" id="fromCity" name="fromCity" required>
        </div>
        <div class="input-pair">
            <label for="toCity">To City</label>
            <input type="text" id="toCity" name="toCity" required>
        </div>
    </div>
    <div class="search-button" style="text-align: center">
        <button class="login-button">Search</button>
    </div>
</form>


<?php
 include "search.back.php";
?>


</body>

</html>