<?php
include_once('./conSystemDb.php');
// recibo los datos del formulario
$email = $_POST['email'];
$clave = $_POST['clave'];

$consulVerificacion = "SELECT * FROM ienpg.usuarios where correo = '".$email."';";
$queryVerificacion = mysqli_query($con,$consulVerificacion);
$row_cnt = mysqli_num_rows($queryVerificacion);
while ($result = mysqli_fetch_array($queryVerificacion)) {
   $idveri      = $result["id"];
   $correoVeri  = $result["correo"];
   $claveVeri   = $result["clave"];
}

if(!$row_cnt == 0){
    
    if ($claveVeri != $clave) {
        header("Location: index.html");
        return;
    }

    header("Location: enviarInforme.html");

}else {
    // header("Location : ./../index.html");

    echo "Usuario no registrado favor comunicarse con atencion al cliente";
}

 
mysqli_close($con);



?>