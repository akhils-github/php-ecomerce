
<?php
include('../config/db.php');
// Fetch food items
$result = $conn->query("SELECT food_items.id, food_items.name, food_items.description, food_items.price, food_items.image, food_items.morepic, categories.name AS category_name
                        FROM food_items
                        LEFT JOIN categories ON food_items.category_id = categories.id");
               
?>
<section class="gallery" id="gallery">

    <h1 class="heading">our food <span>gallery</span></h1>

    <div class="box-container">

    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="box">
        <?php if ($row['image']): 
$imagePath = str_replace('../../', './../', htmlspecialchars($row['image']));
?>
<img class="image" src="<?php echo $imagePath; ?>" alt="">
            <?php endif; ?>

            <div class="content">
                <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                <p><?php echo htmlspecialchars($row['description']); ?>!</p>
                <a href="#" class="btn">order now</a>
            </div>
        </div>
        <?php endwhile; ?>

</section>