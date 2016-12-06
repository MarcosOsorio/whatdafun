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

                    <div class="col-md-9" id="customer-order">



                      <!-- ./ Sección de Ventas -->

                    <?php if (isset($purchases)):?>
                    <div class="box">
                        <p class="lead">Ventas recientes</p>

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
                        <h1>No Hay Pedidos</h1>
                        <p class="lead">Aún no se ha realizado ningún pedido</p>
                        <hr>
                    </div>
                  <?php endif;?>


                  <!-- ./ Top 10 comprados -->

                  <div class="box">
                    <p class="lead">Top 10 comprados</p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2">Diseño</th>
                                    <th>Galería</th>
                                    <th>Ventas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($top_10_purchased as $sale):?>
                                  <tr>
                                    <td>
                                      <a target="_blank" href="design/detail/<?php echo $sale->des_id;?>">
                                          <img src="uploads/<?php echo $sale->des_id;?>_tshirt_full_<?php echo $sale->col_name;?>.jpg">
                                      </a>
                                    </td>
                                    <td><a target="_blank" href="design/detail/<?php echo $sale->des_id;?>"><?php echo ucwords($sale->des_name);?></a></td>
                                    <td><a target="_blank" href="designer/gallery/<?php echo $sale->gal_id;?>"><?php echo ucwords($sale->gal_name);?></a></td>
                                    <td><?php echo $sale->pro_quantity;?></td>
                                </tr>
                              <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                  </div>

                  <!-- ./ Top 10 en carrito -->

                  <div class="box">
                    <p class="lead">Top 10 En carrito</p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2">Diseño</th>
                                    <th>Galería</th>
                                    <th>Ventas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($top_10_basket as $sale):?>
                                  <tr>
                                    <td>
                                      <a target="_blank" href="design/detail/<?php echo $sale->des_id;?>">
                                          <img src="uploads/<?php echo $sale->des_id;?>_tshirt_full_<?php echo $sale->col_name;?>.jpg">
                                      </a>
                                    </td>
                                    <td><a target="_blank" href="design/detail/<?php echo $sale->des_id;?>"><?php echo ucwords($sale->des_name);?></a></td>
                                    <td><a target="_blank" href="designer/gallery/<?php echo $sale->gal_id;?>"><?php echo ucwords($sale->gal_name);?></a></td>
                                    <td><?php echo $sale->pro_quantity;?></td>
                                </tr>
                              <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                  </div>



                  <!-- ./ Top 10 en lista de deseos -->

                  <div class="box">
                    <p class="lead">Top 10 En lista de deseos</p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2">Diseño</th>
                                    <th>Galería</th>
                                    <th>Deseos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($top_10_wishlist as $sale):?>
                                  <tr>
                                    <td>
                                      <a target="_blank" href="design/detail/<?php echo $sale->des_id;?>">
                                          <img src="uploads/<?php echo $sale->des_id;?>_tshirt_full_<?php echo $sale->col_name;?>.jpg">
                                      </a>
                                    </td>
                                    <td><a target="_blank" href="design/detail/<?php echo $sale->des_id;?>"><?php echo ucwords($sale->des_name);?></a></td>
                                    <td><a target="_blank" href="designer/gallery/<?php echo $sale->gal_id;?>"><?php echo ucwords($sale->gal_name);?></a></td>
                                    <td><?php echo $sale->wish_quantity;?></td>
                                </tr>
                              <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
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
