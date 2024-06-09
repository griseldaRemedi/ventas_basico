<?php

session_start();
if (isset($_SESSION['sesion_email'])){
  //echo "existe sesión de ". $_SESSION['sesion_email'];
  $email =  $_SESSION['sesion_email'];
  $sql = "SELECT 
                        us.id_usuario as id_usuario, 
                        us.nombres as nombres, 
                        us.email as email, 
                        rol.id_rol as id_rol, 
                        rol.rol as rol 
                      FROM `tb_usuarios` as us 
                      INNER JOIN `tb_roles` as rol 
                      ON us.id_rol = rol.id_rol WHERE email = '$email'";
  $query = $pdo->prepare($sql);
  $query->execute();
  $usuarios = $query->fetchAll( PDO::FETCH_ASSOC );
  foreach( $usuarios as $usuario ){
        $nombre_sesion = $usuario['nombres'];
        $rol_sesion = $usuario['rol'];
        $id_usuario = $usuario['id_usuario'];
  }
  
} else {
  //echo "No existe sesión, debe ingresar al sistema ".$_SESSION['sesion_email'];
  header('Location: '.$URL.'/login');
}

?>