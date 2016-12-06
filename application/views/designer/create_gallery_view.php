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
                        <h1>Crear Galería</h1>
                          <p>¡Reúne todos tus diseños en atractivas galerías!</p>
                      </div>

                      <?echo form_open('designer/save_gallery');?>
                      <div class="box">
                        <div class="row">
                          <div class="form-group">
                            <div class="col-md-6">
                              <label for="gallery_name">Nombre Galería</label>
                              <input type="text" class="form-control" name="gallery_name" id="gallery_name" placeholder="nombre galería">                            
                            </div>
                            <div class="col-md-6">
                              <label for="save_gallery">Crear Galería</label>
                               <button type="submit" class="form-control btn btn-primary"><i class="fa fa-save"></i> Crear Galería</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php echo form_close();?>

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
