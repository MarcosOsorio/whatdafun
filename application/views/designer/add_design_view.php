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
                        <h1><?php echo ucfirst($gallery->gal_name); ?> - Galería</h1>
                            <p>Agrega diseños en tu galería
                            </p>
                      </div>

                      <div class="box">
                        <h2>Subir diseño</h2>
                          <div class="row">
                            <div class="col-md-6">
                              <?php if(isset($errors)):?>
                                <?php echo '<div class="alert alert-warning" role="alert">' .$errors['error'].'</div>'; ?>
                                <?php unset($this->session->errors) ;?>
                              <?php endif;?>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <?php echo form_open_multipart('designer/save_design');?>
                              <input type="file" id="imgInp" name="userfile" required size="20" />
                              <input type="hidden" name="gallery_id" value="<?php echo $gallery->gal_id;?>">
                            </div>
                          </div>
                          <div class="row">
                            <img id="preview" class="img-responsive center-block invisible" src="#" alt="your image" />
                          </div>
                          <div class="row">
                            <div class="col-md-3 col-sm-12">
                              <input class="form-control" type="text" placeholder="nombre diseño" required name="design_name">
                            </div>
                            <div class="col-md-3 col-sm-12">
                              <select class="form-control" type="text" name="design_color" required>
                                <option value="1">blanco</option>
                                <option value="2">rojo</option>
                                <option value="3">negro</option>
                                <option value="4">gris</option>
                                <option value="5">amarillo</option>
                              </select>
                              
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <button type="submit" class="form-control btn btn-primary" /><i class="fa fa-plus"></i>Confirmar</button>
                              <?php echo form_close();?>
                            </div>
                          </div>

                      </div>


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
