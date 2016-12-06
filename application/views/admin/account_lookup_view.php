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

                      <?php if(isset($account)):?>

                        <!-- Name Box -->
                        <div class="box">
                          <div class="row">
                            <div class="col-md-12 col-sm-12">
                              <h3><?php echo ucwords($account->acc_first_name ." ". $account->acc_second_name ." ".$account->acc_father_surname." ".$account->acc_mother_surname);?></h3>
                            </div>
                          </div>
                        </div>

                        <!-- Data Box -->
                      <div class="box">
                        <div class="row">
                        <div class="col-md-12">
                          <p class="lead">Datos de Usuario</p>
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
                                </tbody>
                            </table>

                        </div>
                      </div>
                    </div>
                      </div>

                              <!-- Purchases Box -->

                              <?php if (isset($purchases)):?>
                              <div class="box">
                                  <p class="lead">Compras recientes</p>

                                  <div class="table-responsive">
                                      <table class="table table-hover">
                                          <thead>
                                              <tr>
                                                  <th>Pedido</th>
                                                  <th>Fecha</th>
                                                  <th>Email</th>
                                                  <th>Total</th>
                                                  <th>Estado</th>
                                                  <th>Acción</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                          <?php foreach ($purchases as $purchase):?>
                                              <tr>
                                                  <th><a href="admin/order_lookup/<?php echo $purchase->pur_id?>"># <?php echo $purchase->pur_id;?></a></th>
                                                  <td><? echo date('d-m-Y',strtotime($purchase->pur_date));?></td>
                                                  <td><a href="admin/account_lookup/<?php echo $purchase->acc_id?>"><? echo $purchase->acc_email;?></a></td>
                                                  <td>$ <?php echo number_format($purchase->pur_total,0,',','.');?></td>
                                                  <td><span class="label <?php echo $purchase->pur_label_class;?>"><?php echo $purchase->pur_status;?></span></td>
                                                  <td><a href="admin/order_lookup/<?php echo $purchase->pur_id;?>" class="btn btn-primary btn-sm">Revisar</a></td>
                                              </tr>
                                          <? endforeach;?>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                            <?php else: ?>
                              <div class="box">
                                  <p class="lead">Este Usuario no ha realizado ningún pedido</p>
                              </div>
                            <?php endif;?>

                            <!-- Galerías  -->
                            <?php if(isset($galleries)):?>
                              <div class="box">
                                  <p class="lead">Galerías de <?php echo ucwords($account->acc_designer_nickname);?></p>
                              </div>
                              <div class="row">
                              <?php foreach ($galleries as $gallery):?>
                                  <div class="col-md-4 col-sm-6">
                                    <div class="product">
                                        <div class="flip-container">
                                            <div class="flipper">
                                            </div>
                                        </div>
                                        <a href="designer/gallery/<?php echo $gallery->gal_id;?>">
                                            <img src="uploads/<?php echo $gallery->des_id;?>_tshirt_full_<?php echo $gallery->col_name;?>.jpg" alt="" class="img-responsive">
                                        </a>
                                        <div class="text">
                                            <h3><a href="designer/gallery/<?php echo $gallery->gal_id?>"><?php echo ucwords($gallery->gal_name);?></a></h3>
                                        </div>
                                    </div>
                                </div>
                              <?php endforeach;?>
                              </div>

                            <?php else:?>
                              <div class="box">
                                  <p class="lead">Este usario no posee galerías</p>
                              </div>
                            <?php endif;?>


                            <!-- Lista de deseos  -->
                            <?php if(isset($wishes)):?>
                              <div class="box">
                                  <p class="lead">Lista de deseos de <?php echo ucwords($account->acc_first_name . " " . $account->acc_father_surname);?></p>
                              </div>
                              <div class="row">
                              <?php foreach ($wishes as $wish):?>
                                  <div class="col-md-4 col-sm-6">
                                    <div class="product">
                                        <div class="flip-container">
                                            <div class="flipper">
                                            </div>
                                        </div>
                                        <a href="design/detail/<?php echo $wish->des_id;?>">
                                            <img src="uploads/<?php echo $wish->des_id;?>_tshirt_full_<?php echo $wish->col_name;?>.jpg" alt="" class="img-responsive">
                                        </a>
                                        <div class="text">
                                            <h3><a href="design/detail/<?php echo $wish->des_id?>"><?php echo ucwords($wish->des_name);?></a></h3>
                                        </div>
                                    </div>
                                </div>
                              <?php endforeach;?>
                              </div>

                            <?php else:?>
                              <div class="box">
                                  <p class="lead">Este Usuario No ha agregado diseños a su lista de deseos</p>
                              </div>
                            <?php endif;?>


                    <?php endif;?>

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
