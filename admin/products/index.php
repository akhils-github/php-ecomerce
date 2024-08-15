<?php
$pageTitle = "Product Details";
ob_start(); // Start output buffering
$content = ob_get_clean(); // Get the buffered content
include('../../common/sidebar.php');




$id = $_GET['id'];
if($id ){
$result = $conn->query("SELECT image, morepic FROM food_items WHERE id = $id");
$foodItem = $result->fetch_assoc();
if ($foodItem) {
    // Delete main image file if it exists
    if ($foodItem['image'] && file_exists($foodItem['image'])) {
        unlink($foodItem['image']);
    }

       // Delete additional images if they exist
       if ($foodItem['morepic']) {
        $morePics = json_decode($foodItem['morepic'], true);
        foreach ($morePics as $pic) {
            if (file_exists($pic)) {
                unlink($pic);
            }
        }
    }
     // Prepare and execute deletion query
     $stmt = $conn->prepare("DELETE FROM food_items WHERE id = ?");
     $stmt->bind_param("i", $id);
 
     if ($stmt->execute()) {
         echo "Food item deleted successfully.";
     } else {
         echo "Error: " . $stmt->error;
     }
 
     $stmt->close();
 } else {
     echo "Food item not found.";
}
}
// Fetch food items
$result = $conn->query("SELECT food_items.id, food_items.name, food_items.description, food_items.price, food_items.image, food_items.morepic, categories.name AS category_name
                        FROM food_items
                        LEFT JOIN categories ON food_items.category_id = categories.id");

?>


<section class="table__header">
            <h1>Products Listing</h1>
       <a href="create.php" class="create-btn">
        create
       </a>
        </section>
<section class="table__body">
            <table>
                <thead>

                    <tr>
                        <th> Id </th>
                        <th> Food Image </th>
                        <th> Food Name </th>
                        <th> Description </th>
                        <th> Price </th>
                        <th> Category </th>
                        <th> Actions </th>
                  
                    </tr>

                </thead>
                <tbody >
        <?php while ($row = $result->fetch_assoc()): ?>

                    <tr>
             
            <td><?php echo htmlspecialchars($row['id']); ?></td>
            <td><!-- Display main image -->
            <?php if ($row['image']): ?>
                <img width=100 height=200 src="<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
            <?php endif; ?></td>

            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['description']); ?></td>
            <td><?php echo htmlspecialchars($row['price']); ?></td>
            <td><?php echo htmlspecialchars($row['category_name']); ?></td>
            <td  class="action">

                <a href="edit.php?id=<?php echo $row['id']; ?>" class="status delivered">Edit</a> 
                <a  href="?id=<?php echo $row['id']; ?> "onclick="return confirm('Are you sure you want to delete this food item?');" class="status cancelled">Delete</a>
            </td>
                    </tr>
        <?php endwhile; ?>

        
                </tbody>
            </table>
        </section>

