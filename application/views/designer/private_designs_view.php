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
                        <h1><?php echo ucfirst($box_title_name); ?> - Diseños</h1>
                        <p>Listando todos tus diseños.</p>
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
                                            <a href="designer/gallery/<?php echo $design->gal_id;?>">
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
