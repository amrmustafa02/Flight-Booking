<?php
include "../../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reservationId = $_POST['reservationId'];

    // Retrieve fees, passenger ID, and flight ID from the reservation
    $reservationQuery = "SELECT r.flightId, p.passengerId
                         FROM reservation r
                         INNER JOIN passenger p ON r.passId = p.passengerId
                         WHERE r.reservationId = '$reservationId'";


    $reservationResult = mysqli_query($conn, $reservationQuery);

    if ($reservationResult) {
        $reservationData = mysqli_fetch_assoc($reservationResult);
        $flightId = $reservationData['flightId'];
        $passengerId = $reservationData['passengerId'];

        // Retrieve the fees from the flight
        $feesQuery = "SELECT fees FROM flight WHERE flightId = '$flightId'";
        $feesResult = mysqli_query($conn, $feesQuery);

        if ($feesResult) {
            $feesData = mysqli_fetch_assoc($feesResult);
            $fees = $feesData['fees'];

            // Retrieve the passenger's account balance
            $accountQuery = "SELECT account FROM passenger WHERE passengerId = '$passengerId'";
            $accountResult = mysqli_query($conn, $accountQuery);

            if ($accountResult) {
                $accountData = mysqli_fetch_assoc($accountResult);
                $currentBalance = $accountData['account'];

                // Check if the balance is sufficient
                if ($currentBalance >= $fees) {
                    // Deduct fees from the account balance
                    $newBalance = $currentBalance - $fees;

                    // Update the passenger's account balance
                    $updateAccountQuery = "UPDATE passenger SET account = '$newBalance' WHERE passengerId = '$passengerId'";
                    $updateAccountResult = mysqli_query($conn, $updateAccountQuery);

                    if ($updateAccountResult) {
                        // Update reservation status
                        $updateStatusQuery = "UPDATE reservation SET status = 'Completed' WHERE reservationId = '$reservationId'";
                        $updateStatusResult = mysqli_query($conn, $updateStatusQuery);

                        if ($updateStatusResult) {
                            echo "<h1 style='color:white;'>Payment completed successfully.</h1>";
                        } else {
                            echo "Error updating reservation status: " . mysqli_error($conn);
                        }
                    } else {
                        echo "Error updating account balance: " . mysqli_error($conn);
                    }
                } else {
                    echo "<h1 style='color:red;'>Insufficient account balance.</h1>";
                }
            } else {
                echo "Error retrieving account balance: " . mysqli_error($conn);
            }
        } else {
            echo "Error retrieving fees data: " . mysqli_error($conn);
        }
    } else {
        echo "Error retrieving reservation data: " . mysqli_error($conn);
    }
}

?>