<?php
include_once('./conSystemDb.php');

/// variables
$nombre_completo    = $_POST["name"];
$correo_contaco     = $_POST["email"];
$telefono_contacto  = $_POST["telefono"];
$asunto_contacto    = $_POST["asunto"];
$mensaje_contacto   = $_POST["message"];
$fecha_reporte      = date("Y-m-d");
$inser_reporte_directo = "insert into contacto_directo value (NULL, '".$nombre_completo."', '".$correo_contaco."', ".$telefono_contacto.", '".$asunto_contacto."', '".$mensaje_contacto."', '".$fecha_reporte."')";
$query_mysql = mysqli_query($con, $inser_reporte_directo);
mysqli_close($con);
// echo "$inser_reporte_directo";
header("location: index.html");

?>