<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESTAURANT</title>
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
        <h3>food made with love</h3>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perspiciatis reprehenderit maiores ipsum possimus ad! Culpa quos eum dolores! Dolor quos mollitia delectus fugit impedit obcaecati odio molestiae dignissimos doloribus, fugiat expedita, eos excepturi! Quidem est illum molestias itaque doloribus sed debitis eveniet dolorem, nulla saepe, deleniti ullam fugiat iure dicta?</p>
        <a href="#" class="btn">order now</a>
    </div>

    <div class="image">
        <img src="../assets/images/home-img.png" alt="">
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