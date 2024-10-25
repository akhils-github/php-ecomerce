<!-- Testimonial Start -->
<!-- Contact Start -->
<?php
if (isset($_POST['insert_feedback'])) {
    $username = $_POST['username'];
    $message = $_POST['message'];
    if ($username == '' || $message == '') {
        echo "<script>alert(\"Fields should not be empty\");</script>";
        exit();
    } else {
        $insert_query = "INSERT INTO `feedback` (username,message) VALUES ('$username','$message')";
        $insert_result = mysqli_query($con, $insert_query);
        if ($insert_result) {
            echo "<script>alert(\"Feedback added Successfully\");</script>";
        }
    }
}

?>

<div class="container-xxl py-5" style="margin-top: 5rem;">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">E Us</h5>
            <h1 class="mb-5">Feedbacks</h1>
        </div>
        <div class="row g-4">

            <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                <img class="position-relative rounded w-100 h-100"
                    src="assets/images/bg-hero.jpg"
                    style="min-height: 350px; border:0;" aria-hidden="false"
                    tabindex="0"></img>
            </div>
            <div class="col-md-6">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <form action="" method="post">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="username" class="form-control" id="username" placeholder="Your Name">
                                    <label for="username">Your Name</label>
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" name="message" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <input value="Submit Feedback" name="insert_feedback" class="btn btn-primary w-100 py-3" type="submit" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

<div class="container-xxl py-5 wow " data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Testimonial</h5>
            <h1 class="mb-5">Our Clients Say!!!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">
            <?php
            getFeedbacks(1)
            ?>

        </div>
    </div>
</div>
<!-- Testimonial End -->