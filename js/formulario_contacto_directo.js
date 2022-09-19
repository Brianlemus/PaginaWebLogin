const formulario = document.getElementById("formulario_contacto_directo");
const inputs = document.querySelectorAll("#formulario_contacto_directo input");

/// expresiones para validacion
const expresiones = {
  name: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
  telefono: /^\d{8,8}$/, // unicamente 8 numeros numeros.
};

const campos = {
  name: false,
  email: false,
  telefono: false,
};

const validarformulario = (e) => {
  switch (e.target.name) {
    case "name":
      validacionCampo(expresiones.name, e.target, e.target.name);
      break;
    case "email":
      validacionCampo(expresiones.email, e.target, e.target.name);
      break;
    case "telefono":
      validacionCampo(expresiones.telefono, e.target, e.target.name);
      break;
  }
};

inputs.forEach((input) => {
  input.addEventListener("keyup", validarformulario);
  input.addEventListener("blur", validarformulario);
});

const validacionCampo = (expresion, input, campo) => {
  if (expresion.test(input.value)) {
    document
      .getElementById(`grupo__${campo}`)
      .classList.remove("formulario__grupo-incorrecto");
    document
      .getElementById(`grupo__${campo}`)
      .classList.add("formulario__grupo-correcto");
    document
      .querySelector(`#grupo__${campo} i`)
      .classList.add("fa-check-circle");
    document
      .querySelector(`#grupo__${campo} i`)
      .classList.remove("fa-times-circle");
    document
      .querySelector(`#grupo__${campo} .formulario__input-error`)
      .classList.remove("formulario__input-error-activo");
    campos[campo] = true;
  } else if (input.value == "") {
    document
      .getElementById(`grupo__${campo}`)
      .classList.remove("formulario__grupo-incorrecto");
    document
      .getElementById(`grupo__${campo}`)
      .classList.remove("formulario__grupo-correcto");
    document
      .querySelector(`#grupo__${campo} .formulario__input-error`)
      .classList.remove("formulario__input-error-activo");
    document
      .querySelector(`#grupo__${campo} i`)
      .classList.remove("fa-check-circle");
    document
      .querySelector(`#grupo__${campo} i`)
      .classList.remove("fa-times-circle");
    campos[campo] = false;
  } else {
    document
      .getElementById(`grupo__${campo}`)
      .classList.add("formulario__grupo-incorrecto");
    document
      .getElementById(`grupo__${campo}`)
      .classList.remove("formulario__grupo-correcto");
    document
      .querySelector(`#grupo__${campo} i`)
      .classList.remove("fa-check-circle");
    document
      .querySelector(`#grupo__${campo} i`)
      .classList.add("fa-times-circle");
    document
      .querySelector(`#grupo__${campo} .formulario__input-error`)
      .classList.add("formulario__input-error-activo");
    campos[campo] = false;
  }
};

formulario.addEventListener("submit", (e) => {
  e.preventDefault();

  if (campos.name && campos.email && campos.telefono) {
    swal("Excelente!", "Datos ingresados", "success");
  } else {
    // window.alert("Favor llenar correctamente el formulario");
    swal("Cuidado!", "Favor llenar correctamente el formulario", "error");
  }
});
