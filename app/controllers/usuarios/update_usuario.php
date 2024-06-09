<?php
 
  $id_usuario_get = $_GET['id'];
  $sql_usuario = "SELECT us.id_usuario, us.nombres, us.email, rol.rol 
                        FROM tb_usuarios as us 
                        INNER JOIN tb_roles as rol ON us.id_rol = rol.id_rol
                        WHERE id_usuario = '$id_usuario_get'";
  $query_usuario = $pdo->prepare($sql_usuario);
  $query_usuario->execute();
  $usuario_datos = $query_usuario->fetchAll( PDO::FETCH_ASSOC );

    foreach($usuario_datos as $usuario_dato){
            $nombre_usuario_tabla = $usuario_dato['nombres'];
            $email_usuario_tabla = $usuario_dato['email'];
            $rol_usuario_tabla = $usuario_dato['rol'];
            $id_usuario_tabla = $usuario_dato['id_usuario'];
    }

?>