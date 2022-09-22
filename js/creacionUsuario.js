const $ = (selector) => document.querySelector(selector);

let $email          = $("#correoUsuario");
let $clave          = $("#inputPassword");
let $nombre         = $("#nombre");
let $telefono       = $("#telefono");
let $identificador  = $("#identificador");

let telefonovalido;

const expresiones = {
  name: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
  telefono: /^\d{8,8}$/, // unicamente 8 numeros numeros.
};


function retur() {
    window.location="./admin.html";
}

function myFunction() {
  var x = document.getElementById("telefono");
  if (expresiones.telefono.test(x.value)) {
    telefonovalido = true;
  } else {
    telefonovalido = false;
  }
}

function enviarDatos() {
    // console.log($email.value);
  const email           = $email.value;
  const clave           = $clave.value;
  const nombre          = $nombre.value;
  const telefono        = $telefono.value;
  const identificador   = $identificador.value;


  ////  validaciones de campos del formulario
  if (email == "" || email == null) {
    swal("Favor ingrese correo");
    return;
  }

  if (clave == "" || clave == null) {
    swal("Favor ingrese una contraseña");
    return;
  }

  if (nombre == "" || nombre == null) {
    swal("Favor ingrese un nombre");
    return;
  }

  if (telefono == "" || telefono == null) {
    swal("Favor ingrese un telefono");
    return;
  }

    console.log(telefonovalido);

    if(telefonovalido  === false){
        swal("Ingrese un numero de 8 digitos");
    }

  if (identificador == "SELECCIONE UNA OPCION") {
    swal("Favor seleccione un identificador de usuario");
    return;
  }  

  /// contruyo los datos en una variable y preparo para enviar en el fetchs
  let formData = new FormData();
  formData.append("email", email);
  formData.append("clave", clave);
  formData.append("nombre", nombre);
  formData.append("telefono", telefono);
  formData.append("identificador", identificador);
  
//   preparo la funcion fetch para mandar y recibir datos desde el php ...!!
  fetch("php/crearUsuario.php", {
    method: "POST",
    body: formData,
  })
    .then((res) => res.json())
    .then((data) => {
      if (data === "error") {
        swal('Este Correo ya esta registrado con un usuario.');
      }else{
        swal("Usuario Registrado..!");
        setTimeout(() => {
            window.location = "./creacionUsuario.html";
        }, 5000);
      }
    });

}
