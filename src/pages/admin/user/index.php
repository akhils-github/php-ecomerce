<?php
$pageTitle = "User Details";
ob_start(); // Start output buffering
$content = ob_get_clean(); // Get the buffered content
include('../index.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Prepare and execute deletion query
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "Users deleted successfully.>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}


// $sql = "SELECT * FROM users";
$sql = "SELECT id, role, username FROM users WHERE role != 'admin'";
$result = $conn->query($sql);
?>


<section class="table__header">
    <h1>User Details</h1>
    <!-- <a href="create.php" class="create-btn">
        create
       </a> -->
</section>
<section class="table__body">
    <table>
        <thead>

            <tr>
                <th> Id </th>
                <th> Username </th>
                <th> Role </th>
                <th> Actions </th>

            </tr>

        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>

                <tr>

                    <td> <?php echo $row['id']; ?></td>


                    <td> <?php echo $row['username']; ?>
                    <td> <?php echo $row['role']; ?>
                    </td>
                    <td class="action">

                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="status delivered">Edit</a>
                        <a href="?id=<?php echo $row['id']; ?> " onclick="return confirm('Are you sure you want to delete this food item?');" class="status cancelled">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>


        </tbody>
    </table>
</section>