<?php
include('../../config.php');

$id_producto = $_GET['id_producto'];
$id_proveedor = $_GET['id_proveedor'];
$nro_compra = $_GET['nro_compra'];
$fecha_compra = $_GET['fecha_compra'];
$comprobante = $_GET['comprobante'];
$stock_nuevo = $_GET['stock_nuevo'];
$id_usuario_compra = $_GET['id_usuario_compra'];
$precio_compra = $_GET['precio_compra_compra'];
$cantidad_compra = $_GET['cantidad_compra'];

    $pdo->beginTransaction();

    $sql = "INSERT INTO tb_compras ( id_producto, nro_compra, fecha_compra, id_proveedor, comprobante, id_usuario, precio_compra, cantidad, fyh_creacion) 
                            VALUES (:id_producto, :nro_compra, :fecha_compra, :id_proveedor, :comprobante, :id_usuario, :precio_compra, :cantidad, :fyh_creacion)";

    $consulta_sql = $pdo->prepare($sql);
    $consulta_sql->bindParam( ':id_producto', $id_producto);
    $consulta_sql->bindParam( ':nro_compra', $nro_compra);
    $consulta_sql->bindParam( ':fecha_compra', $fecha_compra);
    $consulta_sql->bindParam( ':id_proveedor', $id_proveedor);
    $consulta_sql->bindParam( ':comprobante', $comprobante);
    $consulta_sql->bindParam( ':id_usuario', $id_usuario_compra);
    $consulta_sql->bindParam( ':precio_compra', $precio_compra);
    $consulta_sql->bindParam( ':cantidad', $cantidad_compra);
    $consulta_sql->bindParam( ':fyh_creacion', $fechaHora);

    if($consulta_sql->execute()){

            //actualizar cantidad de stock en el producto
            $sql_update = "UPDATE tb_almacen 
                                SET stock=:stock
                                WHERE id_producto=:id_producto";
            $consulta_sql_update = $pdo->prepare($sql_update);
            $consulta_sql_update->bindParam( ':id_producto', $id_producto);
            $consulta_sql_update->bindParam( ':stock', $stock_nuevo);
            $consulta_sql_update->execute();

            $pdo->commit();

            //actualizar datos de sesión
            session_start();
            $_SESSION['mensaje'] = "Se registró con éxito nueva compra";
            $_SESSION['icono'] = "success";

        ?>
            <script>
                location.href = "<?php echo $URL?>/compras/";
            </script>
        <?php
    } else {

        //si hay error deja sin efecto updaate
        $pdo->rollBack();

        //actuliza datos de sesión
        session_start();
        $_SESSION['mensaje'] = "Error al registrar nueva compra";
        $_SESSION['icono'] = "error";
        ?>
            <script>
                location.href = "<?php echo $URL?>/compras/create.php";
            </script>
        <?php

    }

   


?>