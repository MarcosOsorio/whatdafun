<?php echo $page_head; ?>

<body>

  <?php echo $page_navbar; ?>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                <?php echo $page_breadcrumb; ?>

                <div class="col-md-6 col-md-offset-3">
                    <div class="box">
                        <h1>Login</h1>

                        <p class="lead">¿Aún no te has registrado?</p>
                        <p class="text-muted">
                          ¡En WhatDaFun queremos entregarte la mejor de las experiencias!
                          <a href="register">¡Regístrate </a>ahora en nuestra comunidad y obtén la mejor moda de las series,
                          películas, cómics y videojuegos que están de moda!
                        </p>

                        <p class="lead">¿Eres diseñador?</p>
                        <p class="text-muted">
                          ¡Aprende <a href="designer">aquí</a> como puedes convertirte en un diseñador de WhatDaFun y conseguir
                          compartir tus diseños con todo el mundo!
                        </p>

                        <hr>

                        <?php echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>'); ?>
                        <?php echo form_open('login/verify_login'); ?>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Entrar</button>
                            </div>
                        </form>
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
