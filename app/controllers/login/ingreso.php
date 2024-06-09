<?php
include('../../config.php');
$email = $_POST['email'];
$password = $_POST['password'];

$contador = 0;
$sql = "SELECT * FROM tb_usuarios WHERE email LIKE '$email'";

$query = $pdo->prepare($sql);
$query->execute();
$usuarios = $query->fetchAll( fetch_styl: PDO::FETCH_ASSOC );
foreach($usuarios as $usuario){
    $nombres_tabla = $usuario['nombres'];
    $email_tabla = $usuario['email'];
    $pasword_user_tabla = $usuario['password_user'];
    $contador++;
}

if (($contador > 0) && (password_verify($password, $pasword_user_tabla))){
    //echo "Datos correctos!";
    session_start();
    $_SESSION['sesion_email'] = $usuario['email'];
} else {
    //echo "No se hallaron datos que coincidan con los ingresados";
    session_start();
    $_SESSION['mensaje'] = "Error: datos incorrectos";
    header('Location'.$URL.'/login');

   
} 

header( 'Location: '.$URL.'/index.php');