           <!-- Start All Prodcuts  -->
           <section class="food_section  layout_padding-bottom " style="margin-top: 6rem;">
               <div class="container">
                   <div class="heading_container heading_center">
                       <h2>
                           Our Menu
                       </h2>
                   </div>

                   <ul class="filters_menu">
                       <?php
                        getCategories();

                        ?>

                   </ul>

                   <div class="filters-content">
                       <div class="row grid">
                           <?php
                            getProduct();
                            filterCategoryProduct();
                            cart()
                            ?>

                       </div>
                   </div>
               </div>
           </section>
           <!-- Start All Prodcuts  -->