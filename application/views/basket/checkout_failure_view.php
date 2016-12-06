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
                                    <h3>¡Lo Sentimos!</h3>
                                </p>
                                <p class="text-center">
                                    <h4>Tu pedido no ha podido ser procesado</h4>
                                </p>
                                <h4 class="text-muted">Revisa tus detalles de <a href="basket/">Pago</a> en el carro de compras.</h4>
                                <div class='row'>
                                  <div class="col-md-8 col-md-offset-2">
                                      <img src="assets/img/product5.jpg" class="img-circle img-responsive" alt="">
                                  </div>
                                </div>
                                  <p></p>
                                <p class="buttons"><a href="home" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Revisar Mi Carro</a>
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
