<?php echo $page_head; ?>

<body>

  <?php echo $page_navbar; ?>

  <div id="all">

      <div id="content">
          <div class="container">

              <div class="col-md-12">

                  <?php echo $page_breadcrumb; ?>

              <div class="col-md-3">
                  <!-- *** CUSTOMER MENU ***
  _________________________________________________________ -->
                  <div class="panel panel-default sidebar-menu">

                      <div class="panel-heading">
                          <h3 class="panel-title">Sección de Diseñadores</h3>
                      </div>

                      <div class="panel-body">

                          <ul class="nav nav-pills nav-stacked">
                              <li class="active">
                                  <a href="designer/gallery"><i class="fa fa-film"></i> Mis Galerías</a>
                              </li>
                              <li>
                                  <a href="designer/design"><i class="fa fa-picture-o"></i> Mis Diseños</a>
                              </li>
                              <li>
                                  <a href="designer/sales"><i class="fa fa-money"></i> Mis Ventas</a>
                              </li>
                              <li>
                                  <a href="designer/settings"><i class="fa fa-cogs"></i> Ajustes</a>
                              </li>
                              <li>
                                  <a href="logout"><i class="fa fa-sign-out"></i> Salir</a>
                              </li>
                          </ul>
                      </div>

                  </div>
                  <!-- /.col-md-3 -->

                  <!-- *** CUSTOMER MENU END *** -->
              </div>

              <div class="col-md-9">
                  <div class="box">
                    <h1><?php echo $this->session->name . ' - ' . $gallery->gal_name; ?></h1>
                    <p>Galería de <?php echo $this->session->name;?>.</p>
                  </div>

                  <div class="box info-bar">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 products-showing">
                                Mostrando <strong>1</strong> de <strong>1</strong> galerías
                            </div>

                            <div class="col-sm-12 col-md-8  products-number-sort">
                                <div class="row">
                                    <form class="form-inline">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="products-number">
                                                <strong>Ver</strong>  <a href="#" class="btn btn-default btn-sm btn-primary">6</a>  <a href="#" class="btn btn-default btn-sm">12</a>  <a href="#" class="btn btn-default btn-sm">Todo</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="products-sort-by">
                                                <strong>Ordenar</strong>
                                                <select name="sort-by" class="form-control">
                                                    <option>Recientes</option>
                                                    <option>Más Visitadas</option>
                                                    <option>Con Más Ventas</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
                                              <img src="assets/img/item/<?php echo $design->des_id;?>/<?php echo $design->des_id;?>_tshirt_full_red.jpg" alt="" class="img-responsive">
                                          </a>
                                          <div class="text">
                                              <h3><a href="product/gallery/<?php echo $design->des_id;?>"><?php echo $design->des_name;?></a></h3>
                                              <div class="text">
                                                  <p class="price">$<?php echo $design->des_price-($design->des_price*$design->des_discount_percentage/100);?> <del>$<?php echo $design->des_price;?></del></p>
                                              </div>
                                              <p class="buttons">
                                                  <a href="designer/edit_gallery" class="btn btn-default"><i class="fa fa-edit"></i>Editar</a>
                                                  <a href="designer/delete_gallery" class="btn btn-default"><i class="fa fa-trash-o"></i>Eliminar</a>
                                              </p>
                                          </div>
                                          <!-- /.text -->
                                          <div class="ribbon sale">
                                              <div class="theribbon">- <?php echo $design->des_discount_percentage?>%</div>
                                              <div class="ribbon-background"></div>
                                          </div>
                                          <!-- /.ribbon -->
                                      </div>
                                      <!-- /.product -->
                                  </div>
                                <?php endforeach;?>

                            <?php $pages = floor($designs_count->des_count/6) + fmod($designs_count->des_count,6); ?>
                            <div class="pages">
                              <ul class="pagination">
                                  <?php if (isset($previous_page)):?>
                                      <li><a href="designer/gallery/<?php echo $gallery->gal_id?>/<?php echo $previous_page;?>">&laquo;</a></li>
                                  <?php endif;?>

                                  <?php for ($i=0; $i < $pages; $i++):?>
                                  </li>
                                  <li class="active"><a href="designer/gallery/<?php echo $gallery->gal_id?>/<?php echo $i*6;?>"><?php echo $i+1;?></a>
                                  </li>
                                  <?php endfor;?>

                                <?php if (isset($next_page)):?>
                                  <?php if ($next_page <= floor($designs_count->des_count/6)*6):?>
                                      <li><a href="designer/gallery/<?php echo $gallery->gal_id?>/<?php echo $next_page;?>">&raquo;</a>
                                  <?php endif;?>
                                <?php endif;?>
                              </ul>
                            </div>

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
