<?php

$servername = "localhost";
$username1 = "root";
$database = "users";

$conn = new mysqli($servername, $username1, "", $database);

// Check connection - returns the error code from the last connection error, if any
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}

session_start();
?>



