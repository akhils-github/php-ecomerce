
<?php
$servername = "localhost";  // or your database server name
$username = "root";         // your database username
$password = "";             // your database password
$dbname = "canteen";    // the name of the database you want to connect to

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

// Close connection
// $conn->close();
?>

