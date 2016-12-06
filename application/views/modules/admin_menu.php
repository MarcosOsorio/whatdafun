<div class="col-md-3">
    <!-- *** CUSTOMER MENU *** -->
    <div class="panel panel-default sidebar-menu">
        <div class="panel-heading">
            <h3 class="panel-title">Sección de Administración</h3>
        </div>
        <div class="panel-body">
            <ul class="nav nav-pills nav-stacked">
                <li <?php if (strcmp($active_page,'users') == 0):?>
                  class="active"
                <?php endif;?>
                >
                    <a href="admin/user_lookup"><i class="fa fa-user"></i> Usuarios</a>
                </li>
                <li <?php if (strcmp($active_page,'stats') == 0):?>
                  class="active"
                <?php endif;?>
                >
                    <a href="admin/stats_lookup"><i class="fa fa-bar-chart-o"></i> Estadísticas</a>
                </li>
                <li <?php if (strcmp($active_page,'designs') == 0):?>
                  class="active"
                <?php endif;?>
                >
                    <a href="admin/designs_lookup"><i class="fa fa-picture-o"></i> Diseños</a>
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
