<?php echo $page_head; ?>
<body>
  <?php echo $page_navbar; ?>
    <div id="all">
            <div id="content">
                <div class="container">
                    <div class="col-md-12">
                          <?php echo $page_breadcrumb; ?>
                    </div>
                    <?php echo $page_customer_menu;?>

                    <?php if (isset($purchase)):?>
                      <div class="col-md-9" id="customer-order">
                    <div class="box">
                        <h1>Pedido #<?php echo $purchase->pur_id;?></h1>

                        <p class="lead">El pedido #<?php echo $purchase->pur_id;?> fue realizado el <strong><? echo date('d-m-Y',strtotime($purchase->pur_date));?></strong> y se encuentra <strong><?php echo $purchase->pur_status;?></strong>.</p>
                        <p class="text-muted">Si tienes alguna duda sobre tu pedido, siéntete libre de <a href="contact.php">contactarnos</a>. Nuestro equipo te responderá en breve.</p>

                        <hr>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="4">Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                    </tr>
                                </thead>
                                <tbody>


                                <?php foreach ($items as $item):?>
                                    <tr>
                                        <td colspan="3">
                                            <a href="#">
                                                <img src="uploads/<?php echo $item->des_id;?>_tshirt_full_<?php echo $item->col_name;?>.jpg" alt="Product Image">
                                            </a>
                                        </td>
                                        <td><a target="_blank" href="design/detail/<?php echo $item->des_id;?>"><?php echo $item->pro_name;?></a>
                                        </td>
                                        <td><?php echo $item->pro_quantity;?></td>
                                        <td>$<?php echo number_format($item->pro_price,0,',','.');?></td>
                                    </tr>
                                <? endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5" class="text-left">Subtotal Pedido</th>
                                        <th>$<?php echo number_format($purchase->pur_subtotal,0,',','.');?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-left">Envío</th>
                                        <th>$<?php echo number_format($purchase->pur_shipping_price,0,',','.');?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-left">Total</th>
                                        <th>$<?php echo number_format($purchase->pur_total,0,',','.');?></th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                        <!-- /.table-responsive -->
                        <p class="lead">Detalles de Envío</p>
                        <p class="text-muted">Procesado por <a><?php echo $purchase->car_name;?></a></p>

                        <div class="row">
                        <div class="col-md-6">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td colspan="5" class="text-left">Seguimiento</td>
                                        <td>
                                          <?php switch($purchase->car_id):
                                            case 1: ?>
                                                  <a target="_blank" href="http://www.correos.cl/SitePages/seguimiento/seguimiento.aspx?envio=<?php echo $purchase->shi_tracking;?>"><?php echo $purchase->shi_tracking;?></a>
                                            <?php break;?>
                                            <?php case 2: ?>
                                                  <a target="_blank" href="https://www.chilexpress.cl/Views/ChilexpressCL/Resultado-busqueda.aspx?DATA=<?php echo $purchase->shi_tracking;?>"><?php echo $purchase->shi_tracking;?></a>
                                            <?php break;?>
                                            <?php case 3: ?>
                                                  <a target="_blank" href="http://www.starken.cl/seguimiento?codigo=<?php echo $purchase->shi_tracking;?>"><?php echo $purchase->shi_tracking;?></a>
                                            <?php break;?>
                                          <?php endswitch;?>
                                        </td>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <td colspan="5">Estado</td>
                                        <td><span class="label <?php echo $purchase->pur_label_class;?>"><?php echo $purchase->pur_status;?></span></td>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <td colspan="5">Nombre</td>
                                        <td><?php echo ucfirst($purchase->shi_name). ' ' .ucfirst($purchase->shi_surname);?></td>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <td colspan="5">Dirección</td>
                                        <td><?php echo $purchase->shi_address;?></td>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <td colspan="5">Número</td>
                                        <td><?php echo $purchase->shi_number;?></td>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <td colspan="5">Teléfono</td>
                                        <td><?php echo $purchase->shi_phone;?></td>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <td colspan="5">email</td>
                                        <td><?php echo $purchase->shi_email;?></td>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <td colspan="5">Comuna</td>
                                        <td><?php echo $purchase->com_name;?></td>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <td colspan="5">Región</td>
                                        <td><?php echo $purchase->reg_name;?></td>
                                    </tr>
                                </thead>
                            </table>

                        </div>
                      </div>
                    </div>
                        <!-- /.table-responsive -->
                    </div>
                </div>
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
