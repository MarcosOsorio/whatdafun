<div class="col-md-3">
    <!-- *** CUSTOMER MENU ***
_________________________________________________________ -->
    <div class="panel panel-default sidebar-menu">

        <div class="panel-heading">
            <h3 class="panel-title">Sección de Diseñadores</h3>
        </div>

        <div class="panel-body">

            <ul class="nav nav-pills nav-stacked">
                <li<?php if (strcmp($active_page,'my_galleries') == 0):?>
                  class="active"
                <?php endif;?>
                >
                    <a href="designer/artist/"><i class="fa fa-film"></i> Mis Galerías</a>
                </li>
                <li<?php if (strcmp($active_page,'my_designs') == 0):?>
                  class="active"
                <?php endif;?>
                >
                    <a href="designer/designs"><i class="fa fa-picture-o"></i> Mis Diseños</a>
                </li>
                <li<?php if (strcmp($active_page,'my_sales') == 0):?>
                  class="active"
                <?php endif;?>
                >
                    <a href="designer/sales"><i class="fa fa-money"></i> Mis Ventas</a>
                </li>
                <li<?php if (strcmp($active_page,'my_settings') == 0):?>
                  class="active"
                <?php endif;?>
                >
                    <a href="designer/settings"><i class="fa fa-cogs"></i> Ajustes</a>
                </li>
                <li>
                    <a href="home/"><i class="fa fa-sign-out"></i> Salir</a>
                </li>
            </ul>
        </div>

    </div>
    <!-- /.col-md-3 -->

    <!-- *** CUSTOMER MENU END *** -->
</div>
