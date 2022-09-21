<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/crearUsuario.css">
</head>
<body>
    <header>

    </header>
    <main>
        <div class="container">
            <div class="container--flex block_definido" >
                <div class="block__inputs">
                    <input class="form-control input_personalice" type="text" placeholder="Ingrese Correo">
                    <input type="password" class="form-control input_personalice" id="inputPassword" placeholder="Ingrese Clave">
                    <input class="form-control input_personalice" type="text" placeholder="Nombre Completo">
                    <input class="form-control input_personalice" type="text" placeholder="Telefono">
                    <select class="custom-select mr-sm-2 input_personalice" id="inlineFormCustomSelect">
                        <option selected>SELECCIONE UNA OPCION</option>
                        <option value="1">USUARIO</option>
                        <option value="2">ADMIN</option>
                    </select>
                </div>
                <div class="form__espacio">
                    <button class="btn btn-primary" type="submit">Crear Usuario</button>
                </div>
            </div>
        </div>
    </main>
</body>
</html>

<?php

?>