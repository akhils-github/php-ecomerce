<?php
$pageTitle = "User Edit";
ob_start(); // Start output buffering
$content = ob_get_clean(); // Get the buffered content
include('../index.php');
$projectName = basename(dirname(__DIR__, 1)); // Adjusting to go two levels up from the current file's directory
$cancelUrl = "/$projectName";

?>

<div class="container">
    <div class="title">Edit User</div>
    <div class="content">
      <form method="post" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Item Name</span>
            <input type="text" placeholder="Enter your item name" required>
          </div>
    
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" placeholder="Enter your password" required>
          </div>
      
    
        </div>
      
        <div class="btn-group">
      <div class="button">
          <a href="./" > Cancel </a>
        </div>
        <div class="button">
          <input type="submit" value="Update">
        </div>
      </div>
      </form>
    </div>
  </div>