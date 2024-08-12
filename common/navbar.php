
<?php
session_start(); // Start the session
?>

<header>
    <a href="#" class="logo"><i class="fas fa-utensils"></i>food</a>

    <div id="menu-bar" class="fas fa-bars"></div>

    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#speciality">speciality</a>
        <a href="#popular">popular</a>
        <a href="#gallery">gallery</a>
        <a href="#review">review</a>
        <a href="#order">order</a>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <!-- User is logged in -->
            <!-- <a href="profile.php" id="user"><?php echo htmlspecialchars($_SESSION['username']); ?></a> -->
            <a href="logout.php" class="tn" id="logout-btn">Logout</a>
        <?php else: ?>
            <!-- User is not logged in -->
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        <?php endif; ?>
    </nav>
    </header>