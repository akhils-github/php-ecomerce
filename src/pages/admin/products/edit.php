<?php
$pageTitle = "Product Edit";
ob_start(); // Start output buffering
$content = ob_get_clean(); // Get the buffered content
include('../index.php');

// Retrieve food item ID from URL
$error_message= " bsgsjskslslsl";
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
// Retrieve form data
// Fetch food item details
$result = $conn->query("SELECT * FROM items WHERE id = $id");
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
  $price = isset($_POST['price']) ? $_POST['price'] : '';
  $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : '';
  $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : '';
  $is_special = isset($_POST['is_special']) ? 1 : 0;

    // Handle image upload
$imagePath = '';
if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
    $targetDir = "uploads/";
    $imageName = basename($_FILES['image']['name']);
    $imagePath = $targetDir . $imageName;
    move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
} else {
    // Keep existing image if no new image is uploaded
    $result = $conn->query("SELECT images FROM items WHERE id = $id");
    $existingImage = $result->fetch_assoc();
    $imagePath = $existingImage['images'];
}

// Check if the 'is_special' checkbox was checked

// Update query
$sql = "UPDATE items SET 
            name = ?, 
            description = ?, 
            price = ?, 
            category_id = ?, 
            images = ?, 
            quantity = ?, 
            is_special = ? 
        WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdiiisi", $name, $description, $price, $category_id, $imagePath, $quantity, $is_special, $id);
if ($stmt->execute()) {
  $error_message = "Food item updated successfully. <a href='products.php'>Back to Food Items List</a>";
} else {
    $error_message =  "Error: " . $stmt->error;
}

}
?>

<div class="container">
    <div class="title">Edit Products</div>
    <div class="content">
      <form method="post" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
          <input type="hidden" name="id" value="<?php echo htmlspecialchars($foodItem['id']); ?>">
            <span class="details">Item Name</span>
            <input type="text" placeholder="Enter your item name"  id="name" name="name" required value="<?php echo htmlspecialchars($foodItem['name']); ?>">
          </div>
          <div class="input-box">
            <span class="details">Description</span>
            <input type="text" placeholder="Enter your Description" id="description" name="description"  required value="<?php echo htmlspecialchars($foodItem['description']); ?>">
          </div>
          <div class="input-box">
            <span class="details">Price</span>
            <input type="text" placeholder="Enter your Price" id="price" name="price"  required value="<?php echo htmlspecialchars($foodItem['price']); ?>">
          </div>

          <div class="input-box">
            <span class="details">Image</span>
            <?php if ($foodItem['images']): ?>
            <img src="<?php echo htmlspecialchars($foodItem['images']); ?>" alt="Food Image" style="max-width: 100%; max-height: 70px;">
        <?php endif; ?>
            <!-- <input type="file" placeholder="Enter your Image"  id="image" name="image" accept="image/*"required value="<?php echo htmlspecialchars($foodItem['name']); ?>"> -->
          </div>
       
          <div class="input-box">
            <span class="details">Quantity</span>
            <input type="text" placeholder="quantity" name="quantity"  id="quantity" required value="<?php echo htmlspecialchars($foodItem['quantity']); ?>">
          </div>
          <div class="input-box">
            <span class="details">Category</span>
            <select id="category_id" name="category_id" class="select-box" required value="<?php echo htmlspecialchars($foodItem['name']); ?>">
            <?php while ($category = $categoriesResult->fetch_assoc()): ?>
                <option value="<?php echo $category['id']; ?>" <?php if ($foodItem['category_id'] == $category['id']) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($category['name']); ?>
                </option>
            <?php endwhile; ?>
              </select>
          </div>
          <div class="check-box">
          <input type="checkbox" value="1" name="is_special" id="is_special" id="is_special" name="is_special" <?php if ($foodItem['is_special']) echo 'checked'; ?>>
         
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