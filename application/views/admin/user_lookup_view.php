<?php echo $page_head; ?>
<body>
  <?php echo $page_navbar; ?>
    <div id="all">
            <div id="content">
                <div class="container">
                    <div class="col-md-12">
                          <?php echo $page_breadcrumb; ?>
                    </div>
                    <?php echo $page_admin_menu;?>

                    <div class="col-md-9">

                      <!--div class="box info-bar">
                        <div class="row">
                            <div class="col-sm-12 col-md-4  products-number-sort">
                                <input type="text" class="form-control" placeholder="ingrese búsqueda">
                            </div>
                            <div class="col-sm-12 col-md-4 products-showing">
                              <strong>Activo</strong> <input type="radio">&nbsp;&nbsp;
                              <strong>Admin</strong> <input type="radio">&nbsp;&nbsp;
                              <strong>Diseñador</strong> <input type="radio">&nbsp;&nbsp;
                            </div>
                        </div>
                    </div-->


                    <!-- div class="box info-bar">
                      <div class="row">
                                  <form class="form-inline">
                                      <div class="col-md-3 col-sm-12">
                                          <div class="products-number">
                                              <a href="#" class="btn btn-default btn-sm btn-primary">25</a>  <a href="#" class="btn btn-default btn-sm">50</a> <a href="#" class="btn btn-default btn-sm">100</a>  <a href="#" class="btn btn-default btn-sm">Todo</a>
                                          </div>
                                      </div>
                                      <div class="col-md-3 col-sm-12">
                                          <div class="products-sort-by">
                                              <strong>Ordenar</strong>
                                              <select name="sort-by" class="form-control">
                                                  <option>Nombre</option>
                                                  <option>Apellido</option>
                                                  <option>Diseñador</option>
                                                  <option>Admin</option>
                                                  <option>Activo</option>
                                              </select>
                                          </div>
                                      </div>
                                  </form>
                          <div class="col-sm_12 col-md-3 products-showing">
                            Mostrando <strong>12</strong> de <strong>25</strong> items
                          </div>
                          <div class="col-sm-12 col-md-3 products-showing">
                              <button type="submit" name="user_ban" value="" class="btn btn-primary"><i class="fa fa-search"></i> Filtrar</button>
                          </div>
                      </div>

                  </div -->

                      <div class="box">
                        <div class="row">
                        <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="admin_users_table" class="table table-hover display">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Email</th>
                                        <th>Diseñador</th>
                                        <th>Registro</th>
                                        <th>Admin</th>
                                        <th>Activo</th>
                                        <th colspan="2">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($accounts as $account):?>
                                    <tr>
                                        <td><?php echo ucfirst($account->acc_first_name);?></td>
                                        <td><?php echo ucfirst($account->acc_father_surname);?></td>
                                        <td><a href="admin/account_lookup/<?php echo $account->acc_id?>"><?php echo $account->acc_email;?></a></td>
                                        <td><a target="_blank" href="designer/artist/<?php echo $account->acc_id;?>"><?php echo ucfirst($account->acc_designer_nickname);?></a></td>
                                        <td><?php echo date('d-m-y',strtotime($account->acc_register_date));?></td>
                                        <td><?php echo $account->acc_admin;?></td>
                                        <td><?php echo $account->acc_active;?></td>
                                        <td>
                                          <?php if ($account->acc_active == 'si'):?>
                                              <?php echo form_open('admin/user_ban');?>
                                                <button type="submit" name="user_ban" value="<?php echo $account->acc_id;?>" class="btn btn-primary"><i class="fa fa-ban"></i></button>
                                              <?php echo form_close();?>
                                          <?php elseif ($account->acc_active == 'no'):?>
                                              <?php echo form_open('admin/user_unban');?>
                                                <button type="submit" name="user_unban" value="<?php echo $account->acc_id;?>" class="btn btn-primary"><i class="fa fa-check"></i></button>
                                              <?php echo form_close();?>
                                          <?php endif;?>
                                        </td>
                                        <td>
                                          <a href="mailto:<?php echo $account->acc_email;?>?Subject=Contacto%20WhatDaFun" target="_top"><button type="button" class="btn btn-primary"><i class="fa fa-envelope"></i></button></a>
                                        </td>
                                    </tr>
                                  <?php endforeach;?>
                                </tbody>
                            </table>

                        </div>
                      </div>
                    </div>
                        <!-- /.table-responsive -->
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
