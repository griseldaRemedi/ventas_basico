<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
$factura = false;
include('../app/controllers/ventas/listado_de_ventas.php');
include('../app/controllers/ventas/listado_carrito_total.php');
include('../app/controllers/clientes/listado_de_clientes.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1 class="m-0">Ventas registradas</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

            <!-- div row -->
            <div class="row">
                <div class="col-md-12">

                    <!-- Card de listado de Ventas -->
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                            <h3 class="card-title">Ventas</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                              <div class="table table-responsive">
                                  <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                              <tr>
                                                <th>Nro</th>
                                                <th>Nro de Venta</th>
                                                <th>Producto</th>
                                                <th>Cliente</th>
                                                <th>Total abonado</th>
                                                <th>Acciones</th>
                                              </tr>
                                        </thead>
                                        <tbody>

                                          <?php 
                                              $contador_venta = 0;
                                              foreach( $ventas_datos as $ventas_dato ){ 
                                                  $contador_venta++;
                                                  $nro_venta = $ventas_dato['nro_venta'];
                                                  $id_venta = $ventas_dato['id_ventas'];
                                                  $id_cliente = $ventas_dato['id_cliente'];
                                                  $total_pagado = $ventas_dato['total_pagado'];
                                                  $nombre_cliente = $ventas_dato['nombre_cliente'];
                                                ?>
                                                    <tr>
                                                          <td> <?php echo $contador_venta; ?> </td>
                                                          <td> <?php echo $nro_venta; ?> </td>
                                                          <td>  
                                                              <button type="button" class="btn btn-primary" data-toggle="modal"
                                                                data-target="#modal-producto<?php echo $nro_venta;  ?>">
                                                                <i class="fa fa-shopping-basket"></i> Ver carrito
                                                              </button>

                                                                      <!--- Modal para MOSTRAR PRODUCTO DE CARRITO ---->

                                                                      <div class="modal fade" id="modal-producto<?php echo $nro_venta;  ?>">
                                                                          <div class="modal-dialog modal-lg">
                                                                              <div class="modal-content">
                                                                                  <div class="modal-header  modal-header-primary">
                                                                                      <h4 class="modal-title">Productos de la Venta Nro  <?php echo $nro_venta;  ?></h4>
                                                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                          <span aria-hidden="true">&times;</span>
                                                                                      </button>
                                                                                  </div>

                                                                                  <div class="modal-body">  <!-- modal body --->

                <!-- div tabla carrito--->                                             <div class="table-responsive">
                                                                                                <table  class="table table-bordered table-sm table-hover table-striped">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                            <th style="background-color: #9FC2EB; text-align: center;">Nro de Orden</th>
                                                                                                            <th style="background-color: #9FC2EB; text-align: center;">Producto</th>
                                                                                                            <th style="background-color: #9FC2EB; text-align: center;">Descripción</th>
                                                                                                            <th style="background-color: #9FC2EB; text-align: center;">Cantidad</th>
                                                                                                            <th style="background-color: #9FC2EB; text-align: center;">Precio Unitario</th>
                                                                                                            <th style="background-color: #9FC2EB; text-align: center;">Subtotal</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>

                                                                                                            <?php   $contador_items = 1;
                                                                                                                    $cantidad_total = 0;
                                                                                                                    $precio_unitario_total = 0;
                                                                                                                    $subtotal_final = 0;

                                                                                                                    foreach( $carrito_datos_completos as $item ){  
                                                                                                                        if ($nro_venta == $item['nro_venta']) {?>
                                                                                                                        <tr>
                                                                                                                            <td><?= $contador_items++; ?></td>
                                                                                                                            <td><?= $item['nombre_producto']; ?></td>
                                                                                                                            <td><?= $item['descripcion']; ?></td>
                                                                                                                            <td><?= $item['cantidad']; ?><input type="text" id="stock<?php echo $item['id_carrito']; ?>" value="<?php echo $item['stock']; ?>" hidden></td>
                                                                                                                            <td><?= number_format($item['precio_venta'], 2, ',', ' '); ?></td>
                                                                                                                            <td><?= number_format($item['cantidad'] * $item['precio_venta'], 2, ',', ' '); ?></td>
                                                                                                                        </tr>   
                                                                                                                <?php           $cantidad_total = $cantidad_total +  $item['cantidad'];
                                                                                                                                $precio_unitario_total = $precio_unitario_total + $item['precio_venta'] ;
                                                                                                                                $subtotal_final = $subtotal_final + ($item['cantidad'] * $item['precio_venta']);
                                                                                                                                
                                                                                                                       } 
                                                                                                                    }?>
                                                                                                        
                                                                                                        <tr>
                                                                                                            <th colspan="3" style="background-color: #9FC2EB; text-align: right;">Total</th>
                                                                                                            <th><?php echo $cantidad_total; ?></th>
                                                                                                            <th><?php echo  number_format($precio_unitario_total, 2, ',', ' ');  ?></th>
                                                                                                            <th><?php echo  number_format($subtotal_final, 2, ',', ' ');  ?></th>
                                                                                                            <th></th>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                                
                                                                                        </div><!-- fin div tabla carrito--->  


                                                                                  </div>  <!-- fin modal body --->
                                                                                  
                                                                              </div>
                                                                          <!-- /.modal-content -->
                                                                          </div>
                                                                          <!-- /.modal-dialog -->
                                                                      </div>    <!-- /.modal -->

                                                                      <!--- FIN Modal para MOSTRAR PRODUCTOS DEL CARRITO ---->
                                                          
                                                        </td>
                                                        <td>  <button type="button" class="btn btn-primary" data-toggle="modal"
                                                                data-target="#modal-cliente<?php echo $nro_venta;  ?>">
                                                                <i class="fa fa-user"></i> <?php echo $nombre_cliente; ?>
                                                              </button> 

                                                <!--- Modal para MOSTRAR CLIENTE ---->

                                                                      <div class="modal fade modal" id="modal-cliente<?php echo $nro_venta;  ?>">
                                                                          <div class="modal-dialog modal-lg">
                                                                              <div class="modal-content">
                                                                                  <div class="modal-header  modal-header-primary">
                                                                                      <h4 class="modal-title">Datos del cliente</h4>
                                                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                          <span aria-hidden="true">&times;</span>
                                                                                      </button>
                                                                                    </div>
                                                                                    <div class="modal-body">  <!-- modal body --->
                                                                            <!-- Card de listado de Clientes -->
                                                                                            <div class="card card-outline card-primary ">
                                                                                                <div class="card-header">
                                                                                                <h3 class="card-title">Detalle</h3>
                                                                                                    <div class="card-tools">
                                                                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            <div class="card-body">
                                                                                                
                                                                                                    <div class="row">
                                                                                                            <div class="col-md-3">
                                                                                                                <div class="form-group">
                                                                                                                        <label for="nombre_cliente">Nombre</label>
                                                                                                                        <input class="form-control" type="text" id="nombre_cliente" value="<?php echo $ventas_dato['nombre_cliente']; ?>" disabled>
                                                                                                                        <input class="form-control" type="text" id="id_cliente" hidden>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-3">
                                                                                                                <div class="form-group">
                                                                                                                        <label for="dni_cliente">DNI/CUIT</label>
                                                                                                                        <input class="form-control"  type="text" id="dni_cliente"  value="<?php echo $ventas_dato['dni_cliente']; ?>"  disabled>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-2">
                                                                                                                <div class="form-group">
                                                                                                                        <label for="celular_cliente">Celular</label>
                                                                                                                        <input class="form-control"  type="text" id="celular_cliente"  value="<?php echo $ventas_dato['celular_cliente']; ?>"  disabled>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-4">
                                                                                                                <div class="form-group">
                                                                                                                        <label for="email_cliente">Email</label>
                                                                                                                        <input class="form-control"  type="text" id="email_cliente"  value="<?php echo $ventas_dato['email_cliente']; ?>"  disabled>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                    </div>
                                                                                                    
                                                                                                </div>
                                                                                            </div>
                                                                                        <!-- FIN Card de listado de CLIENTE -->
                                                                                    
                                                                                    </div>  <!-- fin modal body --->                                                                                 
                                                                              </div>
                                                                          <!-- /.modal-content -->
                                                                          </div>
                                                                          <!-- /.modal-dialog -->
                                                                      </div>    <!-- /.modal -->

                                                                      <!--- FIN Modal para MOSTRAR CLIENTE ---->


                                                        </td>
                                                        <td> <center> <?php echo $total_pagado;  ?> </center> </td>
                                                          
                                                        <td> 
                                                            <center>
                                                                <div>
                                                                  <a href="show.php?id_venta=<?php echo $id_venta; ?>" type="button" class="btn btn-info btn-sm"><i class="fa fa-eye"></i>Mostrar</a>
                                                                  <a href="delete.php?id_venta=<?php echo $id_venta; ?>" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Borrar</a>
                                                                  <a href="factura.php?id_venta=<?php echo $id_venta; ?>&nro_vta=<?php echo $nro_venta; ?>" type="button" class="btn btn-success btn-sm"><i class="fa fa-print"></i>Imprimir</a>
                                                                </div>
                                                            </center>                                                           
                                                        </td>
                                                    </tr>

                                         <?php } ?>

                                        </tbody>
                                    </table>
                            
                              </div>    
                            </div>
                        </div>
                    <!-- FIN Card de listado de compras -->

                </div>
            </div> <!-- FIN div row -->


    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php
include('../layout/parte2.php');
include('../layout/mensajes.php');
?>

<script>
  $(function () {
    $("#example1").DataTable({    
     
       language: {
              "emptyTable": "No hay información",
              "decimal": "",
              "info": "Mostrando _START_ a _END_ de _TOTAL_ ventas",
              "infoEmpty": "Mostrando 0 to 0 of 0 roles",
              "infoFiltered": "(Filtrado de MAX total Ventas)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ Ventas",
              "loadingRecords": "Cargando...",
              "processing": "Procesando...",
              "search": "Buscador:",
              "zeroRecords": "Sin resultados encontrados",
              "paginate": {
                  "first": "Primero",
                  "last": "Ultimo",
                  "next": "Siguiente",
                  "previous": "Anterior"
              }
             },
      "responsive": true, "lengthChange": true, "autoWidth": false,
   "pageLength": 5, 
      buttons: [{
                        extend: 'collection',
                        text: 'Reportes',
                        orientation: 'landscape',
                        buttons: [{
                            text: 'Copiar',
                            extend: 'copy'
                        }, {
                            extend: 'pdf',
                        }, {
                            extend: 'csv',
                        }, {
                            extend: 'excel',
                        }, {
                            text: 'Imprimir',
                            extend: 'print'
                        }
                        ]
                    },
                        {
                            extend: 'colvis',
                            text: 'Visor de columnas'
                        }
                    ],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>