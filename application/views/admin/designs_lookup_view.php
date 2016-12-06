<?php echo $page_head; ?>
<body>
  <?php echo $page_navbar; ?>
    <div id="all">
            <div id="content">
                <div class="container">
                    <div class="col-md-12">
                          <?php echo $page_breadcrumb; ?>
                    </div>
                    <?php echo $page_admin_menu;?>

                    <div class="col-md-9">
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
                                                    <p>En Galería <a href="designer/gallery/<?php echo $design->gal_id;?>"><?php echo ucwords($design->gal_name);?><p></a>
                                                      <p>Por Diseñador <a href="designer/artist/<?php echo $design->acc_id;?>"><?php echo ucwords($design->acc_designer_nickname);?><p></a>
                                                        <p>En la Fecha <?php echo date('d-m-Y',strtotime($design->des_date));?><p>
                                                    <?php if($design->des_approved == 0):?>
                                                    <?php echo form_open('admin/enable_design')?>
                                                      <button type="submit" name="enable_design" value="<?php echo $design->des_id;?>" class="form-control btn btn-primary"><i class="fa fa-check"></i>Activar</button>
                                                    <?php echo form_close();?>
                                                  <?php else:?>
                                                    <?php echo form_open('admin/disable_design')?>
                                                      <button type="submit" name="disable_design" value="<?php echo $design->des_id;?>" class="form-control btn btn-primary"><i class="fa fa-ban"></i>Desactivar</button>
                                                    <?php echo form_close();?>
                                                  <?php endif;?>
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
