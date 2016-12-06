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
                                <?php if ($galleries_count == 0):?>
                                        <p><?php echo ucfirst($box_title_name);?> no posee ninguna galería.</p>
                                <?php else:?>
                                        <p>Enamórate de estos entretenidos diseños de <?php echo ucfirst($box_title_name);?>.</p>
                                <?php endif;?>
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
