<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/categorias/listado_de_categorias.php');
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Categorías registrados
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                    <i class="fa fa-plus"></i>Nuevo
                  </button>
            </h1>
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
                <div class="col-md-8">

                    <!-- Card de listado de Categorías -->
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                            <h3 class="card-title">Categorías</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                  <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                              <tr>
                                                <th>Nro</th>
                                                <th>Categoría</th>
                                                <th>Acciones</th>
                                              </tr>
                                        </thead>
                                        <tbody>

                                          <?php 

                                              $contador_cat = 0;
                                              foreach( $categorias_datos as $categoria ) { 
                                                  $id_categoria = $categoria['id_categoria'];
                                                  $categoria = $categoria['nombre_categoria'];
                                                  $contador_cat++;
                                                ?>
                                                    <tr>
                                                          <td> <?php echo $contador_cat; ?> </td>
                                                          <td> <?php echo $categoria; ?> </td>
                                                          <td> 
                                                            
                                                                <div class="btn-group">
                                                                  <center>
                                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-update<?php echo $id_categoria;?>">
                                                                      <i class="fa fa-pen"></i>Editar
                                                                    </button>
                                                                    </center>
                                                                      <!--- Modal para EDITAR Categoría ---->

                                                                      <div class="modal fade" id="modal-update<?php echo $id_categoria;?>">
                                                                          <div class="modal-dialog">
                                                                              <div class="modal-content">
                                                                                  <div class="modal-header  modal-header-success">
                                                                                      <h4 class="modal-title">Modificar categoría</h4>
                                                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                          <span aria-hidden="true">&times;</span>
                                                                                      </button>
                                                                                  </div>
                                                                                  <div class="modal-body">
                                                                                      <div class="row">
                                                                                        <div class="col-md-12">
                                                                                          <div class="form-group">
                                                                                            <label for="nombre_categoria_update<?php echo $id_categoria;?>">Nombre Categoría</label>
                                                                                            <input id="nombre_categoria_update<?php echo $id_categoria;?>" type="text" class="form-control" value="<?php echo $categoria ; ?>">
                                                                                            <small id="lbl_update<?php echo $id_categoria;?>" style="color:red; display: none;">* Este campo es requerido</small>
                                                                                          </div>
                                                                                        </div>
                                                                                      </div>
                                                                                  </div>
                                                                                  <div class="modal-footer justify-content-between">
                                                                                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                                      <button type="button" class="btn btn-success" id="btn_update<?php echo $id_categoria;?>">Modificar categoría</button>
                                                                                      <div id="respuesta_update<?php echo $id_categoria;?>"></div>
                                                                                  </div>
                                                                              </div>
                                                                          <!-- /.modal-content -->
                                                                          </div>
                                                                          <!-- /.modal-dialog -->
                                                                      </div>    <!-- /.modal -->

                                                                      <script>
                                                                        $("#btn_update<?php echo $id_categoria;?>").click( function(){
                                                                            var nombre_categoria = $("#nombre_categoria_update<?php echo $id_categoria;?>").val();
                                                                            var id_categoria = <?php echo $id_categoria;?>;
                                                                            var url = "../app/controllers/categorias/update_categorias.php"; 
                                                                            
                                                                            if ( nombre_categoria == ""){
                                                                                  $("#nombre_categoria<?php echo $id_categoria;?>").focus();
                                                                                  $("#lbl_update<?php echo $id_categoria;?>").css('display','block');
                                                                                  } else {
                                                                                  $.get(  url, 
                                                                                          {nombre_categoria:nombre_categoria, id_categoria:id_categoria}, 
                                                                                          function (datos) { 
                                                                                              $("#respuesta_update<?php echo $id_categoria;?>").html(datos);
                                                                                          });

                                                                            }
                                                                        })
                                                                      </script>
                                                                      <!--- FIN Modal para EDITAR CATEGORÍA ---->


                                                                </div>
                                                         
                                                          </td>
                                                    </tr>

                                         <?php } ?>

                                        </tbody>
                                        <tfoot>
                                              <tr>
                                                <th>Nro</th>
                                                <th>Categoría</th>
                                                <th>Acciones</th>
                                              </tr>
                                        </tfoot>
                                    </table>
                            </div>
                        </div>
                    <!-- FIN Card de listado de Categoría -->

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
              "info": "Mostrando _START_ a _END_ de _TOTAL_ roles",
              "infoEmpty": "Mostrando 0 to 0 of 0 roles",
              "infoFiltered": "(Filtrado de MAX total roles)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ roles",
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



<!--- Modal para CREAR Categoría ---->

<div class="modal fade" id="modal-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <h4 class="modal-title">Crear nueva categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="nombre_categoria">Nombre Categoría <b>*</b></label>
                      <input id="nombre_categoria" type="text" class="form-control" placeholder="Ingresar nombre categoría">
                      <small id="lbl_create" style="color:red; display: none;">* Este campo es requerido</small>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btn_create">Guardar categoría</button>
                <div id="respuesta"></div>
            </div>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>    <!-- /.modal -->

<script>
  $("#btn_create").click( function(){
       var nombre_categoria = $("#nombre_categoria").val();

        if ( nombre_categoria == ""){
            $("#nombre_categoria").focus();
            $("#lbl_create").css('display','block');
        } else {
          var url = "../app/controllers/categorias/create.php"; 
          $.get(url, {nombre_categoria:nombre_categoria}, function ($datos) { 
              $("#respuesta").html($datos);
            });
        }
  })
</script>
<!--- FIN Modal para crear CATEGORÍA ---->






