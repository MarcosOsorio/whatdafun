<?php echo $page_head; ?>
<body>
  <?php echo $page_navbar; ?>
    <div id="all">
            <div id="content">
                <div class="container">
                    <div class="col-md-12">
                          <?php echo $page_breadcrumb; ?>
                    </div>
                    <?php echo $page_menu;?>

                    <div class="col-md-9" id="customer-order">
                      <div class="box">
                      <p class="lead">¡Has Reunido $<?php echo number_format(($total->total*10)/100,0,',','.');?> con tus diseños! ¡Sigue así!</p>
                    </div>
                      <div class="box">
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
                                    <?php foreach ($sales_count as $sale):?>
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


                        <!-- /.table-responsive -->
                      </div>


                      <?php if (isset($sales)):?>
                      <div class="box">
                          <p class="lead">Ventas recientes</p>

                          <div class="table-responsive">
                              <table class="table table-hover">
                                  <thead>
                                      <tr>
                                          <th>Venta</th>
                                          <th>Diseño</th>
                                          <th>Fecha</th>
                                          <th>Ganancia</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  <?php foreach ($sales as $sale):?>
                                      <tr>
                                        <th># <?php echo $sale->pro_id;?></th>
                                        <td><a href="design/detail/<?php echo $sale->des_id?>"><? echo $sale->des_name;?></a></td>
                                        <td><? echo date('d-m-Y',strtotime($sale->pur_date));?></td>
                                        <td>$ <?php echo number_format(($sale->venta*10)/100,0,',','.');?></td>
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
