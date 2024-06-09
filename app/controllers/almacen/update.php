<?php
include('../../config.php');

$id_producto = $_POST['id_producto'];
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$id_categoria = $_POST['id_categoria'];
$id_usuario = $_POST['id_usuario'];
$descripcion = $_POST['descripcion'];
$stock = $_POST['stock'];
$stock_min = $_POST['stock_min'];
$stock_max = $_POST['stock_max'];
$precio_compra = $_POST['precio_compra'];
$precio_venta = $_POST['precio_venta'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$imagen_txt = $_POST['imagen_txt'];

if ($_FILES['imagen']['name'] != NULL){
    // subir imagen NUEVA
    $nombreDelArchivo = date("Y-m-d-h-i-s");
    $imagen_txt = $nombreDelArchivo."__".$_FILES['imagen']['name'];
    $location = "../../../almacen/img_productos/".$imagen_txt;
    move_uploaded_file($_FILES['imagen']['tmp_name'], $location);
    // fin subir imagen
} 

    $sql = "UPDATE tb_almacen 
                    SET codigo=:codigo, nombre=:nombre, descripcion=:descripcion, id_categoria=:id_categoria, id_usuario=:id_usuario, 
                        stock=:stock, stock_minimo=:stock_minimo, stock_maximo=:stock_maximo, precio_compra=:precio_compra, precio_venta=:precio_venta, 
                        fecha_ingreso=:fecha_ingreso, imagen=:imagen, fyh_creacion=:fyh_creacion 
                    WHERE id_producto=:id_producto";

    $consulta_sql = $pdo->prepare($sql);
    $consulta_sql->bindParam( ':codigo', $codigo);
    $consulta_sql->bindParam( ':nombre', $nombre);
    $consulta_sql->bindParam( ':descripcion', $descripcion);
    $consulta_sql->bindParam( ':id_categoria', $id_categoria);
    $consulta_sql->bindParam( ':id_usuario', $id_usuario);
    $consulta_sql->bindParam( ':stock', $stock);
    $consulta_sql->bindParam( ':stock_minimo', $stock_min);
    $consulta_sql->bindParam( ':stock_maximo', $stock_max);
    $consulta_sql->bindParam( ':precio_compra', $precio_compra);
    $consulta_sql->bindParam( ':precio_venta', $precio_venta);
    $consulta_sql->bindParam( ':imagen', $imagen_txt);
    $consulta_sql->bindParam( ':fecha_ingreso', $fecha_ingreso);
    $consulta_sql->bindParam( ':fyh_creacion', $fechaHora);
    $consulta_sql->bindParam( ':id_producto', $id_producto);

    if($consulta_sql->execute()){
        session_start();
        $_SESSION['mensaje'] = "Se registró con éxito nuevo producto";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/almacen');
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error al registrar nuevo producto";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/almacen/create.php');

    }

   


?>