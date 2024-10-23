<?php
// fetch all data
if (isset($_GET['edit_category'])) {
    $edit_id = $_GET['edit_category'];
    $get_data_query = "SELECT * FROM `categories` WHERE id = $edit_id";
    $get_data_result = mysqli_query($con, $get_data_query);
    $row_fetch_data = mysqli_fetch_array($get_data_result);

    $category_id = $row_fetch_data['id'];
    $category_title = $row_fetch_data['name'];
    $description = $row_fetch_data['description'];
    $image = $row_fetch_data['image'];
}
// edit category
if (isset($_POST['update_category'])) {
    $category_title = $_POST['name'];
    $description = $_POST['description'];

    $image_one = $_FILES['image_one']['name'] == '' ? $image : $_FILES['image_one']['name'];
    $temp_image_one = $_FILES['image_one']['tmp_name'];
    // check empty fields 
    if ($category_title == '' || $description == '' || empty($image_one)) {
        echo "<script>alert(\"Fields should not be empty\");</script>";
        exit();
    } else {
        move_uploaded_file($temp_image_one, "../uploads/images/category/$image_one");

        $insert_query = "UPDATE `categories` SET name='$category_title',description='$description',image='$image_one' WHERE id = $edit_id";
        $insert_result = mysqli_query($con, $insert_query);
        if ($insert_result) {
            echo "<script>alert('Category has been inserted successfully');</script>";
            echo "<script>window.open('./index.php?view_categories','_self');</script>";
        }
    }
}
?>

<div class="categ-header">
    <div class="sub-title">
        <span class="shape"></span>
        <h2>Edit Categories</h2>
    </div>
</div>
<form class="row " action="" method="post" enctype="multipart/form-data">
    <!-- title -->
    <div class="form-outline mb-4 col-md-5">
        <label for="name" class="form-label">Name</label>
        <input value="<?php echo $category_title; ?>" type="text" placeholder="Enter  Name" name="name" id="name" class="form-control" autocomplete="off" required>
    </div>
    <!-- description -->
    <div class="form-outline mb-4  col-md-5">
        <label for="description" class="form-label">Description</label>
        <input value="<?php echo $description; ?>" type="text" placeholder="Enter Description" name="description" id="description" class="form-control" autocomplete="off" required>
    </div>
    <!-- Image one -->
    <div class="form-outline col-md-5">
        <label for="image_one" class="form-label">Image</label>
        <div class="d-flex gap-3 w-100">
            <input type="file" name="image_one" id="image_one" class="form-control" value="<?php echo $image; ?>">
            <img src="../uploads/images/category/<?php echo $image; ?>" alt="<?php echo $category_title; ?>" class="img-thumbnail" width="100px">
        </div>
    </div>

    <div class="input-group w-10 mt-3">
        <input type="submit" value="Update Category" class="btn btn-primary" name="update_category">
    </div>
</form>