<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(" Error: " . $conn->connect_error);
}
?>
