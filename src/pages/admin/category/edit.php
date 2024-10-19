<?php
$pageTitle = "Product Create";
ob_start(); // Start output buffering
$content = ob_get_clean(); // Get the buffered content
include('../index.php');
?>

<div class="container">
    <div class="title">Create Products</div>
    <div class="content">
      <form method="post" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Item Name</span>
            <input type="text" placeholder="Enter your item name" required>
          </div>
          <div class="input-box">
            <span class="details">Description</span>
            <input type="text" placeholder="Enter your Description" required>
          </div>
          <div class="input-box">
            <span class="details">Price</span>
            <input type="text" placeholder="Enter your Price" required>
          </div>
          <div class="input-box">
            <span class="details">Image</span>
            <input type="file" placeholder="Enter your Image"  accept="image/*"required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Quantity</span>
            <input type="text" placeholder="Confirm your password" required>
          </div>
          <div class="input-box">
            <span class="details">Category</span>
            <select id="category_id" name="category_id" class="select-box" required>
            <?php
            // Fetch categories
            $result = $conn->query("SELECT id, name FROM categories");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
            }
            ?>
              </select>
          </div>
          <div class="check-box">
          <input type="checkbox" value="1" name="is_sold" id="is_sold">
         
            <span class="gender-title">Is Sold</span>
           
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