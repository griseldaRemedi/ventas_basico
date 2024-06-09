<?php
include('../../config.php');

$nombre_proveedor = $_GET['nombre_proveedor'];
$celular = $_GET['celular'];
$telefono_empresa = $_GET['telefono'];
$empresa = $_GET['empresa'];
$email = $_GET['email'];
$direccion = $_GET['direccion'];

    $sql = "INSERT INTO tb_proveedores (nombre_proveedor, celular, telefono_empresa, empresa, email, direccion, fyh_creacion) 
                            VALUES ( :nombre_proveedor, :celular, :telefono_empresa, :empresa, :email, :direccion, :fyh_creacion)";
 
    $consulta_sql = $pdo->prepare($sql);
    $consulta_sql->bindParam( ':nombre_proveedor', $nombre_proveedor);
    $consulta_sql->bindParam( ':celular', $celular);
    $consulta_sql->bindParam( ':telefono_empresa', $telefono_empresa);
    $consulta_sql->bindParam( ':empresa', $empresa);
    $consulta_sql->bindParam( ':email', $email);
    $consulta_sql->bindParam( ':direccion', $direccion);
    $consulta_sql->bindParam( ':fyh_creacion', $fechaHora);

    if($consulta_sql->execute()){
        session_start();
        $_SESSION['mensaje'] = "Se registró con éxito nuevo proveedor";
        $_SESSION['icono'] = "success";
         ?>
            <script>
                location.href = "<?php echo $URL?>/proveedores";
            </script>
        <?php
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error al registrar nuevo proveedor";
        $_SESSION['icono'] = "error";
        ?>
            <script>
                location.href = "<?php echo $URL?>/proveedores";
            </script>
        <?php
    }


?>