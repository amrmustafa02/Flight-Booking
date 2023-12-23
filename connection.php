<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbName = 'flight';

// //$db =  mysqli_connect($host,$user,$pass,$dbName);
$conn = new mysqli($host,$user,$pass,$dbName) or die("unable to connect");

echo "gg";
echo "php is under control"

?>
