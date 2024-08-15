<?php
session_start();
include('../../config/db.php');


$projectName = basename(dirname(__DIR__, 1)); // Adjusting to go two levels up from the current file's directory
$adminUrl = "/$projectName/admin/";


if (!isset($_SESSION['admin'])) {
  // Corrected URL construction in header
  header("Location: " . $adminUrl . "login.php");
  exit(); // Always call exit() after a redirect to stop further script execution
}
?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Sidebar Menu | Side Navigation Bar</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../../assets/css/sidebar.css" />
    <!-- Boxicons CSS -->
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
  </head>
 
  <body>
    <nav>
      <div class="logo">
        <i class="bx bx-menu menu-icon"></i>
        <span class="logo-name">Canteen</span>
      </div>
      <div class="sidebar">
        <div class="logo">
          <i class="bx bx-menu menu-icon"></i>
          <span class="logo-name">Canteen</span>
        </div>

        <div class="sidebar-content">
          <ul class="lists">
          
            <li class="list">
              <a href="<?php echo $adminUrl; ?>/user" class="nav-link">
                <i class='bx bx-user icon'></i>
                <span class="link">Customers</span>
              </a>
            </li>
            <li class="list">
              <a href="<?php echo $adminUrl; ?>/category" class="nav-link">
                <i class='bx bx-category icon' ></i>
                <span class="link">Categories</span>
              </a>
            </li>
            <li class="list">
              <a href="<?php echo $adminUrl; ?>/products" class="nav-link">
                <!-- <i class="bx bx-message-rounded icon"></i> -->
                <i class='bx bx-food-menu icon' ></i>
                <span class="link">Food Items</span>
              </a>
            </li>
            <li class="list">
              <a href="#" class="nav-link">
                <i class='bx bx-list-plus icon'></i>
                <span class="link">Order Management</span>
              </a>
            </li>
         
          </ul>

          <div class="bottom-cotent">
          
            <li class="list">
              <a href="#" class="nav-link">
                <i class="bx bx-log-out icon"></i>
                <span class="link">Logout</span>
              </a>
            </li>
          </div>
        </div>
      </div>
    </nav>

    <section class="overlay"  >
    <?php echo isset($content) ? $content : ''; ?>

    </section>

    <script src="../../assets/js/sidebar.js"></script>
  </body>
</html>