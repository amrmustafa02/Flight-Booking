<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add.flight.css">
    <title>Add Flight</title>
</head>

<body>

<div class="login-container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <div class="input-group">
            <div class="input-pair">
                <label for="name"> Name</label>
                <input type="text" id="name" name="name" required>
            </div>

        </div>

        <div class="input-group">
            <div class="input-pair">
                <label for="fees">Fees</label>
                <input type="number" id="fees" name="fees" required>
            </div>

            <div class="input-pair">
                <label for="passengers">Number Of Passengers</label>
                <input type="number" id="passengers" name="numberOfPassengers" required>
            </div>
        </div>

        <div class="input-group">
            <div class="input-pair">
                <label for="fromCity">From City</label>
                <input type="text" id="fromCity" name="fromCity" required>
            </div>

            <div class="input-pair">
                <label for="toCity">To City</label>
                <input type="text" id="toCity" name="toCity" required>
            </div>
        </div>

        <div class="input-group">
            <div class="input-pair">
                <label for="startDate">Start Date</label>
                <input type="date" id="startDate" name="startDate" required>
            </div>

            <div class="input-pair">
                <label for="endDate">End Date</label>
                <input type="date" id="endDate" name="endDate" required>
            </div>
        </div>

        <div class="input-group">

            <div class="input-pair">

                <label for="startTime">Start Time</label>
                <input type="time" id="startTime" name="startTime" required>

            </div>


            <div class="input-pair">

                <label for="endTime">End Time</label>
                <input type="time" id="endTime" name="endTime" required>

            </div>

        </div>

        <div class="div-button">
            <button class="login-button" type="submit">Add Flight</button>
        </div>

    </form>

    <?php
    // Include the PHP file
    include('add.flight.back.php');
    ?>

</div>
</body>

</html>