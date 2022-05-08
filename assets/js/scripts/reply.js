import validations from "./validations.js";
const validar = new validations();
const formReply = document.getElementById('answer-riot'); // seleccionar el formulario segun un id
const inputs = document.querySelectorAll('#answer-riot input');// seleccionar TODOS los inputs del formulario
const respuesta = document.querySelectorAll('#answer-riot textarea');//seleccionamos el textarea


  let input = {
    subject: false,
    message: false
  }

  const comprobar = (e) => {
    switch (e.target.name){
      case 'message':
      validarInput(e.target, "4,1000");
      break;
      case 'subject':
      validarInput(e.target, "4,50");
      break;
    }
  }

  inputs.forEach((input) => {
    input.addEventListener('keyup', comprobar);
  });

  respuesta.forEach((textarea) => {
    textarea.addEventListener('keyup', comprobar);
  });

  const validarInput = (target, limit) => {
    if ((validar.ValidateText(target.value, true, true, true, " _\\-¡!¿?:\\n.#/*-+=\"\\\\", limit))) {
      input[target.name] = true;
      document.getElementById(target.name).style.border = "2px solid green";
      document.getElementById(target.name).style.color = "white";
    } else {
      input[target.name] = false;
      document.getElementById(target.name).style.color = "red";
      document.getElementById(target.name).style.border = "2px solid crimson";
    }
  }

  formReply.addEventListener('submit', e => {
    e.preventDefault();
    if(input.message && input.subject) {
      alert("Se envio su respuesta");
      formReply.reset();
    } else {
      alert("Uno de los campos es incorrecto");
    document.querySelector('.log_reg_table_msg').innerHTML =
    '<div class="error">'+
      '<p><em>ERROR</em></p>'+
        '<ul style = "color: crimson;">'+
          '<li>Campos incorrectos</li>'+
          '<li>El titulo solo debe contener minimo de 4 y un maximo de 50 letras</li>'+
          '<li>El mensaje solo debe contener minimo 4 y un maximo de 1000 letras</li>'+
        '</ul>'+
    '</div>'+
    '<br>';
  }
  });
