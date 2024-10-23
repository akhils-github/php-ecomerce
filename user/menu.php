<!-- Menu Start -->
<div class="container-xxl py-5" style="margin-top: 3rem;">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
            <h1 class="mb-5">Most Popular Items</h1>
        </div>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
            <ul class="nav nav-pills d-inline-flex justify-content-center  mb-5">
                <?php
                getMenuCategories()
                ?>
            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <?php
                        getMenus();
                        filterMenuProduct();
                        ?>

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- Menu End -->