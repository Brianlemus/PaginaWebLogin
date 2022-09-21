<?php
session_start();

$_SESSION["emailLogin"];
$_SESSION["passwordLogin"];

include_once('../conSystemDb.php');

$correoLogin = $_SESSION["emailLogin"];
$nombre_iglesia = $_POST["nombreIglesia"];
$direccion      = $_POST["direccion"];
$pastor_iglesia = $_POST["pastorIglesia"];
$fecha          = $_POST["fecha"];


if ($_FILES["archivo"]) {
    $nombre_base = basename($_FILES["archivo"]["name"]);
    $nombre_final = date("y-m-d")."-".date("h-i-s"). "-" . $nombre_base;
    $ruta = "../archivosSubidos/" .$nombre_final;
    $subirarchivo   = move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta);
    if ($subirarchivo) {
        $insert_sql = "INSERT INTO formulario(id, correo, nombre_iglesia, direccion, pastor_iglesia, fecha, ruta_archivo) 
        VALUES (null, '".$correoLogin."' , '".$nombre_iglesia."' , '".$direccion."', '".$pastor_iglesia."', '".$fecha."', '".$ruta."' )";
        $resultado = mysqli_query($con, $insert_sql);
        if($resultado){
            echo "<script> alert('se ha cargado correctamente el formulario'); window.location='./../enviarInforme.html'</script>";
        }else { 
            printf("Errormessage: %s\n", mysqli_error($con));
        }
    }
}else{
    echo "Error al subir archivo";
}

?>