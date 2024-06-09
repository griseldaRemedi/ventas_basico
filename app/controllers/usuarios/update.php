<?php
include('../../config.php');

$id_usuario = $_POST['id_usuario'];
$nombres = $_POST['nombres'];
$email = $_POST['email'];
$id_rol = $_POST['id_rol'];
$password_user = $_POST['password_user'];
$password_user2 = $_POST['password_user2'];

if ($password_user == $password_user2){

    if (($password_user == "") && ($password_user2=="")) {
            $sql = "UPDATE tb_usuarios 
                            SET nombres=:nombres, email=:email, id_rol=:id_rol, fyh_actualizacion=:fyh_actualizacion 
                            WHERE id_usuario=:id_usuario";
    } else {
                $password_user = password_hash($password_user, PASSWORD_DEFAULT);
                $sql = "UPDATE tb_usuarios 
                            SET nombres=:nombres, email=:email, id_rol=:id_rol, password_user=:password_user, fyh_actualizacion=:fyh_actualizacion 
                            WHERE id_usuario=:id_usuario";
    }

    

    $consulta_sql = $pdo->prepare($sql);
    $consulta_sql->bindParam( ':id_usuario', $id_usuario);
    $consulta_sql->bindParam( ':nombres', $nombres);
    $consulta_sql->bindParam( ':email', $email);
    $consulta_sql->bindParam( ':id_rol', $id_rol);
    if (($password_user != "")) $consulta_sql->bindParam( ':password_user', $password_user);
    $consulta_sql->bindParam( ':fyh_actualizacion', $fechaHora);

    //var_dump( $consulta_sql); die;

    $consulta_sql->execute();

    session_start();
    $_SESSION['mensaje'] = "Se actualizó con éxito ".$nombres ;
     $_SESSION['icono'] = "success"; 
    header('Location: '.$URL.'/usuarios');
    //echo password_hash($password_user);

}else{

    //echo "Las contraseñas no son iguales"; 
    session_start();
    $_SESSION['mensaje'] = "Las contraseñas no son iguales" ;
    $_SESSION['icono'] = "error"; 
    header('Location: '.$URL.'/usuarios/update.php?id='.$id_usuario);
}


?>