
<?php 
  $projectName = basename(dirname(__DIR__, )); // Adjusting to go two levels up from the current file's directory
  $baseUrl = "/$projectName";
session_start();
include('./src/config/db.php');
// Fetch food items
// $result = $conn->query("SELECT food_items.id, food_items.name, food_items.description, food_items.price, food_items.image, food_items.morepic, categories.name AS category_name
//                         FROM food_items
//                         LEFT JOIN categories ON food_items.category_id = categories.id");
                       

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./public/favicon.svg" type="image/svg+xml">
    <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./public/assets/css/style.css">

  <!-- 
    - preload images
  -->
  <link rel="preload" as="image" href="./public/assets/images/hero-banner.png" media="min-width(768px)">
  <link rel="preload" as="image" href="./public/assets/images/hero-banner-bg.png" media="min-width(768px)">
  <link rel="preload" as="image" href="./public/assets/images/hero-bg.jpg">

    <title>Canteen</title>
</head>
<body id="top">

<!-- 
  - #HEADER
-->

<header class="header" data-header>
  <div class="container">

    <h1>
      <a href="#" class="logo">FOOD CORNER<span class="span"></span></a>
    </h1>

    <nav class="navbar" data-navbar>
      <ul class="navbar-list">

        <li class="nav-item">
          <a href="#home" class="navbar-link" data-nav-link>Home</a>
        </li>

        <li class="nav-item">
          <a href="./src/pages/users/menu.php" class="navbar-link" data-nav-link>Menu</a>
        </li>

        <li class="nav-item">
          <a href="./src/pages/users/category.php" class="navbar-link" data-nav-link>Category</a>
        </li>

        <li class="nav-item">
          <!-- <a href="#blog" class="navbar-link" data-nav-link>Blog</a> -->
        </li>

        <li class="nav-item">
          <!-- <a href="#" class="navbar-link" data-nav-link>Contact Us</a> -->
        </li>

      </ul>
    </nav>

    <div class="header-btn-group">
      <button class="search-btn" aria-label="Search" data-search-btn>
        <ion-icon name="search-outline"></ion-icon>
      </button>
      <div class="icon-cart">
          <svg style="width: 25px;" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 15a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0h8m-8 0-1-4m9 4a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-9-4h10l2-7H3m2 7L3 4m0 0-.792-3H1"/>
          </svg>
          <span>0</span>
      </div>

      <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
      <a href="./src/config/logout.php" class="btn btn-a btn-hover">Logout</a>
      <?php else: ?>
      <a href="src/pages/auth/user/login.php" class="btn btn-a btn-hover">Login</a>
      <?php endif; ?>

      <button class="nav-toggle-btn" aria-label="Toggle Menu" data-menu-toggle-btn>
        <span class="line top"></span>
        <span class="line middle"></span>
        <span class="line bottom"></span>
      </button>
    </div>

  </div>
</header>

  <!-- 
    - #SEARCH BOX
  -->

  <div class="search-container" data-search-container>

    <div class="search-box">
      <input type="search" name="search" aria-label="Search here" placeholder="Type keywords here..."
        class="search-input">

      <button class="search-submit" aria-label="Submit search" data-search-submit-btn>
        <ion-icon name="search-outline"></ion-icon>
      </button>
    </div>

    <button class="search-close-btn" aria-label="Cancel search" data-search-close-btn></button>

  </div>

  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero" id="home" style="background-image: url('./public/assets/images/hero-bg.jpg')">
        <div class="container">

          <div class="hero-content">

            <p class="hero-subtitle">Taste the love in every bite!</p>

            <h2 class="h1 hero-title">Savour The Flavour Of Homemade Goodness</h2>

            <p class="hero-text">Food is any substance consumed to provide nutritional support for an organism.</p>

            <!-- <button class="btn">Book A Table</button> -->

          </div>

          <figure class="hero-banner">
            <img src="./public/assets/images/hero-banner-bg.png" width="820" height="716" alt="" aria-hidden="true"
              class="w-100 hero-img-bg">

            <img src="./public/assets/images/home/Biryani.png" width="700" height="637" loading="lazy" alt="Burger"
              class="w-100 hero-img">
          </figure>

        </div>
      </section>



    
  
      <?php
include('./src/pages/users/special.php'); 
?>
      <?php
include('./src/pages/users/category.php'); 
?>
      
      <?php
include('./src/pages/users/product.php'); 
?>
      

      <!-- <section class="section section-divider white cta" style="background-image: url('./public/assets/images/hero-bg.jpg')">
        <div class="container">

          <div class="cta-content">

            <h2 class="h2 section-title">
              The Foodie Have Excellent Of
              <span class="span">Quality Burgers!</span>
            </h2>

            <p class="section-text">
              The restaurants in Hangzhou also catered to many northern Chinese who had fled south from Kaifeng during
              the Jurchen
              invasion of the 1120s, while it is also known that many restaurants were run by families.
            </p>

            <button class="btn btn-hover">Order Now</button>
          </div>

          <figure class="cta-banner">
            <img src="./public/assets/images/cta-banner.png" width="700" height="637" loading="lazy" alt="Burger"
              class="w-100 cta-img">

            <img src="./public/assets/images/sale-shape.png" width="216" height="226" loading="lazy"
              alt="get up to 50% off now" class="abs-img scale-up-anim">
          </figure>

        </div>
      </section> -->





      <!-- 
        - #DELIVERY
      -->

      <!-- <section class="section section-divider gray delivery">
        <div class="container">

          <div class="delivery-content">

            <h2 class="h2 section-title">
              A Moments Of Delivered On <span class="span">Right Time</span> & Place
            </h2>

            <p class="section-text">
              The restaurants in Hangzhou also catered to many northern Chinese who had fled south from Kaifeng during
              the Jurchen
              invasion of the 1120s, while it is also known that many restaurants were run by families.
            </p>

            <button class="btn btn-hover">Order Now</button>
          </div>

          <figure class="delivery-banner">
            <img src="./public/assets/images/delivery-banner-bg.png" width="700" height="602" loading="lazy" alt="clouds"
              class="w-100">

            <img src="./public/assets/images/delivery-boy.svg" width="1000" height="880" loading="lazy" alt="delivery boy"
              class="w-100 delivery-img" data-delivery-boy>
          </figure>

        </div>
      </section> -->










      <!-- 
        - #BANNER
      -->
<!-- 
      <section class="section section-divider gray banner">
        <div class="container">

          <ul class="banner-list">

            <li class="banner-item banner-lg">
              <div class="banner-card">

                <img src="./public/assets/images/banner-1.jpg" width="550" height="450" loading="lazy"
                  alt="Discount For Delicious Tasty Burgers!" class="banner-img">

                <div class="banner-item-content">
                  <p class="banner-subtitle">50% Off Now!</p>

                  <h3 class="banner-title">Discount For Delicious Tasty Burgers!</h3>

                  <p class="banner-text">Sale off 50% only this week</p>

                  <button class="btn">Order Now</button>
                </div>

              </div>
            </li>

            <li class="banner-item banner-sm">
              <div class="banner-card">

                <img src="./public/assets/images/banner-2.jpg" width="550" height="465" loading="lazy" alt="Delicious Pizza"
                  class="banner-img">

                <div class="banner-item-content">
                  <h3 class="banner-title">Delicious Pizza</h3>

                  <p class="banner-text">50% off Now</p>

                  <button class="btn">Order Now</button>
                </div>

              </div>
            </li>

            <li class="banner-item banner-sm">
              <div class="banner-card">

                <img src="./public/assets/images/banner-3.jpg" width="550" height="465" loading="lazy" alt="American Burgers"
                  class="banner-img">

                <div class="banner-item-content">
                  <h3 class="banner-title">American Burgers</h3>

                  <p class="banner-text">50% off Now</p>

                  <button class="btn">Order Now</button>
                </div>

              </div>
            </li>

            <li class="banner-item banner-md">
              <div class="banner-card">

                <img src="./public/assets/images/banner-4.jpg" width="550" height="220" loading="lazy" alt="Tasty Buzzed Pizza"
                  class="banner-img">

                <div class="banner-item-content">
                  <h3 class="banner-title">Tasty Buzzed Pizza</h3>

                  <p class="banner-text">Sale off 50% only this week</p>

                  <button class="btn">Order Now</button>
                </div>

              </div>
            </li>

          </ul>

        </div>
      </section> -->





      <!-- 
        - #BLOG
      -->

   





 
  </main>
  <?php
include('src/pages/users/cart.php'); 
?>
      <!-- 

    - custom js link
  -->
  <script src="./public/assets/js/script.js" defer></script>
  <script src="./public/assets/js/cart.js" defer></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>