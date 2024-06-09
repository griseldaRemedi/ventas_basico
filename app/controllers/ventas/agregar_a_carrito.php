<?php
include('../../config.php');

$nro_venta = $_GET['nro_venta'];
$id_producto = $_GET['id_producto'];
$cantidad = $_GET['cantidad'];

    $sql = "INSERT INTO tb_carrito (nro_venta, id_producto, cantidad,  fyh_creacion) 
                            VALUES ( :nro_venta, :id_producto, :cantidad, :fyh_creacion)";
 
    $consulta_sql = $pdo->prepare($sql);
    $consulta_sql->bindParam( ':nro_venta', $nro_venta);
    $consulta_sql->bindParam( ':id_producto', $id_producto);
    $consulta_sql->bindParam( ':cantidad', $cantidad);
    $consulta_sql->bindParam( ':fyh_creacion', $fechaHora);

    if($consulta_sql->execute()){
        session_start();
        $_SESSION['mensaje'] = "Se agregó al carrito con éxito";
        $_SESSION['icono'] = "success";
         ?>
            <script>
                location.href = "<?php echo $URL?>/ventas/create.php";
            </script>
        <?php
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error al agregar al carrito";
        $_SESSION['icono'] = "error";
        ?>
            <script>
                location.href = "<?php echo $URL?>/ventas/create.php";
            </script>
        <?php
    }


?>