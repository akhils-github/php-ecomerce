<?php
$pageTitle = "Product Create";
ob_start(); // Start output buffering
$content = ob_get_clean(); // Get the buffered content
include('../../common/sidebar.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];

   // Handle image upload
   $uploadDir = '../../uploads/category/';
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

    $mainImageName = generateUniqueFilename($_FILES['image']['name']);
    $mainImagePath = $uploadDir . $mainImageName;
    if (move_uploaded_file($_FILES['image']['tmp_name'], $mainImagePath)) {
        echo "Main image uploaded successfully.<br>";
    } else {
        echo "Error uploading main image.<br>";
    }
    
  $sql = "INSERT INTO categories (name , description ,image) VALUES ('$name', '$description','$mainImagePath')";

  if ($conn->query($sql) === TRUE) {
    echo "New category created successfully";
    }else{
    echo "Error: " ;
    }
} 
$projectName = basename(dirname(__DIR__, 2)); // Adjusting to go two levels up from the current file's directory
$cancelUrl = "/$projectName/admin/category";
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
          <div class="input-box full">
            <span class="details">Image</span>
            <input type="file" class="full" name="image" id="image" placeholder="Enter your Image"  accept="image/*"required>
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