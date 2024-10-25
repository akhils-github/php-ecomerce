
    <!-- Start Table Section -->
    <div class="landing" style="margin-top: 5rem;">
        <div class="container">
            <div class="row py-5 m-0">
                <form  method="post">
                    <table class="table table-bordered table-hover table-striped table-group-divider text-center">

                        <!-- display data in cart  -->
                        <?php
                        
                        $total_price = 0;
                        $cart_query = "SELECT * FROM `carts` ";
                        $cart_result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($cart_result);
                        if ($result_count > 0) {
                            echo "
                                <thead>
                                    <tr class='d-flex flex-column d-md-table-row '>
                                        <th>Product Title</th>
                                        <th>Product Image</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th colspan='2'>Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                ";
                            while ($row = mysqli_fetch_array($cart_result)) {
                                $product_id = $row['product_id'];
                                $product_quantity = $row['quantity'];
                                $select_product_query = "SELECT * FROM `products` WHERE id=$product_id";
                                $select_product_result = mysqli_query($con, $select_product_query);
                                
                                while ($row_product_price = mysqli_fetch_array($select_product_result)) {
                                    $product_price = array($row_product_price['price']);
                                    $price_table = $row_product_price['price'];
                                    $product_id = $row_product_price['id'];
                                    $product_title = $row_product_price['name'];
                                    $product_image_one = $row_product_price['image_one'];
                                    $product_values = array_sum($product_price);
                                    $total_price += $product_values * $product_quantity;
                                 ?>
                                    <!-- display data in cart  -->
                                    <tr class="d-flex flex-column d-md-table-row ">
                                        <td>
                                            <?php echo $product_title; ?>
                                        </td>
                                        <td><img src="./uploads/images/products//<?php echo $product_image_one; ?>" class="img-thumbnail" alt="<?php echo $product_title; ?>"></td>
                                        <td>
                                            <input type="number" class="form-control w-50 mx-auto" min="1" name="qty_<?php echo $product_id; ?>" value="<?php echo $product_quantity; ?>">
                                        </td>
                                        <?php
                                        // $total_price += $product_values * $product_quantity;
                                        // echo "<h1>total_priceafter: $total_price</h1><br/>";
                                    
                                        if (isset($_POST['update_cart'])) {
                                            $itemsOfProduct = 'qty_' . $product_id;
                                            $quantities = $_POST[$itemsOfProduct];
                                            if (!empty($quantities)) {
                                                $update_cart_query = "UPDATE `carts` SET quantity = $quantities WHERE  product_id=$product_id;";
                                                // $update_cart_query = "UPDATE `carts` SET quantity = $quantities WHERE ip_address='$getIpAddress' AND product_id=$product_id;";
                                                $update_cart_result = mysqli_query($con, $update_cart_query);
                                            }
                                            if($update_cart_result){
                                                echo "<script>window.open('index.php?cart','_self');</script>";
                                            }

                                           
                                        }
                                        ?>
                                        <td>
                                            <?php echo $price_table; ?>
                                        </td>
                                        <td>
                                            <!-- <button class="btn btn-dark">Update</button> -->
                                            <input type="submit" value="Update" class="btn btn-dark" name="update_cart">
                                        </td>
                                        <td>
                                        <input type="hidden" name="remove_cart_id" value="<?php echo $product_id; ?>">
                                            <!-- <button class="btn btn-primary">Remove</button> -->
                                            <input type="submit" name="remove_cart" value="Remove" class="btn btn-primary">

                                        </td>
                                    </tr>
                        <?php   }
                            }
                        }else{
                            echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                        }
                        ?>
                        </tbody>
                    </table>
                          <!-- SubTotal -->
                          <div class="d-flex align-items-center gap-4 flex-wrap">
                        <?php
                        $getIpAddress = getIPAddress();
                        $cart_query = "SELECT * FROM `carts` ";
                        $cart_result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($cart_result);
                        if ($result_count > 0) {
                            echo "
                        <h4>Sub-Total: <strong class='text-2'> $total_price</strong></h4>
                        
                        <button class='btn btn-dark'><a class='text-light' href='./index.php'>Continue Shopping</a></button>
                        
                        <button class='btn btn-dark'><a class='text-light' href='./user/account/checkout.php'>Buy Now</a></button>
                        ";
                        }else{
                            echo "<input type='button' value='Continue Shopping' class='btn btn-dark' name='continue_shopping'>";
                        }
                        if(isset($_POST['continue_shopping'])){
                            // echo "<script>window.open('index.php','_self');</script>";
                            // unset($_POST['continue_shopping']);
                        }else if(isset($_POST['checkout'])){
                            // unset($_POST['checkout']);
                            // echo "<script>window.open('./users_area/checkout.php','_self');</script>";
                        }
                        ?>
                    </div>
                    <!-- SubTotal -->
                </form>
                <!-- function to remove items  -->
           
                <!-- function to remove items  -->
            </div>
        </div>
        <!-- put it here -->
    </div>

    <!-- End Table Section -->

    <?php
if (isset($_POST['remove_cart'])) {
    $remove_id = $_POST['remove_cart_id'];
    if (!empty($remove_id)) {
        $delete_query = "DELETE FROM `carts` WHERE product_id=$remove_id";
        $delete_run_result = mysqli_query($con, $delete_query);
        if ($delete_run_result) {
            echo "<script>window.open('index.php?cart','_self');</script>";
        }
    }
}
?>