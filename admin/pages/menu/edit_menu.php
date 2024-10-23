<?php
// fetch all data
if (isset($_GET['edit_menus'])) {
    $edit_id = $_GET['edit_menus'];
    $get_data_query = "SELECT * FROM `menus` WHERE id = $edit_id";
    $get_data_result = mysqli_query($con, $get_data_query);
    $row_fetch_data = mysqli_fetch_array($get_data_result);

    $menu_id = $row_fetch_data['id'];
    $menu_name = $row_fetch_data['name'];
    $description = $row_fetch_data['description'];
    $category_id = $row_fetch_data['category_id'];
    $price = $row_fetch_data['price'];
    $image = $row_fetch_data['image'];


}

// edit menu
if (isset($_POST['update_menu'])) {
    $menu_name = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['product_category'];
    $price = $_POST['price'];
    // $image_one = $_FILES['product_image_one']['name'];

    $image_one = $_FILES['product_image_one']['name'] == '' ? $image : $_FILES['product_image_one']['name'];
    $product_image_one_tmp = $_FILES['product_image_one']['tmp_name'];
    // check empty fields 
    if (empty($menu_name) || empty($image_one)) {
        echo "<script>window.alert('Please fill the field');</script>";
    } else {
        move_uploaded_file($product_image_one_tmp, "../uploads/images/menus/$image_one");

        // update query 
        $update_menu_query = "UPDATE `menus` SET name='$menu_name',description='$description',category_id='$category',price='$price',image='$image_one' WHERE id = $edit_id";
        $update_menu_result = mysqli_query($con, $update_menu_query);
        if ($update_menu_result) {
            echo "<script>window.alert('Menu updated successfully');</script>";
            echo "<script>window.open('./index.php?view_menus','_self');</script>";
        }
    }
}
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="text-center mb-4">Edit menu</h1>
            <form action="" method="POST" class="mb-2" enctype="multipart/form-data">
                <div class="row ">
                    <div class="form-outline mb-4 col-md-5">
                        <label for="title" class="form-label"> Title</label>
                        <input value="<?php echo $menu_name; ?>" type="text" placeholder="Enter  Title" name="title" id="title" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-outline mb-4 col-md-5">
                        <label for="description" class="form-label">Description</label>
                        <input value="<?php echo $description; ?>" type="text" placeholder="Enter Description" name="description" id="description" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-outline mb-4 col-md-5">
                        <label for="price" class="form-label">Price</label>
                        <input value="<?php echo $price; ?>" type="text" placeholder="Enter Price" name="price" id="price" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-outline mb-4 col-md-5">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" name="product_category" id="product_category">
                            <option selected disabled>Select a Cateogry</option>
                            <?php
                            $select_query = 'SELECT * FROM `categories`';
                            $select_result = mysqli_query($con, $select_query);
                            while ($row = mysqli_fetch_array($select_result)) {
                                $category_title = $row['name'];
                                $category_id_old = $row['id'];
                                echo $category_id_old == $category_id
                                    ? "<option value='$category_id' selected>$category_title</option>"
                                    : "<option value='$category_id'>$category_title </option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-outline col-md-5">
                        <label for="product_image_one" class="form-label">Image</label>
                        <div class="d-flex gap-3 w-100">
                            <input type="file" name="product_image_one" id="product_image_one" class="form-control" value="<?php echo $image; ?>">
                            <img src="../uploads/images/menus/<?php echo $image; ?>" alt="<?php echo $menu_name; ?>" class="img-thumbnail" width="100px">
                        </div>
                    </div>
                </div>
                <div class="form-outline text-center">
                    <input type="submit" value="Update Menu" class="btn btn-primary" name="update_menu">
                </div>

            </form>

        </div>
    </div>
</div>