<?php
$pageTitle = "Product Create";
ob_start(); // Start output buffering
$content = ob_get_clean(); // Get the buffered content
include('../../common/sidebar.php');
session_start();
include('../../config/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $category_id = $_POST['category_id'];
    $is_sold = isset($_POST['is_sold']) ? 1 : 0;

    // Handle image upload
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true); // Create directory if it doesn't exist
    }

     // Function to generate a unique filename
     function generateUniqueFilename($filename) {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $basename = pathinfo($filename, PATHINFO_FILENAME);
        $uniqueName = $basename . '_' . time() . '.' . $ext;
        return $uniqueName;
    }

     // Handle main image
     $mainImageName = generateUniqueFilename($_FILES['image']['name']);
     $mainImagePath = $uploadDir . $mainImageName;
     if (move_uploaded_file($_FILES['image']['tmp_name'], $mainImagePath)) {
         echo "Main image uploaded successfully.<br>";
     } else {
         echo "Error uploading main image.<br>";
     }
    


    // Handle additional images
    $morePics = [];
    if (!empty($_FILES['morepics']['name'][0])) {
        foreach ($_FILES['morepics']['name'] as $key => $filename) {
            $uniqueName = generateUniqueFilename($filename);
            $filePath = $uploadDir . $uniqueName;
            if (move_uploaded_file($_FILES['morepics']['tmp_name'][$key], $filePath)) {
                $morePics[] = $filePath;
            } else {
                echo "Error uploading additional image: $filename<br>";
            }
        }
    }
    $morePicsJson = json_encode($morePics);

    $sql = "INSERT INTO food_items(name, description, price, image, morepic, quantity, category_id, is_sold) 
            VALUES ('$name', '$description', '$price', '$mainImagePath', '$morePicsJson', '$quantity', '$category_id', '$is_sold')";

    if ($conn->query($sql) === TRUE) {
        echo "New food item created successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<div class="container">
    <div class="title">Create Products</div>
    <div class="content">
      <form method="post" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Food Name</span>
            <input type="text" id="name" name="name" placeholder="Enter your Food name" required>
          </div>
          <div class="input-box">
            <span class="details">Description</span>
            <input type="text" id="description" name="description"  placeholder="Enter your Description" required>
          </div>
          <div class="input-box">
            <span class="details">Price</span>
            <input type="text" id="price" name="price" placeholder="Enter your Price" required>
          </div>
          <div class="input-box">
            <span class="details">Image</span>
            <input type="file" class="full" name="image" id="image" placeholder="Enter your Image"  accept="image/*"required>
          </div>
          <!-- <div class="input-box">
            <span class="details">Password</span>
            <input type="text" placeholder="Enter your password" required>
          </div> -->
          <div class="input-box">
            <span class="details">Quantity</span>
            <input type="number" name="quantity" placeholder="Enter  quantity" required>
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
      
        <div class="button">
          <input type="submit" value="Create">
        </div>
      </form>
    </div>
  </div>