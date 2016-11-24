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
                                  <a href="designer/designs"><i class="fa fa-picture-o"></i> Mis Diseños</a>
                              </li>
                              <li>
                                  <a href="designer/products"><i class="fa fa-th"></i> Mis Productos</a>
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
                    <h1><?php echo $this->session->name; ?> - Galerías</h1>
                    <p>Agrega atractivas galerías para agrupar tus diseños y productos.</p>
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
                                                <strong>Ver</strong>  <a href="#" class="btn btn-default btn-sm btn-primary">12</a>  <a href="#" class="btn btn-default btn-sm">24</a>  <a href="#" class="btn btn-default btn-sm">Todo</a>
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

                              <?php if(isset($galleries)):?>

                                <?php foreach ($galleries as $gallery):?>
                                  <div class="col-md-4 col-sm-6">
                                      <div class="product">
                                          <div class="flip-container">
                                              <div class="flipper">

                                              </div>
                                          </div>
                                          <a href="designer/gallery/<?php echo $gallery->gal_id?>" class="invisible">
                                              <img src="assets/img/product1.jpg" alt="" class="img-responsive">
                                          </a>
                                          <div class="text">
                                              <h3><a href="designer/gallery/<?php echo $gallery->gal_id?>"><?php echo $gallery->gal_name;?></a></h3>
                                              <p class="buttons">
                                                  <a href="designer/edit_gallery" class="btn btn-default"><i class="fa fa-edit"></i>Editar</a>
                                                  <a href="designer/delete_gallery" class="btn btn-default"><i class="fa fa-trash-o"></i>Eliminar</a>
                                              </p>
                                          </div>
                                          <!-- /.text -->
                                      </div>
                                      <!-- /.product -->
                                  </div>
                                <?php endforeach;?>

                              <?php endif;?>
                          </div>
                          <!-- /.products -->

                          <div class="pages">

                        <p class="loadMore">
                            <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Cargar Más</a>
                        </p>

                        <ul class="pagination">
                            <li><a href="#">&laquo;</a>
                            </li>
                            <li class="active"><a href="#">1</a>
                            </li>
                            <li><a href="#">2</a>
                            </li>
                            <li><a href="#">&raquo;</a>
                            </li>
                        </ul>
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
