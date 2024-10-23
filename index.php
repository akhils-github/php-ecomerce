<?php
include('./config/connect.php');
include('./config/common_functions.php');
session_start();
// $currentPath = __DIR__;
// $projectName = basename($currentPath);
$currentPath = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOOD CORNER</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.css" />
    <link rel="stylesheet" href="./assets/css/main.css" />


    <!-- Libraries Stylesheet -->
    <link href="./assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="./assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="./assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/font-awesome.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="./assets/css/style.css" rel="stylesheet">
    <link href="./assets/css/custom.css" rel="stylesheet">

</head>

<body>

    <div class=" bg-white p-0">


        <!-- Spinner Start -->
        <!-- <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->

        <!-- Navbar & Hero Start -->

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-2 sticky-top shadow-sm">
            <a href="" class="navbar-brand p-0">
                <h2 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>FOOD CORNER</h2>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0 pe-4">
                    <a href="/miniproject" class="nav-item nav-link <?php echo $currentPath === '/miniproject/' ? 'active' : ''; ?>">Home</a>
                    <a href="index.php?products" class="nav-item nav-link <?php echo isset($_GET['products']) ? 'active' : ''; ?>">Food Items</a>
                    <a href="index.php?menu" class="nav-item nav-link <?php echo isset($_GET['menu']) ? 'active' : ''; ?>">Menus</a>
                    <a href="index.php?feedback" class="nav-item nav-link <?php echo isset($_GET['feedback']) ? 'active' : ''; ?>">Feedback</a>

                    <?php
                    if (isset($_SESSION['username'])) {
                        echo '
        <a href="index.php?cart" class="nav-item nav-link ' . (isset($_GET['cart']) ? 'active' : '') . '">
            <i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i>
        </a>
        <li class="nav-item">
            <a class="nav-link" href="./user/account/profile.php"><i class="fa fa-user" aria-hidden="true"></i></a>
        </li>
    ';
                    }
                    ?>


                </div>


                <?php
                if (!isset($_SESSION['username'])) {
                    echo "  <a  href='./user/account/user_registration.php' class='btn btn-primary py-2 px-4'>Register</a>";
                } else {
                    echo " <a href='./user/account/logout.php' class='btn btn-primary py-2 px-4'>Logout</a>";

                    // echo ' <a href="" class="btn btn-primary py-2 px-4">.$_SESSION['username'].</a>';
                }
                ?>
            </div>
        </nav>





        <div>
            <?php

            if ($currentPath === '/miniproject/') {
                include('./user/home.php');
            }
            if ($currentPath === '/miniproject/index.php') {
                include('./user/home.php');
            }
            if (isset($_GET['products'])) {
                include('./user/products.php');
            }
            if (isset($_GET['view_product'])) {
                include('./user/view_product.php');
            }
            if (isset($_GET['menu'])) {
                include('./user/menu.php');
            }
            if (isset($_GET['cart'])) {
                include('./user/cart.php');
            }
            if (isset($_GET['feedback'])) {
                include('./user/feedback.php');
            }
            if (isset($_GET['checkout'])) {
                include('./user/feedback.php');
            }

            // if(isset($_GET['view_product'])){
            //     include('./view_product.php');
            // }
            if (isset($_GET['edit_product'])) {
                include('./edit_product.php');
            }
            if (isset($_GET['delete_product'])) {
                include('./delete_product.php');
            }
            if (isset($_GET['view_categories'])) {
                include('./view_categories.php');
            }
            if (isset($_GET['edit_category'])) {
                include('./edit_category.php');
            }
            if (isset($_GET['delete_category'])) {
                include('./delete_category.php');
            }
            if (isset($_GET['view_brands'])) {
                include('./view_brands.php');
            }
            if (isset($_GET['edit_brand'])) {
                include('./edit_brand.php');
            }
            if (isset($_GET['delete_brand'])) {
                include('./delete_brand.php');
            }
            if (isset($_GET['list_orders'])) {
                include('./list_orders.php');
            }
            if (isset($_GET['delete_order'])) {
                include('./delete_order.php');
            }
            if (isset($_GET['list_payments'])) {
                include('./list_payments.php');
            }
            if (isset($_GET['delete_payment'])) {
                include('./delete_payment.php');
            }
            if (isset($_GET['list_users'])) {
                include('./list_users.php');
            }

            ?>
        </div>


        <!-- End Footer -->
        <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
        <script src="./assets/js/jquery-min.js"></script>

        <!-- <script src="./assets/js/bootstrap.bundle.js"></script> -->

        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> -->
        <script src="./assets/lib/wow/wow.min.js"></script>
        <script src="./assets/lib/easing/easing.min.js"></script>
        <script src="./assets/lib/waypoints/waypoints.min.js"></script>
        <script src="./assets/lib/counterup/counterup.min.js"></script>
        <script src="./assets/lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="./assets/lib/tempusdominus/js/moment.min.js"></script>
        <script src="./assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="./assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

        <!-- Template Javascript -->
        <script src="./assets/js/main.js"></script>


</body>

</html>