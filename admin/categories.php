<?php
$pageTitle = "Admin Login";
ob_start(); // Start output buffering
$content = ob_get_clean(); // Get the buffered content
include('../index.php');
session_start();
include('../config/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
$description = $_POST['description'];
  $sql = "INSERT INTO categories (name , description ) VALUES ('$name', '$description')";
if ($conn->query($sql) === TRUE) {
    echo "New category created successfully";
    }else{
    echo "Error: " ;
    }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
</head>
<body>
    <h1>Add New Category</h1>
    <form  method="post">
        <label for="name">Category Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>

        <input type="submit" value="Add Category">
    </form>
</body>
</html>