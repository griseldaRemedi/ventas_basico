<?php
include('../../config.php');

  $id_producto = $_POST['id_producto'];
  $sql_producto = "DELETE FROM `tb_almacen` WHERE id_producto=:id_producto";
  $query_producto = $pdo->prepare($sql_producto);
  $query_producto->bindParam( ':id_producto', $id_producto);
  
  if ($query_producto->execute()){ // se tendría que eliminar la imagen de la carpeta img_productos
    session_start();
    $_SESSION['mensaje'] = "Se eliminó con éxito";
    $_SESSION['icono'] = "success"; 
    header('Location: '.$URL.'/almacen');

  } else {
    session_start();
    $_SESSION['mensaje'] = "No fue posible elimnar";
    $_SESSION['icono'] = "error"; 
    header('Location: '.$URL.'/almacen');

  }

?>