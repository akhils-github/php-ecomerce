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
"INSERT INTO categories (name , description ) VALUES ('$name', '$description')";
if ($conn->query($sql) === TRUE) {
    echo "New category created successfully. <a href='add_category.php'>Add another category</a> or <a href='add_food_item.php'>Add a food item</a>";
    }else{
    echo "Error: " ;
    }
} {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND role='admin'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['admin'] = $user['username'];
            header("Location: manage_users.php");
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "Invalid username!";
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
    <form action="process_category.php" method="post">
        <label for="name">Category Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>

        <input type="submit" value="Add Category">
    </form>
</body>
</html>