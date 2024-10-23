<?php
// include connect file from DB
// include('./includes/connect.php');
// getting products
function getProduct($numToDisplay = '')
{
    global $con;
    if (!isset($_GET['category_id'])) {
        // condition to check isset or not 
        empty($numToDisplay) ? $select_product_query = "SELECT * FROM `products` ORDER BY rand()" : $select_product_query = "SELECT * FROM `products` ORDER BY rand() LIMIT 0,$numToDisplay";
        // $select_product_query = "SELECT * FROM `products` ORDER BY rand() LIMIT 0,10";
        $select_product_result = mysqli_query($con, $select_product_query);
        while ($row = mysqli_fetch_assoc($select_product_result)) {
            $product_id = $row['id'];
            $product_title = $row['name'];
            $product_image_one = $row['image_one'];
            $product_price = $row['price'];
            $category_id = $row['category_id'];
            echo '
                  <div data-wow-delay="0.1s" class=" wow fadeInUp col-sm-6 col-lg-4 all pizza">
                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <img src="./uploads/images/products/' . $product_image_one . '" alt="' . $product_title . '">
                                    </div>
                                    <div class="detail-box">
                                        <h5 class="text-white ">
                                            ' . $product_title . '
                                        </h5>
                                        <p>
                                            Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit, magnam
                                            voluptatem repellendus sed eaque
                                        </p>
                                        <div class="options">
                                            <h6 class="text-white ">
                                               ₹ ' . $product_price . '
                                            </h6>
                                             <div class="d-flex gap-5">
                                              <a href="index.php?view_product&&product_id=' . $product_id . '">
                                               <i class="fas fa-eye text-white"></i>
                                            </a>

                                            <a href="index.php?products&&num_of_items=1&&add_to_cart=' . $product_id . '">
                                               <i class="fas fa-cart-plus text-white"></i>
                                            </a>
                                             </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

      
        ';
        }
    }
}


// view details function 
function viewDetails()
{
    global $con;
    // condition to check isset or not 
    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
        $select_product_query = "SELECT * FROM `products` WHERE id=$product_id";
        $select_product_result = mysqli_query($con, $select_product_query);

        while ($row = mysqli_fetch_assoc($select_product_result)) {
            $product_id = $row['id'];
            $product_title = $row['name'];
            $product_desc = $row['description'];
            $product_image_one = $row['image_one'];
            $product_image_two = $row['image_two'];
            $product_image_three = $row['image_three'];
            $product_price = $row['price'];
            $category_id = $row['category_id'];
            // $brand_id = $row['brand_id'];

            echo '
                    <div class="row">
                        <div class="col-md-5">
                            <div class="single-product-img">
                                <img src="./uploads/images/products/' . $product_image_one . '" alt="' . $product_title . '">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="single-product-content">
                                <h3>' . $product_title . '</h3>
                                <p class="single-product-pricing">₹ ' . $product_price . '</p>
                                <p>' . $product_desc . '</p>
                                <div class="single-product-form">

                                    <form class="mb-3" action="index.php?products&&add_to_cart=' . $product_id . '">
                                        <div class="buy-item d-flex gap-3  align-items-center">
                                            <div class="num-btns d-flex gap-1">
                                                <button type="button" class="btn btn-outline-primary" onclick="decreaseValueBtn()"> -</button>
                                            <input type="number" class="form-control" name="num_of_items" id="num_of_items" value="1">
                                                <input type="hidden" class="form-control" name="add_to_cart" id="add_to_cart" value="' . $product_id . '"/>
                                                <button type="button" class="btn btn-outline-primary" onclick="increaseValueBtn()">+</button>
                                               
                                            </div>
                                            <div>
                                                <input type="submit" class="btn btn-primary" value="Buy Now">
                                            </div>
                                        </div>
                                    </form>
                                    <p><strong>Categories: </strong>Fruits, Organic</p>
                                    <div class="d-flex flex-column gap-2">
                                        <h6>Free Delivery</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
        }
    }
}

// display categories in sidenav 
function getCategories()
{
    $params_id = "";
    if (isset($_GET['category_id'])) {
        $params_id = $_GET['category_id'];
    } else {
        $params_id = "all";
    }
    global $con;
    $select_category_query = "SELECT * FROM `categories`";
    $select_category_result = mysqli_query($con, $select_category_query);
    while ($categories_row_data = mysqli_fetch_assoc($select_category_result)) {
        $category_title = $categories_row_data['name'];
        $category_id = $categories_row_data['id'];
        $image = $categories_row_data['image'];
        $description = $categories_row_data['description'];

        $active_class = ($params_id == $category_id) ? "active" : "";

        echo '

        <li data-filter="' . $category_title . '" class="' . $active_class . '">
            <a href="index.php?products&&category_id=' . $category_id . '">
                ' . $category_title  .  '
            </a>
        </li>
      ';
    }
}

// display unique product with category
function filterCategoryProduct()
{
    global $con;
    // condition to check isset or not 
    if (isset($_GET['category_id'])) {
        $category_id = $_GET['category_id'];
        $select_product_query = "SELECT * FROM `products` WHERE category_id = $category_id";
        $select_product_result = mysqli_query($con, $select_product_query);
        $num_of_rows = mysqli_num_rows($select_product_result);
        if ($num_of_rows == 0) {
            echo "
                <h2 class='text-center'>No Stock for this category</h2>
                ";
        }
        while ($row = mysqli_fetch_assoc($select_product_result)) {
            $product_id = $row['id'];
            $product_title = $row['name'];
            $product_image_one = $row['image_one'];
            $product_price = $row['price'];
            $category_id = $row['category_id'];
            echo '
            <div data-wow-delay="0.1s" class=" wow fadeInUp col-sm-6 col-lg-4 all pizza">
                      <div class="box">
                          <div>
                              <div class="img-box">
                                  <img src="./uploads/images/products/' . $product_image_one . '" alt="' . $product_title . '">
                              </div>
                              <div class="detail-box">
                                  <h5 class="text-white ">
                                      ' . $product_title . '
                                  </h5>
                                  <p>
                                      Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit, magnam
                                      voluptatem repellendus sed eaque
                                  </p>
                                  <div class="options">
                                      <h6 class="text-white ">
                                         ₹ ' . $product_price . '
                                      </h6>
                                       <div class="d-flex gap-5">
                                        <a href="index.php?view_product&&product_id=' . $product_id . '">
                                         <i class="fas fa-eye text-white"></i>
                                      </a>

                                      <a href="index.php?products&&num_of_items=1&&add_to_cart=' . $product_id . '">
                                         <i class="fas fa-cart-plus text-white"></i>
                                      </a>
                                       </div>
                                      
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>


  ';
        }
    }
}

function getMenuCategories()
{
    $params_id = "";
    if (isset($_GET['category_id'])) {
        $params_id = $_GET['category_id'];
    } else {
        $params_id = "all";
    }
    global $con;
    $select_category_query = "SELECT * FROM `categories`";
    $select_category_result = mysqli_query($con, $select_category_query);
    while ($categories_row_data = mysqli_fetch_assoc($select_category_result)) {
        $category_title = $categories_row_data['name'];
        $category_id = $categories_row_data['id'];
        $image = $categories_row_data['image'];
        $description = $categories_row_data['description'];

        $active_class = ($params_id == $category_id) ? "active" : "";

        echo '
        <li class="nav-item">
            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 ' . $active_class . '" data-bs-toggle="pill" href="index.php?menu&&category_id=' . $category_id . '">
                <i class="fa fa-coffee fa-2x text-primary"></i>
                <div class="ps-3">
                    <h6 class="mt-n1 mb-0">' . $category_title . '</h6>
                </div>
            </a>
        </li>
    ';
    }
}
// display unique product with brand 
function filterMenuProduct()
{
    global $con;
    // condition to check isset or not 
    if (isset($_GET['category_id'])) {
        $category_id = $_GET['category_id'];
        $select_product_query = "SELECT * FROM `menus` WHERE category_id = $category_id";
        $select_product_result = mysqli_query($con, $select_product_query);
        $num_of_rows = mysqli_num_rows($select_product_result);
        if ($num_of_rows == 0) {
            echo "
                <h2 class='text-center'>No Stock for this brand</h2>
                ";
        }
        while ($row = mysqli_fetch_assoc($select_product_result)) {
            $name = $row['name'];
            $price = $row['price'];
            $description = $row['description'];
            $category_id = $row['category_id'];
            $image = $row['image'];
            echo "

                    <div class='col-lg-6'>
            <div class='d-flex align-items-center'>
                <img class='flex-shrink-0 img-fluid rounded' src='./uploads/images/products/" . $image, "' alt='' style='width: 80px;'>
                <div class='w-100 d-flex flex-column text-start ps-4'>
                    <h5 class='d-flex justify-content-between border-bottom pb-2'>
                        <span>$name</span>
                        <span class='text-primary'>$$price</span>
                    </h5>
                    <small class='fst-italic'>$description</small>
                </div>
            </div>
        </div>
    
        ";
        }
    }
}


// display brands in sidenav 
function getMenus()
{
    global $con;
    if (!isset($_GET['category_id'])) {
        $select_menus_query = "SELECT * FROM `menus`";
        $select_menus_result = mysqli_query($con, $select_menus_query);
        while ($menus_row_data = mysqli_fetch_assoc($select_menus_result)) {
            $name = $menus_row_data['name'];
            $price = $menus_row_data['price'];
            $description = $menus_row_data['description'];
            $category_id = $menus_row_data['category_id'];
            $image = $menus_row_data['image'];
            echo "
        <div class='col-lg-6'>
            <div class='d-flex align-items-center'>
                <img class='flex-shrink-0 img-fluid rounded' src='./uploads/images/products/" . $image, "' alt='' style='width: 80px;'>
                <div class='w-100 d-flex flex-column text-start ps-4'>
                    <h5 class='d-flex justify-content-between border-bottom pb-2'>
                        <span>$name</span>
                        <span class='text-primary'>$$price</span>
                    </h5>
                    <small class='fst-italic'>$description</small>
                </div>
            </div>
        </div>
      ";
        }
    }
}


// <a href='products.php?category=$category_id' class='nav-link'>
// $category_title
// </a>

function getFeedbacks()
{
    global $con;
    if (!isset($_GET['category_id'])) {
        $select_menus_query = "SELECT * FROM `feedback`";
        $select_menus_result = mysqli_query($con, $select_menus_query);
        while ($menus_row_data = mysqli_fetch_assoc($select_menus_result)) {
            $username = $menus_row_data['username'];
            $message = $menus_row_data['message'];
            echo "
            <div class='testimonial-item bg-transparent border rounded p-4'>
                <i class='fa fa-quote-left fa-2x text-primary mb-3'></i>
                <p>$message</p>
                <div class='d-flex align-items-center'>
                    <div class='ps-3'>
                        <h5 class='mb-1'>$username</h5>
                    </div>
                </div>
            </div>
        ";
        }
    }
}

// search product function 
function search_product()
{
    global $con;
    if (isset($_GET['search_data_btn'])) {
        $search_data_value = $_GET['search_data'];
        $search_product_query = "SELECT * FROM `products` WHERE product_title LIKE '%$search_data_value%' OR product_keywords LIKE '%$search_data_value%'";
        $search_product_result = mysqli_query($con, $search_product_query);
        $num_of_rows = mysqli_num_rows($search_product_result);
        if ($num_of_rows == 0) {
            echo "
                <h2 class='text-center'>No results match. No product found!</h2>
                ";
        }
        while ($row = mysqli_fetch_assoc($search_product_result)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_image_one = $row['product_image_one'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "
        <div class='col-md-4 mb-2'>
        <div class='one-card'>
            <div class='photo'>
                <img src='./admin/product_images/$product_image_one' alt='$product_title'>
                <button>
                <a class='text-light' href='products.php?add_to_cart=$product_id'>Add To Cart</a>
            </button>
            <button>
                <a class='text-light' href='product_details.php?product_id=$product_id'>View More</a>
            </button>
            </div>
            <div class='content'>
                <span class='title fw-bold'>$product_title</span>
                <div class='desc'>
                    <span>\$$product_price</span>
                    <span>
                        <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z' fill='#FFAD33' />
                        </svg>
                        <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z' fill='#FFAD33' />
                        </svg>
                        <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z' fill='#FFAD33' />
                        </svg>
                        <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path opacity='0.25' d='M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z' fill='black' />
                        </svg>
                        <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path opacity='0.25' d='M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z' fill='black' />
                        </svg>

                    </span>
                    <span>(35)</span>
                </div>
            </div>
        </div>
    </div>
        ";
        }
    }
}




// get Ip Address Function
function getIPAddress()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

// cart function
function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $getProductId = $_GET['add_to_cart'];
        $num_of_items = $_GET['num_of_items'];
        $select_query = "SELECT * FROM `carts` WHERE product_id=$getProductId";
        $select_result = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($select_result);
        if ($num_of_rows > 0) {
            echo "<script>alert('This item is already present in Cart');</script>";
            echo "<script>window.open('index.php','_self');</script>";
            // header("Location:products.php");
        } else {
            $insert_query = "INSERT INTO `carts` (product_id,quantity) VALUES ($getProductId,$num_of_items)";
            $insert_result = mysqli_query($con, $insert_query);
            echo "<script>alert('This item added to Cart');</script>";
            echo "<script>window.open('index.php','_self');</script>";
        }
    }
}

// get cart item numbers function 
function cart_item()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $getIpAddress = getIPAddress();
        $select_query = "SELECT * FROM `carts` WHERE ip_address='$getIpAddress' ";
        $select_result = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($select_result);
    } else {
        global $con;
        $getIpAddress = getIPAddress();
        $select_query = "SELECT * FROM `carts` WHERE ip_address='$getIpAddress' ";
        $select_result = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($select_result);
    }
    echo $count_cart_items;
}

// total price function 
function total_cart_price()
{
    global $con;
    $getIpAddress = getIPAddress();
    $total_price = 0;
    $cart_query = "SELECT * FROM `carts` WHERE ip_address='$getIpAddress'";
    $cart_result = mysqli_query($con, $cart_query);
    while ($row = mysqli_fetch_array($cart_result)) {
        $product_id = $row['product_id'];
        $select_product_query = "SELECT * FROM `products` WHERE product_id=$product_id";
        $select_product_result = mysqli_query($con, $select_product_query);
        while ($row_product_price = mysqli_fetch_array($select_product_result)) {
            $product_price = array($row_product_price['product_price']);
            $product_values = array_sum($product_price);
            $total_price += $product_values;
        }
    }
    echo $total_price;
}

// get user order details
function get_user_order_details()
{
    global $con;
    $username = $_SESSION['username'];
    $get_details_query = "SELECT * FROM `user_table` WHERE username = '$username'";
    $get_details_result = mysqli_query($con, $get_details_query);
    while ($row_query = mysqli_fetch_array($get_details_result)) {
        $user_id = $row_query['id'];
        if (!isset($_GET['edit_account'])) {
            if (!isset($_GET['my_orders'])) {
                if (!isset($_GET['delete_account'])) {
                    $get_orders_query = "SELECT * FROM `user_orders` WHERE user_id='$user_id' AND order_status='pending'";
                    $get_orders_result = mysqli_query($con, $get_orders_query);
                    $row_orders_count = mysqli_num_rows($get_orders_result);
                    if ($row_orders_count > 0) {
                        echo "<h3 class='text-center mb-3'>You have <span class='text-2'>$row_orders_count</span> pending orders</h3>
                            <a href='profile.php?my_orders' class='text-center text-decoration-underline fs-5'>Order details</a>
                        ";
                    } else {
                        echo "<h3 class='text-center mb-3'>You have <span class='text-success'>0</span> pending orders</h3>
                            <a href='../../index.php' class='text-center text-decoration-underline fs-5'>Explore products</a>
                        ";
                    }
                }
            }
        }
    }
}
