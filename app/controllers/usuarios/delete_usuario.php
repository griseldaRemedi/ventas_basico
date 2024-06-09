<?php
include('../../config.php');

  $id_usuario = $_POST['id_usuario'];
  $sql_usuario = "DELETE FROM `tb_usuarios` WHERE id_usuario=:id_usuario";
  $query_usuario = $pdo->prepare($sql_usuario);
  $query_usuario->bindParam( ':id_usuario', $id_usuario);
  $query_usuario->execute();

  session_start();
  $_SESSION['mensaje'] = "Se eliminó con éxito ".$nombres ;
  $_SESSION['icono'] = "success"; 
  header('Location: '.$URL.'/usuarios');

?>