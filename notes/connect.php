<?php
$host = "your_host";
$username = "your_username";
$password = "your_password";
$dbname = "your_dbname";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>


You will need to replace your_host, your_username, your_password, and your_dbname with the appropriate values for your database.

It's a good practice to separate the database connection logic into a separate file, such as connect.php, so that it can be included in other files where a database connection is needed. This way you can use the $conn variable which is the connection object in other files that include the connect.php file.

Also, you can replace echo "Connected successfully"; with //echo "Connected successfully"; to avoid displaying "Connected successfully" message on the website when the script is executed.