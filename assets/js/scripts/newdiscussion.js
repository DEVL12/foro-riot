import validations from "./validations.js";
const validar = new validations();
const formSearch = document.getElementById('new-disc'); // seleccionar el formulario segun un id
const inputs = document.querySelectorAll('#new-disc input');// seleccionar TODOS los inputs del formulario
const contenido = document.querySelectorAll('#new-disc textarea');//seleccionamos el textarea


  let input = {
    titulo: false,
    mensaje: false,
    tema: false
  }

  const comprobar = (e) => {
    switch (e.target.name){
      case 'titulo':
        validarInput(e.target, e.target.name);
      break;
      case 'mensaje':
        validarInput(e.target, e.target.name);
      break;
      case 'tema':
        validarInput(e.target, e.target.name);
      break;
    }
  }

  inputs.forEach((input) => {
    input.addEventListener('keyup', comprobar);
  });

  contenido.forEach((textarea) => {
    textarea.addEventListener('keyup', comprobar);
  });


  const validarInput = (target, name) => {
    if ((validar.ValidateText(target.value, true, true, true, " _\\-¡!¿?:", "4,45"))) {
      input[name] = true;
      document.getElementById(name).style.color = "green";
      //document.getElementById(name).style.border = "2px solid green";
    } else {
      input[name] = false;
      document.getElementById(name).style.color = "red";
      //document.getElementById(name).Style.border = "2px solid crimson";
    }
  }

  formSearch.addEventListener('submit', e => {
    e.preventDefault();
    if (input.titulo && input.mensaje && input.tema) {
      alert("funciona");
      formSearch.reset();
    } else {
      alert("algo no funciona");
    }
  });
