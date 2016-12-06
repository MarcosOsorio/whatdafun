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
                          <p class="lead"><?php echo ucfirst($box_title_name); ?> - Ajustes</p>
                          <br/>
                          <div class="row">
                            <?php echo form_open('designer/update_nickname');?>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="update_nickname">Nickname Diseñador</label>
                              <input type="text" name="update_nickname" class="form-control" required maxlength="12">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="save_nickname">Presiona para guardar</label>
                              <button type="submit" class="form-control btn btn-primary" ><i class="fa fa-save"></i>Guardar</button>
                            </div>
                          </div>
                          <?php echo form_close();?>
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
