import validations from "./validations.js";
const validar = new validations();
const formRegister = document.getElementById('formRegister');
const inputs = document.querySelectorAll('#formRegister input');

let input = {
  username : false,
  password : false,
  password2 : false,
  passwordCheck: false,
  email : false,
  email2 : false,
  emailCheck: false,
  suma: false
}

const comprobar = (e) => {
  switch(e.target.name) {
    case 'username' : {
      validarInput(e.target, " _\\-¡!¿?:.^$", "3,16");
      break;
    }
    case 'password' : {
      validarInput(e.target, "_\\-¡!¿?:.^$#@&", "5,15");
      compareInputs("password", "password2", "passwordCheck");
      break;
    }
    case 'password2' : {
      validarInput(e.target, "_\\-¡!¿?:.^$#@&", "5,15");
      compareInputs("password", "password2", "passwordCheck");
      break;
    }
    case 'email' : {
      validarEmail(e.target, "^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\\.[a-zA-Z0-9-.]+$");
      compareInputs("email", "email2","emailCheck");
      break;
    }
    case 'email2' : {
      validarEmail(e.target, "^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\\.[a-zA-Z0-9-.]+$");
      compareInputs("email", "email2","emailCheck");
      break;
    }
    case 'answer' : {
      input.suma = validar.ValidateNumber(e.target.value) ? true : false;
      console.log()
      if(input.suma == false) ChangeClass("error","answer");
      else ChangeClass("correct","answer");
      break;
    }
  }
}

inputs.forEach((inputs) => {
   inputs.addEventListener('keyup', comprobar);
});

const validarInput = (target, simbols, limit) => {
  if((validar.ValidateText(target.value, true, true, true, simbols, limit))) {
    ChangeClass("correct", target.name);
    input[target.name] = true;
  } else {
    ChangeClass("error", target.name);
    input[target.name] = false;
  }
}

const compareInputs = (input1, input2, check) => {
  if((input[input1] == true && input[input2] == true) &&
     (document.getElementById(input1).value != document.getElementById(input2).value)) {
    ChangeClass("alert", input1);
    ChangeClass("alert", input2);
    input[check] = false;
  } else {
    ChangeClass("cleanAlert",input1);
    ChangeClass("cleanAlert",input2);
    input[check] = true;
  }
}

const validarEmail = (target, expresion) => {
  if(validar.CustomValidation(target.value, expresion)) {
    ChangeClass("correct",target.name);
    input[target.name] = true;
  } else {
    ChangeClass("error",target.name);
    input[target.name] = false;
  }
}

const ChangeClass = (condicion, name) => {
  if(condicion === "correct") {
    document.getElementById(name).classList.add('validado-input');
    document.getElementById(name).classList.remove('errores-input');
  } else if(condicion === "error") {
    document.getElementById(name).classList.remove('validado-input');
    document.getElementById(name).classList.add('errores-input');
  } else if(condicion == "alert") {
    document.getElementById(name).classList.add('alert-input');
  } else if(condicion == "cleanAlert") {
    document.getElementById(name).classList.remove('alert-input');
  }
}

formRegister.addEventListener('submit', e => {
  e.preventDefault();
  let valuesInput = Object.values(input), ckeck = true;
  for(let i = 0; i < valuesInput.length; i++) {
    if(valuesInput[i] != true) {
      ckeck = false; break;
    }
  }

  if(ckeck && (input.suma && document.getElementById('answer').value == 4)) {
    formRegister.reset();
  } else {
    let text = "";
    if(input.username === false) text += "<li>El nombre de usuario debe tener un minimo de 3 y un maximo de 16 caracteres</li>";
    if(input.password2 == false || input.password == false) text += "<li>Las contraseñas no son validas y debe tener un minimo de 5 y un maximo de 15 caracteres</li>";
    if(input.passwordCheck == false) text += "<li>Las contraseñas nos coindiden</li>";
    if(input.email == false || input.email2 == false) text += "<li>Los correos no son validos</li>";
    if(input.emailCheck == false) text += "<li>Los correos nos coindiden</li>";
    if(input.suma == false || document.getElementById('answer').value != 4) text += "<li>Intenta nuevamente la pregunta de seguridad</li>";

    document.querySelector('.log_reg_table_msg').innerHTML =
    '<div class="error">'+
      '<p><em>ERROR AL CREAR UNA NUEVA CUENTA</em></p>'+
        '<ul style = "color: crimson;">'+text+'</ul>'+
    '</div>'+
    '<br>';
  }
});

