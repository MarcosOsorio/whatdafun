<?php echo $page_head; ?>
<body>
  <?php echo $page_navbar; ?>
    <div id="all">
            <div id="content">
                <div class="container">
                    <div class="col-md-12">
                          <?php echo $page_breadcrumb; ?>
                    </div>
                      <?php echo $page_menu;?>

                    <div class="col-md-9">
                      <div class="box">
                        <h1><?php echo ucfirst($box_title_name); ?> - Galerías</h1>
                        <p>Agrega atractivas galerías para agrupar tus diseños y productos.</p>
                      </div>

                      <div class="row products">

                                <?php if(isset($galleries)):?>

                                  <?php foreach ($galleries as $gallery):?>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="product">
                                            <div class="flip-container">
                                                <div class="flipper">

                                                </div>
                                            </div>
                                            <a href="designer/gallery/<?php echo $gallery->gal_id;?>">
                                                <img src="uploads/<?php echo $gallery->des_id;?>_tshirt_full_<?php echo $gallery->col_name;?>.jpg" alt="" class="img-responsive">
                                            </a>
                                            <div class="text">
                                              <h3><a href="designer/gallery/<?php echo $gallery->gal_id?>"><?php echo ucwords($gallery->gal_name);?></a></h3>
                                                <div class="row">
                                                  <div class="col-md-12">
                                                    <div class="form-group">
                                                      <?php echo form_open('designer/delete_gallery')?>
                                                        <button type="submit" name="delete_gallery" value="<?php echo $gallery->gal_id;?>" class="form-control btn btn-primary"><i class="fa fa-trash-o"></i>Eliminar</button>
                                                      <?php echo form_close();?>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            <!-- /.text -->
                                        </div>
                                        <!-- /.product -->
                                    </div>
                                  <?php endforeach;?>

                                <?php endif;?>

                                <?php if(isset($empty_galleries)):?>

                                  <?php foreach ($empty_galleries as $gallery):?>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="product">
                                            <div class="flip-container">
                                                <div class="flipper">

                                                </div>
                                            </div>
                                            <a href="designer/gallery/<?php echo $gallery->gal_id;?>">
                                                <img src="assets/img/empty_gallery.jpg" alt="Galería Vacía" class="img-responsive">
                                            </a>
                                            <div class="text">
                                                <h3><a href="designer/gallery/<?php echo $gallery->gal_id?>"><?php echo ucwords($gallery->gal_name);?></a></h3>
                                                <div class="row">
                                                  <div class="col-md-12">
                                                    <div class="form-group">
                                                      <?php echo form_open('designer/delete_gallery')?>
                                                        <button type="submit" name="delete_gallery" value="<?php echo $gallery->gal_id;?>" class="form-control btn btn-primary"><i class="fa fa-trash-o"></i>Eliminar</button>
                                                      <?php echo form_close();?>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            <!-- /.text -->
                                        </div>
                                        <!-- /.product -->
                                    </div>
                                  <?php endforeach;?>

                                <?php endif;?>

                                <div class="col-md-4 col-sm-6">
                                    <div class="product">
                                        <div class="flip-container">
                                            <div class="flipper">

                                            </div>
                                        </div>
                                            <img src="assets/img/add_item.png" alt="Agregar Diseño" class="img-responsive">
                                        <div class="text">
                                          <h3>Crear una Galería</h3>
                                            <div class="row">
                                              <div class="col-md-12">
                                                <div class="form-group">
                                                  <?php echo form_open('designer/create_gallery')?>
                                                    <button type="submit" name="create_gallery" value="<?php echo $artist->acc_id;?>" class="form-control btn btn-primary"><i class="fa fa-plus"></i>Crear una Galería</button>
                                                  <?php echo form_close();?>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        <!-- /.text -->
                                    </div>
                                    <!-- /.product -->
                                </div>
                            </div>
                            <!-- /.products -->




                    </div>
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
