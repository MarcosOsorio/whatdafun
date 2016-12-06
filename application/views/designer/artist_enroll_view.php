<?php echo $page_head; ?>
<body>
  <?php echo $page_navbar; ?>
    <div id="all">
            <div id="content">




                <div class="container">
                    <div class="col-md-12">
                          <?php echo $page_breadcrumb; ?>
                    </div>

                    <div class="col-md-9" id="customer-order">

                    </div>
                </div>


                <div class="container">
                    <div class="col-md-12">
                        <div id="main-slider">
                            <div class="item">
                                <img src="assets/img/artist_enroll.jpg" alt="" class="img-responsive">
                            </div>
                        </div>
                        <!-- /#main-slider -->
                    </div>
                </div>


                <div class="container">
                  <div class="col-md-6 col-md-offset-3">
                      <div class="box">

                          <p class="lead">¡Comienza agregando tu Nickname!</p>
                          <p class="text-muted">
                            ¡Estamos felices de que quieras ser parte de nuestra comunidad de diseñadores!
                            En unos minutos podrás comenzar a subir tus diseños para que los lleven
                             muchas personas como tú, que disfrutan del anime, cine, cómics y videojuegos!
                          </p>


                          <hr>

                          <?php echo form_open('designer/update_nickname'); ?>
                              <div class="form-group">
                                  <label for="update_nickname">Nickname de Diseñador</label>
                                  <input type="text" class="form-control" id="update_nickname" name="update_nickname" value="">
                              </div>
                                <div class="text-center">
                                  <button type="submit" class="btn btn-primary"><i class="fa fa-star"></i> ¡Quiero Rockear!</button>
                              </div>
                          <?php echo form_close();?>
                      </div>
                  </div>
                </div>


            </div>
            <!-- /#content -->
          <?php echo $page_footer; ?>
        </div>
        <!-- /#all -->
    <?php echo $page_scripts; ?>
</body>
</html>
