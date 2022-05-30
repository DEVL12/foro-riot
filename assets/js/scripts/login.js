import validations from "./validations.js";
const validar = new validations();
const formLogin = document.getElementById('formLogin');
const inputs = document.querySelectorAll('#formLogin input');

let input = {
  password : false,
  username : false
}

const comprobar = (e) => {
  switch(e.target.name) {
    case 'username': validarInput(e.target, " _\\-¡!¿?:.^$", "3,16"); break;
    case 'password': validarInput(e.target, "_\\-¡!¿?:.^$#@&", "5,15"); break;
  }
}

inputs.forEach((inputs) => {
   inputs.addEventListener('keyup', comprobar);
   inputs.addEventListener('click', comprobar);
});

const validarInput = (target, simbols, limit) => {
  if((validar.ValidateText(target.value, true, true, true, simbols, limit))) {
    input[target.name] = true;
    ChangeClass("correct", target.name)
  } else {
    input[target.name] = false;
    ChangeClass("error", target.name)
  }
}

const ChangeClass = (condicion, name) => {
  if(condicion === "correct") {
    document.getElementById(name).classList.add('validado-input');
    document.getElementById(name).classList.remove('errores-input');
  } else if(condicion === "error") {
    document.getElementById(name).classList.remove('validado-input');
    document.getElementById(name).classList.add('errores-input');
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

formLogin.addEventListener('submit', e => {
  e.preventDefault();
  if(input.password && input.username) {
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+"session/getUser";
    let formData = new FormData(formLogin);
    request.open("POST",ajaxUrl,true);
    request.send(formData);

    request.onreadystatechange = function(){
      if(request.readyState == 4 && request.status == 200) {
        let objData = JSON.parse(request.responseText);
        if(objData.status) {
          ShowMsg(objData.msg, "<li>Su logueo se ha establecido con exito</li>", "green");
          setTimeout(() => { window.location = base_url+"discussion"; }, 2000);
          document.getElementById('btn_submit').setAttribute('hidden',"true");
        } else {
          ShowMsg(objData.msg, "<li>Los datos no corresponden a ninguna cuenta. Intentelo nuevamente</li>", "crimson");
          ChangeClass("error","username");
          ChangeClass("error","password");
        }
      }
    }
  } else {
    let text = `
      <li>La contraseña o el nombre de usuario son incorrectos</li>
      <li>El nombre de usuario debe tener un minimo de 3 y un maximo de 16 caracteres</li>
      <li>La contraseña debe tener un minimo de 5 y un maximo de 15 caracteres</li>
    `;
    ShowMsg("ERROR AL INICIAR SESIÓN", text, "crimson");
  }
});
