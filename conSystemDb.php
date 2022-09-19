<?php
// datos servidor local
$server   = 'localhost';
$username = 'root';
$password = '';
$database = 'ienpg';

// prueba de conexion para saber si conectamos o no
$con = mysqli_connect($server, $username, $password, $database);
if(!$con){
    echo 'Error en la conexion';
}

?>
