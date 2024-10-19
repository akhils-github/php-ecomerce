<?php
include('../../index.php'); 
ob_start(); // Start output buffering
$content = ob_get_clean(); // Get the buffered content
include('../../config/db.php');

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
// Fetch food item details

$result = $conn->query("SELECT * FROM items WHERE id = $id");
$foodItem = $result->fetch_assoc();
if (!$foodItem) {
    echo "Food item not found.";
    exit;
}
?>

<section class="section section-divider gray about" id="about">
        <div class="container">

          <div class="about-banner">
          <?php if ($foodItem['images']): 
          $imagePath = str_replace('../../', '../', htmlspecialchars($foodItem['images']));
            ?>
            <img src="<?php echo  $imagePath  ?>" width="300" height="459" loading="lazy" alt="<?php echo  $imagePath  ?>"
              class="w-10 about-img">
              <?php endif; ?>
            <!-- <img src="../../../public/assets/images/sale-shape-red.png" width="216" height="226" alt="get up to 50% off now"
              class="abs-img scale-up-anim"> -->
             
          </div>

          

          <div class="about-content" style="
          margin-top: 45px;
    display: flex;
    flex-direction: column;
    gap: 20px;
">

            <h2 class="h2 section-title">
            <?php echo htmlspecialchars($foodItem['name']); ?>
              <!-- Caferio, Burgers, and Best Pizzas -->
            </h2>
            <h2 class="h2 section-title">
            <span class="span">₹ <?php echo htmlspecialchars($foodItem['price']); ?>!</span>
            </h2>

            <p class="section-text">
            <?php echo htmlspecialchars($foodItem['description']); ?>
             
            </p>

            <!-- <ul class="about-list">

              <li class="about-item">
                <ion-icon name="checkmark-outline"></ion-icon>

                <span class="span">Delicious & Healthy Foods</span>
              </li>

              <li class="about-item">
                <ion-icon name="checkmark-outline"></ion-icon>

                <span class="span">Spacific Family And Kids Zone</span>
              </li>

              <li class="about-item">
                <ion-icon name="checkmark-outline"></ion-icon>

                <span class="span">Music & Other Facilities</span>
              </li>

              <li class="about-item">
                <ion-icon name="checkmark-outline"></ion-icon>

                <span class="span">Fastest Food Home Delivery</span>
              </li>

            </ul> -->
                <div class="col-md-4 mb-3">
                    <div class="qty-container">
                        <button class="qty-btn-minus btn-primary btn-rounded mr-1" type="button">-</button>
                        <input type="text" name="qty" value="0" class="input-qty input-rounded"/>
                        <button class="qty-btn-plus btn-primary btn-rounded ml-1" type="button">+</button>
                    </div>
                </div>
            
           
            <button class="btn btn-hover">Order Now</button>

          </div>

        </div>
      </section>