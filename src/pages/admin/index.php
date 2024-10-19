<?php
session_start();
include('../../../config/db.php');


$projectName = basename(dirname(__DIR__, 3)); // Adjusting to go two levels up from the current file's directory
$baseUrl = "/$projectName";
ob_start();
$content = ob_get_clean();

// if (!isset($_SESSION['admin'])) {
//   // Corrected URL construction in header
//   header("Location: " . $adminUrl . "login.php");
//   exit(); // Always call exit() after a redirect to stop further script execution
// }
?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Sidebar Menu | Side Navigation Bar</title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/public/assets/css/adMain.css" />
    <!-- Boxicons CSS -->
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
  </head>
 
  <body>
  <?php
  include($_SERVER['DOCUMENT_ROOT'] . $baseUrl . '/src/components/sidebar.php'); 
  ?>
    <section class="overlay"  >
    <?php echo $content; ?>

    </section>
    

  </body>
</html>