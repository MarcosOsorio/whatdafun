<?php echo $page_head; ?>

<body>

  <?php echo $page_navbar; ?>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Inicio</a>
                        </li>
                        <li><a href="#">Poleras</a>
                        </li>
                        <li>Tres Corazones</li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Categorías</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <li class="active">
                                    <a href="category.php">Poleras <span class="badge pull-right">42</span></a>
                                    <ul>
                                        <li><a href="category.php">Anime</a>
                                        </li>
                                        <li><a href="category.php">Cine</a>
                                        </li>
                                        <li><a href="category.php">Cómics</a>
                                        </li>
                                        <li><a href="category.php">Videojuegos</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="category.php">Polerones  <span class="badge pull-right">30</span></a>
                                    <ul>
                                        <li><a href="category.php">Anime</a>
                                        </li>
                                        <li><a href="category.php">Cine</a>
                                        </li>
                                        <li><a href="category.php">Cómics</a>
                                        </li>
                                        <li><a href="category.php">Videojuegos</a>
                                        </li>
                                    </ul>
                                </li>


                            </ul>

                        </div>
                    </div>

                    <!-- *** MENUS AND FILTERS END *** -->

                    <div class="banner">
                        <a href="#">
                            <img src="img/banner.jpg" alt="sales 2014" class="img-responsive">
                        </a>
                    </div>
                    <div class="banner">
                        <a href="#">
                            <img src="img/banner2.jpg" alt="sales 2014" class="img-responsive">
                        </a>
                    </div>
                </div>

                <div class="col-md-9">

                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                                <?php if(isset($thumb_colour)):?>
                                <img src="<?php echo $thumb_colour->file?>" alt="" class="img-responsive">
                                <?php endif;?>
                            </div>

                            <div class="ribbon sale">
                                <div class="theribbon">Nuevo</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                            <div class="ribbon new">
                                <div class="theribbon">Descuento</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->
                          </br>
                            <div class="col-md-6">
                              <button id="full_view"   type="button" value="product/detail/<?php echo $product_id;?>/<?php echo $thumb_type;?>/full/<?php echo $thumb_gender;?>/"    class="btn btn-primary"><i class="fa fa-eye"></i> Zoom</button>
                            </div>
                            <div class="col-md-6">
                              <button id="front_view"  type="button" value="product/detail/<?php echo $product_id;?>/<?php echo $thumb_type;?>/front/<?php echo $thumb_gender;?>/"   class="btn btn-primary"><i class="fa fa-eye"></i> Frente</button>
                            </div>

                              <?php if(isset($thumb_colour)):?>
                                <input type="hidden" id="selected_type"   value="<?php echo $thumb_type;?>">
                                <input type="hidden" id="selected_size"   value="<?php echo $thumb_size;?>">
                                <input type="hidden" id="selected_gender" value="<?php echo $thumb_gender;?>">
                                <input type="hidden" id="selected_colour" value="<?php echo $thumb_colour->colour;?>">
                              <?php endif;?>

                        </div>


                        <div class="col-sm-6">
                            <div class="box">
                                <h1 class="text-center">Tres Corazones</h1>
                                <p class="goToDescription"><a href="#details" class="scroll-to">Revisar detalles de artículo</a>
                                </p>

                                <div class="color-chooser">
                                  <h3 class="text-center">Color </h3>
                                    <form>
                                        <div id="colour_spans" class="form-group">

                                                    <?php if(isset($thumbnails)):?>
                                                      <?php foreach ($thumbnails as $thumbnail):?>
                                                        <a href="<?php echo $thumbnail->file;?>" class="thumb">
                                                            <span class="colour <?php echo $thumbnail->colour;?>"></span>
                                                        </a>
                                                      <?php endforeach;?>
                                                  <?php endif;?>
                                        </div>
                                    </form>

                                    <div class="col-md-6 col-xs-6">
                                      <h3>Género </h3>
                                      <select id="gender_view">
                                          <option value="male">Hombre</option>
                                          <option value="female">Mujer</option>
                                      </select>
                                    </div>

                                </div>

                                <div class="col-md-6 col-xs-6">
                                  <h3>Talla </h3>
                                  <select>
                                      <option value="s">S</option>
                                      <option value="m">M</option>
                                      <option value="l">L</option>
                                      <option value="xl">XL</option>
                                      <option value="xxl">XXL</option>

                                  </select>
                                </div>
                                <p class="price">$11.000</p>

                                <p class="text-center buttons">
                                    <a href="basket.php" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Añadir al carrito</a>
                                    <a href="basket.php" class="btn btn-default"><i class="fa fa-heart"></i> Añadir a tu lista de deseos</a>
                                </p>







                            </div>



                            <div class="row" id="thumbs">

                            </div>
                        </div>

                    </div>


                    <div class="box" id="details">
                        <p>
                            <h4>Detalles de Artículo</h4>
                            <p>Polera sin cuello y de manga corta</p>
                            <h4>Material y cuidado</h4>
                            <ul>
                                <li>100% algodón </li>
                                <li>Lavable en lavadora</li>
                            </ul>
                            <h4>Talla</h4>
                            <ul>
                                <li>Talla L</li>

                            </ul>

                            <blockquote>
                                <p><em>Sorprende a tus amigos con este entretenido diseño. ¡Sube al nuevo nivel!</em>
                                </p>
                            </blockquote>

                            <hr>
                            <div class="social">
                                <h4>Show it to your friends</h4>
                                <p>
                                    <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                                </p>
                            </div>
                    </div>

                    <div class="row same-height-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="box same-height">
                                <h3>Otros diseños de Autor</h3>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php">
                                                <img src="img/product2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.php">
                                                <img src="img/product2_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.php" class="invisible">
                                    <img src="img/product2.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php">
                                                <img src="img/product1.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.php">
                                                <img src="img/product1_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.php" class="invisible">
                                    <img src="img/product1.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>


                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php">
                                                <img src="img/product3.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.php">
                                                <img src="img/product3_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.php" class="invisible">
                                    <img src="img/product3.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>

                                </div>
                            </div>
                            <!-- /.product -->
                        </div>

                    </div>

                    <div class="row same-height-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="box same-height">
                                <h3>Tendencia en WhatDaFun!</h3>
                            </div>
                        </div>


                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php">
                                                <img src="img/product2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.php">
                                                <img src="img/product2_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.php" class="invisible">
                                    <img src="img/product2.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php">
                                                <img src="img/product1.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.php">
                                                <img src="img/product1_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.php" class="invisible">
                                    <img src="img/product1.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>


                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php">
                                                <img src="img/product3.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.php">
                                                <img src="img/product3_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.php" class="invisible">
                                    <img src="img/product3.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>

                                </div>
                            </div>
                            <!-- /.product -->
                        </div>

                    </div>

                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <?php echo $page_footer; ?>

      </div>
      <!-- /#all -->

      <?php echo $page_scripts; ?>

  </body>

  </html>
