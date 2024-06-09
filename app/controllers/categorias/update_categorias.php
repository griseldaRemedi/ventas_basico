<?php
include('../../config.php');

$id_categoria = $_GET['id_categoria'];
$nombre_categoria = $_GET['nombre_categoria'];

    $sql = "UPDATE tb_categorias 
                            SET nombre_categoria=:nombre_categoria, fyh_actualizacion=:fyh_actualizacion 
                            WHERE id_categoria=:id_categoria";
   

    $consulta_sql = $pdo->prepare($sql);
    $consulta_sql->bindParam( ':id_categoria', $id_categoria);
    $consulta_sql->bindParam( ':nombre_categoria', $nombre_categoria);
    $consulta_sql->bindParam( ':fyh_actualizacion', $fechaHora);
    
    if ($consulta_sql->execute()){
        session_start();
        $_SESSION['mensaje'] = "Se actualizó con éxito la categoría";
        $_SESSION['icono'] = "success"; 
            ?>
            <script>
                location.href = "<?php echo $URL?>/categorias";
            </script>
            <?php
    } else {
            session_start();
            $_SESSION['mensaje'] = "Error al actualizar categoria" ;
            $_SESSION['icono'] = "error"; 
             ?>
            <script>
                location.href = "<?php echo $URL?>/categorias";
            </script>
            <?php
    }

    



?>


