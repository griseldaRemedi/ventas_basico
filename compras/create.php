<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/almacen/listado_de_productos.php');
include('../app/controllers/proveedores/listado_de_proveedores.php');
include('../app/controllers/compras/listado_de_compras.php');

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Registrar nueva Compra</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
              <!-- Card de registro de Productos -->
              <div class="row">
                  <div class="col-md-12">
                          <div class="card card-primary">
                              <div class="card-header">
                                    <h3 class="card-title"> Seleccione producto y proveedor</h3>
                                    <div class="card-tools">
                                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                      </button>
                                  </div>
                              </div>
                              
                              <div class="card-body">
    <!---                            <form action=""  method="post" enctype="multipart/form-data"> -->
                                <div class="row">
                                    <div class="col-md-4" class="form-group" style="display: flex; justify-content: space-between">
                                            <h5>Datos del producto</h5>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#modal-producto">
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
                                                                                                                                        $('#codigo_producto').val('<?php echo trim($producto['codigo']);?>');                                                                                                                                  
                                                                                                                                        $('#id_producto').val('<?php echo trim($producto['id_producto']);?>');                                                                                                                                  
                                                                                                                                        $('#nombre').val('<?php echo trim($producto['nombre']);?>');                                                                                                                                  
                                                                                                                                        $('#nombre_categoria').val('<?php echo trim($producto['nombre_categoria']);?>');                                                                                                                                  
                                                                                                                                        $('#descripcion').val('<?php echo trim($producto['descripcion']);?>');                                                                                                                                  
                                                                                                                                        $('#stock').val('<?php echo trim($producto['stock']);?>');                                                                                                                                  
                                                                                                                                        $('#stock_actual').val('<?php echo trim($producto['stock']);?>');                                                                                                                                  
                                                                                                                                        $('#stock_minimo').val('<?php echo trim($producto['stock_minimo']);?>');                                                                                                                                  
                                                                                                                                        $('#stock_maximo').val('<?php echo trim($producto['stock_maximo']);?>');                                                                                                                                  
                                                                                                                                        $('#precio_compra').val('<?php echo trim($producto['precio_compra']);?>');                                                                                                                                  
                                                                                                                                        $('#precio_venta').val('<?php echo trim($producto['precio_venta']);?>');                                                                                                                                  
                                                                                                                                        $('#fecha_ingreso').val('<?php echo trim($producto['fecha_ingreso']);?>');                                                                                                                                  
                                                                                                                                        $('#usuario_producto').val('<?php echo trim($producto['email_producto']);?>');                                                                                                                                  
                                                                                                                                        $('#imagen_producto').attr('src','<?php echo $URL.'/almacen/img_productos/'.trim($producto['imagen']);?>');                                                                                                                                  
                                                                                                                                        $('#modal-producto').modal('hide');
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


                                    </div>
                                </div>
                                
                                <div class="row">
                                    
<!-- columna datos --->                 <div class="col-md-9">
                <!-- primera fila --->              <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="codigo_producto">Código</label>
                                                                    <input id="codigo_producto" name="codigo_producto" type="text" class="form-control" disabled>
                                                                    <input id="id_producto" name="id_producto" type="text" class="form-control" hidden>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="nombre">Producto</label>
                                                                    <input id="nombre" name="nombre" type="text" class="form-control" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="nombre_categoria">Categoría</label>
                                                                    <input id="nombre_categoria" name="nombre_categoria" type="text" class="form-control" disabled>
                                                                </div>
                                                            </div> 
                                                    </div>

                <!-- segunda fila --->              <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="usuario_producto">Usuario</label>
                                                                <input id="usuario_producto" type="text" class="form-control" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label for="descripcion">Descripción</label>
                                                                    <textarea name="descripcion" id="descripcion" cols="30" rows="2" class="form-control" disabled></textarea>
                                                                </div>
                                                        </div>
                                                    </div>


                <!-- tercera fila --->              <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="stock">Stock</label>
                                                                    <input id="stock" name="stock" type="number" class="form-control" style="background-color: #FFFF66;" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="stock_minimo">Stock Mínimo</label>
                                                                    <input id="stock_minimo" name="stock_minimo" type="number" class="form-control"  disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="stock_maximo">Stock Máximo</label>
                                                                    <input id="stock_maximo" name="stock_maximo"_max type="number" class="form-control" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="precio_compra">Precio Compra</label>
                                                                    <input id="precio_compra" name="precio_compra" type="number" class="form-control" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="precio_venta">Precio Venta</label>
                                                                    <input id="precio_venta" name="precio_venta" type="number" class="form-control" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="fecha_ingreso">Fecha Ingreso</label>
                                                                    <input id="fecha_ingreso" name="fecha_ingreso" type="date" class="form-control" disabled>
                                                                </div>
                                                            </div> 
                                                    </div>

                                        </div>

<!-- columna imagen --->                <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="imagen">Imagen del producto</label>
                                                <br>
                                                <center>
                                                    <img id="imagen_producto" alt="">
                                                </center>
                                            </div>
                                        </div>
                                </div>
                                        <hr>      
<!--- proveedor  ---->          <div class="row">
                                     <div class="col-md-4" class="form-group" style="display: flex; justify-content: space-between">
                                            <h5>Datos del proveedor</h5>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#modal-proveedor">
                                                <i class="fa fa-search"></i>
                                                Buscar proveedor                
                                            </button>
                                                                                             <!--- Modal para BUSCAR PROVEEDOR ---->

                                                                      <div class="modal fade" id="modal-proveedor">
                                                                          <div class="modal-dialog modal-lg">
                                                                              <div class="modal-content">
                                                                                  <div class="modal-header  modal-header-primary">
                                                                                      <h4 class="modal-title">Selecciona un proveedor</h4>
                                                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                          <span aria-hidden="true">&times;</span>
                                                                                      </button>
                                                                                    </div>
                                                                                    <div class="modal-body">  <!-- modal body --->
    <!-- Card de listado de Proveedores -->
                                                                                            <div class="card card-outline card-primary">
                                                                                                <div class="card-header">
                                                                                                <h3 class="card-title">Proveedores</h3>
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
                                                                                                            <th>Celular</th>
                                                                                                            <th>Teléfono</th>
                                                                                                            <th>Empresa</th>
                                                                                                            <th>Email</th>
                                                                                                            <th>Dirección</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                   
                                                                                                <?php   $contador_prov = 0;
                                                                                                        foreach( $proveedores_datos as $proveedor ) { 
                                                                                                            $id_proveedor = $proveedor['id_proveedor'];
                                                                                                            $nombre_proveedor = $proveedor['nombre_proveedor'];
                                                                                                            $celular = $proveedor['celular'];
                                                                                                            $telefono_empresa = $proveedor['telefono_empresa'];
                                                                                                            $empresa = $proveedor['empresa'];
                                                                                                            $email_proveedor = $proveedor['email_proveedor'];
                                                                                                            $direccion = $proveedor['direccion'];
                                                                                                            $contador_prov++;  ?>
                                                                                                          
                                                                                                            <tr>
                                                                                                                <td> <?php echo $contador_prov ; ?> </td>
                                                                                                                <td> 
                                                                                                                     <button id="btn_seleccionar_prov<?php echo $proveedor['id_proveedor']; ?>" class="btn btn-success">Seleccionar</button>
<!-- script seleccionar -->                                                                                                     <script>
                                                                                                                                    $('#btn_seleccionar_prov<?php echo $id_proveedor; ?>').click(function(){ 
                                                                                                                                        $('#nombre_proveedor').val('<?php echo $nombre_proveedor;?>');                                                                                                                                  
                                                                                                                                        $('#id_proveedor').val('<?php echo $id_proveedor;?>');                                                                                                                                  
                                                                                                                                        $('#celular').val('<?php echo $celular;?>');                                                                                                                                  
                                                                                                                                        $('#email_proveedor').val('<?php echo $email_proveedor ;?>');                                                                                                                                  
                                                                                                                                        $('#telefono').val('<?php echo $telefono_empresa;?>');                                                                                                                                  
                                                                                                                                        $('#empresa').val('<?php echo $empresa;?>');                                                                                                                                  
                                                                                                                                        $('#direccion').val('<?php echo $direccion ;?>');  
                                                                                                                                        $('#modal-proveedor').modal('hide');                                                                                                                                
                                                                                                                                    });
                                                                                                                                </script>
                                                                                                                </td>
                                                                                                                <td> <?php echo $nombre_proveedor; ?> </td>
                                                                                                                <td> 
                                                                                                                    <a class="btn btn-success" target="_blank" href="https://wa.me/54<?php echo $celular; ?>">
                                                                                                                        <i class="fa fa-phone"></i>
                                                                                                                        <?php echo $celular; ?>
                                                                                                                    </a>
                                                                                                                </td>
                                                                                                                <td> <?php echo $telefono_empresa; ?> </td>
                                                                                                                <td> <?php echo $empresa; ?> </td>
                                                                                                                <td> <?php echo $email_proveedor; ?> </td>
                                                                                                                <td> <?php echo $direccion; ?> </td>
                                                                                                        </tr>
                                                                                                <?php } ?>

                                                                                                    </tbody>
                                                                                                </table>

                                                                                                </div>    
                                                                                                </div>
                                                                                            </div>
                                                                                        <!-- FIN Card de listado de proveedor -->

                                                                                    
                                                                                    </div>  <!-- fin modal body --->                                                                                 
                                                                              </div>
                                                                          <!-- /.modal-content -->
                                                                          </div>
                                                                          <!-- /.modal-dialog -->
                                                                      </div>    <!-- /.modal -->

                                                                      <!--- FIN Modal para BUSCAR PROVEEDOR ---->


                                    </div>

                                    
                                        <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="nombre_proveedor">Nombre Proveeodr</label>
                                                                    <input id="nombre_proveedor" name="nombre_proveedor" type="text" class="form-control prov" disabled>
                                                                    <input id="id_proveedor" name="id_proveedor" type="text" class="form-control prov" hidden>
                                                                </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="celular">Celular</label>
                                                                    <input id="celular"  name="celular" type="number" class="form-control prov" disabled>
                                                                </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="email_proveedor">Email</label>
                                                                    <input id="email_proveedor" type="text" class="form-control" disabled>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="telefono">Teléfono empresa</label>
                                                                        <input id="telefono" name="telefono" type="number" class="form-control" disabled>
                                                                    </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="empresa">Empresa</label>
                                                                        <input id="empresa" name="empresa" type="text" class="form-control prov" disabled>
                                                                    </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="direccion">Dirección</label>
                                                                        <textarea name="direccion" id="direccion" class="form-control" cols="25" rows="2" disabled></textarea>
                                                                    </div>
                                                        </div>
                                                    </div>
                                    </div>                              
                                                                
<!--- fin proveedor  ---->      </div>      
         <!--                   </form>  -->
                            </div>
                       </div> 
                        
                    </div>     
                </div>
              <!-- FIN Card de registro de compras / datos de proveedor y producto -->

                </div>
                <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-outline card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Compra</h3>
                                                <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-minus"></i>
                                                        </button>
                                                </div>
                                             </div>

                                            <div class="card-body">
                                                <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="numero_compra">Número de Compra</label>
                                                        <input type="text" id="numero_compra" name="numero_compra" value="<?php echo $ultimo_compra['max_nro_compra'] + 1; ?>" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="fecha_compra">Fecha </label>
                                                        <input type="date" id="fecha_compra" name="fecha_compra" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="comprobante">Comprobante</label>
                                                        <input type="text" id="comprobante" name="comprobante" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="precio_compra_compra">Precio compra</label>
                                                        <input type="text" id="precio_compra_compra" name="precio_compra_compra" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="stock_actual">Stock actual</label>
                                                        <input type="text" id="stock_actual" name="stock_actual" style="background-color: #FFFF66; text-align: center;" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="stock_nuevo">Stock nuevo</label>
                                                        <input type="text" id="stock_nuevo" name="stock_nuevo"  style="text-align: center;"  class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="cantidad_compra">Cantidad</label>
                                                        <input type="number" id="cantidad_compra" name="cantidad_compra" style="text-align: center;" class="form-control">
                                                    </div>
                                                    <script>
                                                        $('#cantidad_compra').keyup(function (){
                                                            //alert('input cantidad');
                                                            if ($('#cantidad_compra').val() != "") {
                                                                var cantidad_compra = parseInt($('#cantidad_compra').val());
                                                                if ($('#stock_actual').val() != "") {
                                                                    var stock_actual = parseInt($('#stock_actual').val());
                                                                    var total =  stock_actual + cantidad_compra;
                                                                    $('#stock_nuevo').val(total);
                                                                } 
                                                            } else {
                                                                $('#stock_nuevo').val('');
                                                            }
                                                            
                                                           // alert (total)
                                                        })
                                                    </script>
                                                </div>
                                                <div class="col-md-12">
                                                   <div class="form-group">
                                                       <label for="usuario_compra">Usuario</label>
                                                       <input type="text" id="usuario_compra" name="usuario_compra" value="<?php echo $email; ?>" class="form-control" disabled>
                                                       <input type="text" id="id_usuario_compra" name="id_usuario_compra" value="<?php echo $id_usuario; ?>" class="form-control" hidden>
                                                   </div>
                                               </div>
                                            </div>    
                                               <hr>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <button id="btn_guardar_compra" class="btn btn-primary btn-block" type="button">Guardar</button>
                                                    <div id="respuesta_compra"></div>
                                                    </div>
                                                </div>
                                                <script>
                                                    $('#btn_guardar_compra').click(function(){
                                                        
                                                        var id_producto = $('#id_producto').val();
                                                        var nro_compra = $('#numero_compra').val();
                                                        var fecha_compra = $('#fecha_compra').val();
                                                        var id_proveedor = $('#id_proveedor').val();
                                                        var comprobante = $('#comprobante').val();
                                                        var stock_nuevo = $('#stock_nuevo').val();
                                                        var id_usuario_compra = '<?php echo $id_usuario; ?>';
                                                        var precio_compra_compra =  $('#precio_compra_compra').val();
                                                        var cantidad_compra =  $('#cantidad_compra').val();

                                                        if (id_producto == ""){
                                                                alert('Seleccionar un PRODUCTO');
                                                        } else if (id_proveedor == ""){
                                                                alert('Seleccionar un PROVEEDOR');
                                                        } else if (fecha_compra == ""){
                                                                $('#fecha_compra').val();
                                                                alert('Completar FECHA DE COMPRA');
                                                        } else if( comprobante == "" ){
                                                                $('#comprobante').focus();
                                                                alert('Completar TIPO Y NRO DE COMPROBANTE');
                                                        } else if( precio_compra_compra == "" ){
                                                                $('#precio_compra_compra').focus();
                                                                alert('Completar PRECIO DE COMPRA');
                                                        } else if( cantidad_compra == "" ){
                                                                 $('#cantidad_compra').focus();
                                                                 alert('Completar CANTIDAD DE COMPRA');
                                                        } else {
                                                            var url = "../app/controllers/compras/create.php";
                                                            $.get(url, {
                                                                id_producto:id_producto,
                                                                id_proveedor:id_proveedor,
                                                                id_usuario_compra:id_usuario_compra,
                                                                nro_compra:nro_compra,
                                                                fecha_compra:fecha_compra,
                                                                comprobante:comprobante,
                                                                stock_nuevo:stock_nuevo,
                                                                precio_compra_compra:precio_compra_compra,
                                                                cantidad_compra:cantidad_compra
                                                            } , function(datos){
                                                                $('#respuesta_compra').html(datos);
                                                            });
                                                        }
                                                    })
                                                </script>
                                                        
                                    </div>

                                            </div>
                                        </div>
                                    </div>
                                         
                </div>
            </div>


      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
   "pageLength": 5, 
         }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

<script>
  $(function () {
    $("#example2").DataTable({    
     
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
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
  });
</script>
