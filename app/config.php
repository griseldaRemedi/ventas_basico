<?php

define('SERVIDOR', 'localhost');
define('USUARIO','root');
define('PASSWORD','');
define('BD','sistemadeventas');

$servidor = "mysql:dbname=".BD."; host=".SERVIDOR;

try {
    $pdo = new PDO($servidor, username: USUARIO, password: PASSWORD);
    $pdo->exec('SET NAMES utf8');
    //echo "La conexión a la BD fue EXITOSA!";
} catch (\Throwable $th) {
    //throw $th;
    print_r($th);
    echo "Hubo errores en la conexión a la BD. ";
}

$URL = "http://localhost/www.sistemadeventas.com";

date_default_timezone_set('America/Argentina/Cordoba');
$fechaHora = date(format: 'Y-m-d h:i:s');


?>