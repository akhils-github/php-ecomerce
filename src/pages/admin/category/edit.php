<?php
$pageTitle = "Product Create";
ob_start(); // Start output buffering
$content = ob_get_clean(); // Get the buffered content
include('../index.php');
// Retrieve food item ID from URL
$error_message= " bsgsjskslslsl";
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Retrieve form data
// Fetch food item details
$result = $conn->query("SELECT * FROM categories WHERE id = $id");
$foodItem = $result->fetch_assoc();
if (!$foodItem) {
    echo "Food item not found.";
    exit;
}
// Fetch categories for the dropdown
$categoriesResult = $conn->query("SELECT * FROM categories");



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data safely
  $name = isset($_POST['name']) ? $_POST['name'] : '';
  $description = isset($_POST['description']) ? $_POST['description'] : '';

    // Handle image upload
$imagePath = '';
if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
    $targetDir = "uploads/";
    $imageName = basename($_FILES['image']['name']);
    $imagePath = $targetDir . $imageName;
    move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    
} else {
    // Keep existing image if no new image is uploaded
    $result = $conn->query("SELECT image FROM categories WHERE id = $id");
    $existingImage = $result->fetch_assoc();
    $imagePath = $existingImage['image'];
}

// Check if the 'is_special' checkbox was checked

// Update query
$sql = "UPDATE categories SET 
name = ?, 
description = ?, 
image = ? 
WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $name, $description, $imagePath, $id);
if ($stmt->execute()) {
  $error_message = "Category updated successfully. <a href='categories.php'>Back to Categories List</a>";
} else {
    $error_message =  "Error: " . $stmt->error;
}

}
?>

<div class="container">
    <div class="title">Create Products</div>
    <div class="content">
      <form method="post" enctype="multipart/form-data">
        <div class="user-details">

        <div class="input-box">
          <input type="hidden" name="id" value="<?php echo htmlspecialchars($foodItem['id']); ?>">
            <span class="details">category Name</span>
            <input type="text" placeholder="Enter your item name"  id="name" name="name" required value="<?php echo htmlspecialchars($foodItem['name']); ?>">
          </div>
          <div class="input-box">
            <span class="details">Description</span>
            <input type="text" placeholder="Enter your Description" id="description" name="description"  required value="<?php echo htmlspecialchars($foodItem['description']); ?>">
          </div>
       
          <div class="input-box">
            <span class="details">Image</span>
            <input type="file" placeholder="Enter your Image" id="image" name="image"  accept="image/*"required>
          </div>
        
          <div class="input-box">
            <span class="details">Image</span>
            <?php if ($foodItem['image']): ?>
            <img src="<?php echo htmlspecialchars($foodItem['image']); ?>" alt="Food Image" style="max-width: 100%; max-height: 70px;">
        <?php endif; ?>
            <!-- <input type="file" placeholder="Enter your Image"  id="image" name="image" accept="image/*"required value="<?php echo htmlspecialchars($foodItem['name']); ?>"> -->
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