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
      if(input.suma == false) ChangeClass("error","answer");
      else ChangeClass("correct","answer");
      break;
    }
  }
}

inputs.forEach((inputs) => {
   inputs.addEventListener('keyup', comprobar);
   inputs.addEventListener('click', comprobar);
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

const ShowMsg = (title, text, color) => {
  document.querySelector('.log_reg_table_msg').innerHTML =
  `<div class="error">
    <p><em style = "color: ${color};">${title}</em></p>
    <ul style = "color: ${color};">${text}</ul>
  </div>
  <br>`;
}

formRegister.addEventListener('submit', e => {
  e.preventDefault();
  let is_validated = true;
  Object.values(input).forEach((value) => { if(value === false) is_validated = false; });

  if(is_validated && (input.suma && document.getElementById('answer').value == 4)) {
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+"session/setNewUser";
    let formData = new FormData(formRegister);
    request.open("POST",ajaxUrl,true);
    request.send(formData);

    request.onreadystatechange = function() {
      if(request.readyState == 4 && request.status == 200) {
        let objData = JSON.parse(request.responseText);
        if(objData.status) {
          ShowMsg(objData.msg, "<li>Tu cuenta a sido creada correctamente</li>", "green");
          setTimeout(() => { window.location = base_url+"session/login"; }, 2000);
          document.getElementById('regsubmit').setAttribute('hidden',"true");
        } else if (typeof(objData.msg) === "string") {
          ShowMsg(objData.msg, "<li>Al parecer ocurrio un error con el servidor. Por favor intentelo mas tarde</li>", "crimson");
        } else {
          let text = "";
          objData.msg.forEach((msg) => {
            if(msg.msg != null){
              text += `<li> ${msg.msg} </li>`;
              msg.input.forEach(input => ChangeClass("error", input));
            }
          });
          ShowMsg("¡DATOS EXISTENTES!", text, "crimson");
        }
      }
    }
  } else {
    let text = "";
    if(input.username === false) text += "<li>El nombre de usuario deben tener un minimo de 3 y un maximo de 16 caracteres</li>";
    if(input.password2 == false || input.password == false) text += "<li>Las contraseñas no son validas y deben tener un minimo de 5 y un maximo de 15 caracteres</li>";
    if(input.passwordCheck == false) text += "<li>Las contraseñas no coinciden</li>";
    if(input.email == false || input.email2 == false) text += "<li>Los correos no son validos</li>";
    if(input.emailCheck == false) text += "<li>Los correos no coinciden</li>";
    if(input.suma == false || document.getElementById('answer').value != 4) text += "<li>Intenta nuevamente la pregunta de seguridad</li>";
    ShowMsg("ERROR AL CREAR UNA NUEVA CUENTA", text, "crimson");
  }
});

