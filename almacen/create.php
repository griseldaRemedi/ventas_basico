<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/almacen/listado_de_productos.php');
include('../app/controllers/categorias/listado_de_categorias.php');

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Registrar nuevo Producto</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

              <!-- Card de registro de Productos -->
              <div class="row">
                  <div class="col-md-12">
                          <div class="card card-primary">
                              <div class="card-header">
                                    <h3 class="card-title"> Ingresar los datos requeridos</h3>
                                    <div class="card-tools">
                                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                      </button>
                                  </div>
                              </div>
                              
                              <div class="card-body">
                                <form action="../app/controllers/almacen/create.php"  method="post" enctype="multipart/form-data">
                                <div class="row">
                                    
<!-- columna datos --->                 <div class="col-md-9">
                <!-- primera fila --->              <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="codigo">Código</label>
                                                                        <?php 
                                                                        function ceros($numero){
                                                                            $len = 0;    
                                                                            $cantidad_ceros = 5;    
                                                                            $aux=$numero; 
                                                                            $pos = strlen($numero);
                                                                            $len = $cantidad_ceros - $pos;
                                                                            for($i=0; $i<$len; $i++){
                                                                                $aux = "0".$aux;
                                                                            }   
                                                                            return $aux;
                                                                        }
                                                                        ?>

                                                                    <input id="codigo_deshabilitado" name="codigo_deshabilitado" type="text" class="form-control" value="<?php echo 'P-'.ceros($ultimo_producto['id_producto']+1); ?>" disabled>
                                                                    <input id="codigo" name="codigo" type="text" class="form-control" value="<?php echo 'P-'.ceros($ultimo_producto['id_producto']+1); ?>" hidden>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="categoria">Categoría</label>
                                                                    <div style="display: flex;">
                                                                        <select name="id_categoria" id="id_categoria" class="form-control">
                                                                            <?php foreach($categorias_datos as $categorias_dato){ ?>
                                                                            <option value="<?php echo $categorias_dato['id_categoria']; ?>"><?php echo $categorias_dato['nombre_categoria']; ?></option>
                                                                            <?php }; ?>
                                                                        </select>
                                                                        <a href="<?php echo $URL; ?>/categorias" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="nombre">Nombre</label>
                                                                    <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre del producto" required>
                                                                </div>
                                                            </div> 
                                                    </div>

                <!-- segunda fila --->              <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Usuario</label>
                                                                <input id="usuario_deshabilitado" type="text" value="<?php echo $email; ?>" class="form-control" disabled>
                                                                <input id="id_usuario" name="id_usuario" type="text" value="<?php echo $id_usuario; ?>" class="form-control" hidden>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label for="descripcion">Descripción</label>
                                                                    <textarea name="descripcion" id="descripcion" cols="30" rows="2" class="form-control"></textarea>
                                                                </div>
                                                        </div>
                                                    </div>


                <!-- tercera fila --->              <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="stock">Stock</label>
                                                                    <input id="stock" name="stock" type="number" class="form-control" placeholder="Stock" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="stock_min">Stock Mínimo</label>
                                                                    <input id="stock_min" name="stock_min" type="number" class="form-control" placeholder="Stock Mínimo">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="stock_max">Stock Máximo</label>
                                                                    <input id="stock_max" name="stock_max"_max type="number" class="form-control" placeholder="Stock Máximo">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="precio_compra">Precio Compra</label>
                                                                    <input id="precio_compra" name="precio_compra" type="number" class="form-control" placeholder="Precio compra" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="precio_venta">Precio Venta</label>
                                                                    <input id="precio_venta" name="precio_venta" type="number" class="form-control" placeholder="Precio venta" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="fecha_ingreso">Fecha Ingreso</label>
                                                                    <input id="fecha_ingreso" name="fecha_ingreso" type="date" class="form-control" required>
                                                                </div>
                                                            </div> 
                                                    </div>

                                        </div>

<!-- columna imagen --->                <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="imagen">Imagen del producto</label>
                                                <input type="file" id="file" name="imagen" class="form-control">
                                                <br>
                                                <center>
                                                    <output id="list"></output>
                                                </center>
                        <!-- script imagen --->  <script>
                                                        function archivo(evt) {
                                                            var files = evt.target.files; // FileList object
                                                            // Obtenemos la imagen del campo "file".
                                                            for (var i = 0, f; f = files[i]; i++) {
                                                                //Solo admitimos imágenes.
                                                                if (!f.type.match('image.*')) {
                                                                    continue;
                                                                }
                                                                var reader = new FileReader();
                                                                reader.onload = (function (theFile) {
                                                                    return function (e) {
                                                                        // Insertamos la imagen
                                                                        document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="',e.target.result, '" width="100%" title="', escape(theFile.name), '"/>'].join('');
                                                                    };
                                                                })(f);
                                                                reader.readAsDataURL(f);
                                                            }
                                                        }
                                                        document.getElementById('file').addEventListener('change', archivo, false);
                                                    </script>

                                            </div>
                                        </div>
                                </div>
                                            <a href="<?php echo $URL; ?>/index.php" class="btn btn-default">Cancelar</a>
                                            <button class="btn btn-primary" type="submit">Guardar</button>
                            </form>
                            </div>
                       </div> 
                        
                    </div>     
                </div>
              <!-- FIN Card de registro de productos -->

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
include('../layout/parte2.php');
?>
