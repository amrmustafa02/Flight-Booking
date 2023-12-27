<?php
include "../../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'cancel') {

    $flightId = $_POST['flightId'];

    $reservationQuery = "SELECT passId FROM reservation WHERE flightId = $flightId";
    $reservationResult = mysqli_query($conn, $reservationQuery);

    if ($reservationResult) {
        while ($row = mysqli_fetch_assoc($reservationResult)) {
            $passengerId = $row['passId'];

            $feesQuery = "SELECT fees FROM flight WHERE flightId = $flightId";
            $feesResult = mysqli_query($conn, $feesQuery);

            if ($feesResult) {
                $feesRow = mysqli_fetch_assoc($feesResult);
                $fees = $feesRow['fees'];

                $refundQuery = "UPDATE passenger SET account = account + $fees WHERE passengerId = $passengerId";
                $refundResult = mysqli_query($conn, $refundQuery);

                if (!$refundResult) {
                    echo "<h1>Error refunding fees to passenger $passengerId: " . mysqli_error($conn) . "</h1>";
                    exit;
                }
            } else {
                echo "<h1>Error retrieving fees for flight $flightId: " . mysqli_error($conn) . "</h1>";
                exit;
            }
        }

        $updateReservationQuery = "UPDATE reservation SET status = 'Cancelled' WHERE flightId = $flightId";
        $updateReservationResult = mysqli_query($conn, $updateReservationQuery);

        if ($updateReservationResult) {

            $updateFlightQuery = "UPDATE flight SET cancelled = true WHERE flightId = $flightId";

            if (mysqli_query($conn, $updateFlightQuery)) {
                echo "<h1>Flight $flightId has been canceled. Passengers refunded.</h1>";
            } else {
                echo "<h1>Error updating flight status: " . mysqli_error($conn) . "</h1>";
            }
        } else {
            echo "<h1>Error updating reservation status: " . mysqli_error($conn) . "</h1>";
        }
    } else {
        echo "<h1>Error retrieving reservation data: " . mysqli_error($conn) . "</h1>";
    }
}
?>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Cnacel</title>

</head>

<style>
    body {
        text-align: center;
        margin: 0;
        position: relative;
        height: 100vh;
        overflow: hidden;
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("../../images/airplane.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        backdrop-filter: blur(5px);
        background-position: center;
    }

    h1 {
        color: white;
    }
</style>

<body>

</body>

</html>