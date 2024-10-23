<?php
include('../config/connect.php');
if (isset($_POST['insert_product'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    // $product_keywords=$_POST['product_keywords'];
    $category = $_POST['category'];
    // $product_brand=$_POST['product_brand'];
    $price = $_POST['price'];
    $status = 'true';
    //access images
    $image_one = $_FILES['image_one']['name'];
    $image_two = $_FILES['image_two']['name'];
    $image_three = $_FILES['image_three']['name'];
    //access images tmp name
    $temp_image_one = $_FILES['image_one']['tmp_name'];
    $temp_image_two = $_FILES['image_two']['tmp_name'];
    $temp_image_three = $_FILES['image_three']['tmp_name'];
    //checking empty condition
    if ($name == '' || $description == '' || $category == '' ||  empty($price) || empty($image_one)) {
        echo "<script>alert(\"Fields should not be empty\");</script>";
        exit();
    } else {
        //move folders
        move_uploaded_file($temp_image_one, "../uploads/images/products/$image_one");
        move_uploaded_file($temp_image_two, "../uploads/images/products/$image_two");
        move_uploaded_file($temp_image_three, "../uploads/images/products/$image_three");
        //insert query in db
        $insert_query = "INSERT INTO `products` (name,description,category_id,image_one,image_two,image_three,price,date,status) VALUES ('$name','$description','$category','$image_one','$image_two','$image_three','$price',NOW(),'$status')";
        $insert_result = mysqli_query($con, $insert_query);
        if ($insert_result) {
            echo "<script>alert(\"Product Inserted Successfully\");</script>";
        }
    }
}
?>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products - Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />
</head> 

<body>
    -->
<div class="categ-header">
    <div class="sub-title">
        <span class="shape"></span>
        <h2>Insert Prodcuts</h2>
    </div>
</div>
<form action="" method="post" enctype="multipart/form-data">
    <div class="row justify-content-center">
        <div class="row">
            <!-- title -->
            <div class="form-outline mb-4 col-md-5">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" placeholder="Enter Product Name" name="name" id="name" class="form-control" autocomplete="off" required>
            </div>
            <!-- description -->
            <div class="form-outline mb-4  col-md-5">
                <label for="description" class="form-label">Product Description</label>
                <input type="text" placeholder="Enter Product Description" name="description" id="description" class="form-control" autocomplete="off" required>
            </div>
          
            <!-- categories -->
            <div class="form-outline mb-4 col-md-5">
                <label for="product_keywords" class="form-label">Product Category</label>

                <select class="form-select" name="category" id="category">
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
         
            <!-- Image one -->
            <div class="form-outline mb-4 col-md-5">
                <label for="image_one" class="form-label">Product Image One</label>
                <input type="file" name="image_one" id="image_one" class="form-control" required>
            </div>
            <!-- Image two -->
            <div class="form-outline mb-4 col-md-5">
                <label for="image_two" class="form-label">Product Image Two</label>
                <input type="file" name="image_two" id="image_two" class="form-control" >
            </div>
            <!-- Image three -->
            <div class="form-outline mb-4 col-md-5">
                <label for="image_three" class="form-label">Product Image Three</label>
                <input type="file" name="image_three" id="image_three" class="form-control" >
            </div>
            <!-- Price -->
            <div class="form-outline mb-4 col-md-5">
                <label for="price" class="form-label">Product Price</label>
                <input type="number" placeholder="Enter Product Price" name="price" id="price" class="form-control" autocomplete="off" required>
            </div>
            <!--  -->
            <div class="form-outline mb-4 col-md-10">
                <input type="submit" value="Insert Product" name="insert_product" class="btn btn-primary">
            </div>
        </div>
    </div>
</form>
<!-- </body>

</html> -->