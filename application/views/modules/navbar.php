<!-- *** TOPBAR ***
_________________________________________________________ -->
<div id="top">
    <div class="container">
        <div class="col-md-6 offer" data-animate="fadeInDown">
        </div>
        <div class="col-md-6" data-animate="fadeInDown">
            <ul class="menu">
              <?php if (isset($navbar_name)) : ?>
                <li>
                  <a href="account"><?php echo ucwords($navbar_name); ?></a>
                </li>
                <li>
                  <a href="logout">Salir</a>
                </li>
              <?php else : ?>
                <li>
                  <a href="login">Login</a>
                  <!--data-toggle="modal" data-target="#login-modal"-->

                </li>
                <li>
                  <a href="register">Registro</a>
                </li>
              <?php endif; ?>
              <li>
                <a href="designer/">Diseñadores</a>
              </li>
            </ul>
        </div>
    </div>
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
        <div class="modal-dialog modal-sm">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="Login">Login Friki</h4>
                </div>
                <div class="modal-body">
                    <form action="login" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" id="email-modal" placeholder="email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password-modal" placeholder="contraseña">
                        </div>

                        <p class="text-center">
                            <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                        </p>

                    </form>

                    <p class="text-center text-muted">Aún no eres uno de los nuestros?</p>
                    <p class="text-center text-muted"><a href="register"><strong>Regístrate Ahora</strong></a>! Es sencillo . En unos minutos tendrás acceso a miles de diseños hechos para ti!</p>

                </div>
            </div>
        </div>
    </div>

</div>

<!-- *** TOP BAR END *** -->

<!-- *** NAVBAR ***
_________________________________________________________ -->

<div class="navbar navbar-default yamm" role="navigation" id="navbar">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand home" href="home" data-animate-hover="bounce">
                <img src="assets/img/logo.png" alt="Obaju logo" class="hidden-xs">
                <img src="assets/img/logo-small.png" alt="Obaju logo" class="visible-xs"><span class="sr-only">WhatDaFun - Ir al Inicio</span>
            </a>
            <div class="navbar-buttons">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
                <a class="btn btn-default navbar-toggle" href="basket">
                    <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">3 ítems en carro</span>
                </a>
            </div>
        </div>
        <!--/.navbar-header -->

        <div class="navbar-collapse collapse" id="navigation">

            <ul class="nav navbar-nav navbar-left">
                <li class="active"><a href="home">Inicio</a>
                </li>

                <li class="dropdown yamm-fw">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Diseños<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h5>Más Comprados</h5>
                                        <ul>
                                            <li><a href="category">Poleras</a>
                                            </li>
                                            <li><a href="category">Polerones</a>
                                            </li>
                                            <li><a href="category">Accesorios</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <h5>Más Votados</h5>
                                        <ul>
                                            <li><a href="category">Poleras</a>
                                            </li>
                                            <li><a href="category">Polerones</a>
                                            </li>
                                            <li><a href="category">Accesorios</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="banner">
                                            <a href="#">
                                                <img src="assets/img/banner.jpg" class="img img-responsive" alt="">
                                            </a>
                                        </div>
                                        <div class="banner">
                                            <a href="#">
                                                <img src="assets/img/banner2.jpg" class="img img-responsive" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.yamm-content -->
                        </li>
                    </ul>
                </li>



                
                    </ul>
                </li>
            </ul>

        </div>
        <!--/.nav-collapse -->

        <div class="navbar-buttons">

            <div class="navbar-collapse collapse right" id="basket-overview">
                <a href="basket" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm"><?php echo $cart_count;?> items en carro</span></a>
            </div>
            <!--/.nav-collapse -->

            <div class="navbar-collapse collapse right" id="search-not-mobile">
                <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
            </div>

        </div>

        <div class="collapse clearfix" id="search">

            <form class="navbar-form" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar">
                    <span class="input-group-btn">

  <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

    </span>
                </div>
            </form>

        </div>
        <!--/.nav-collapse -->

    </div>
    <!-- /.container -->
</div>
<!-- /#navbar -->

<!-- *** NAVBAR END *** -->
