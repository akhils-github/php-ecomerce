<?php
$pageTitle = "Product Create";
ob_start(); // Start output buffering
$content = ob_get_clean(); // Get the buffered content
include('../../common/sidebar.php');
session_start();
include('../../config/db.php');
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
}
$id = $_GET['id'];
if($id ){
      
         // Prepare and execute deletion query
         $stmt = $conn->prepare("DELETE FROM categories WHERE id = ?");
         $stmt->bind_param("i", $id);
     
         if ($stmt->execute()) {
             echo "categories deleted successfully";
         } else {
             echo "Error: " . $stmt->error;
         }
     
         $stmt->close();
     } else {
         echo "categories not found.";
    }
// Fetch food items
$result = $conn->query("SELECT *
                        FROM categories
                        ");
?>


<section class="table__header">
            <h1>Customer's Orders</h1>
       <div class="create-btn">
        create
       </div>
        </section>
<section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Id </th>
                        <th> Category Name </th>
                        <th> Description </th>
                        <th> Action </th>
                  
                    </tr>
                </thead>
                <tbody >
                <?php while ($row = $result->fetch_assoc()): ?>

                    <tr>
                    
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