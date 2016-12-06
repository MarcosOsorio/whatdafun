<?php echo $page_head; ?>

<body>

  <?php echo $page_navbar; ?>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                      <?php echo $page_breadcrumb; ?>
                </div>

                <?php echo $page_menu; ?>


                <div class="col-md-9">

                  <?php echo form_open('design/add_to_cart');?>
                    <div class="row" id="productMain">
                        <div class="col-sm-8">
                            <div id="mainImage">
                                <?php if(isset($thumb_colour)):?>
                                <img id="main_thumbnail" src="<?php echo $thumb_colour->file?>" alt="" class="img-responsive">
                                <?php endif;?>
                            </div>

                          </br>
                            <div class="col-md-6">
                              <button id="full_view"   type="button" value="full" class="btn btn-primary"><i class="fa fa-eye"></i> Zoom</button>
                            </div>
                            <div class="col-md-6">
                              <button id="front_view"  type="button" value="front" class="btn btn-primary"><i class="fa fa-eye"></i> Frente</button>
                            </div>

                              <?php if(isset($thumb_colour)):?>
                              <input type="hidden" id="selected_id"           name="selected_id"           value="<?php echo $product_id;?>">
                              <input type="hidden" id="selected_type"         name="selected_type"         value="<?php echo $thumb_type;?>">
                              <input type="hidden" id="selected_size"         name="selected_size"         value="<?php echo $thumb_size;?>">
                              <input type="hidden" id="selected_cloth_size"   name="selected_cloth_size"   value="<?php echo $thumb_cloth_size;?>">
                              <input type="hidden" id="selected_gender"       name="selected_gender"       value="<?php echo $thumb_gender;?>">
                              <input type="hidden" id="selected_colour"       name="selected_colour"       value="<?php echo $thumb_colour->colour;?>">
                              <input type="hidden" id="selected_colour_id"    name="selected_colour_id"    value="1">
                              <input type="hidden" id="selected_design_name"  name="selected_design_name"  value="<?php echo $product_info->des_name;?>">
                              <?php endif;?>

                        </div>


                        <div class="col-md-4">
                            <div class="box">
                                <h1 class="text-center"><?php echo ucwords($product_info->des_name);?></h1>
                                </p>

                                <div class="color-chooser">
                                  <h4 class="text-center">Escoge un color </h4>
                                        <div id="colour_spans" class="form-group">
                                          <?php if(isset($thumbnails)):?>
                                            <?php foreach ($thumbnails as $thumbnail):?>
                                              <a href="<?php echo $thumbnail->file;?>" class="thumb">
                                                  <span id="<?php echo $thumbnail->colour;?>" class="colour <?php echo $thumbnail->colour;?>"></span>
                                              </a>
                                            <?php endforeach;?>
                                          <?php endif;?>
                                        </div>
                                    <div class="col-md-12 col-xs-12">
                                      <div class="form-group">
                                        <label for="gender_view">Género</label>
                                        <select name="gender_view" id="gender_view" class="form-control">
                                            <option value="male"    <?php if($thumb_gender == 'male'):?>    selected <?php endif;?>>Hombre</option>
                                            <option value="female"  <?php if($thumb_gender == 'female'):?>  selected <?php endif;?>>Mujer</option>
                                        </select>
                                      </div>
                                    </div>

                                </div>

                                <div class="col-md-12 col-xs-12">
                                  <div class="form-group">
                                    <label for="gender_view">Talla</label>
                                    <select name="cloth_size_view" id="cloth_size_view" class="form-control">
                                      <option value="s"   <?php if($thumb_cloth_size == 's'):?>   selected <?php endif;?>>S</option>
                                      <option value="m"   <?php if($thumb_cloth_size == 'm'):?>   selected <?php endif;?>>M</option>
                                      <option value="l"   <?php if($thumb_cloth_size == 'l'):?>   selected <?php endif;?>>L</option>
                                      <option value="xl"  <?php if($thumb_cloth_size == 'xl'):?>  selected <?php endif;?>>XL</option>
                                      <option value="xxl" <?php if($thumb_cloth_size == 'xxl'):?> selected <?php endif;?>>XXL</option>
                                    </select>
                                  </div>
                                </div>

                                <?php if ($product_info->des_discount_percentage > 0):?>
                                  <p class="price">
                                    <del>$<?php echo number_format($product_info->des_price,0,',','.');?></del>
                                    <br/>
                                     $<?php echo number_format($product_info->des_price-($product_info->des_price*$product_info->des_discount_percentage/100),0,',','.');?>
                                   </p>
                                <?php else:?>
                                  <p class="price">$<?php echo number_format($product_info->des_price,0,',','.');?></p>
                                <?php endif;?>
                                <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                  <p class="text-center buttons">
                                      <button type="submit" class="form-control btn btn-primary"><i class="fa fa-shopping-cart"></i> Añadir al carrito</button>
                                      <?php echo form_close();?>
                                      <?php echo form_open('design/add_to_wishlist');?>
                                      <input type="hidden" id="selected_id"           name="selected_id"           value="<?php echo $product_id;?>">
                                      <button type="submit" class="form-control btn btn-default"><i class="fa fa-heart"></i> Lista de deseos</button>
                                      <?php echo form_close();?>
                                  </p>
                                  </div>
                                </div>
                              </div>

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
                            <h4>Diseño</h4>
                            <ul>
                                <li>Galería : <a target="_blank" href="designer/gallery/<?php echo $product_info->gal_id;?>"><?php echo ucwords($product_info->gal_name);?></a></li>
                                <li>Autor &nbsp;&nbsp;&nbsp;: <a href="designer/artist/<?php echo $product_info->acc_id;?>" target="_blank"><?php echo ucwords($product_info->acc_designer_nickname);?></a></li>
                            </ul>
                            <blockquote>
                                <p><em>Sorprende a tus amigos con este entretenido diseño. ¡Sube al nuevo nivel!</em>
                                </p>
                            </blockquote>

                            <hr>
                            <div class="social">
                                <h4>¡Muéstraselo a tus amigos!</h4>
                                <p>
                                    <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                                </p>
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
