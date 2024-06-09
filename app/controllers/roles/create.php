<?php
include('../../config.php');

$rol = $_POST['rol'];


    $sql = "INSERT INTO tb_roles (rol, fyh_creacion) 
                            VALUES (:rol, :fyh_creacion)";

    $consulta_sql = $pdo->prepare($sql);
    $consulta_sql->bindParam( ':rol', $rol);
    $consulta_sql->bindParam( ':fyh_creacion', $fechaHora);

    if($consulta_sql->execute()){
        session_start();
        $_SESSION['mensaje'] = "Se registró con éxito el nuevo rol";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/roles');
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error al registrar nuevo rol";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/roles/create.php');

    }

   


?>