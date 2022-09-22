<?php

use LDAP\Result;

include_once('./../conSystemDb.php');

$email          = $_POST['email'];
$clave          = $_POST['clave'];
$nombre         = $_POST['nombre'];
$telefono       = $_POST['telefono'];
$identificador  = $_POST['identificador'];

$consulVerificacion = "SELECT * FROM ienpg.usuarios where correo = '" . $email . "';";
$queryVerificacion  = mysqli_query($con, $consulVerificacion);
$row_cnt            = mysqli_num_rows($queryVerificacion);


if ($row_cnt != 0) {
    mysqli_close($con);
    echo json_encode('error');
    
}else{
    $Conultaidentificador = "SELECT * FROM ienpg.identificador where id_identificador = '" . $identificador . "';";
    $queryidentificador  = mysqli_query($con, $Conultaidentificador);
    while ($result = mysqli_fetch_array($queryidentificador)) {
        $descripIdentificador = $result['nombre'];
    }

    $queryInsert = "INSERT INTO ienpg.usuarios
    VALUES ( null, '".$email."', '".$clave."', '".$nombre."', '".$telefono."', '".$descripIdentificador."' )";
    $query_mysql = mysqli_query($con, $queryInsert);
    echo json_encode('correct');

}


?>