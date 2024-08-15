<?php
$pageTitle = "User Edit";
ob_start(); // Start output buffering
$content = ob_get_clean(); // Get the buffered content
include('../../common/sidebar.php');
$projectName = basename(dirname(__DIR__, 2)); // Adjusting to go two levels up from the current file's directory
$cancelUrl = "/$projectName/admin/user";

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
          <a href="<?php echo $cancelUrl; ?>" > Cancel </a>
        </div>
        <div class="button">
          <input type="submit" value="Create">
        </div>
      </div>
      </form>
    </div>
  </div>