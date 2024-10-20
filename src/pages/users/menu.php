<?php 
  $projectName = basename(dirname(__DIR__, 1)); // Adjusting to go two levels up from the current file's directory
  $baseUrl = "/$projectName";
  // if ($baseUrl === "/miniprojet"){
  //   include('../../index.php'); 
  // include('../../config/db.php');
  //   }
$result = $conn->query("SELECT menu_items.id, menu_items.name, menu_items.description, menu_items.price, menu_items.image, categories.name AS category_name
                        FROM menu_items
                        LEFT JOIN categories ON menu_items.category_id = categories.id");
                        $categories = $conn->query("SELECT *
                        FROM categories
                        ");
                       

?>

<div class="py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal text-sm">Food Menu</h5>
                    <h1 class="mb-5">Most Popular Items</h1>
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <!-- <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                                <i class="fa fa-coffee fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <small class="text-body">Popular</small>
                                    <h6 class="mt-n1 mb-0">Breakfast</h6>
                                </div>
                            </a>
                        </li>
                
                    </ul> -->
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                            <?php while ($row = $result->fetch_assoc()): ?>

                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                    <?php if ($row['image']): 
                 $imagePath = str_replace('../../', 'src/pages/', htmlspecialchars($row['image']));
                 ?>
                                        <img class="flex-shrink-0 img-fluid rounded-circle" src="<?php echo $imagePath; ?>" alt="<?php echo $imagePath; ?>" style="width: 80px; height: 80px;">
                                        <?php endif; ?>
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span class="text-sm text-black"><?php echo htmlspecialchars($row['name']); ?></span>
                                                <span class="text-primary text-sm">$ <?php echo htmlspecialchars($row['price']); ?></span>
                                            </h5>
                                            <small class="fst-italic"><?php echo htmlspecialchars($row['description']); ?></small>
                                        </div>

                                    </div>
                                </div>
                                     <?php endwhile; ?>

                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>

    <script>
      
let list = document.querySelectorAll(".list li");
let box = document.querySelectorAll(".box");

list.forEach((el)=>{
    el.addEventListener("click" , (e)=>{
        list.forEach((el1)=>{
            el1.style.color = "#000";
        })
        e.target.style.color = "#d4a373"
        box.forEach((el2)=>{
            el2.style.display = "none";
        })
        document.querySelectorAll(e.target.dataset.color).forEach((el3)=>{
            el3.style.display = "flex";
        })
    })
})

</script>


