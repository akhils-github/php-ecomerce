
<?php 
  $projectName = basename(dirname(__DIR__, 1)); // Adjusting to go two levels up from the current file's directory
  $baseUrl = "/$projectName";

// include('./src/config/db.php');
// Fetch food items
$result = $conn->query("SELECT items.id, items.name, items.description, items.price, items.images, items.extra_images, categories.name AS category_name
                        FROM items
                        LEFT JOIN categories ON items.category_id = categories.id");
                        $categories = $conn->query("SELECT *
                        FROM categories
                        ");
                       

?>

<section class="section food-menu" id="food-menu">
        <div class="container">

          <p class="section-subtitle">Popular Dishes</p>

          <h2 class="h2 section-title">
            Our Delicious <span class="span">Foods</span>
          </h2>

          <p class="section-text">
            Food is any substance consumed to provide nutritional support for an organism.
          </p>

          <ul class="fiter-list">
          <li>
              <button class="filter-btn  active">All</button>
            </li>
          <?php while ($row = $categories->fetch_assoc()): ?>
            <li>
              <button class="filter-btn "><?php echo htmlspecialchars($row['name']); ?></button>
            </li>
            <?php endwhile; ?>


          </ul>

          <ul class="food-menu-list">
          <?php while ($row = $result->fetch_assoc()): ?>
            <li>
              <div class="food-menu-card">

                <div class="card-banner" 

                >
                <?php if ($row['images']): 
                  $imagePath = str_replace('../../', 'src/pages/', htmlspecialchars($row['images']));
                  ?>
<img class="image" src="<?php echo $imagePath; ?>" alt="<?php echo $imagePath ?>" 
style="width: 100%;height:100%;"
>
<?php endif; ?>
                  <!-- <img src="src/pages/uploads/products/Samsung-Galaxy-S20-in.bookmyshow.com (2)_1729338268.png" width="300" height="300" loading="lazy"
                    alt="Fried Chicken Unlimited" class="w-100"> -->

                  <div class="badge">-15%</div>

                   <a  href="src/pages/users/detail.php?id=<?php echo $row['id']; ?>" class="btn btn-a food-menu-btn">Order Now</a>

                </div>

                <div class="wrapper">
                  <p class="category"><?php echo htmlspecialchars($row['name']); ?></p>

                  <div class="rating-wrapper">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                  </div>
                </div>

                <h3 class="h3 card-title"><?php echo htmlspecialchars($row['description']); ?></h3>

                <div class="price-wrapper">

                  <p class="price-text">Price:</p>
                  <?php 
$price = htmlspecialchars($row['price']);
$half_price = $price / 2;
$total_price = $price + $half_price;

?>
                  <data class="price">$<?php echo htmlspecialchars($row['price']); ?></data>

                  <del class="del" value="69.00">$<?php echo htmlspecialchars($total_price); ?></del>

                </div>

              </div>
            </li>
            <?php endwhile; ?>


          </ul>


        </div>
      </section>