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
                        <h1><?php echo ucfirst($box_title_name); ?> - Galería</h1>
                          <?php if ($designs_count > 0):?>
                            <p class="lead">Una galería de
                              <a href="designer/artist/<?php echo $artist->acc_id;?>"><?php echo ucfirst($artist->acc_designer_nickname);?></a>
                            </p>
                          <?php else:?>
                            <p>La galería <?php echo ucfirst($box_title_name);?> no posee diseños.</p>
                          <?php endif;?>
                      </div>

                      <div class="box">
                        <div class="form-group">
                          <div class="row">
                            <?php echo form_open('designer/update_gallery')?>
                            <div class="col-md-6">
                              <label for="gallery_name">Actualizar Nombre</label>
                              <input type="text" name="gallery_name" class="form-control" maxlength="12" required placeholder="Ingresa nuevo nombre">
                            </div>

                            <div class="col-md-6">
                              <label for="gallery_id">Presione para Actualizar</label>
                              <input type="hidden" name="gallery_id" value="<?php echo $gallery->gal_id?>">
                              <button type="submit" class="form-control btn btn-primary"><i class="fa fa-save"></i>Guardar</button>
                            </div>
                            <?php echo form_close();?>
                          </div>
                        </div>
                      </div>



                      <div class="row products">

                                <?php if(isset($designs)):?>

                                  <?php foreach ($designs as $design):?>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="product">
                                            <div class="flip-container">
                                                <div class="flipper">

                                                </div>
                                            </div>
                                            <a href="design/detail/<?php echo $design->des_id;?>">
                                                <img src="uploads/<?php echo $design->des_id;?>_tshirt_full_<?php echo $design->col_name;?>.jpg" alt="" class="img-responsive">
                                            </a>
                                            <div class="text">
                                              <h3><a href="design/detail/<?php echo $design->des_id?>"><?php echo ucwords($design->des_name);?></a></h3>
                                                <div class="row">
                                                  <div class="col-md-12">
                                                    <div class="form-group">
                                                      <?php echo form_open('designer/delete_design')?>
                                                        <input type="hidden" name="gallery" value="<?php echo $design->gal_id?>">
                                                        <button type="submit" name="delete_design" value="<?php echo $design->des_id;?>" class="form-control btn btn-primary"><i class="fa fa-trash-o"></i>Eliminar</button>
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
                                          <h3>Agregar un Diseño</h3>
                                            <div class="row">
                                              <div class="col-md-12">
                                                <div class="form-group">
                                                  <?php echo form_open('designer/add_design')?>
                                                    <button type="submit" name="gallery" value="<?php echo $gallery->gal_id;?>" class="form-control btn btn-primary"><i class="fa fa-plus"></i>Agregar un Diseño</button>
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
