<?php
$pageTitle = "Product Create";
ob_start(); // Start output buffering
$content = ob_get_clean(); // Get the buffered content
include('../../common/sidebar.php');
session_start();
include('../../config/db.php');

// Retrieve food item ID from URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
// Fetch food item details
$result = $conn->query("SELECT * FROM food_items WHERE id = $id");
$foodItem = $result->fetch_assoc();
if (!$foodItem) {
    echo "Food item not found.";
    exit;
}
// Fetch categories for the dropdown
$categoriesResult = $conn->query("SELECT * FROM categories");

// Retrieve form data
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$category_id = $_POST['category_id'];
// $morepic = $_POST['morepic'];
if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    // Handle image upload
$imagePath = '';
if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
    $targetDir = "uploads/";
    $imageName = basename($_FILES['image']['name']);
    $imagePath = $targetDir . $imageName;
    move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
} else {
    // Keep existing image if no new image is uploaded
    $result = $conn->query("SELECT image FROM food_items WHERE id = $id");
    $existingImage = $result->fetch_assoc();
    $imagePath = $existingImage['image'];
}

// Check if the 'is_sold' checkbox was checked
$is_sold = isset($_POST['is_sold']) ? 1 : 0;

// Update query
$sql = "UPDATE food_items SET 
            name = ?, 
            description = ?, 
            price = ?, 
            category_id = ?, 
            image = ?, 
            morepic = ?, 
            is_sold = ? 
        WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdisiii", $name, $description, $price, $category_id, $imagePath, $morepic, $is_sold, $id);

if ($stmt->execute()) {
    echo "Food item updated successfully. <a href='products.php'>Back to Food Items List</a>";
} else {
    echo "Error: " . $stmt->error;
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
            <?php if ($foodItem['image']): ?>
            <img src="<?php echo htmlspecialchars($foodItem['image']); ?>" alt="Food Image" style="max-width: 100%; max-height: 70px;">
        <?php endif; ?>
            <!-- <input type="file" placeholder="Enter your Image"  id="image" name="image" accept="image/*"required value="<?php echo htmlspecialchars($foodItem['name']); ?>"> -->
          </div>
       
          <div class="input-box">
            <span class="details">Quantity</span>
            <input type="text" placeholder="Confirm your password" required value="<?php echo htmlspecialchars($foodItem['name']); ?>">
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
          <input type="checkbox" value="1" name="is_sold" id="is_sold" id="is_sold" name="is_sold" <?php if ($foodItem['is_sold']) echo 'checked'; ?>>
         
            <span class="gender-title">Is Sold</span>
           
        </div>  
        </div>
      
        <div class="button">
          <input type="submit" value="Create">
        </div>
      </form>
    </div>
  </div>