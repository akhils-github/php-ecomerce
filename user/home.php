            <!-- Navbar & Hero End -->
            <div class=" bg-white p-0" style="margin-top: 4.5rem;">
                <div class="position-relative p-0 bg-dark hero-header py-5" style="background-image: url('./assets/images/home/hero-bg.jpg');">

                    <div class="hero-" >
                        <div class="container">
                            <div class="row align-items-center g-5">
                                <div class="col-lg-6 text-center text-lg-start">
                                    <h1 class="display-3 text-white animated slideInLeft">Enjoy Our<br>Delicious Meal</h1>
                                    <p class="text-white animated slideInLeft mb-4 pb-2">Tempor erat elitr rebum at clita. Diam
                                        dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed
                                        stet lorem sit clita duo justo magna dolore erat amet</p>
                                   


                                </div>
                                <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                                    <img class="img-fluid" src="./assets/images/hero.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navbar & Hero End -->

                <!-- Menu Start -->
                <div class="container-xxl py-5" style="margin-top: 3rem;">
                    <div class="container">
                        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
                            <h1 class="mb-5">Most Popular Items</h1>
                        </div>
                        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                            <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                                <?php
                                getMenuCategories()
                                ?>
                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane fade show p-0 active">
                                    <div class="row g-4">
                                        <?php
                                        getMenus();
                                        filterMenuProduct()
                                        ?>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Menu End -->

                <!-- Start Products  -->
                <section class="food_section layout_padding-bottom container-xxl">
                    <div class="container">
                        <div class="heading_container heading_center">
                            <h2>
                                Our Menu
                            </h2>
                        </div>
                        <ul class="filters_menu">
                            <?php
                            getCategories();
                            cart()

                            ?>

                        </ul>
                    </div>
                    <div class="filters-content">
                        <div class="row grid">
                            <?php
                            getProduct(6);
                            getIPAddress();
                            ?>
                        </div>
                        <div class="btn-box">
                            <a href="index.php?products">
                                View More
                            </a>
                        </div>
                    </div>
                </section>
                <!-- end Products  -->


                <!-- Testimonial Start -->
                <div class="container-xxl py-5 wow " data-wow-delay="0.1s">
                    <div class="container">
                        <div class="text-center">
                            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Testimonial</h5>
                            <h1 class="mb-5">Our Clients Say!!!</h1>
                        </div>
                        <div class="owl-carousel testimonial-carousel">
                            <?php
                            getFeedbacks()
                            ?>

                        </div>
                    </div>
                </div>
                <!-- Testimonial End -->

            </div>