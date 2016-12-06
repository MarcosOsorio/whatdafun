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

                    <div class="col-md-9" id="customer-orders">

                    <?php if (isset($purchases)):?>
                    <div class="box">
                        <h1>Mis Pedidos</h1>
                        <p class="lead">Todos tus pedidos en un solo lugar.</p>
                        <p class="text-muted">Si tienes alguna duda sobre tu pedido, siéntete libre de <a href="contact.php">contactarnos</a>. Nuestro equipo te responderá en breve.</p>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Pedido</th>
                                        <th>Fecha</th>
                                        <th>Total</th>
                                        <th>Estado</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($purchases as $purchase):?>
                                    <tr>
                                        <th># <?php echo $purchase->pur_id;?></th>
                                        <td><? echo date('d-m-Y',strtotime($purchase->pur_date));?></td>
                                        <td>$ <?php echo number_format($purchase->pur_total,0,',','.');?></td>
                                        <td><span class="label <?php echo $purchase->pur_label_class;?>"><?php echo $purchase->pur_status;?></span></td>
                                        <td><a href="account/order/<?php echo $purchase->pur_id;?>" class="btn btn-primary btn-sm">Revisar</a>
                                        </td>
                                    </tr>
                                <? endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                  <?php else: ?>
                    <div class="box">
                        <h1>No Tienes Pedidos</h1>
                        <p class="lead">Aún no has realizado ningún pedido</p>
                        <p class="text-muted">¡Enamórate de <a href="home">estos</a> diseños!</p>
                        <hr>
                    </div>
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
