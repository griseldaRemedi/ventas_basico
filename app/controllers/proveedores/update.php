<?php
include('../../config.php');

$id_proveedor = $_GET['id_proveedor'];
$nombre_proveedor = $_GET['nombre_proveedor'];
$celular = $_GET['celular'];
$telefono_empresa = $_GET['telefono'];
$empresa = $_GET['empresa'];
$email = $_GET['email'];
$direccion = $_GET['direccion'];

    $sql = "UPDATE tb_proveedores
                   SET nombre_proveedor=:nombre_proveedor, 
                        celular=:celular, 
                        telefono_empresa=:telefono_empresa, 
                        empresa=:empresa, 
                        email=:email, 
                        direccion=:direccion, 
                        fyh_actualizacion=:fyh_actualizacion 
                    WHERE id_proveedor=:id_proveedor";
 
    $consulta_sql = $pdo->prepare($sql);
    $consulta_sql->bindParam( ':id_proveedor', $id_proveedor);
    $consulta_sql->bindParam( ':nombre_proveedor', $nombre_proveedor);
    $consulta_sql->bindParam( ':celular', $celular);
    $consulta_sql->bindParam( ':telefono_empresa', $telefono_empresa);
    $consulta_sql->bindParam( ':empresa', $empresa);
    $consulta_sql->bindParam( ':email', $email);
    $consulta_sql->bindParam( ':direccion', $direccion);
    $consulta_sql->bindParam( ':fyh_actualizacion', $fechaHora);

    if($consulta_sql->execute()){
        session_start();
        $_SESSION['mensaje'] = "Se actualizó con éxito nuevo proveedor";
        $_SESSION['icono'] = "success";
         ?>
            <script>
                location.href = "<?php echo $URL?>/proveedores";
            </script>
        <?php
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error al actualizar nuevo proveedor";
        $_SESSION['icono'] = "error";
        ?>
            <script>
                location.href = "<?php echo $URL?>/proveedores";
            </script>
        <?php
    }


?>