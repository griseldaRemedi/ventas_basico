<?php
include('../../config.php');

$id_rol = $_POST['id_rol'];
$rol = $_POST['rol'];

    $sql = "UPDATE tb_roles 
                            SET rol=:rol, fyh_actualizacion=:fyh_actualizacion 
                            WHERE id_rol=:id_rol";
   

    $consulta_sql = $pdo->prepare($sql);
    $consulta_sql->bindParam( ':id_rol', $id_rol);
    $consulta_sql->bindParam( ':rol', $rol);
    $consulta_sql->bindParam( ':fyh_actualizacion', $fechaHora);
    
    if ($consulta_sql->execute()){
        session_start();
        $_SESSION['mensaje'] = "Se actualizó con éxito el rol";
        $_SESSION['icono'] = "success"; 
        header('Location: '.$URL.'/roles');
    } else {
            session_start();
            $_SESSION['mensaje'] = "Error al actualizar rol" ;
            $_SESSION['icono'] = "error"; 
            header('Location: '.$URL.'/roles/update.php?id='.$id_usuario);
    }

    



?>