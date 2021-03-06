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
                                            <?php echo form_open('basket/checkout_4')?>
                                                <h1>Pedido - Medio de Pago</h1>
                                                <ul class="nav nav-pills nav-justified">
                                                    <li><a href="basket/checkout_1"><i class="fa fa-map-marker"></i><br>Dirección</a>
                                                    </li>
                                                    <li><a href="basket/checkout_2"><i class="fa fa-truck"></i><br>Envío</a>
                                                    </li>
                                                    <li class="active"><a href="basket/checkout_3"><i class="fa fa-money"></i><br>Medio de Pago</a>
                                                    </li>
                                                    <li class="disabled"><a href="#" disabled><i class="fa fa-eye"></i><br>Revisión de Pedido</a>
                                                    </li>
                                                </ul>

                                                <div class="content">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="box payment-method">

                                                                <h4>Paypal</h4>
                                                                <img class="img-responsive" src="assets/img/payment_paypal.png" alt="Paypal">
                                                                <div class="box-footer text-center">
                                                                    <input type="radio" name="payment" required value="Paypal">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="box payment-method">

                                                                <h4>WebPay</h4>
                                                                <img class="img-responsive" src="assets/img/payment_webpayplus.png" alt="WebPay Plus">
                                                                <div class="box-footer text-center">
                                                                    <input type="radio" name="payment" required value="WebPay Plus">
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <!-- /.row -->

                                                </div>
                                                <!-- /.content -->

                                                <div class="box-footer">
                                                    <div class="pull-left">
                                                        <a href="basket/checkout_2" class="btn btn-default"><i class="fa fa-chevron-left"></i>Envío</a>
                                                    </div>
                                                    <div class="pull-right">
                                                        <button type="submit" class="btn btn-primary">Revisión de Pedido<i class="fa fa-chevron-right"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            <?php form_close();?>
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
