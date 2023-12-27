<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $flight_id = $_POST["flightId"];
    echo '<html>';
    echo '<head>';
    echo '    <meta charset="UTF-8">';
    echo '    <meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '    <link rel="stylesheet" href="messages.css">';
    echo '    <title>Add Flight</title>';
    echo '</head>';
    echo '<body>';
    echo '    <form action="send.message.logic.php" method="post">';
    echo '        <!-- Include the hidden input for flightId -->';
    echo '        <input type="hidden" name="flightId" value="' . $flight_id . '">';
    echo '        <input type="text" name="messageContent"> <!-- Input for the message content -->';
    echo '        <div class="div-button">';
    echo '            <button class="login-button" type="submit">Send Message</button>';
    echo '        </div>';
    echo '    </form>';
    echo '</body>';
    echo '</html>';
}

?>