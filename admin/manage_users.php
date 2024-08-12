<?php
$pageTitle = "User Details";
ob_start(); // Start output buffering
$content = ob_get_clean(); // Get the buffered content
include('../index.php'); 


session_start();
include('../config/db.php');

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
}


// $sql = "SELECT * FROM users";
$sql = "SELECT id, username FROM users WHERE role != 'admin'";
$result = $conn->query($sql);
?>
<div class="p-5">
<div class="mx-auto text-center mb-5" style="width: 100%;">
<h5 class="card-title h3">User Details</h5>

</div>
<table class="table align-middle mb-0 bg-white w-75">
  <thead class="bg-light">
    <tr>
      <th>Id</th>
      <th>Username</th>
        <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
      <td>

       <?php echo $row['id']; ?>
      </td>
      <td>
        <p class="fw-normal mb-1"><?php echo $row['username']; ?></p>
      </td>
   
      <td>
        <button type="button" class="btn btn-warning btn-sm btn-rounded">
          Edit
        </button>
        <button type="button" class="btn btn-danger btn-sm btn-rounded">
          Delete
        </button>
      </td>
    </tr>
    <?php } ?>
 
  </tbody>
</table>
</div>