<?php
include('../../config.php');

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
//$imagen = $_POST['imagen'];

//var_dump($_FILES); die;

// subir imagen
$nombreDelArchivo = date("Y-m-d-h-i-s");
if ($_FILES['imagen']['name'] == NULL){
    $filename = "";
} else {
    $filename = $nombreDelArchivo."__".$_FILES['imagen']['name'];
}

$location = "../../../almacen/img_productos/".$filename;
move_uploaded_file($_FILES['imagen']['tmp_name'], $location);
// fin subir imagen

    $sql = "INSERT INTO tb_almacen (codigo, nombre, descripcion, id_categoria, id_usuario, stock, stock_minimo, stock_maximo, precio_compra, precio_venta, fecha_ingreso, imagen, fyh_creacion) 
                            VALUES (:codigo, :nombre, :descripcion, :id_categoria, :id_usuario, :stock, :stock_minimo, :stock_maximo, :precio_compra, :precio_venta, :fecha_ingreso, :imagen, :fyh_creacion)";

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
    $consulta_sql->bindParam( ':imagen', $filename);
    $consulta_sql->bindParam( ':fecha_ingreso', $fecha_ingreso);
    $consulta_sql->bindParam( ':fyh_creacion', $fechaHora);

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