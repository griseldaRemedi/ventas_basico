<?php
include('../../config.php');
$nombres = $_POST['nombres'];
$email = $_POST['email'];
$id_rol = $_POST['id_rol'];
$password_user = $_POST['password_user'];
$password_user2 = $_POST['password_user2'];

if ($password_user == $password_user2){

    $password_user = password_hash($password_user, PASSWORD_DEFAULT);
    $sql = "INSERT INTO tb_usuarios (nombres, email, id_rol, password_user, fyh_creacion) 
                            VALUES (:nombres, :email, :id_rol, :password_user, :fyh_creacion)";

    $consulta_sql = $pdo->prepare($sql);
    $consulta_sql->bindParam( ':nombres', $nombres);
    $consulta_sql->bindParam( ':email', $email);
    $consulta_sql->bindParam( ':id_rol', $id_rol);
    $consulta_sql->bindParam( ':password_user', $password_user);
    $consulta_sql->bindParam( ':fyh_creacion', $fechaHora);

    $consulta_sql->execute();

    session_start();
    $_SESSION['mensaje'] = "Se registró con éxito ".$nombres ;
    header('Location: '.$URL.'/usuarios');
    //echo password_hash($password_user);

}else{

    //echo "Las contraseñas no son iguales"; 
    session_start();
    $_SESSION['mensaje'] = "Las contraseñas no son iguales" ;
    header('Location: '.$URL.'/usuarios/create.php');
}


?>