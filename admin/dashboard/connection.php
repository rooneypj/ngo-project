<?php
global $conn;
$servername =     "localhost";
$username =    "solution_tiffin";
$password =   "solution_tiffin";
$dbname =      "solution_tiffin";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>