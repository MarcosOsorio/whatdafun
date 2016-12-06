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

                                <?php if(isset($wishlist)):?>
                                  <div class="col-md-9">
                                    <div class="row products">
                                  <?php foreach ($wishlist as $wish):?>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="product">
                                            <div class="flip-container">
                                                <div class="flipper">

                                                </div>
                                            </div>
                                            <a href="design/detail/<?php echo $wish->des_id;?>">
                                                <img src="uploads/<?php echo $wish->des_id;?>_tshirt_full_<?php echo $wish->col_name;?>.jpg" alt="" class="img-responsive">
                                            </a>
                                            <div class="text">
                                                <h3><a href="design/detail/<?php echo $wish->des_id?>"><?php echo $wish->des_name;?></a></h3>

                                                <p class="buttons">
                                                  <?php echo form_open('design/remove_from_wishlist')?>
                                                    <button type="submit" name="delete_wish" value="<?php echo $wish->wis_id;?>" class="form-control btn btn-primary"><i class="fa fa-trash-o"></i>Eliminar</button>
                                                  <?php echo form_close();?>
                                                </p>
                                            </div>
                                            <!-- /.text -->
                                        </div>
                                        <!-- /.product -->
                                    </div>
                                  <?php endforeach;?>
                                  </div>
                                </div>
                                <?php else:?>
                                    <div class="col-md-9">
                                      <div class="box">
                                        <h1>Lista de Deseos</h1>
                                        <p>¡Agrega aquí todas esas cosas que te encantan!</p>
                                      </div>
                                    </div>
                                <?php endif;?>

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
