<?php
$host = "";
$username = "ksau23#!";
$password = "Haemo99#!";
$dbname = "e-shop";

// Create connection
$conn = new mysqli($username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>
