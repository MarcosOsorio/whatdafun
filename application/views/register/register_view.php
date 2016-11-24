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
                        <h1>Registro</h1>

                        <p class="lead">¿Ya eres uno de los nuestros?</p>
                        <p class="text-muted">
                          ¡Ingresa <a href="login">aquí</a> para revisar tus pedidos y mucho más!
                        </p>

                        <p class="lead">¿Eres diseñador?</p>
                        <p class="text-muted">
                          ¡Aprende <a href="designer">aquí</a> como puedes convertirte en un diseñador de WhatDaFun y conseguir
                          compartir tus diseños con todo el mundo!
                        </p>

                        <hr>

                        <?php echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>'); ?>
                        <?php echo form_open('register/verify_register'); ?>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="first_name">Primer Nombre</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo set_value('first_name'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="father_surname">Apellido</label>
                                <input type="text" class="form-control" id="father_surname" name="father_surname" value="<?php echo set_value('father_surname'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="passconf">Confirmar Contraseña</label>
                                <input type="password" class="form-control" id="passconf" name="passconf">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Registro</button>
                            </div>
                        </form>
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
