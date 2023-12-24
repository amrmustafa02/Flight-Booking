<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $photo = isset($_FILES['$photo']) ? $_FILES['$photo']["name"] : "";
    $passport = isset($_FILES['passport']) ? $_FILES['passport']["name"] : "";



}
?>