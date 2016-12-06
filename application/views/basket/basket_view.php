<?php echo $page_head; ?>
<body>
  <?php echo $page_navbar; ?>
    <div id="all">
            <div id="content">
                <div class="container">
                    <div class="col-md-12">
                          <?php echo $page_breadcrumb; ?>
                    </div>

                    <div class="col-md-9" id="basket">
                        <div class="box">
                                <h1>Carrito de Compras</h1>
                                <p class="text-muted">
                                  <?php if ($cart_count < 1):?>
                                            No tienes productos en tu carrito.
                                          </p>
                                  <?php else:?>
                                            Tienes <?php echo $cart_count;?> productos en tu carrito.
                                          </p>
                                            <div id="products_table" class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="6">Producto</th>
                                                            <th>Quitar</th>
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
                                                            <td colspan="5">
                                                                <a href="#">
                                                                    <img src="uploads/<?php echo $item->des_id;?>_tshirt_full_<?php echo $item->col_name;?>.jpg" alt="Product Image">
                                                                </a>
                                                            </td>
                                                            <td><a target="_blank" href="design/detail/<?php echo $item->des_id;?>"><?php echo $item->pro_name;?> ( <?php echo strtoupper($item->pro_size);?> ) </a>
                                                            </td>

                                                            <td><a href="basket/remove_item/<?php echo $cart_info->pur_id;?>/<?php echo $item->pro_id;?>"><i class="fa fa-trash-o"></i></a>
                                                            <td>$<?php echo number_format($item->pro_price*$item->pro_quantity,0,',','.');?></td>
                                                            </td>
                                                        </tr>
                                                      <?php endforeach;?>

                                                    </tbody>
                                                    <tfoot>
                                                          <tr>
                                                            <th colspan="7">Subtotal</th>
                                                            <th colspan="1">$<?php echo number_format($cart_info->pur_subtotal,0,',','.');?></th>
                                                          </tr>
                                                          <tr>
                                                            <th colspan="7">Envío</th>
                                                            <th colspan="1">$<?php echo number_format($cart_info->pur_shipping_price,0,',','.');?></th>
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

                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a href="home" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continuar Mirando</a>
                                    </div>
                                    <div class="pull-right">
                                        <!-- button type="button" id="cart_update" class="btn btn-default" <?php if ($cart_count < 1 ):?>  disabled<?php endif;?>><i class="fa fa-refresh"></i> Actualizar Carrito</button-->
                                        <button type="submit" class="btn btn-primary" <?php if ($cart_count < 1 ):?>  disabled<?php endif;?>>Revisión de Pedido<i class="fa fa-chevron-right"></i></button>
                                      <?php echo form_close();?>
                                    </div>
                                </div>
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
