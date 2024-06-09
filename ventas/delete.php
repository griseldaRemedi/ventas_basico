<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');

include('../app/controllers/ventas/cargar_venta.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ventas</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-danger">
                                <div class="card-header">
                                        <h3 class="card-title"><i class="fa fa-shopping-basket"></i> Eliminar Venta Número 
                                                <input type="text" style="text-align: left; border:none;" value="<?php echo $ventas_datos[0]['nro_venta'] ;?>" disabled>
                                                <input type="text" id="nro_venta" style="text-align: left; border:none;" value="<?php echo $ventas_datos[0]['nro_venta'] ;?>" hidden>
                                                <input type="text" id="id_venta" style="text-align: left; border:none;" value="<?php echo $ventas_datos[0]['id_ventas'] ;?>" hidden>
                                        </h3>
                                        <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                                </button>
                                        </div>
                                </div>
<!-- card-body--->              <div class="card-body">
                                        <i class="fa fa-shopping-cart"></i>
                                        <b>Carrito</b>

<!-- div tabla carrito--->                                             <div class="table-responsive">
                                                                                <table  class="table table-bordered table-sm table-hover table-striped">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th style="background-color: #9FC2EB; text-align: center;">Nro</th>
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

                                                                                                    foreach( $carrito_datos as $item ){  ?>
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
                                                                                                                   
                                                                                             } ?>
                                                                                        
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

<!-- fin card-body--->         </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-9">
                        <div class="card card-outline card-danger">
                                <div class="card-header">
                                        <h3 class="card-title"><i class="fa fa-user-check"></i> Datos del cliente </h3>
                                        <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                                </button>
                                        </div>
                                </div>
                                <div class="card-body"><!---- datos del cliente --->
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                            <label for="nombre_cliente">Nombre</label>
                                                            <input class="form-control" type="text" id="nombre_cliente" value="<?php echo $ventas_datos[0]['nombre_cliente'] ?>"  disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                            <label for="dni_cliente">DNI/CUIT</label>
                                                            <input class="form-control"  type="text" id="dni_cliente" value="<?php echo $ventas_datos[0]['dni_cliente'] ?>"    disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                            <label for="celular_cliente">Celular</label>
                                                            <input class="form-control"  type="text" id="celular_cliente" value="<?php echo $ventas_datos[0]['celular_cliente'] ?>"   disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                            <label for="email_cliente">Email</label>
                                                            <input class="form-control"  type="text" id="email_cliente"  value="<?php echo $ventas_datos[0]['nombre_cliente'] ?>"  disabled>
                                                    </div>
                                                </div>
                                                
                                                
                                            </div>
                                </div><!---- fin datos del cliente --->
                        
                        </div>
                       
                    </div> 
                    <div class="col-md-3">
                            <div class="card card-outline card-danger">
                                <div class="card-header">
                                        <h3 class="card-title"><i class="fas fa-file-invoice"></i> Datos de facturación </h3>
                                        <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                                </button>
                                        </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Monto total facturado</label>
                                        <input type="text" id="monto_a_abonar" class="form-control" style="background-color: yellow; text-align: center;" value="<?php echo number_format($subtotal_final, 2, ',', ''); ?>" disabled>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <button id="btn_eliminar_venta" class="btn btn-danger btn-block" type="button"><i class="fa fa-trash"></i> Eliminar venta</button>
                                        <div id="respuesta_eliminar_venta"></div>
                                        <script>
                                            $('#btn_eliminar_venta').click( function(){
                                                var id_ventas = $('#id_venta').val();
                                                var nro_ventas = $('#nro_venta').val();
                                                var url = "../app/controllers/ventas/borrar_venta.php";
                                                $.get( url, 
                                                    {   id_ventas:id_ventas,
                                                        nro_ventas:nro_ventas
                                                    }, 
                                                    function(datos){
                                                        //$('#respuesta_eliminar_venta').html(datos);
                                                        location.href="<?php //echo $URL?>/ventas";
                                                        return false;
                                                    });
                                            })
                                        </script>
                                    </div>
                                </div>
                            </div>    
                    </div>
                </div>

                
        </div><!-- /.container-fluid -->
    </div> <!-- /.content clase content -- Main content (comentario)-->
   
  </div> <!-- /.content-wrapper  es el div mas general-->
 

<?php
include('../layout/parte2.php');
?>


<script>
  $(function () {
    $("#example1").DataTable({    
     
       language: {
              "emptyTable": "No hay información",
              "decimal": "",
              "info": "Mostrando _START_ a _END_ de _TOTAL_ productos",
              "infoEmpty": "Mostrando 0 to 0 of 0 roles",
              "infoFiltered": "(Filtrado de MAX total Productos)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ Productos",
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
   "pageLength": 3, 
   lengthMenu: [[3, 10, 20, -1], [3, 10, 20, 'Todos']]
         }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

<script>
  $(function () {
    $("#example2").DataTable({    
     
       language: {
              "emptyTable": "No hay información",
              "decimal": "",
              "info": "Mostrando _START_ a _END_ de _TOTAL_ Clientes",
              "infoEmpty": "Mostrando 0 to 0 of 0 roles",
              "infoFiltered": "(Filtrado de MAX total Clientes)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ Clientes",
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
   "pageLength": 3, 
   lengthMenu: [[3, 10, 20, -1], [3, 10, 20, 'Todos']]
         }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
  });
</script>

<script>
  $(function () {
    $("#example3").DataTable({    
     
       language: {
              "emptyTable": "No hay información",
              "decimal": "",
              "info": "Mostrando _START_ a _END_ de _TOTAL_ Proveedores",
              "infoEmpty": "Mostrando 0 to 0 of 0 proveedores",
              "infoFiltered": "(Filtrado de MAX total proveedores)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ proveedores",
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
    }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
  });
</script>
