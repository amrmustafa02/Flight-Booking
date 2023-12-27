<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            text-align: center;
            margin: 0;
            position: relative;
            height: 100vh;
            overflow: hidden;
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url("../../images/airplane.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            backdrop-filter: blur(5px);
            background-position: center;
        }

        .scrollable-content {
            max-height: 100vh; /* Set the maximum height */
            overflow-y: auto; /* Enable vertical scrolling if needed */
            padding: 20px; /* Add some padding for better styling */
        }

        h1 {
            color: white;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="scrollable-content">
        <?php
        include "../../connection.php";

        // Assuming you have the company ID
        $companyId = $_COOKIE['id'];

        // Select messages sent to a specific company and include passenger data
        $query = "SELECT m.content, m.messageBy, p.name AS passengerName, p.email AS passengerEmail
                FROM messages m
                JOIN passenger p ON m.messageBy = p.passengerId
                WHERE m.messageTo = $companyId";

        $result = mysqli_query($conn, $query);

        if ($result) {
            // Display the messages and passenger data in a loop
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<h1>Content: " . $row['content'] . "</h1>";
                echo "<h1>Passenger Name: " . $row['passengerName'] . "</h1>";
                echo "<h1>Passenger Email: " . $row['passengerEmail'] . "</h1>";
                echo "<hr>";
            }
        } else {
            echo "Error retrieving messages: " . mysqli_error($conn);
        }
        ?>
    </div>
</body>

</html>
