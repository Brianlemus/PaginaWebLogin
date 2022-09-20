<?php
include_once('./conSystemDb.php');

/// variables
$nombre_completo    = $_REQUEST["nom"];
$correo_contaco     = $_REQUEST["email"];
$telefono_contacto  = $_REQUEST["numero"];
$asunto_contacto    = $_REQUEST["asunto"];
$mensaje_contacto   = $_REQUEST["message"];
$fecha_reporte      = date("Y-m-d");
$inser_reporte_directo = "insert into contacto_directo value (NULL, '".$nombre_completo."', '".$correo_contaco."', ".$telefono_contacto.", '".$asunto_contacto."', '".$mensaje_contacto."', '".$fecha_reporte."')";
$query_mysql = mysqli_query($con, $inser_reporte_directo);
if ($query_mysql) {
    echo "<script>window.location='./index.html'</script>";
}
mysqli_close($con);

?>