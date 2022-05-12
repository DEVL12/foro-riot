import validations from "./validations.js";
const validar = new validations();
const formSearch = document.getElementById('new-disc'); // seleccionar el formulario segun un id
const inputs = document.querySelectorAll('#new-disc input');// seleccionar TODOS los inputs del formulario
const contenido = document.querySelectorAll('#new-disc textarea');//seleccionamos el textarea


  let input = {
    titulo: false,
    mensaje: false,
  }

  const comprobar = (e) => {
    switch (e.target.name){
      case 'titulo':
        validarInput(e.target, e.target.name, "4,50");
      break;
      case 'mensaje':
        validarInput(e.target, e.target.name, "4,1000");
      break;
    }
  }

  inputs.forEach((input) => {
    input.addEventListener('keyup', comprobar);
  });

  contenido.forEach((textarea) => {
    textarea.addEventListener('keyup', comprobar);
  });


  const validarInput = (target, name, limit) => {
    if ((validar.ValidateText(target.value, true, true, true, " _\\-¡!¿?:\\n.#/*-+=\"\\\\", limit))) {
      input[name] = true;
      document.getElementById(target.name).style.border = "2px solid green";
      document.getElementById(target.name).style.color = "white";
    } else {
      input[name] = false;
      document.getElementById(target.name).style.color = "red";
      document.getElementById(target.name).style.border = "2px solid crimson";
    }
  }

  formSearch.addEventListener('submit', e => {
    e.preventDefault();
    if (input.titulo && input.mensaje) {
      alert("Se envio su nueva conversacion");
      formSearch.reset();
    } else {
      alert("algo no funciona");
      document.querySelector('.log_reg_table_msg').innerHTML =
      '<div class="error">'+
        '<p><em>ERROR</em></p>'+
          '<ul style = "color: crimson;">'+
            '<li>Campos incorrectos</li>'+
            '<li>El titulo solo debe contener minimo de 4 y un maximo de 50 letras</li>'+
            '<li>El mensaje solo debe contener minimo 4 y un maximo de 1000 letras</li>'+
            '<li>Por favor seleccione un tema</li>'+
          '</ul>'+
      '</div>'+
      '<br>';
    }
  });
