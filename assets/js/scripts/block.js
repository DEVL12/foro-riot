import validations from "./validations.js";
const validar = new validations();
const formReply = document.getElementById('blockUser'); // seleccionar el formulario segun un id
const respuesta = document.querySelectorAll('#blockUser textarea');//seleccionamos el textarea

  let input = {
    mensaje: false
  }

  const comprobar = (e) => {
    switch (e.target.name){
      case 'mensaje':
      validarInput(e.target, "4,1000");
      break;
    }
  }

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
    if(input.mensaje) {
      alert("Se envio su respuesta");
      formReply.reset();
    } else {
      alert("Uno de los campos es incorrecto");
      document.querySelector('.log_reg_table_msg').innerHTML =
      '<div class="error">'+
        '<p><em>ERROR</em></p>'+
          '<ul style = "color: crimson;">'+
            '<li>Campo incorrecto</li>'+
            '<li>El mensaje solo debe contener minimo 4 y un maximo de 1000 letras</li>'+
          '</ul>'+
      '</div>'+
      '<br>';
    }
  });
