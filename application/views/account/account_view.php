<?php echo $page_head; ?>

<body>

  <?php echo $page_navbar; ?>

  <div id="all">

      <div id="content">
          <div class="container">

              <div class="col-md-12">

                  <?php echo $page_breadcrumb; ?>

              <div class="col-md-3">
                  <!-- *** CUSTOMER MENU ***
  _________________________________________________________ -->
                  <div class="panel panel-default sidebar-menu">

                      <div class="panel-heading">
                          <h3 class="panel-title">Sección de Clientes</h3>
                      </div>

                      <div class="panel-body">

                          <ul class="nav nav-pills nav-stacked">
                              <li class="active">
                                  <a href="order"><i class="fa fa-list"></i> Mis Compras</a>
                              </li>
                              <li>
                                  <a href="wish"><i class="fa fa-heart"></i> Mi Lista de Deseos</a>
                              </li>
                              <li>
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

              <div class="col-md-9">
                  <div class="box">
                      <h1><?php echo $this->session->name; ?> - Mi cuenta</h1>
                      <p class="lead">Cambia tu información personal y contraseña aquí.</p>
                      <p class="text-muted">Recuerda usar una contraseña de mínimo 8 carácteres alfanuméricos.</p>

                      <h3>Cambiar Contraseña</h3>

                      <?php if (!form_error('old_password')==null):?>
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                              <?php echo form_error('old_password', '<div class="alert alert-warning" role="alert">', '</div>'); ?>
                            </div>
                        </div>
                      <?php endif;?>

                      <?php if (!form_error('new_password')==null):?>
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                              <?php echo form_error('new_password', '<div class="alert alert-warning" role="alert">', '</div>'); ?>
                            </div>
                        </div>
                      <?php endif;?>

                      <?php if (!form_error('new_password_conf')==null):?>
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                              <?php echo form_error('new_password_conf', '<div class="alert alert-warning" role="alert">', '</div>'); ?>
                            </div>
                        </div>
                      <?php endif;?>

                      <?php echo form_open('account/verify_password_change'); ?>
                          <div class="row">
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label for="old_password">Contraseña actual</label>
                                      <input type="password" class="form-control" id="old_password" name="old_password">
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label for="new_password">Contraseña nueva</label>
                                      <input type="password" class="form-control" id="new_password" name="new_password">
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label for="new_password_conf">Confirmación de contraseña nueva</label>
                                      <input type="password" class="form-control" id="new_password_conf" name="new_password_conf">
                                  </div>
                              </div>
                          </div>
                          <!-- /.row -->
                          <div class="row">
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar Contraseña Nueva</button>
                            </div>
                          </div>
                          <!-- /.row -->
                      </form>

                      <hr>

                      <h3>Dirección de envío</h3>

                      <!-- Stored addresses select form -->


                        <!-- Revisa allá arriba-->


                      <div class="row">

                      <?php echo form_open('account/edit_address/'); ?>

                              <div class="col-sm-6 col-md-6">
                                  <div class="form-group">
                                    <label for="stored_addresses">Direcciones Guardadas</label>
                                    <?php if (isset($addresses)):?>
                                      <select class="form-control" name="default_address" id="default_address">
                                          <?php foreach ($addresses as $address):?>
                                          <option value="<?php echo $address->add_id; ?>"
                                            <?php if($address->add_id == $full_address->add_id):?>
                                              <?php echo 'selected';?>
                                            <?php endif;?>
                                            ><?php echo $address->add_description; ?></option>
                                          <?php endforeach;?>
                                        <?php else:?>
                                          <select class="form-control" disabled name="default_address" id="default_address">
                                              <option value="">No has registrado direcciones</option>
                                    <?php endif;?>
                                    </select>
                                  </div>
                              </div>

                      <?php echo form_close(); // 'account/edit_address' ?>

                      <div class="col-sm-3 col-md-3">
                          <div class="form-group">
                            <label for="make_address_editable">Editar Dirección</label>
                            <button type="button" class="btn btn-primary"
                              <?php if (!isset($addresses)):?>
                                <?php echo 'disabled';?>
                              <?php endif;?>
                            name="make_address_editable" id="make_address_editable">
                              <i class="fa fa-edit"></i> Editar Dirección
                            </button>
                          </div>
                      </div>

                      <?php echo form_open('account/activate_address'); ?>

                              <div class="col-sm-3 col-md-3">
                                  <div class="form-group">
                                    <label for="set_active_address">Fijar Como Activa</label>
                                    <?php if (isset($addresses)):?>
                                      <input type="hidden" name="new_active_address" id="new_active_address" value="<?php echo $full_address->add_id; ?>">
                                    <?php endif;?>
                                    <button type="submit" class="btn btn-primary"
                                      <?php if (!isset($addresses) or $full_address->add_active == 1):?>
                                        <?php echo 'disabled';?>
                                      <?php endif;?>
                                    name="set_active_address" id="set_active_address">
                                      <i class="fa fa-save"></i> Fijar Como Activa
                                    </button>
                                  </div>
                              </div>

                      <?php echo form_close(); // form_open('account/activate_address')?>

                      </div> <!-- /. row -->

                      <!-- End of Stored addresses select form -->

                      <!-- Full address edit form -->
                      <?php if(isset($full_address)):?>
                              <?php if (!form_error('new_description')==null):?>
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                      <?php echo form_error('new_description', '<div class="alert alert-warning" role="alert">', '</div>'); ?>
                                    </div>
                                </div>
                              <?php endif;?>

                              <?php if (!form_error('new_name')==null):?>
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                      <?php echo form_error('new_name', '<div class="alert alert-warning" role="alert">', '</div>'); ?>
                                    </div>
                                </div>
                              <?php endif;?>

                              <?php if (!form_error('new_surname')==null):?>
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                      <?php echo form_error('new_surname', '<div class="alert alert-warning" role="alert">', '</div>'); ?>
                                    </div>
                                </div>
                              <?php endif;?>

                              <?php if (!form_error('new_address')==null):?>
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                      <?php echo form_error('new_address', '<div class="alert alert-warning" role="alert">', '</div>'); ?>
                                    </div>
                                </div>
                              <?php endif;?>

                              <?php if (!form_error('new_number')==null):?>
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                      <?php echo form_error('new_number', '<div class="alert alert-warning" role="alert">', '</div>'); ?>
                                    </div>
                                </div>
                              <?php endif;?>

                              <?php if (!form_error('new_block')==null):?>
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                      <?php echo form_error('new_block', '<div class="alert alert-warning" role="alert">', '</div>'); ?>
                                    </div>
                                </div>
                              <?php endif;?>

                              <?php if (!form_error('new_region')==null):?>
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                      <?php echo form_error('new_region', '<div class="alert alert-warning" role="alert">', '</div>'); ?>
                                    </div>
                                </div>
                              <?php endif;?>

                              <?php if (!form_error('new_commune')==null):?>
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                      <?php echo form_error('new_commune', '<div class="alert alert-warning" role="alert">', '</div>'); ?>
                                    </div>
                                </div>
                              <?php endif;?>

                              <?php if (!form_error('new_phone')==null):?>
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                      <?php echo form_error('new_phone', '<div class="alert alert-warning" role="alert">', '</div>'); ?>
                                    </div>
                                </div>
                              <?php endif;?>

                              <?php if (!form_error('new_email')==null):?>
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                      <?php echo form_error('new_email', '<div class="alert alert-warning" role="alert">', '</div>'); ?>
                                    </div>
                                </div>
                              <?php endif;?>
                      <?php endif;?>






                    <?php if (isset($full_address)):?>

                              <?php echo form_open('account/verify_address_change'); ?>

                                      <fieldset id="full_address_fieldset"
                                      <?php if (isset($address_editable)):?>
                                              <?php echo 'enabled'; ?>
                                      <?php else:?>
                                              <?php echo 'disabled'; ?>
                                      <?php endif;?>
                                      > <!-- ./ en of fieldset tag -->

                                      <?php if (isset($full_address)):?>
                                              <input type="hidden" name="new_selected_address" value="<?php echo $full_address->add_id;?>">
                                      <?php endif;?>

                                      <!-- first row -->
                                      <div class="row">
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label for="new_description">Descripción</label>
                                                  <input type="text" class="form-control" name="new_description" id="new_description" value="<?php echo $full_address->add_description; ?>">
                                              </div>
                                          </div>
                                      </div>
                                      <!-- /.first row -->

                                      <!-- second row -->
                                      <div class="row">
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label for="new_name">Nombre</label>
                                                  <input type="text" class="form-control" name="new_name" id="new_name" value="<?php echo $full_address->add_name; ?>">
                                              </div>
                                          </div>
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label for="new_surname">Apellido</label>
                                                  <input type="text" class="form-control" name="new_surname" id="new_surname" value="<?php echo $full_address->add_surname; ?>">
                                              </div>
                                          </div>
                                      </div>
                                      <!-- /.second row -->

                                      <!-- third row -->
                                      <div class="row">
                                          <div class="col-sm-3 col-md-3">
                                              <div class="form-group">
                                                  <label for="new_address">Dirección</label>
                                                  <input type="text" class="form-control" name="new_address" id="new_address" value="<?php echo $full_address->add_address; ?>">
                                              </div>
                                          </div>
                                          <div class="col-sm-2 col-md-2">
                                              <div class="form-group">
                                                  <label for="new_number">Número</label>
                                                  <input type="text" class="form-control" name="new_number" id="new_number" value="<?php echo $full_address->add_number; ?>">
                                              </div>
                                          </div>
                                          <div class="col-sm-1 col-md-1">
                                              <div class="form-group">
                                                  <label for="new_block">Block</label>
                                                  <input type="text" class="form-control" name="new_block" id="new_block" value="<?php echo $full_address->add_block; ?>">
                                              </div>
                                          </div>
                                          <div class="col-sm-3 col-md-3">
                                              <div class="form-group">
                                                  <label for="new_region">Región</label>
                                                  <select class="form-control" name="new_region" id="new_region">
                                                    <?php foreach ($region_list as $region):?>
                                                      <option value="<?php echo $region->reg_id; ?>"
                                                        <?php if($region->reg_id == $full_address->reg_id):?>
                                                          <?php echo 'selected';?>
                                                        <?php endif;?>
                                                        ><?php echo $region->reg_name; ?></option>
                                                    <?php endforeach;?>
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="col-sm-3 col-md-3">
                                              <div class="form-group">
                                                  <label for="new_commune">Comuna</label>
                                                  <select class="form-control" name="new_commune" id="new_commune">
                                                    <?php foreach ($communes_list as $commune):?>
                                                      <option value="<?php echo $commune->com_id; ?>"
                                                        <?php if($commune->com_id == $full_address->com_id):?>
                                                          <?php echo 'selected';?>
                                                        <?php endif;?>
                                                        ><?php echo $commune->com_name; ?></option>
                                                    <?php endforeach;?>
                                                  </select>
                                              </div>
                                          </div>
                                      </div>
                                      <!-- /.third row -->

                                      <!-- fourth row -->
                                      <div class="row">
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label for="new_phone">Teléfono</label>
                                                  <input type="text" class="form-control" name="new_phone" id="new_phone" value="<?php echo $full_address->add_phone; ?>">
                                              </div>
                                          </div>
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label for="new_email">Email</label>
                                                  <input type="text" class="form-control" name="new_email" id="new_email" value="<?php echo $full_address->add_email; ?>">
                                              </div>
                                          </div>
                                      </div>
                                      <!-- /.fourth row -->

                                      <div class="row">
                                        <div class="col-sm-12 col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar Dirección</button>
                                        </div>
                                      </div>
                                    </fieldset>
                                      <!-- End of Full address edit form -->

                            <?php echo form_close(); // form_open('account/verify_address_change')?>

                    <?php endif;?>

                    <?php echo form_open('account/add_new_address');?>
                    </br>
                    <div class="row">
                      <div class="col-sm-12 col-md-12 text-center">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Agregar Dirección</button>
                      </div>
                    </div>
                    <?php echo form_close(); // form_open('account/add_new_address')?>

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
