<?php 
session_start();
include('../config/db.php');
// Fetch food items
$result = $conn->query("SELECT food_items.id, food_items.name, food_items.description, food_items.price, food_items.image, food_items.morepic, categories.name AS category_name
                        FROM food_items
                        LEFT JOIN categories ON food_items.category_id = categories.id");
                       

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CANTEEN</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
    <!-- header -->
    <?php
include('../common/navbar.php'); 
?>

<section class="home" id="home">
    <div class="content">
        <h3>Savor the flavor of homemade goodness</h3>
        <p>Enjoy the comforting taste of home-cooked meals at our canteen. We make each dish with care and quality ingredients, so every bite feels like home. Have a great day!</p>
        <!-- <a href="#" class="btn">order now</a> -->
    </div>

    <div class="image">
        <img src="../assets/images/homepic.png" alt="">
    </div>
</section>



<?php
include('./products/category.php'); 
?>


<section class="steps">

   <div class="box">
    <img src="../assets/images/step-1.jpg" alt="">
    <h3>choose your favourite food</h3>
   </div>
   <div class="box">
    <img src="../assets/images/step-2.jpg" alt="">
    <h3>free and fast delivery</h3>
   </div>
   <div class="box">
    <img src="../assets/images/step-3.jpg" alt="">
    <h3>easy payment methods</h3>
   </div>
   <div class="box">
    <img src="../assets/images/step-4.jpg" alt="">
    <h3>and finally, enjoy your food</h3>
   </div>
</section>


<?php
include('./products/product.php'); 
?>



<setion class="order" id="order">

    <h1 class="heading"><span>order</span> now </h1>

    <div class="row">

        <div class="image">
            <img src="../assets/images/order-img.jpg" alt="">
        </div>
        <form action="">
           <div class="inputBox">
            <input type="text" placeholder="name">
            <input type="email" placeholder="email">
           </div>
           <div class="inputBox">
            <input type="number" placeholder="number">
            <input type="text" placeholder="food name">
           </div>

           <textarea placeholder="address" name="" id="" cols="30" rows="10"></textarea>

           <input type="submit" value="order now" class="btn">
        </form>
    </div>
</setion>



<a href="#home" class="fas fa-angle-up" id="scroll-top"></a>

<div class="loader-container">
    <img src="../assets/images/loader.gif" alt="">
</div>

   <script src="../assets/js/main.js"></script> 
</body>
</html>
