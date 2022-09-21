const $ = (selector) => document.querySelector(selector);

let $email = $("#email");
let $clave = $("#clave");

function enviar() {
  const email = $email.value;
  const clave = $clave.value;
  if (email == "" || email == null) {
    swal("Favor ingrese correo");
    return;
  }

  if (clave == "" || clave == null) {
    swal("Favor ingrese una contraseña");
    return;
  }
  // ya esta, alli esta dando error por que no entucnetra la url.
  let formData = new FormData();
  formData.append("email", email);
  formData.append("clave", clave);
  /// recordatorio de agregar el resto de codigo despues de encontrar el error
  fetch("validarLogin.php", {
    method: "POST",
    body: formData,
  })
    .then(res => res.json())
    .then(data => {
        if (data === "correct") {
            window.location = "enviarInforme.html";
        }else if (data === "ADMIN") {
          window.location = "admin.html";
        } else {
          swal(data);
        }
    })

    // .catch((err) => {
    //   console.log(err);
    // });
}
