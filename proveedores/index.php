<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/proveedores/listado_de_proveedores.php');
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Proveedores registrados
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                    <i class="fa fa-plus"></i> Nuevo Proveedor
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
                                  <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                              <tr>
                                                <th>Nro</th>
                                                <th>Nombre</th>
                                                <th>Celular</th>
                                                <th>Teléfono</th>
                                                <th>Empresa</th>
                                                <th>Email</th>
                                                <th>Dirección</th>
                                                <th>Acciones</th>
                                              </tr>
                                        </thead>
                                        <tbody>

                                          <?php 

                                              $contador_prov = 0;
                                              foreach( $proveedores_datos as $proveedor ) { 
                                                  $id_proveedor = $proveedor['id_proveedor'];
                                                  $nombre_proveedor = $proveedor['nombre_proveedor'];
                                                  $celular = $proveedor['celular'];
                                                  $telefono_empresa = $proveedor['telefono_empresa'];
                                                  $empresa = $proveedor['empresa'];
                                                  $email = $proveedor['email_proveedor'];
                                                  $direccion = $proveedor['direccion'];
                                                  $contador_prov++;
                                                ?>
                                                    <tr>
                                                          <td> <?php echo $contador_prov ; ?> </td>
                                                          <td> <?php echo $nombre_proveedor; ?> </td>
                                                          <td> 
                                                            <a class="btn btn-success" target="_blank" href="https://wa.me/54<?php echo $celular; ?>">
                                                              <i class="fa fa-phone"></i>
                                                              <?php echo $celular; ?>
                                                            </a>
                                                          </td>
                                                          <td> <?php echo $telefono_empresa; ?> </td>
                                                          <td> <?php echo $empresa; ?> </td>
                                                          <td> <?php echo $email; ?> </td>
                                                          <td> <?php echo $direccion; ?> </td>
                                                          <td> 
                                                                <div class="btn-group">
                                                                  
                                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-update<?php echo $id_proveedor;?>">
                                                                      <i class="fa fa-pen"></i>Editar
                                                                    </button>
                                                                    
                                                                      <!--- Modal para EDITAR PROVEEDOR ---->

                                                                      <div class="modal fade" id="modal-update<?php echo $id_proveedor;?>">
                                                                          <div class="modal-dialog">
                                                                              <div class="modal-content">
                                                                                  <div class="modal-header  modal-header-success">
                                                                                      <h4 class="modal-title">Modificar proveedor</h4>
                                                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                          <span aria-hidden="true">&times;</span>
                                                                                      </button>
                                                                                  </div>

                                                                                  <div class="modal-body">  <!-- modal body --->

                                                                                          <div class="col-md-12">

                                                                                            <div class="row">
                                                                                                  <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                          <label for="nombre_proveedor<?php echo $id_proveedor;?>">Nombre Proveeodr <b>*</b></label>
                                                                                                          <input id="nombre_proveedor<?php echo $id_proveedor;?>" name="nombre_proveedor<?php echo $id_proveedor;?>" type="text" class="form-control" value="<?php echo $nombre_proveedor; ?>" required>
                                                                                                          <input id="id_proveedor<?php echo $id_proveedor;?>" name="id_proveedor<?php echo $id_proveedor;?>" type="text" class="form-control" value="<?php echo $id_proveedor; ?>" hidden>
                                                                                                          <small id="lbl_nombre<?php echo $id_proveedor;?>" style="color:red; display: none;">* Este campo es requerido</small>
                                                                                                        </div>
                                                                                                  </div>
                                                                                                  <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                          <label for="celular<?php echo $id_proveedor;?>">Celular <b>*</b></label>
                                                                                                          <input id="celular<?php echo $id_proveedor;?>"  name="celular<?php echo $id_proveedor;?>" type="number" class="form-control" value="<?php echo $celular; ?>" required>
                                                                                                          <small id="lbl_celular<?php echo $id_proveedor;?>" style="color:red; display: none;">* Este campo es requerido</small>
                                                                                                        </div>
                                                                                                  </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                              <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                          <label for="telefono<?php echo $id_proveedor;?>">Teléfono empresa</label>
                                                                                                          <input id="telefono<?php echo $id_proveedor;?>" name="telefono<?php echo $id_proveedor;?>" type="number" class="form-control" value="<?php echo $telefono_empresa; ?>">
                                                                                                          <small id="lbl_empresa<?php echo $id_proveedor;?>" style="color:red; display: none;">* Este campo es requerido</small>
                                                                                                        </div>
                                                                                              </div>
                                                                                              <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label for="empresa<?php echo $id_proveedor;?>">Empresa <b>*</b></label>
                                                                                                            <input id="empresa<?php echo $id_proveedor;?>" name="empresa<?php echo $id_proveedor;?>" type="text" class="form-control" value="<?php echo $empresa; ?>" required>
                                                                                                            <small id="lbl_empresa<?php echo $id_proveedor;?>" style="color:red; display: none;">* Este campo es requerido</small>
                                                                                                          </div>
                                                                                              </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                              <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                          <label for="email<?php echo $id_proveedor;?>">Email</label>
                                                                                                          <input id="email<?php echo $id_proveedor;?>" type="text" class="form-control" value="<?php echo $email; ?>">
                                                                                                          <small id="lbl_email<?php echo $id_proveedor;?>" style="color:red; display: none;">* Este campo es requerido</small>
                                                                                                        </div>
                                                                                              </div>
                                                                                              <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                          <label for="direccion<?php echo $id_proveedor;?>">Dirección <b>*</b></label>
                                                                                                          <textarea name="direccion<?php echo $id_proveedor;?>" id="direccion<?php echo $id_proveedor;?>" class="form-control" cols="25" rows="2"><?php echo $direccion; ?></textarea>
                                                                                                          <small id="lbl_direccion<?php echo $id_proveedor;?>" style="color:red; display: none;">* Este campo es requerido</small>
                                                                                                        </div>
                                                                                              </div>
                                                                                            </div>                

                                                                                          </div>

                                                                                  </div>  <!-- fin modal body --->

                                                                                  <div class="modal-footer justify-content-between">
                                                                                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                                      <button type="button" class="btn btn-success" id="btn_update<?php echo $id_proveedor;?>">Actualizar proveedor</button>
                                                                                      <div id="respuesta_update<?php echo $id_proveedor;?>"></div>
                                                                                  </div>
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
                                                                      <!--- FIN Modal para EDITAR PROVEEDOR ---->


                                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?php echo $id_proveedor;?>">
                                                                      <i class="fa fa-trash"></i>Eliminar
                                                                    </button>
                                                                    
                                                                      <!--- Modal para ELIMINAR PROVEEDOR ---->

                                                                      <div class="modal fade" id="modal-delete<?php echo $id_proveedor;?>">
                                                                          <div class="modal-dialog">
                                                                              <div class="modal-content">
                                                                                  <div class="modal-header  modal-header-danger">
                                                                                      <h4 class="modal-title">Eliminar proveedor</h4>
                                                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                          <span aria-hidden="true">&times;</span>
                                                                                      </button>
                                                                                  </div>

                                                                                  <div class="modal-body">  <!-- modal body --->

                                                                                          <div class="col-md-12">

                                                                                            <div class="row">
                                                                                                  <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                          <label for="nombre_proveedor<?php echo $id_proveedor;?>">Nombre Proveeodr</label>
                                                                                                          <input id="nombre_proveedor_delete<?php echo $id_proveedor;?>" name="nombre_proveedor_delete<?php echo $id_proveedor;?>" type="text" class="form-control" value="<?php echo $nombre_proveedor; ?>" disabled>
                                                                                                          <input id="id_proveedor_delete<?php echo $id_proveedor;?>" name="id_proveedor_delete<?php echo $id_proveedor;?>" type="text" class="form-control" value="<?php echo $id_proveedor; ?>" hidden>
                                                                                                        </div>
                                                                                                  </div>
                                                                                                  <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                          <label for="celular_delete<?php echo $id_proveedor;?>">Celular</label>
                                                                                                          <input id="celular_delete<?php echo $id_proveedor;?>"  name="celular_delete<?php echo $id_proveedor;?>" type="number" class="form-control" value="<?php echo $celular; ?>" disabled>
                                                                                                        </div>
                                                                                                  </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                              <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                          <label for="telefono_delete<?php echo $id_proveedor;?>">Teléfono empresa</label>
                                                                                                          <input id="telefono_delete<?php echo $id_proveedor;?>" name="telefono_delete<?php echo $id_proveedor;?>" type="number" class="form-control" value="<?php echo $telefono_empresa; ?>" disabled>
                                                                                                        </div>
                                                                                              </div>
                                                                                              <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label for="empresa_delete<?php echo $id_proveedor;?>">Empresa</label>
                                                                                                            <input id="empresa_delete<?php echo $id_proveedor;?>" name="empresa_delete<?php echo $id_proveedor;?>" type="text" class="form-control" value="<?php echo $empresa; ?>" disabled>
                                                                                                          </div>
                                                                                              </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                              <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                          <label for="email_delete<?php echo $id_proveedor;?>">Email</label>
                                                                                                          <input id="email_delete<?php echo $id_proveedor;?>" type="text" class="form-control" value="<?php echo $email; ?>" disabled>
                                                                                                        </div>
                                                                                              </div>
                                                                                              <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                          <label for="direccion_delete<?php echo $id_proveedor;?>">Dirección <b>*</b></label>
                                                                                                          <textarea name="direccion_delete<?php echo $id_proveedor;?>" id="direccion_delete<?php echo $id_proveedor;?>" class="form-control" cols="25" rows="2" disabled><?php echo $direccion; ?></textarea>
                                                                                                        </div>
                                                                                              </div>
                                                                                            </div>                

                                                                                          </div>

                                                                                  </div>  <!-- fin modal body --->

                                                                                  <div class="modal-footer justify-content-between">
                                                                                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                                      <button type="button" class="btn btn-danger" id="btn_delete<?php echo $id_proveedor;?>">Eliminar proveedor</button>
                                                                                      <div id="respuesta_delete<?php echo $id_proveedor;?>"></div>
                                                                                  </div>
                                                                              </div>
                                                                          <!-- /.modal-content -->
                                                                          </div>
                                                                          <!-- /.modal-dialog -->
                                                                      </div>    <!-- /.modal -->

                                                                      <script>
                                                                        $("#btn_delete<?php echo $id_proveedor;?>").click( function(){
                                                                                var id_proveedor = $("#id_proveedor_delete<?php echo $id_proveedor;?>").val();
                                                                                        var url = "../app/controllers/proveedores/delete.php"; 
                                                                                        $.get(url, { id_proveedor:id_proveedor }, function ($datos) { 
                                                                                            $("#respuesta_delete<?php echo $id_proveedor;?>").html($datos);
                                                                                          });
                                                                              });
                                                                            </script>
                                                                      <!--- FIN Modal para ELIMINAR PROVEEDOR ---->


                                                                </div>
                                                          </td>
                                                    </tr>
                                         <?php } ?>

                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    <!-- FIN Card de listado de Proveedores -->

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
              "info": "Mostrando _START_ a _END_ de _TOTAL_ proveedores",
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
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>



<!--- Modal para CREAR Proveedor ---->

<div class="modal fade" id="modal-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <h4 class="modal-title">Crear nuevo proveedor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">

                    <div class="row">
                          <div class="col-md-6">
                                <div class="form-group">
                                  <label for="nombre_proveedor">Nombre Proveeodr <b>*</b></label>
                                  <input id="nombre_proveedor" name="nombre_proveedor" type="text" class="form-control prov" placeholder="Nombre proveedor" required>
                                  <small id="lbl_nombre" style="color:red; display: none;">* Este campo es requerido</small>
                                </div>
                          </div>
                          <div class="col-md-6">
                                <div class="form-group">
                                  <label for="celular">Celular <b>*</b></label>
                                  <input id="celular"  name="celular" type="number" class="form-control prov" placeholder="Ingresar celular" required>
                                  <small id="lbl_celular" style="color:red; display: none;">* Este campo es requerido</small>
                                </div>
                          </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                                <div class="form-group">
                                  <label for="telefono">Teléfono empresa</label>
                                  <input id="telefono" name="telefono" type="number" class="form-control" placeholder="Ingresar teléfono de la empresa">
                                  <small id="lbl_empresa" style="color:red; display: none;">* Este campo es requerido</small>
                                </div>
                      </div>
                      <div class="col-md-6">
                                <div class="form-group">
                                    <label for="empresa">Empresa <b>*</b></label>
                                    <input id="empresa" name="empresa" type="text" class="form-control prov" placeholder="Nombre Empresa" required>
                                    <small id="lbl_empresa" style="color:red; display: none;">* Este campo es requerido</small>
                                  </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                                <div class="form-group">
                                  <label for="email">Email</label>
                                  <input id="email" type="text" class="form-control" placeholder="Email">
                                  <small id="lbl_email" style="color:red; display: none;">* Este campo es requerido</small>
                                </div>
                      </div>
                      <div class="col-md-6">
                                <div class="form-group">
                                  <label for="direccion">Dirección <b>*</b></label>
                                  <textarea name="direccion" id="direccion" class="form-control" cols="25" rows="2"></textarea>
                                  <small id="lbl_direccion" style="color:red; display: none;">* Este campo es requerido</small>
                                </div>
                      </div>
                    </div>                

                  </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btn_create">Guardar proveedor</button>
                <div id="respuesta"></div>
            </div>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>    <!-- /.modal -->

<script>
  $("#btn_create").click( function(){
       var nombre_proveedor = $("#nombre_proveedor").val();
       var celular = $("#celular").val();
       var telefono = $("#telefono").val();
       var empresa = $("#empresa").val();
       var email = $("#email").val();
       var direccion = $("#direccion").val();

        if (nombre_proveedor == ""){
                $("#nombre_proveedor").focus();
                $("#lbl_nombre").css('display', 'block');
          } else if(nombre_proveedor == ""){
                $("#celular").focus();
                $("#lbl_celular").css('display', 'block');
          } else if(empresa == ""){
                $("#empresa").focus();
                $("#lbl_empresa").css('display', 'block');
          } else if(direccion == ""){
                $("#direccion").focus();
                $("#lbl_direccion").css('display', 'block');
          } else {
                  var url = "../app/controllers/proveedores/create.php"; 
                  $.get(url, {nombre_proveedor:nombre_proveedor,
                              celular:celular,
                              telefono:telefono,
                              empresa:empresa,
                              email:email,
                              direccion:direccion,
                  }, function ($datos) { 
                      $("#respuesta").html($datos);
                    });
          }

/*  validar los campos con una clase, para no tener if anidados 
       $(".prov").each( function(i,e){
            if ($(e).val()=="") {
                alert($(e).val());
            } 
        });*/

  });
</script>
<!--- FIN modal para CREAR proveedor ---->






