


<?php
            $username = $_SESSION['username'];
            $get_user_query = "SELECT * FROM `user_table` WHERE username='$username'";
            $get_user_result = mysqli_query($con,$get_user_query);
            $fetch_user = mysqli_fetch_array($get_user_result);
            $user_id = $fetch_user['id'];

        ?>
  
    <div class="landing">
        <div class="container">
            <h1 class="text-center mt-2 mb-5">Payment options</h1>
            <div class="row m-0 align-items-center justify-content-center">
       
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <a href="order.php?user_id=<?php echo $user_id;?>" class="fs-1 fw-bold text-decoration-underline">
                        Pay Cash
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Landing Section -->
