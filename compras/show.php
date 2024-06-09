<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/almacen/listado_de_productos.php');
include('../app/controllers/proveedores/listado_de_proveedores.php');
include('../app/controllers/compras/cargar_compra.php');

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detalle de Compra Nro <?php echo $nro_compra; ?></h1>
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
              <!-- Card Productos -->
              <div class="row">
                  <div class="col-md-12">
                          <div class="card card-primary">
                              <div class="card-header">
                                    <h3 class="card-title"> Detalle de producto y proveedor</h3>
                                    <div class="card-tools">
                                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                      </button>
                                  </div>
                              </div>
                              
                              <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4" class="form-group" style="display: flex; justify-content: space-between">
                                            <h5>Datos del producto</h5>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    
<!-- columna datos --->                 <div class="col-md-9">
                <!-- primera fila --->              <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="codigo_producto">Código</label>
                                                                    <input id="codigo_producto" name="codigo_producto" type="text" value="<?= $codigo; ?>" class="form-control" disabled>
                                                                    <input id="id_producto" name="id_producto" type="text" class="form-control" hidden>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="nombre">Producto</label>
                                                                    <input id="nombre" name="nombre" type="text" value="<?= $nombre_producto; ?>"  class="form-control" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="nombre_categoria">Categoría</label>
                                                                    <input id="nombre_categoria" name="nombre_categoria" type="text"  value="<?= $nombre_categoria; ?>"   class="form-control" disabled>
                                                                </div>
                                                            </div> 
                                                    </div>

                <!-- segunda fila --->              <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="usuario_producto">Usuario</label>
                                                                <input id="usuario_producto" type="text" class="form-control"  value="<?= $email_compra; ?>"   disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label for="descripcion">Descripción</label>
                                                                    <textarea name="descripcion" id="descripcion" cols="30" rows="2" class="form-control" disabled><?= $descripcion; ?></textarea>
                                                                </div>
                                                        </div>
                                                    </div>


                <!-- tercera fila --->              <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="stock">Stock</label>
                                                                    <input id="stock" name="stock" type="number" class="form-control"  value="<?= $stock; ?>"  style="background-color: #FFFF66;" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="stock_minimo">Stock Mínimo</label>
                                                                    <input id="stock_minimo" name="stock_minimo" type="number"  value="<?= $stock_minimo; ?>"   class="form-control"  disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="stock_maximo">Stock Máximo</label>
                                                                    <input id="stock_maximo" name="stock_maximo"_max type="number"  value="<?= $stock_maximo; ?>"   class="form-control" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="precio_compra">Precio Compra</label>
                                                                    <input id="precio_compra" name="precio_compra" type="number"  value="<?= $precio_compra_producto; ?>" class="form-control" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="precio_venta">Precio Venta</label>
                                                                    <input id="precio_venta" name="precio_venta" type="number"  value="<?= $precio_venta_producto; ?>"  class="form-control" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="fecha_ingreso">Fecha Ingreso</label>
                                                                    <input id="fecha_ingreso" name="fecha_ingreso" type="date"   value="<?= $fecha_ingreso; ?>"   class="form-control" disabled>
                                                                </div>
                                                            </div> 
                                                    </div>

                                        </div>

<!-- columna imagen --->                <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="imagen">Imagen del producto</label>
                                                <br>
                                                <center>
                                                    <img src="<?= $imagen; ?>" id="imagen_producto" alt="">
                                                </center>
                                            </div>
                                        </div>
                                </div>
                                        <hr>      
<!--- proveedor  ---->          <div class="row">
                                     <div class="col-md-4" class="form-group" style="display: flex; justify-content: space-between">
                                            <h5>Datos del proveedor</h5> 
                                    </div>
                                    
                                        <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="nombre_proveedor">Nombre Proveedor</label>
                                                                    <input id="nombre_proveedor" name="nombre_proveedor" type="text"  value="<?= $nombre_proveedor; ?>"  class="form-control prov" disabled>
                                                                    <input id="id_proveedor" name="id_proveedor" type="text" class="form-control prov" hidden>
                                                                </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="celular">Celular</label>
                                                                    <input id="celular"  name="celular" type="number"  value="<?= $celular; ?>"  class="form-control prov" disabled>
                                                                </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="email_proveedor">Email</label>
                                                                    <input id="email_proveedor" type="text"  value="<?= $email_empresa; ?>"  class="form-control" disabled>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="telefono">Teléfono empresa</label>
                                                                        <input id="telefono" name="telefono" type="text"  value="<?= $telefono_empresa; ?>"  class="form-control" disabled>
                                                                    </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="empresa">Empresa</label>
                                                                        <input id="empresa" name="empresa" type="text"  value="<?= $empresa; ?>"  class="form-control prov" disabled>
                                                                    </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="direccion">Dirección</label>
                                                                        <textarea name="direccion" id="direccion" class="form-control" cols="25" rows="2" disabled> <?= $direccion; ?> </textarea>
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
              <!-- FIN Card datos de proveedor y producto -->

                </div>
                <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-outline card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Datos de Compra</h3>
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
                                                                <input type="text" id="numero_compra" name="numero_compra" value="<?php echo $nro_compra; ?>" class="form-control" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="fecha_compra">Fecha </label>
                                                                <input type="text" id="fecha_compra" name="fecha_compra"  value="<?php echo $fecha_compra; ?>"  class="form-control" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="comprobante">Comprobante</label>
                                                                <input type="text" id="comprobante" name="comprobante"  value="<?php echo $comprobante; ?>"  class="form-control" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="precio_compra_compra">Precio compra</label>
                                                                <input type="text" id="precio_compra_compra" name="precio_compra_compra"  value="<?php echo $precio_compra; ?>"  class="form-control" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="cantidad_compra">Cantidad</label>
                                                                <input type="number" id="cantidad_compra" name="cantidad_compra" style="text-align: center;"  value="<?php echo $cantidad; ?>"   class="form-control" disabled>
                                                            </div>
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


