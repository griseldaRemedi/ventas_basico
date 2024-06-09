<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/almacen/cargar_producto.php');

foreach($productos_datos as $productos_dato){
    $id_producto = $productos_dato['id_producto'];
    $codigo = $productos_dato['codigo'];
    $nombre = $productos_dato['nombre'];
    $email = $productos_dato['email'];
    $id_categoria = $productos_dato['id_categoria'];
    $nombre_categoria = $productos_dato['nombre_categoria'];
    $id_usuario = $productos_dato['id_usuario'];
    $descripcion = $productos_dato['descripcion'];
    $stock = $productos_dato['stock'];
    $stock_minimo = $productos_dato['stock_minimo'];
    $stock_maximo = $productos_dato['stock_maximo'];
    $precio_compra = $productos_dato['precio_compra'];
    $precio_venta = $productos_dato['precio_venta'];
    $fecha_ingreso = $productos_dato['fecha_ingreso'];
    $imagen = $productos_dato['imagen'];
}

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Producto a eliminar: <?php echo $nombre; ?></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

              <!-- Card de eliminar de Productos -->
              <div class="row">
                  <div class="col-md-12">
                          <div class="card card-danger">
                              <div class="card-header">
                                    <h3 class="card-title"> Detalle </h3>
                                    <div class="card-tools">
                                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                      </button>
                                  </div>
                              </div>
                              <form action="<?php echo $URL; ?>/app/controllers/almacen/delete.php" method="post">
                              <div class="card-body">
                                <div class="row">
                                    
<!-- columna datos --->                 <div class="col-md-9">
                <!-- primera fila --->              <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="codigo">Código</label>
                                                                    <input id="codigo" name="codigo" type="text" class="form-control" value="<?php echo $codigo; ?>" disabled>
                                                                    <input id="id_producto" name="id_producto" type="text" class="form-control" value="<?php echo $id_producto; ?>" hidden>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="categoria">Categoría</label>
                                                                    <input id="categoria" name="categoria" type="text" class="form-control" value="<?php echo $nombre_categoria; ?>" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="nombre">Nombre</label>
                                                                    <input id="nombre" name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" disabled>
                                                                </div>
                                                            </div> 
                                                    </div>

                <!-- segunda fila --->              <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="usuario">Usuario</label>
                                                                <input id="usuario" type="text" value="<?php echo $email; ?>" class="form-control" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label for="descripcion">Descripción</label>
                                                                    <textarea name="descripcion" id="descripcion" cols="30" rows="2"  class="form-control" disabled><?php echo $descripcion; ?></textarea>
                                                                </div>
                                                        </div>
                                                    </div>


                <!-- tercera fila --->              <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="stock">Stock</label>
                                                                    <input id="stock" name="stock" type="number" class="form-control"  value="<?php echo $stock; ?>" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="stock_min">Stock Mínimo</label>
                                                                    <input id="stock_min" name="stock_min" type="number" class="form-control"  value="<?php echo $stock_minimo; ?>" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="stock_max">Stock Máximo</label>
                                                                    <input id="stock_max" name="stock_max"_max type="number" class="form-control"  value="<?php echo $stock_maximo; ?>" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="precio_compra">Precio Compra</label>
                                                                    <input id="precio_compra" name="precio_compra" type="number" class="form-control"  value="<?php echo $precio_compra; ?>" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="precio_venta">Precio Venta</label>
                                                                    <input id="precio_venta" name="precio_venta" type="number" class="form-control"  value="<?php echo $precio_venta; ?>" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="fecha_ingreso">Fecha Ingreso</label>
                                                                    <input id="fecha_ingreso" name="fecha_ingreso" type="date" class="form-control"  value="<?php echo $fecha_ingreso; ?>" disabled>
                                                                </div>
                                                            </div> 
                                                    </div>

                                        </div>

<!-- columna imagen --->                <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="imagen">Imagen del producto</label>
                                                <br>
                                                <center>
                                                    <img id="imagen" src="<?php  echo $URL.'/almacen/img_productos/'.$imagen; ?>" alt="">
                                                </center>
                                            </div>
                                        </div>
                                </div>
                                            <a href="<?php echo $URL; ?>/almacen/index.php" class="btn btn-default">Volver</a>
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button>
                            </div>
                            </form>
                       </div> 
                        
                    </div>     
                </div>
              <!-- FIN Card de eliminar de productos -->

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
include('../layout/parte2.php');
?>
