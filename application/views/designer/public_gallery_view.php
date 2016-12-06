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
                                        <p>Una galería de
                                          <a href="designer/artist/<?php echo $artist->acc_id;?>"><?php echo ucfirst($artist->acc_designer_nickname);?>.
                                        </p>
                                <?php else:?>
                                        <p>La galería <?php echo ucfirst($box_title_name);?> no posee diseños.</p>
                                <?php endif;?>
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
                                                <h3><a href="designer/gallery/<?php echo $design->gal_id?>"><?php echo $design->des_name;?></a></h3>
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
