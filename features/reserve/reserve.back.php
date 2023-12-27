<?php
$err = "";
include "../../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $flightId = $_POST['flightId'];
    $passId = $_COOKIE['id'];
    $status = "Pending";

    $checkQuery = "SELECT * FROM reservation WHERE flightId = '$flightId' AND passId = '$passId'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if ($checkResult && mysqli_num_rows($checkResult) > 0) {
        echo "<h1 style='color:white'>You have already reserved this flight.</h1>";
    } else {
        $insertQuery = "INSERT INTO reservation (flightId, passId, status) VALUES ('$flightId', '$passId', '$status')";
        $insertResult = mysqli_query($conn, $insertQuery);

        if ($insertResult) {

            $query = "SELECT reservationId FROM reservation WHERE flightId = '$flightId' AND passId = '$passId'";
            $result = mysqli_query($conn, $query);

            $reserveId = 0;
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $reserveId =  $row['reservationId'];
            }


            echo "<h1 style='color:white'>Flight reservation added successfully.</h1>";
            echo '<form action="reser.completed.php" method="post">';
            echo '    <input type="hidden" name="reservationId" value="' . $reserveId . '">';
            echo '    <h1 style="color: white;">Pay By</h1>';
            echo '    <div class="payment-buttons">';
            echo '        <button type="submit" id="cashButton">Pay with Cash</button>';
            echo '        <button type="submit" id="visaButton">Pay with Visa</button>';
            echo '    </div>';
            echo '</form>';
        } else {

            echo "Error adding flight reservation: " . mysqli_error($conn);
        }
    }
}
