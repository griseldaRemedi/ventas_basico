<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/roles/listado_de_roles.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1 class="m-0">Roles registrados</h1>
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

                    <!-- Card de listado de role -->
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                            <h3 class="card-title">Roles</h3>
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
                                                <th>Rol</th>
                                                <th>Acciones</th>
                                              </tr>
                                        </thead>
                                        <tbody>

                                          <?php 
                                              include('../app/controllers/roles/listado_de_roles.php');
                                              $contador_usr = 0;
                                              foreach( $roles_datos as $rol ){ 
                                                  $id_rol = $rol['id_rol'];
                                                  $contador_usr++;
                                                ?>
                                                    <tr>
                                                          <td> <?php echo $contador_usr; ?> </td>
                                                          <td> <?php echo $rol['rol']; ?> </td>
                                                          <td> 
                                                            <center>
                                                                <div class="btn-group">
                                                                  <a href="show.php?id=<?php echo $id_rol; ?>" type="button" class="btn btn-info"><i class="fa fa-eye"></i>Mostrar</a>
                                                                  <a href="update.php?id=<?php echo $id_rol; ?>" type="button" class="btn btn-success"><i class="fa fa-pen"></i>Editar</a>
                                                                </div>
                                                            </center>
                                                          </td>
                                                    </tr>

                                         <?php } ?>

                                        </tbody>
                                        <tfoot>
                                              <tr>
                                                <th>Nro</th>
                                                <th>Rol</th>
                                                <th>Acciones</th>
                                              </tr>
                                        </tfoot>
                                    </table>
                            </div>
                        </div>
                    <!-- FIN Card de listado de role -->

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