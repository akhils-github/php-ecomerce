<?php

$projectName = basename(dirname(__DIR__, 2)); // Adjusting to go two levels up from the current file's directory
$baseUrl = "/$projectName";
?>
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
              <a href="<?php echo $baseUrl; ?>/src/pages/admin/user" class="nav-link">
                <i class='bx bx-user icon'></i>
                <span class="link">Customers</span>
              </a>
            </li>
            <li class="list">
              <a href="<?php echo $baseUrl; ?>/src/pages/admin/category" class="nav-link">
                <i class='bx bx-category icon' ></i>
                <span class="link">Categories</span>
              </a>
            </li>
            <li class="list">
              <a href="<?php echo $baseUrl; ?>/src/pages/admin/products" class="nav-link">
                <!-- <i class="bx bx-message-rounded icon"></i> -->
                <i class='bx bx-food-menu icon' ></i>
                <span class="link">Food Items</span>
              </a>
            </li>
            <li class="list">
              <a href="<?php echo $baseUrl; ?>/src/pages/admin/menu" class="nav-link">
                <!-- <i class="bx bx-message-rounded icon"></i> -->
                <i class='bx bx-food-menu icon' ></i>
                <span class="link">Menu List</span>
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
    <script src="<?php echo $baseUrl; ?>/public/assets/js/admin.js"></script>
