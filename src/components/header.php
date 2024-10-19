

<header class="header active" data-header>
  <div class="container">

    <h1>
      <a href="#" class="logo">Canteen<span class="span">.</span></a>
    </h1>

    <nav class="navbar" data-navbar>
      <ul class="navbar-list">

        <li class="nav-item">
          <a href="#home" class="navbar-link" data-nav-link>Home</a>
        </li>

        <li class="nav-item">
          <a href="#about" class="navbar-link" data-nav-link>About Us</a>
        </li>

        <li class="nav-item">
          <a href="#food-menu" class="navbar-link" data-nav-link>Shop</a>
        </li>

        <li class="nav-item">
          <a href="#blog" class="navbar-link" data-nav-link>Blog</a>
        </li>

        <li class="nav-item">
          <a href="#" class="navbar-link" data-nav-link>Contact Us</a>
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
      <a href="../../config/logout.php" class="btn btn-a btn-hover">Logout</a>
      <?php else: ?>
      <a href="auth/login.php" class="btn btn-a btn-hover">Login</a>

      <?php endif; ?>

      <button class="nav-toggle-btn" aria-label="Toggle Menu" data-menu-toggle-btn>
        <span class="line top"></span>
        <span class="line middle"></span>
        <span class="line bottom"></span>
      </button>
    </div>

  </div>
</header>


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