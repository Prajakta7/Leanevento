<?php
$servername = "localhost";
$username = "prajakta_test";
$password = "Calendar123$";
$db = "prajakta_test";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>