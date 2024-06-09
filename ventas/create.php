<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');

include('../app/controllers/ventas/listado_de_ventas.php');
include('../app/controllers/ventas/listado_carrito.php');
include('../app/controllers/almacen/listado_de_productos.php');
include('../app/controllers/clientes/listado_de_clientes.php');
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
                        <div class="card card-outline card-primary">
                                <div class="card-header">
                                        <h3 class="card-title"><i class="fa fa-shopping-basket"></i> Venta número 
                                                <input type="text" style="text-align: left; border:none;" value="<?php echo $ultimo_nro_venta['max_nro_venta'] + 1  ;?>" disabled>
                                                <input type="text" id="nro_venta" style="text-align: left; border:none;" value="<?php echo  $ultimo_nro_venta['max_nro_venta'] + 1   ;?>" hidden>
                                        </h3>
                                        <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                                </button>
                                        </div>
                                </div>
<!-- card-body--->              <div class="card-body">
                                        <b>Carrito</b>
                                        <button type="button" style="margin: 10px;" class="btn btn-primary" data-toggle="modal" data-target="#modal-producto">
                                            <i class="fa fa-search"></i>
                                            Buscar Producto                
                                        </button>

                                                 <!--- Modal para BUSCAR PRODUCTO ---->

                                                                      <div class="modal fade" id="modal-producto">
                                                                          <div class="modal-dialog modal-lg">
                                                                              <div class="modal-content">
                                                                                  <div class="modal-header  modal-header-primary">
                                                                                      <h4 class="modal-title">Selecciona el producto buscado</h4>
                                                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                          <span aria-hidden="true">&times;</span>
                                                                                      </button>
                                                                                    </div>
                                                                                    <div class="modal-body">  <!-- modal body --->
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
                                                                                                                    <th>Seleccionar</th>
                                                                                                                    <th>Código</th>
                                                                                                                    <th>Categoría</th>
                                                                                                                    <th>Imagen</th>
                                                                                                                    <th>Nombre</th>
                                                                                                                    <th>Descripción</th>
                                                                                                                    <th>Stock</th>
                                                                                                                    <th>Precio Compra</th>
                                                                                                                    <th>Precio Venta</th>
                                                                                                                    <th>Usuario</th>
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
                                                                                                                            <td> 
                                                                                                                                <button id="btn_seleccionar_<?php echo $producto['id_producto']; ?>" class="btn btn-success">Seleccionar</button>
<!-- script seleccionar -->                                                                                                     <script>
                                                                                                                                    $('#btn_seleccionar_<?php echo $producto['id_producto']; ?>').click(function(){ 
                                                                                                                                        $('#id_producto_modal').val('<?php echo trim($producto['id_producto']);?>');                                                                                                                                  
                                                                                                                                        $('#producto_modal').val('<?php echo trim($producto['nombre']);?>');                                                                                                                                  
                                                                                                                                        $('#producto_descripcion_modal').val('<?php echo trim($producto['descripcion']);?>');                                                                                                                                  
                                                                                                                                        $('#producto_precio_venta__modal').val('<?php echo trim($producto['precio_venta']);?>');                                                                                                                                  
                                                                                                                                        $('#producto_modal').focus();
                                                                                                                                    });
                                                                                                                                </script>
                                                                                                                            </td>
                                                                                                                            <td> <?php echo $producto['codigo'];  ?> </td>
                                                                                                                            <td> <?php echo $producto['nombre_categoria'];  ?> </td>
                                                                                                                            <td><?php if( $producto['imagen'] != "") { ?>
                                                                                                                                            <center><img style="width: 50px" src="<?php echo $URL?>/almacen/img_productos/<?php echo $producto['imagen']; ?>"; alt="imagen iluststrativa"></center>
                                                                                                                                <?php } else {  ?>
                                                                                                                                            <center><img style="width: 100px" src="<?php echo $URL?>/almacen/img_productos/sin_imagen.png"; alt="Sin imagen disponible"></center>                                                             
                                                                                                                                <?php } ?>
                                                                                                                            </td>
                                                                                                                            <td> <?php echo $producto['nombre'];  ?> </td>
                                                                                                                            <td> <?php echo substr($producto['descripcion'], 0, 50);  ?> </td>
                                                                                                                            <td> <?php echo $producto['stock'];  ?> </td>
                                                                                                                            <td> <?php echo $producto['precio_compra'];  ?> </td>
                                                                                                                            <td> <?php echo $producto['precio_venta'];  ?> </td>
                                                                                                                            <td> <?php echo $producto['email'];  ?> </td>
                                                                                                                        </tr>

                                                                                                            <?php } ?>

                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                        <div class="row">
                                                                                                            <div class="col-md-3">
                                                                                                                <div class="form-group">
                                                                                                                        <label for="producto_modal">Producto</label>
                                                                                                                        <input class="form-control" type="text" id="producto_modal"  disabled>
                                                                                                                        <input class="form-control" type="text" id="id_producto_modal" hidden>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-3">
                                                                                                                <div class="form-group">
                                                                                                                        <label for="producto_descripcion_modal">Descripción</label>
                                                                                                                        <input class="form-control"  type="text" id="producto_descripcion_modal" value="<?php echo ''; ?>" disabled>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-2">
                                                                                                                <div class="form-group">
                                                                                                                        <label for="producto_cantidad_modal">Cantidad</label>
                                                                                                                        <input class="form-control"  type="text" id="producto_cantidad_modal" value="<?php echo ''; ?>">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-2">
                                                                                                                <div class="form-group">
                                                                                                                        <label for="producto_precio_venta__modal">Precio Unitario</label>
                                                                                                                        <input class="form-control"  type="text" id="producto_precio_venta__modal" value="<?php echo ''; ?>" disabled>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-2" style="display: flex; align-items: center;">
                                                                                                                <div class="form-group">
                                                                                                                        <label for=""></label>
                                                                                                                        <button type="button" id="btn_agregar_a_carrito" class="btn btn-block btn-primary" style="margin:auto;">Agregar</button>
                                                                                                                        <div id="respuesta_carrito"></div>
                                                                                                                        <script>
                                                                                                                            $('#btn_agregar_a_carrito').click(function(){
                                                                                                                                var nro_venta = $('#nro_venta').val();
                                                                                                                                var id_producto = $('#id_producto_modal').val();
                                                                                                                                var cantidad = $('#producto_cantidad_modal').val();
                                                                                                                              
                                                                                                                                if(id_producto==''){
                                                                                                                                        alert('Debes seleccionar un producto');
                                                                                                                                } else if(cantidad==''){
                                                                                                                                            alert('Debes ingresar una cantidad');
                                                                                                                                            $('#producto_cantidad_modal').focus()
                                                                                                                                } else {
                                                                                                                                        var url = "../app/controllers/ventas/agregar_a_carrito.php";
                                                                                                                                        $.get(url, {
                                                                                                                                            nro_venta :nro_venta,
                                                                                                                                            id_producto :id_producto,
                                                                                                                                            cantidad :cantidad 
                                                                                                                                        } , function(datos){
                                                                                                                                            $('#respuesta_carrito').html(datos);
                                                                                                                                        });
                                                                                                                                }
                                                                                                                            });
                                                                                                                        </script>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            
                                                                                                        </div>
                                                                                                </div>
                                                                                                    
                                                                                                </div>
                                                                                            </div>
                                                                                        <!-- FIN Card de listado de productos -->
                                                                                    
                                                                                    </div>  <!-- fin modal body --->                                                                                 
                                                                              </div>
                                                                          <!-- /.modal-content -->
                                                                          </div>
                                                                          <!-- /.modal-dialog -->
                                                                      </div>    <!-- /.modal -->

                                                                      <!--- FIN Modal para BUSCAR PRODUCTO ---->


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
                                                                                            <th style="background-color: #9FC2EB; text-align: center;">Acciones</th>
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
                                                                                                            <td>
                                                                                                                <center>
                                                                                                                    <form action="../app/controllers/ventas/sacar_de_carrito.php" method="post">
                                                                                                                            <input name="id_carrito" value="<?php echo $item['id_carrito']?>" type="text" hidden>
                                                                                                                            <button type="submit" class="btn btn-danger btn-cm"><i class="fa fa-trash"></i> Borrar</button>
                                                                                                                    </form>
                                                                                                                </center>
                                                                                                            </td>
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
                        <div class="card card-outline card-primary">
                                <div class="card-header">
                                        <h3 class="card-title"><i class="fa fa-user-check"></i> Datos del cliente </h3>
                                        <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                                </button>
                                        </div>
                                </div>
                                <div class="card-body"><!---- datos del cliente --->
                                        <b>Cliente</b>
                                        <button type="button" style="margin: 10px;" class="btn btn-primary" data-toggle="modal" data-target="#modal-cliente">
                                            <i class="fa fa-search"></i>
                                            Buscar Cliente                
                                        </button>

                                                 <!--- Modal para BUSCAR CLIENTE ---->

                                                                      <div class="modal fade" id="modal-cliente">
                                                                          <div class="modal-dialog modal-lg">
                                                                              <div class="modal-content">
                                                                                  <div class="modal-header  modal-header-primary">
                                                                                      <h4 class="modal-title">Selecciona el cliente buscado</h4>
                                                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                          <span aria-hidden="true">&times;</span>
                                                                                      </button>
                                                                                    </div>
                                                                                    <div class="modal-body">  <!-- modal body --->
                                                                            <!-- Card de listado de Clientes -->
                                                                                            <div class="card card-outline card-primary">
                                                                                                <div class="card-header">
                                                                                                <h3 class="card-title">Clientes</h3>
                                                                                                    <div class="card-tools">
                                                                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            <div class="card-body">
                                                                                                <div class="table table-responsive">
                                                                                                    <table id="example2" class="table table-bordered table-striped">
                                                                                                            <thead>
                                                                                                                <tr>
                                                                                                                    <th>Nro</th>
                                                                                                                    <th>Seleccionar</th>
                                                                                                                    <th>Nombre</th>
                                                                                                                    <th>DNI / CUIL</th>
                                                                                                                    <th>Celular</th>
                                                                                                                    <th>Email</th>
                                                                                                                </tr>
                                                                                                            </thead>
                                                                                                            <tbody>

                                                                                                            <?php 
                                                                                                                $contador_cliente = 0;
                                                                                                                foreach( $clientes_datos as $cliente ){ 
                                                                                                                    $contador_cliente++;
                                                                                                                    ?>
                                                                                                                        <tr>
                                                                                                                            <td> <?php echo $contador_cliente; ?> </td>
                                                                                                                            <td> 
                                                                                                                                <button id="btn_seleccionar_cliente_<?php echo  $cliente['id_cliente']; ?>" class="btn btn-success">Seleccionar</button>
                                     <!-- script seleccionar -->                                                                <script>
                                                                                                                                        $('#btn_seleccionar_cliente_<?php echo $cliente['id_cliente']; ?>').click(function(){ 
                                                                                                                                            $('#nombre_cliente').val('<?php echo $cliente['nombre_cliente'];?>');
                                                                                                                                            $('#id_cliente').val('<?php echo $cliente['id_cliente'];?>');                                                                                                                                  
                                                                                                                                            $('#dni_cliente').val('<?php echo $cliente['dni_cliente'];?>');                                                                                                                                  
                                                                                                                                            $('#celular_cliente').val('<?php echo $cliente['celular_cliente'];?>');                                                                                                                                  
                                                                                                                                            $('#email_cliente').val('<?php echo $cliente['email_cliente'];?>'); 
                                                                                                                                            $('#modal-cliente').modal('hide');
                                                                                                                                    });
                                                                                                                                </script>
                                                                                                                            </td>
                                                                                                                            <td> <?php echo $cliente['nombre_cliente'];  ?> </td>
                                                                                                                            <td><center> <?php echo $cliente['dni_cliente'];  ?> </center></td>
                                                                                                                            <td><center> <?php echo $cliente['celular_cliente'];  ?> </center></td>
                                                                                                                            <td> <?php echo $cliente['email_cliente'];  ?> </td>
                                                                                                                        </tr>
                                                                                                            <?php } ?>

                                                                                                            </tbody>
                                                                                                        </table>

                                                                                                    <div class="row">
                                                                                                            <div class="col-md-3">
                                                                                                                <div class="form-group">
                                                                                                                        <label for="nombre_cliente_modal">Nombre </label>
                                                                                                                        <input class="form-control" type="text" id="nombre_cliente_modal" >
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-3">
                                                                                                                <div class="form-group">
                                                                                                                        <label for="dni_cliente_modal">DNI</label>
                                                                                                                        <input class="form-control"  type="text" id="dni_cliente_modal" value="<?php echo ''; ?>" >
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-2">
                                                                                                                <div class="form-group">
                                                                                                                        <label for="celular_cliente_modal">Celular</label>
                                                                                                                        <input class="form-control"  type="text" id="celular_cliente_modal" value="<?php echo ''; ?>">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-2">
                                                                                                                <div class="form-group">
                                                                                                                        <label for="email_cliente_modal">Email</label>
                                                                                                                        <input class="form-control"  type="text" id="email_cliente_modal" value="<?php echo ''; ?>" >
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-2" style="display: flex; align-items: center;">
                                                                                                                <div class="form-group">
                                                                                                                        <label for=""></label>
                                                                                                                        <button type="button" id="btn_agregar_nuevo_cliente" title="Agregar nuevo cliente" class="btn btn-block btn-primary" style="margin:auto;"><i class="fa fa-user-plus"></i></button>
                                                                                                                        <div id="respuesta_nuevo_cliente"></div>
                                                                                                                        <script>
                                                                                                                            $('#btn_agregar_nuevo_cliente').click(function(){
                                                                                                                                var nombre_cliente = $('#nombre_cliente_modal').val();
                                                                                                                                var celular_cliente = $('#celular_cliente_modal').val();
                                                                                                                                var email_cliente = $('#email_cliente_modal').val();
                                                                                                                                var dni_cliente = $('#dni_cliente_modal').val();

                                                                                                                                if( nombre_cliente == '' ){
                                                                                                                                        alert('Debes ingrear nombre');
                                                                                                                                        $('#pnombre_cliente_modal').focus();
                                                                                                                                } else if( dni_cliente == '' ){
                                                                                                                                            alert('Debes ingresar DNI');
                                                                                                                                            $('#dni_cliente_modal').focus();
                                                                                                                                } else if (  celular_cliente == '' ){
                                                                                                                                            alert('Debes ingresar celular');
                                                                                                                                            $('#celular_cliente_modal').focus();
                                                                                                                                } else {
                                                                                                                                        var url = "../app/controllers/ventas/agregar_cliente.php";
                                                                                                                                        $.get(url, {
                                                                                                                                            nombre_cliente :nombre_cliente,
                                                                                                                                            celular_cliente :celular_cliente,
                                                                                                                                            email_cliente :email_cliente, 
                                                                                                                                            dni_cliente :dni_cliente 
                                                                                                                                        } , function(datos){
                                                                                                                                            $('#nombre_cliente').val(datos[0].nombre_cliente);
                                                                                                                                            $('#dni_cliente').val(datos[0].dni_cliente);
                                                                                                                                            $('#celular_cliente').val(datos[0].celular_cliente);
                                                                                                                                            $('#email_cliente').val(datos[0].email_cliente);
                                                                                                                                            $('#modal-cliente').modal('hide');
    
                                                                                                                                        }, "json" ); 
                                                                                                                                }
                                                                                                                            });
                                                                                                                        </script>
                                                                                                                </div>
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

                                                                      <!--- FIN Modal para BUSCAR   CLIENTE ---->
                                                                                                        <div class="row">
                                                                                                            <div class="col-md-3">
                                                                                                                <div class="form-group">
                                                                                                                        <label for="nombre_cliente">Nombre</label>
                                                                                                                        <input class="form-control" type="text" id="nombre_cliente"  disabled>
                                                                                                                        <input class="form-control" type="text" id="id_cliente" hidden>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-3">
                                                                                                                <div class="form-group">
                                                                                                                        <label for="dni_cliente">DNI/CUIT</label>
                                                                                                                        <input class="form-control"  type="text" id="dni_cliente"  disabled>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-2">
                                                                                                                <div class="form-group">
                                                                                                                        <label for="celular_cliente">Celular</label>
                                                                                                                        <input class="form-control"  type="text" id="celular_cliente" disabled>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-4">
                                                                                                                <div class="form-group">
                                                                                                                        <label for="email_cliente">Email</label>
                                                                                                                        <input class="form-control"  type="text" id="email_cliente" disabled>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            
                                                                                                            
                                                                                                        </div>
                                </div><!---- fin datos del cliente --->
                        
                        </div>
                       
                    </div> 
                    <div class="col-md-3">
                            <div class="card card-outline card-primary">
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Importe Pagado</label>
                                                <input type="number" id="importe_pagado"  style="text-align: center;"  class="form-control" >
                                                <script>
                                                    $('#importe_pagado').keyup(function(){
                                                        if ($('#monto_a_abonar').val() != ''){
                                                            if ( ($('#importe_pagado').val() != '') && ($('#importe_pagado').val() != NaN) ){
                                                                var monto_a_abonar = parseFloat($('#monto_a_abonar').val().replace(',','.'));
                                                                var importe_pagado = parseFloat($('#importe_pagado').val());
                                                                $('#vuelto').val(importe_pagado - monto_a_abonar);
                                                            } 
                                                        }

                                                    });
                                                </script>
                                            </div>    
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Vuelto</label>
                                                <input type="text" id="vuelto"  style="text-align: center;" class="form-control"  disabled>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <hr>
                                        <div class="form-group">
                                            <button id="btn_guardar_venta" class="btn btn-primary btn-block">Registrar venta</button>
                                            <div id="respuesta_registrar_venta"></div>
                                            <script>
                                                $('#btn_guardar_venta').click(function(){
                                                    var id_cliente = $('#id_cliente').val();
                                                    var nro_venta = $('#nro_venta').val();
                                                    var items_producto = <?php echo $cantidad_total; ?>;
                                                    var importe_pagado = $('#monto_a_abonar').val();
                                                    var items_carrito = <?php echo  json_encode( $carrito_datos ); ?>;
                                                    if(id_cliente == ''){
                                                        alert('Debe seleccionar un cliente');
                                                    } else if(importe_pagado ==''){
                                                        alert('Debe ingresar el monto abonado');
                                                    } else if ( items_producto == 0) {// hay productos en el carrito ?
                                                         alert('Debe seleccionar un producto');
                                                    } else {
                                                        var url = "../app/controllers/ventas/registrar_venta.php";
                                                        $.get(url, {
                                                            id_cliente :id_cliente,
                                                            nro_venta :nro_venta,
                                                            items_carrito :items_carrito,
                                                            importe_pagado :importe_pagado 
                                                        } , function(datos){
                                                            $('#respuesta_registrar_venta').html(datos);
                                                        });
                                                    }
                                                   
                                                });
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
