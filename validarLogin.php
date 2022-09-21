<?php
session_start();

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
       echo json_encode('Contraseña Incorrecta');
    }else{
        echo json_encode('correct');
        
        $_SESSION["emailLogin"]    = $email;
        $_SESSION["passwordLogin"] = $clave;


    }
}else {
    echo json_encode('Correo electronico no registrado.');
}
mysqli_close($con);

?>