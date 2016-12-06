<?php echo $page_head; ?>
<body>
<?php echo $page_navbar; ?>
<div id="all">

        <div id="content">

            <div class="container">
                <div class="col-md-12">
                    <div id="main-slider">
                        <div class="item">
                            <img src="assets/img/main-slider1.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="assets/img/main-slider2.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="assets/img/main-slider3.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="assets/img/main-slider4.jpg" alt="">
                        </div>
                    </div>
                    <!-- /#main-slider -->
                </div>
            </div>


            <!-- /#advantages -->

            <!-- *** ADVANTAGES END *** -->

            <!-- *** HOT PRODUCT SLIDESHOW ***
 _________________________________________________________ -->
            <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Populares</h2>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="product-slider">

                      <?php if(isset($top_basket)):?>
                      <?php foreach ($top_basket as $design):?>
                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="design/detail/<?php echo $design->des_id;?>">
                                                <img src="uploads/<?php echo $design->des_id;?>_tshirt_full_<?php echo $design->col_name;?>.jpg" alt="<?php echo $design->des_name?>" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="design/detail/<?php echo $design->des_id;?>">
                                                <img src="uploads/<?php echo $design->des_id;?>_tshirt_front_male_<?php echo $design->col_name;?>.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="design/detail/<?php echo $design->des_id;?>" class="invisible">
                                    <img src="assets/img/product1.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="design/detail/<?php echo $design->des_id;?>"><?php echo ucwords($design->des_name);?></a></h3>
                                    <?php if ($design->des_discount_percentage > 0):?>
                                      <p class="price">
                                        <del>$<?php echo number_format($design->des_price,0,',','.');?></del>
                                         $<?php echo number_format($design->des_price-($design->des_price*$design->des_discount_percentage/100),0,',','.');?></p>
                                    <?php else:?>
                                      <p class="price">$<?php echo number_format($design->des_price,0,',','.');?></p>
                                    <?php endif;?>

                                </div>
                                <!-- /.text -->
                                <div class="ribbon new">
                                    <div class="theribbon">Nuevo</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <?php if ($design->des_discount_percentage > 0):?>
                                  <div class="ribbon sale">
                                    <div class="theribbon">- <?php echo $design->des_discount_percentage?>%</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <?php endif;?>

                            </div>
                            <!-- /.product -->
                        </div>
                      <?php endforeach;?>
                    <?php endif;?>

                    </div>
                    <!-- /.product-slider -->





                    <div class="box">
                        <div class="container">
                            <div class="col-md-12">
                                <h2>Más Comprados</h2>
                            </div>
                        </div>
                    </div>

                    <div class="product-slider">

                      <?php if(isset($top_purchased)):?>
                      <?php foreach ($top_purchased as $design):?>
                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="design/detail/<?php echo $design->des_id;?>">
                                                <img src="uploads/<?php echo $design->des_id;?>_tshirt_full_<?php echo $design->col_name;?>.jpg" alt="<?php echo $design->des_name?>" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="design/detail/<?php echo $design->des_id;?>">
                                                <img src="uploads/<?php echo $design->des_id;?>_tshirt_front_male_<?php echo $design->col_name;?>.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="design/detail/<?php echo $design->des_id;?>" class="invisible">
                                    <img src="assets/img/product1.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="design/detail/<?php echo $design->des_id;?>"><?php echo ucwords($design->des_name);?></a></h3>
                                    <?php if ($design->des_discount_percentage > 0):?>
                                      <p class="price">
                                        <del>$<?php echo number_format($design->des_price,0,',','.');?></del>
                                         $<?php echo number_format($design->des_price-($design->des_price*$design->des_discount_percentage/100),0,',','.');?></p>
                                    <?php else:?>
                                      <p class="price">$<?php echo number_format($design->des_price,0,',','.');?></p>
                                    <?php endif;?>

                                </div>
                                <!-- /.text -->
                                <div class="ribbon new">
                                    <div class="theribbon">Nuevo</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <?php if ($design->des_discount_percentage > 0):?>
                                  <div class="ribbon sale">
                                    <div class="theribbon">- <?php echo $design->des_discount_percentage?>%</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <?php endif;?>

                            </div>
                            <!-- /.product -->
                        </div>
                      <?php endforeach;?>
                    <?php endif;?>

                    </div>
                    <!-- /.product-slider -->






                </div>
                <!-- /.container -->

            </div>
            <!-- /#hot -->

            <!-- *** HOT END *** -->



        </div>
        <!-- /#content -->
        <?php echo $page_footer; ?>
      </div>
      <!-- /#all -->
      <?php echo $page_scripts; ?>
  </body>
  </html>
