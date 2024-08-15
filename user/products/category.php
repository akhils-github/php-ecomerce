
<?php
include('../config/db.php');
$result = $conn->query("SELECT *
                        FROM categories
                        ");
               
?>

<section class="speciality" id="speciality">

    <h1 class="heading"> our <span>speciality</span> </h1>

    <div class="box-container">
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="box">
        <?php 
$imagePath = str_replace('../../', './../', htmlspecialchars($row['image']));
?>
<img class="image" src="<?php echo $imagePath; ?>" alt="">
            <div class="content">
                <img src="../assets/images/s-1.png" alt="">
                <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                <p><?php echo htmlspecialchars($row['description']); ?></p>

            </div>
        </div>
        <?php endwhile; ?>


    </div>
</section>