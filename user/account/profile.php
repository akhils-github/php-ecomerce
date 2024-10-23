<?php
include("../../config/connect.php");
include("../../config/common_functions.php");
session_start();
if(!isset($_SESSION['username'])){
    header('location:user_login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['username'];?> Profile</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="../../assets/css/main.css" />
</head>

<body>

    <!-- upper-nav -->
    <!-- Start NavBar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">A1</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../../index.php">Home</a>
                    </li>
                  
                  
                    <li class="nav-item">
                        <a class="nav-link active"  aria-current="page" href="profile.php">My Account</a>
                    </li>
                </ul>
           
             
            </div>
        </div>
    </nav>
    <!-- End NavBar -->


    <!-- Start All Prodcuts  -->
    <div class="all-prod">
        <div class="container">
            <div class="sub-container pt-4 pb-4">
                <div class="categ-header">
                    <div class="sub-title">
                        <span class="shape"></span>
                        <span class="title h3 text-dark">Profile</span>
                    </div>
                    <!-- <h2>Browse By Category & Brand</h2> -->
                </div>
                <div class="row mx-0">
                    <div class="col-md-2 side-nav p-0">
                        <!-- side nav  -->
                        <!-- Profile Tabs -->
                        <ul class="navbar-nav me-auto navbar-profile">
                            <?php
                                $username = $_SESSION['username'];
                                $select_user_img = "SELECT * FROM `user_table` WHERE username='$username'";
                                $select_user_img_result = mysqli_query($con,$select_user_img);
                                $row_user_img = mysqli_fetch_array($select_user_img_result);
                                $userImg = $row_user_img['image'];
                                echo "                            <li class='nav-item d-flex align-items-center gap-2'>
                                <img src='./user_images/$userImg' alt='$username photo' class='img-profile img-thumbnail'/>
                            </li>";
                            ?>
                            <li class="nav-item d-flex align-items-center gap-2">
                                <a href="profile.php" class="nav-link fw-bold">
                                    <h6>Pending Orders</h6>
                                </a>
                            </li>
                            <li class="table-group-divider"></li>
                            <li class="nav-item d-flex align-items-center gap-2">
                                <a href="profile.php?edit_account" class="nav-link fw-bold">
                                    <h6>Edit Account</h6>
                                </a>
                            </li>
                            <li class="table-group-divider"></li>
                            <li class="nav-item d-flex align-items-center gap-2">
                                <a href="profile.php?my_orders" class="nav-link fw-bold">
                                    <h6>My Orders</h6>
                                </a>
                            </li>
                            <li class="table-group-divider"></li>
                            <li class="nav-item d-flex align-items-center gap-2">
                                <a href="profile.php?delete_account" class="nav-link fw-bold">
                                    <h6>Delete Account</h6>
                                </a>
                            </li>
                            <li class="table-group-divider"></li>
                            <li class="nav-item d-flex align-items-center gap-2">
                                <a href="./logout.php" class="nav-link fw-bold">
                                    <h6>Logout</h6>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-10">
                        <!-- Main View  -->
                        <div class="row">
                            <?php
                                get_user_order_details();
                                if(isset($_GET['edit_account'])){
                                    include('./edit_account.php');
                                }
                                if(isset($_GET['my_orders'])){
                                    include('./user_orders.php');
                                }
                                if(isset($_GET['delete_account'])){
                                    include('./delete_account.php');
                                }
                                if(isset($_GET['checkout'])){
                                    include('./checkout.php');
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Prodcuts  -->













    <!-- divider  -->
    <!-- <div class="container">
        <div class="divider"></div>
    </div> -->
    <!-- divider  -->




    <!-- Start Footer -->
    <!-- <div class="upper-nav primary-bg p-2 px-3 text-center text-break">
        <span>All CopyRight &copy;2023</span>
    </div> -->
    <!-- End Footer -->

    <script src="../assets/js/bootstrap.bundle.js"></script>
</body>

</html>