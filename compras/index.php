<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/compras/listado_de_compras.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1 class="m-0">Compras registradas</h1>
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

                    <!-- Card de listado de Compras -->
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                            <h3 class="card-title">Compras</h3>
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
                                                <th>Producto</th>
                                                <th>Nro de compra</th>
                                                <th>Fecha compra</th>
                                                <th>Proveedor</th>
                                                <th>Comprobante</th>
                                                <th>Usuario</th>
                                                <th>Precio Compra</th>
                                                <th>Cantidad</th>
                                                <th>Acciones</th>
                                              </tr>
                                        </thead>
                                        <tbody>

                                          <?php 
                                              $contador_compra = 0;
                                              foreach( $compras_datos as $compras_dato ){ 
                                                  $contador_compra++;
                                                  $id_compra = $compras_dato['id_compra'];
                                                  $id_proveedor = $compras_dato['id_proveedor'];
                                                ?>
                                                    <tr>
                                                          <td> <?php echo $contador_compra; ?> </td>
                                                          <td>  
                                                              <button type="button" class="btn btn-warning" data-toggle="modal"
                                                                data-target="#modal-producto<?php echo $compras_dato['id_compra'];  ?>">
                                                                <?php echo $compras_dato['nombre_producto'];  ?>
                                                              </button>

                                                                      <!--- Modal para MOSTRAR PRODUCTO ---->

                                                                      <div class="modal fade" id="modal-producto<?php echo $compras_dato['id_compra'];  ?>">
                                                                          <div class="modal-dialog modal-lg">
                                                                              <div class="modal-content">
                                                                                  <div class="modal-header  modal-header-primary">
                                                                                      <h4 class="modal-title">Datos del producto <?php echo $compras_dato['nombre_producto'];  ?></h4>
                                                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                          <span aria-hidden="true">&times;</span>
                                                                                      </button>
                                                                                  </div>

                                                                                  <div class="modal-body">  <!-- modal body --->

                                                                                          <div class="col-md-12">

                                                                                                <div class="row">
                                                                                                  <div class="col-md-9">
                                                                                                          <div class="row">
                                                                                                                <div class="col-md-4">
                                                                                                                      <div class="form-group">
                                                                                                                        <label for="codigo_producto<?php echo $id_compra;?>">Código</label>
                                                                                                                        <input id="codigo_producto<?php echo $id_compra;?>" name="codigo_producto<?php echo $id_compra;?>" type="text" class="form-control" value=" <?php echo $compras_dato['codigo'];  ?>" disabled>
                                                                                                                      </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-4">
                                                                                                                      <div class="form-group">
                                                                                                                        <label for="nombre_producto<?php echo $id_compra;?>">Nombre</label>
                                                                                                                        <input id="nombre_producto<?php echo $id_compra;?>" name="nombre_producto<?php echo $id_compra;?>" type="text" class="form-control" value=" <?php echo $compras_dato['nombre_producto'];  ?>" disabled>
                                                                                                                      </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-4">
                                                                                                                      <div class="form-group">
                                                                                                                        <label for="descripcion<?php echo $id_compra;?>">Descripción</label>
                                                                                                                        <input id="descripcion<?php echo $id_compra;?>" name="descripcion<?php echo $id_compra;?>" type="text" class="form-control" value=" <?php echo $compras_dato['descripcion'];  ?>" disabled>
                                                                                                                      </div>
                                                                                                                </div>
                                                                                                          </div>
                                                                                                          <div class="row">
                                                                                                                <div class="col-md-3">
                                                                                                                      <div class="form-group">
                                                                                                                        <label for="stock<?php echo $id_compra;?>">Stock</label>
                                                                                                                        <input id="stock<?php echo $id_compra;?>" name="stock<?php echo $id_compra;?>" type="text" class="form-control" value=" <?php echo $compras_dato['stock'];  ?>" disabled>
                                                                                                                      </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-3">
                                                                                                                      <div class="form-group">
                                                                                                                        <label for="stock_minimo<?php echo $id_compra;?>">Stock mínimo</label>
                                                                                                                        <input id="stock_minimo<?php echo $id_compra;?>" name="stock_minimo<?php echo $id_compra;?>" type="text" class="form-control" value=" <?php echo $compras_dato['stock_minimo'];  ?>" disabled>
                                                                                                                      </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-3">
                                                                                                                      <div class="form-group">
                                                                                                                        <label for="stock_maximo<?php echo $id_compra;?>">Stock máximo</label>
                                                                                                                        <input id="stock_maximo<?php echo $id_compra;?>" name="stock_maximo<?php echo $id_compra;?>" type="text" class="form-control" value=" <?php echo $compras_dato['stock_maximo'];  ?>" disabled>
                                                                                                                      </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-3">
                                                                                                                      <div class="form-group">
                                                                                                                        <label for="fecha_ingreso<?php echo $id_compra;?>">Fecha de ingreso</label>
                                                                                                                        <input id="fecha_ingreso<?php echo $id_compra;?>" name="fecha_ingreso<?php echo $id_compra;?>" type="text" class="form-control" value=" <?php echo $compras_dato['fecha_ingreso'];  ?>" disabled>
                                                                                                                      </div>
                                                                                                                </div>
                                                                                                          </div>
                                                                                                          <div class="row">
                                                                                                                <div class="col-md-3">
                                                                                                                          <div class="form-group">
                                                                                                                                <label for="precio_compra<?php echo $id_compra;?>">Precio compra</label>
                                                                                                                                <input id="precio_compra<?php echo $id_compra;?>" name="precio_compra<?php echo $id_compra;?>" type="text" class="form-control" value=" <?php echo $compras_dato['precio_compra'];  ?>" disabled>
                                                                                                                              </div>
                                                                                                                </div>
                                                                                                                           
                                                                                                                <div class="col-md-3">
                                                                                                                            <div class="form-group">
                                                                                                                              <label for="precio_venta<?php echo $id_compra;?>">Precio venta</label>
                                                                                                                              <input id="precio_venta<?php echo $id_compra;?>" name="precio_venta<?php echo $id_compra;?>" type="text" class="form-control" value=" <?php echo $compras_dato['precio_venta'];  ?>" disabled>
                                                                                                                            </div>
                                                                                                                </div>
                                                                                                                
                                                                                                                <div class="col-md-3">
                                                                                                                            <div class="form-group">
                                                                                                                              <label for="usuario<?php echo $id_compra;?>">Usuario</label>
                                                                                                                              <input id="usuario<?php echo $id_compra;?>" name="usuario<?php echo $id_compra;?>" type="text" class="form-control" value=" <?php echo $compras_dato['nombre_usuario'];  ?>" disabled>
                                                                                                                            </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-3">
                                                                                                                            <div class="form-group">
                                                                                                                              <label for="categoria<?php echo $id_compra;?>">Categoria</label>
                                                                                                                              <input id="categoria<?php echo $id_compra;?>" name="categoria<?php echo $id_compra;?>" type="text" class="form-control" value=" <?php echo $compras_dato['nombre_categoria'];  ?>" disabled>
                                                                                                                            </div>
                                                                                                                </div>
                                                                                                              </div>  
                                                                                                          
                                                                                                  </div>
                                                                                                  <div class="col-md-3">
                                                                                                    <div class="form-group">
                                                                                                              <label for="imagen<?php echo $id_compra;?>">Imagen</label>
                                                                                                              <br>
                                                                                                              <center>
                                                                                                                  <img src="<?php echo $URL."/almacen/img_productos/".$compras_dato['imagen']; ?>" alt="Imagen del producto">
                                                                                                              </center>
                                                                                                    </div>      
                                                                                                  </div>
                                                                                                </div>
                                                                                          </div>

                                                                                  </div>  <!-- fin modal body --->
                                                                                  
                                                                              </div>
                                                                          <!-- /.modal-content -->
                                                                          </div>
                                                                          <!-- /.modal-dialog -->
                                                                      </div>    <!-- /.modal -->

                                                                      <script>
                                                                        $("#btn_update<?php echo $id_proveedor;?>").click( function(){
                                                                                var nombre_proveedor = $("#nombre_proveedor<?php echo $id_proveedor;?>").val();
                                                                                var id_proveedor = $("#id_proveedor<?php echo $id_proveedor;?>").val();
                                                                                var celular = $("#celular<?php echo $id_proveedor;?>").val();
                                                                                var telefono = $("#telefono<?php echo $id_proveedor;?>").val();
                                                                                var empresa = $("#empresa<?php echo $id_proveedor;?>").val();
                                                                                var email = $("#email<?php echo $id_proveedor;?>").val();
                                                                                var direccion = $("#direccion<?php echo $id_proveedor;?>").val();

                                                                                  if (nombre_proveedor == ""){
                                                                                          $("#nombre_proveedor<?php echo $id_proveedor;?>").focus();
                                                                                          $("#lbl_nombre<?php echo $id_proveedor;?>").css('display', 'block');
                                                                                    } else if(nombre_proveedor == ""){
                                                                                          $("#celular<?php echo $id_proveedor;?>").focus();
                                                                                          $("#lbl_celular<?php echo $id_proveedor;?>").css('display', 'block');
                                                                                    } else if(empresa == ""){
                                                                                          $("#empresa<?php echo $id_proveedor;?>").focus();
                                                                                          $("#lbl_empresa<?php echo $id_proveedor;?>").css('display', 'block');
                                                                                    } else if(direccion == ""){
                                                                                          $("#direccion<?php echo $id_proveedor;?>").focus();
                                                                                          $("#lbl_direccion<?php echo $id_proveedor;?>").css('display', 'block');
                                                                                    } else {
                                                                                            var url = "../app/controllers/proveedores/update.php"; 
                                                                                            $.get(url, { id_proveedor:id_proveedor,
                                                                                                        nombre_proveedor:nombre_proveedor,
                                                                                                        celular:celular,
                                                                                                        telefono:telefono,
                                                                                                        empresa:empresa,
                                                                                                        email:email,
                                                                                                        direccion:direccion,
                                                                                            }, function ($datos) { 
                                                                                                $("#respuesta_update<?php echo $id_proveedor;?>").html($datos);
                                                                                              });
                                                                                    }

                                                                              })
                                                                            </script>
                                                                      <!--- FIN Modal para MOSTRAR PRODUCTO ---->

                                                          
                                                          </td>
                                                          <td> <?php echo $compras_dato['nro_compra'];  ?> </td>
                                                          <td> <?php echo $compras_dato['fecha_compra'];  ?> </td>
                                                          <td> <?php //echo $compras_dato['nombre_proveedor'];  ?>
                                                        
                                                              <button type="button" class="btn btn-warning" data-toggle="modal"
                                                                data-target="#modal-proveedor<?php echo $compras_dato['id_compra'];  ?>">
                                                                <?php echo $compras_dato['nombre_proveedor'];  ?>
                                                              </button>

                                                                      <!--- Modal para MOSTRAR PROVEEDOR ---->

                                                                      <div class="modal fade" id="modal-proveedor<?php echo $compras_dato['id_compra'];  ?>">
                                                                          <div class="modal-dialog modal-lg">
                                                                              <div class="modal-content">
                                                                                  <div class="modal-header  modal-header-primary">
                                                                                      <h4 class="modal-title">Datos del Proveedor <?php echo $compras_dato['nombre_proveedor'];  ?></h4>
                                                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                          <span aria-hidden="true">&times;</span>
                                                                                      </button>
                                                                                  </div>

                                                                                  <div class="modal-body">  <!-- modal body --->

                                                                                          <div class="col-md-12">

                                                                                                <div class="row">
                                                                                                  <div class="col-md-12">
                                                                                                          <div class="row">
                                                                                                                <div class="col-md-4">
                                                                                                                      <div class="form-group">
                                                                                                                        <label for="nombre_proveedor<?php echo $id_compra;?>">Nombre</label>
                                                                                                                        <input id="nombre_proveedor<?php echo $id_compra;?>" name="nombre_proveedor<?php echo $id_compra;?>" type="text" class="form-control" value=" <?php echo $compras_dato['nombre_proveedor'];  ?>" disabled>
                                                                                                                      </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-4">
                                                                                                                      <div class="form-group">
                                                                                                                        <label for="celular_proveedor<?php echo $id_compra;?>">Celular</label>
                                                                                                                        <div>
                                                                                                                            <a class="btn btn-success" target="_blank" href="https://wa.me/54<?php echo $compras_dato['celular']; ?>">
                                                                                                                                <i class="fa fa-phone"></i>
                                                                                                                                <?php echo $compras_dato['celular']; ?>
                                                                                                                              </a>
                                                                                                                          </div>
                                                                                                                      </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-4">
                                                                                                                      <div class="form-group">
                                                                                                                        <label for="email_proveedor<?php echo $id_compra;?>">Email</label>
                                                                                                                        <input id="email_proveedor<?php echo $id_compra;?>" name="email_proveedor<?php echo $id_compra;?>" type="text" class="form-control" value=" <?php echo $compras_dato['descripcion'];  ?>" disabled>
                                                                                                                      </div>
                                                                                                                </div>
                                                                                                          </div>
                                                                                                          <div class="row">
                                                                                                                <div class="col-md-4">
                                                                                                                      <div class="form-group">
                                                                                                                        <label for="empresa<?php echo $id_compra;?>">Empresa</label>
                                                                                                                        <input id="empresa<?php echo $id_compra;?>" name="empresa<?php echo $id_compra;?>" type="text" class="form-control" value=" <?php echo $compras_dato['empresa'];  ?>" disabled>
                                                                                                                      </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-4">
                                                                                                                      <div class="form-group">
                                                                                                                        <label for="telefono_empresa<?php echo $id_compra;?>">Teléfono empresa</label>
                                                                                                                        <input id="telefono_empresa<?php echo $id_compra;?>" name="telefono_empresa<?php echo $id_compra;?>" type="text" class="form-control" value=" <?php echo $compras_dato['telefono_empresa'];  ?>" disabled>
                                                                                                                      </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-4">
                                                                                                                      <div class="form-group">
                                                                                                                        <label for="direccion<?php echo $id_compra;?>">Dirección empresa</label>
                                                                                                                        <input id="direccion<?php echo $id_compra;?>" name="direcciono<?php echo $id_compra;?>" type="text" class="form-control" value=" <?php echo $compras_dato['direccion'];  ?>" disabled>
                                                                                                                      </div>
                                                                                                                </div>
                                                                                                          </div>
                                                                                                  </div>
                                                                                                  
                                                                                                </div>
                                                                                          </div>

                                                                                  </div>  <!-- fin modal body --->
                                                                                  
                                                                              </div>
                                                                          <!-- /.modal-content -->
                                                                          </div>
                                                                          <!-- /.modal-dialog -->
                                                                      </div>    <!-- /.modal -->

                                                                      <!--- FIN Modal para MOSTRAR PROVEEDOR ---->
                                                          
                                                          </td>
                                                          <td> <?php echo $compras_dato['comprobante'];  ?> </td>
                                                          <td> <?php echo $compras_dato['nombre_usuario'];  ?> </td>
                                                          <td> <?php echo $compras_dato['precio_compra'];  ?> </td>
                                                          <td> <?php echo $compras_dato['cantidad'];  ?> </td>
                                                          <td> 
                                                            <center>
                                                                <div class="btn-group">
                                                                  <a href="show.php?id=<?php echo $compras_dato['id_compra']; ?>" type="button" class="btn btn-info btn-sm"><i class="fa fa-eye"></i>Mostrar</a>
                                                                  <a href="update.php?id=<?php echo $compras_dato['id_compra']; ?>" type="button" class="btn btn-success btn-sm"><i class="fa fa-pen"></i>Editar</a>
                                                                  <a href="delete.php?id=<?php echo $compras_dato['id_compra']; ?>" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Borrar</a>
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
              "info": "Mostrando _START_ a _END_ de _TOTAL_ compras",
              "infoEmpty": "Mostrando 0 to 0 of 0 roles",
              "infoFiltered": "(Filtrado de MAX total Compras)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ Compras",
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