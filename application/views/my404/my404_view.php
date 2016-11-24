<?php echo $page_head; ?>

<body>

  <?php echo $page_navbar; ?>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <?php echo $page_breadcrumb; ?>

                    <div class="row" id="error-page">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="box">

                                <p class="text-center">
                                    <img src="assets/img/logo.png" alt="Whatdafun">
                                </p>

                                <p class="text-center">
                                    <h3>Lo sentimos</h3>
                                </p>

                                <p class="text-center">
                                    <h4>Esta página está en otro rincón del universo :'(</h4>
                                </p>

                                <h4 class="text-muted">Error 404 - Página no Encontrada</h4>
                                <div class='row'>
                                  <div class="col-md-8 col-md-offset-2">
                                      <img src="assets/img/product5.jpg" class="img-circle img-responsive" alt="">
                                  </div>
                                </div>

                                  <p></p>
                                  <p class="text-center">Para continuar, por favor usa la <strong>Barra de búsqueda</strong> o el <strong>Menú</strong> abajo.</p>

                                <p class="buttons"><a href="home" class="btn btn-primary"><i class="fa fa-home"></i> Ir al Inicio</a>
                                </p>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.col-md-9 -->
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
