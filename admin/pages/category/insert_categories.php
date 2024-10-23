<?php
include('../config/connect.php');
if (isset($_POST['insert_category'])) {
    $category_title = $_POST['name'];
    $description = $_POST['description'];
    $image_one = $_FILES['image_one']['name'];
    $temp_image_one = $_FILES['image_one']['tmp_name'];

    // $select_query = "SELECT * FROM `categories` WHERE category_title = '$category_title'";
    // $select_result = mysqli_query($con, $select_query);
    // $numOfResults = mysqli_num_rows($select_result);

    if ($category_title == '' || $description == '' || empty($image_one)) {
        echo "<script>alert(\"Fields should not be empty\");</script>";
        exit();
    } else {
        move_uploaded_file($temp_image_one, "../uploads/images/category/$image_one");

        $insert_query = "INSERT INTO `categories` (name,description,image) VALUES ('$category_title','$description','$image_one')";
        $insert_result = mysqli_query($con, $insert_query);
        if ($insert_result) {
            echo "<script>alert('Category has been inserted successfully');</script>";
        }
    }
}
?>

<div class="categ-header">
    <div class="sub-title">
        <span class="shape"></span>
        <h2>Insert Categories</h2>
    </div>
</div>
<form class="row " action="" method="post" enctype="multipart/form-data">
    <!-- title -->
    <div class="form-outline mb-4 col-md-5">
        <label for="name" class="form-label">Name</label>
        <input type="text" placeholder="Enter  Name" name="name" id="name" class="form-control" autocomplete="off" required>
    </div>
    <!-- description -->
    <div class="form-outline mb-4  col-md-5">
        <label for="description" class="form-label">Description</label>
        <input type="text" placeholder="Enter Description" name="description" id="description" class="form-control" autocomplete="off" required>
    </div>
    <!-- Image one -->
    <div class="form-outline mb-4 col-md-5">
        <label for="image_one" class="form-label">Image</label>
        <input type="file" name="image_one" id="image_one" class="form-control" required>
    </div>

    <div class="input-group w-10 mb-3">
        <input type="submit" class="btn btn-primary" name="insert_category" value="Insert Categories" aria-label="Username" aria-describedby="basic-addon1">
    </div>
</form>