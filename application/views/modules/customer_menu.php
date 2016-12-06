<div class="col-md-3">
    <!-- *** CUSTOMER MENU *** -->
    <div class="panel panel-default sidebar-menu">
        <div class="panel-heading">
            <h3 class="panel-title">Sección de Clientes</h3>
        </div>
        <div class="panel-body">
            <ul class="nav nav-pills nav-stacked">
                <li <?php if (strcmp($active_page,'my_purchases') == 0):?>
                  class="active"
                <?php endif;?>
                >
                    <a href="account/my_purchases"><i class="fa fa-list"></i> Mis Compras</a>
                </li>
                <li <?php if (strcmp($active_page,'my_wishlist') == 0):?>
                  class="active"
                <?php endif;?>
                >
                    <a href="account/my_wishlist"><i class="fa fa-heart"></i> Mi Lista de Deseos</a>
                </li>
                <li <?php if (strcmp($active_page,'my_account') == 0):?>
                  class="active"
                <?php endif;?>
                >
                    <a href="account"><i class="fa fa-user"></i> Mi Cuenta</a>
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
