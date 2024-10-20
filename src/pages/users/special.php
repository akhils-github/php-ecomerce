<?php 
  $projectName = basename(dirname(__DIR__, 1)); // Adjusting to go two levels up from the current file's directory
  $baseUrl = "/$projectName";

// include('./src/config/db.php');
// Fetch food items
$result = $conn->query("SELECT menu_items.id, menu_items.name, menu_items.description, menu_items.price, menu_items.image, categories.name AS category_name
                        FROM menu_items
                        LEFT JOIN categories ON menu_items.category_id = categories.id");
                        $categories = $conn->query("SELECT *
                        FROM categories
                        ");
                       

?>

<section class="section section-divider white blog" id="blog">
        <div class="container">

          <!-- <p class="section-subtitle">Latest Blog Posts</p> -->

          <h2 class="h2 section-title">
            Special  <span class="span">Foods</span>
          </h2>
<!-- 
          <p class="section-text">
            Food is any substance consumed to provide nutritional support for an organism.
          </p> -->

          <ul class="blog-list">

          <?php while ($row = $result->fetch_assoc()): ?>

            <li>
              <div class="blog-card">

                <div class="card-banner">
                <?php if ($row['image']): 
                 $imagePath = str_replace('../../', 'src/pages/', htmlspecialchars($row['image']));
                 ?>
                  <img src="<?php echo $imagePath; ?>" width="600" height="340" style="max-height:340px" loading="lazy"
                    alt="<?php echo $imagePath; ?>" class="w-100">
                    <?php endif; ?>
                  <div class="badge"><?php echo htmlspecialchars($row['category_name']); ?></div>
                </div>

                <div class="card-content">

                  <h3 class="h3">
                    <a href="#" class="card-title">
                    <?php echo htmlspecialchars($row['name']); ?>
                        </a>
                  </h3>

                  <p class="card-text">
                  <?php echo htmlspecialchars($row['description']); ?>
                  </p>

            

                </div>

              </div>
            </li>
            <?php endwhile; ?>
          </ul>

        </div>
      </section>
