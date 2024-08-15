<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="./assets/images/users/images/favicon.png" type="">

  <title><?php echo isset($pageTitle) ? $pageTitle : 'Default Title'; ?></title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="./assets/css/users/bootstrap.css" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="./assets/css/users/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="./assets/css/users/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="./assets/css/users/responsive.css" rel="stylesheet" />

</head>
<body>


    <main>
        <!-- Content will be included here -->
        <?php echo isset($content) ? $content : '';
        // config/config.php

         ?>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'Default Title'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


    <main>
        <!-- Content will be included here -->
        <?php echo isset($content) ? $content : ''; ?>
    </main>



</body>
</html>