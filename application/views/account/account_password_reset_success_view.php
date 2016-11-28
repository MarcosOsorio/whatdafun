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
                                    <h3>Tu contraseña ha sido reestablecida</h3>
                                </p>

                                <p class="text-center">
                                    <h4>Vuelve a ingresar con tu nueva contraseña</h4>
                                </p>

                                <div class='row'>
                                  <div class="col-md-8 col-md-offset-2">
                                      <img src="assets/img/product2.jpg" class="img-circle img-responsive" alt="">
                                  </div>
                                </div>

                                  <p></p>
                                  <p class="text-center">Serás redirigido en <strong>10</strong> segundos...</p>

                                <p class="buttons"><a href="login" class="btn btn-primary"><i class="fa fa-user"></i> Ir al Login</a>
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
