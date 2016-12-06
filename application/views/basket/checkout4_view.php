<?php echo $page_head; ?>

<body>

  <?php echo $page_navbar; ?>

  <div id="all">

    <div id="all">

            <div id="content">
                <div class="container">

                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="#">Inicio</a>
                            </li>
                            <li>Carrito de Compras</li>
                        </ul>
                    </div>

                    <div class="col-md-9" id="checkout">

                    <div class="box">
                        <?php echo form_open('basket/payment_gateway');?>
                            <h1>Pedido - Revisión de Pedido</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="basket/checkout_1"><i class="fa fa-map-marker"></i><br>Dirección</a>
                                </li>
                                <li><a href="basket/checkout_2"><i class="fa fa-truck"></i><br>Envío</a>
                                </li>
                                <li><a href="basket/checkout_3"><i class="fa fa-money"></i><br>Medio de Pago</a>
                                </li>
                                <li class="active"><a href="basket/checkout_4"><i class="fa fa-eye"></i><br>Revisión de Pedido</a>
                                </li>
                            </ul>

                            <div class="content">
                              <p class="text-muted">
                                <?php if ($cart_count < 1):?>
                                          No tienes productos en tu carrito.
                                        </p>
                                <?php else:?>
                                          Estás comprando <?php echo $cart_count;?> productos.
                                        </p>
                              <div id="products_table" class="table-responsive">
                                  <table class="table">
                                      <thead>
                                          <tr>
                                              <th colspan="7">Producto</th>
                                              <th>Precio</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <?php if (!form_error('item_quantity')==null):?>
                                          <?php echo form_error('item_quantity', '<div class="alert alert-warning" role="alert">', '</div>'); ?>
                                        <?php endif;?>
                                        <?php echo form_open('basket/checkout_1');?>
                                        <?php foreach ($cart_items as $item):?>
                                          <tr>
                                              <td colspan="6"><a href="#"><img src="uploads/<?php echo $item->des_id;?>_tshirt_full_<?php echo $item->col_name;?>.jpg" alt="Product Image"></a></td>
                                              <td><a target="_blank" href="design/detail/<?php echo $item->des_id;?>"><?php echo $item->pro_name;?> ( <?php echo strtoupper($item->pro_size);?> ) </a></td>
                                              <td>$<?php echo number_format($item->pro_price*$item->pro_quantity,0,',','.');?></td>
                                          </tr>
                                        <?php endforeach;?>

                                      </tbody>
                                      <tfoot>
                                            <tr>
                                              <th colspan="7">Subtotal</th>
                                              <th colspan="1">$<?php echo number_format($cart_info->pur_subtotal,0,',','.');?></th>
                                            </tr>
                                            <tr>
                                              <th colspan="6">Envío</th>
                                              <td><?php echo $this->session->carrier;?></td>
                                              <th colspan="1">$<?php echo number_format($cart_info->pur_shipping_price,0,',','.');?></th>
                                            </tr>
                                            <tr>
                                              <th colspan="6">Pago</th>
                                              <td><?php echo $this->session->payment;?></td>
                                              <th colspan="1"></th>
                                            </tr>
                                            <tr>
                                              <th colspan="7">Total</th>
                                              <th colspan="1">$<?php echo number_format($cart_info->pur_total,0,',','.');?></th>
                                            </tr>
                                      </tfoot>
                                  </table>

                              </div>
                              <!-- /.table-responsive -->
                    <?php endif;?>
                            </div>
                            <!-- /.content -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="basket/checkout_3" class="btn btn-default"><i class="fa fa-chevron-left"></i>Medio de Pago</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Pagar y Confirmar<i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        <?php echo form_close();?>
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-md-9 -->

                    <?php if ($cart_count > 1):?>
                    <div class="col-md-3">
                        <div class="box" id="order-summary">
                            <div class="box-header">
                                <h3>Resumen de Pedido</h3>
                            </div>
                            <p class="text-muted">El envío está calculado basado en tu ubicación de registro.</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Subtotal</td>
                                            <th>$<?php echo number_format($cart_info->pur_subtotal,0,',','.');?></th>
                                        </tr>
                                        <tr>
                                            <td>Envío</td>
                                            <th>$<?php echo number_format($cart_info->pur_shipping_price,0,',','.');?></th>
                                        </tr>
                                        <tr class="total">
                                            <td>Total</td>
                                            <th>$<?php echo number_format($cart_info->pur_total,0,',','.');?></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!-- /.col-md-3 -->
                  <?php else:?>
                    <div class="col-md-3">
                        <div class="box" id="order-summary">
                            <div class="box-header">
                                <h3>Resumen de Pedido</h3>
                            </div>
                            <p class="text-muted">No tienes artículos en tu carro de compras.</p>
                        </div>
                    </div>
                    <!-- /.col-md-3 -->
                  <?php endif;?>

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
