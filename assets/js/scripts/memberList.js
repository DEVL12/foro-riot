import validations from "./validations.js";
const validar = new validations();
const formMemberList = document.getElementById('formMemberList');
const inputs = document.querySelectorAll('#formMemberList input');

let input = {
  submit : false,
  username : false,
}

const comprobar = (e) => {
  switch(e.target.name) {
    case 'username': validarInput(e.target, " _\\-¡!¿?:.^$", "3,16"); break;
    case 'submit': validarInput(e.target, "_\\-¡!¿?:.^$#@&", "5,15"); break;
  }
}

inputs.forEach((inputs) => {
  inputs.addEventListener('keyup', comprobar);
});


const validarInput = (target, simbols, limit) => {
  if((validar.ValidateText(target.value, true, true, true, simbols, limit))) {
    input[target.name] = true;
    document.getElementById(target.name).classList.add('validado-input');
    document.getElementById(target.name).classList.remove('errores-input');
  } else {
    input[target.name] = false;
    document.getElementById(target.name).classList.remove('validado-input');
    document.getElementById(target.name).classList.add('errores-input');
  }
}

formMemberList.addEventListener('submit', e => {
  e.preventDefault();
  if(input.submit && input.username) {
    formMemberList.reset();
  } else {
    document.querySelector('.log_reg_table_msg').innerHTML =
    '<div class="error">'+
      '<p><em>ERROR AL INICIAR SESIÓN</em></p>'+
        '<ul style = "color: crimson;">'+
          '<li>El nombre del Miembro es incorrectos</li>'+
        '</ul>'+
    '</div>'+
    '<br>';
  }
});

