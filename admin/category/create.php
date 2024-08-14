<?php
$pageTitle = "Product Create";
ob_start(); // Start output buffering
$content = ob_get_clean(); // Get the buffered content
include('../../common/sidebar.php');
session_start();
include('../../config/db.php');

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

<div class="container">
    <div class="title">Add New Category</div>
    <div class="content">
      <form method="post" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box full">
            <span class="details">Category Name</span>
            <input type="text" name="name" placeholder="Enter your item name" required>
          </div>
          <div class="input-box full">
            <span class="details">Description</span>
            <input type="text" name="description" placeholder="Enter your Description" required>
          </div>
  
        
        </div>
       
        <div class="button">
          <input type="submit" value="Create">
        </div>
      </form>
    </div>
  </div>