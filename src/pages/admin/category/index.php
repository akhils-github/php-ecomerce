<?php
$pageTitle = "Category Create";
ob_start(); // Start output buffering
$content = ob_get_clean(); // Get the buffered content
include('../index.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Prepare and execute deletion query
    $stmt = $conn->prepare("DELETE FROM categories WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Category deleted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} 
// Fetch food items
$result = $conn->query("SELECT *
                        FROM categories
                        ");
                       
                        // Fetch Today's Special food items
                        $sqlSpecials = "SELECT * FROM food_items WHERE is_special = 1";
                        $resultSpecials = $conn->query($sqlSpecials);
                      

                    
?>


<section class="table__header">
            <h1>Category Details</h1>
            <a href="create.php" class="create-btn">
        create
       </a>
        </section>
<section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Id </th>
                        <th> Image </th>
                        <th> Category Name </th>
                        <th> Description </th>
                        <th> Action </th>
                  
                    </tr>
                </thead>
                <tbody >
                <?php while ($row = $result->fetch_assoc()): ?>

                    <tr>
                    <td><!-- Display main image -->
            <?php if ($row['image']): ?>
                <img width=100 height=200 src="<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
            <?php endif; ?></td>
            <td><?php echo htmlspecialchars($row['id']); ?></td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['description']); ?></td>
            <td  class="action">

                <a href="edit.php?id=<?php echo $row['id']; ?>" class="status delivered">Edit</a> 
                <a  href="?id=<?php echo $row['id']; ?> "onclick="return confirm('Are you sure you want to delete this food item?');" class="status cancelled">Delete</a>
            </td>
                    </tr>
                    </tr>
                    <?php endwhile; ?>
        
                </tbody>
            </table>
        </section>