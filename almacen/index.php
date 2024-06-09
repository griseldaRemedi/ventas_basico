<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/almacen/listado_de_productos.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1 class="m-0">Productos registrados</h1>
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

                    <!-- Card de listado de Productos -->
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                            <h3 class="card-title">Productos</h3>
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
                                                <th>Código</th>
                                                <th>Categoría</th>
                                                <th>Imagen</th>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th>Stock</th>
                                                <th>Precio Compra</th>
                                                <th>Precio Venta</th>
                                                <th>Usuario</th>
                                                <th>Acciones</th>
                                              </tr>
                                        </thead>
                                        <tbody>

                                          <?php 
                                              $contador_prod = 0;
                                              foreach( $productos_datos as $producto ){ 
                                                  $contador_prod++;
                                                ?>
                                                    <tr>
                                                          <td> <?php echo $contador_prod; ?> </td>
                                                          <td> <?php echo $producto['codigo'];  ?> </td>
                                                          <td> <?php echo $producto['nombre_categoria'];  ?> </td>
                                                          <td><?php if( $producto['imagen'] != "") { ?>
                                                                        <center><img style="width: 50px" src="<?php echo $URL?>/almacen/img_productos/<?php echo $producto['imagen']?>"; alt="imagen iluststrativa"></center>
                                                              <?php } else {  ?>
                                                                        <center><img style="width: 100px" src="<?php echo $URL?>/almacen/img_productos/sin_imagen.png"; alt="Sin imagen disponible"></center>                                                              <?php } ?>
                                                          </td>
                                                          <td> <?php echo $producto['nombre'];  ?> </td>
                                                          <td> <?php echo substr($producto['descripcion'], 0, 100);  ?> </td>
                                                                <?php 
                                                                      $stock = $producto['stock'];
                                                                      $stock_minimo = $producto['stock_minimo'];
                                                                      $stock_maximo = $producto['stock_maximo'];
                                                                      $estilo = "";
                                                                      if ( $stock > $stock_maximo  ){
                                                                          $estilo = "style='background-color: #c1e7bb'";
                                                                      } else if ( $stock < $stock_minimo){
                                                                            $estilo = "style='background-color: #f6caac'";
                                                                      }
                                                                ?>
                                                          <td <?php echo $estilo; ?>> <?php echo $producto['stock'];  ?> </td>
                                                          <td> <?php echo $producto['precio_compra'];  ?> </td>
                                                          <td> <?php echo $producto['precio_venta'];  ?> </td>
                                                          <td> <?php echo $producto['email'];  ?> </td>
                                                          <td> 
                                                            <center>
                                                                <div class="btn-group">
                                                                  <a href="show.php?id=<?php echo $producto['id_producto']; ?>" type="button" class="btn btn-info btn-sm"><i class="fa fa-eye"></i>Mostrar</a>
                                                                  <a href="update.php?id=<?php echo $producto['id_producto']; ?>" type="button" class="btn btn-success btn-sm"><i class="fa fa-pen"></i>Editar</a>
                                                                  <a href="delete.php?id=<?php echo $producto['id_producto']; ?>" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Borrar</a>
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
                    <!-- FIN Card de listado de productos -->

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