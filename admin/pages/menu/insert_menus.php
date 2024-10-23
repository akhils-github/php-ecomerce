<?php
include('../config/connect.php');
if (isset($_POST['insert_menus'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['product_category'];
    $price = $_POST['price'];
    $image_one = $_FILES['product_image_one']['name'];

    $temp_image_one=$_FILES['product_image_one']['tmp_name'];

    if (empty($image_one)) {
        echo "<script>alert(\"Fields should not be empty\");</script>";
        exit();
    } else {
        move_uploaded_file($temp_image_one, "../uploads/images/menus/$image_one");
        //insert query in db
        $insert_query = "INSERT INTO `menus` (name,description,category_id,price,image) VALUES ('$title','$description','$category','$price','$image_one')";
        $insert_result = mysqli_query($con, $insert_query);
        if ($insert_result) {
            echo "<script>alert(\"Product Inserted Successfully\");</script>";
        }
    }
    // $numOfResults = mysqli_num_rows($select_result);
    // if ($numOfResults > 0) {
    //     echo "<script>alert('This Menu is already in DataBase');</script>";
    // } else {
    //     $insert_query = "INSERT INTO `menus` (name,description,category_id,price,image) VALUES ('$title','$description','$category','$price','$image_one')";
    //     $insert_result = mysqli_query($con, $insert_query);
    //     if ($insert_result) {
    //         echo "<script>alert('Menu has been inserted successfully');</script>";
    //     }
    // }
}
?>
<div class="categ-header">
    <div class="sub-title">
        <span class="shape"></span>
        <h2>Insert Menus</h2>
    </div>
</div>
<form action="" method="POST" class="mb-2" enctype="multipart/form-data">
    <div class="row ">
        <div class="form-outline mb-4 col-md-5">
            <label for="title" class="form-label"> Title</label>
            <input type="text" placeholder="Enter  Title" name="title" id="title" class="form-control" autocomplete="off" required>
        </div>
        <div class="form-outline mb-4 col-md-5">
            <label for="description" class="form-label">Description</label>
            <input type="text" placeholder="Enter Description" name="description" id="description" class="form-control" autocomplete="off" required>
        </div>
        <div class="form-outline mb-4 col-md-5">
            <label for="price" class="form-label">Price</label>
            <input type="text" placeholder="Enter Price" name="price" id="price" class="form-control" autocomplete="off" required>
        </div>
        <div class="form-outline mb-4 col-md-5">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="product_category" id="product_category">
                <option selected disabled>Select a Cateogry</option>
                <?php
                $select_query = 'SELECT * FROM `categories`';
                $select_result = mysqli_query($con, $select_query);
                while ($row = mysqli_fetch_assoc($select_result)) {
                    $category_title = $row['name'];
                    $category_id = $row['id'];
                    echo "
                                        <option value='$category_id'>$category_title</option>
                                        ";
                }
                ?>
            </select>
        </div>
        <div class="form-outline mb-4 col-md-5">
            <label for="product_title" class="form-label">Image</label>
            <input type="file" name="product_image_one" id="product_image_one" class="form-control" required>
        </div>
    </div>
    <div class="input-group w-10 mb-3">
        <input type="submit" class="btn btn-primary" name="insert_menus" value="Insert Menu" aria-label="menus" aria-describedby="basic-addon1">
    </div>
</form>