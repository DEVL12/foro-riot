import validations from "./validations.js";
const validar = new validations();
const formLogin = document.getElementById('formLogin');
const inputs = document.querySelectorAll('#formLogin input');

let input = {
  password : false,
  username : false,
}

const comprobar = (e) => {
  switch(e.target.name) {
    case 'username': validarInput(e.target, e.target.name, " _\\-¡!¿?:.^$", "3,16"); break;
    case 'password': validarInput(e.target, e.target.name, "_\\-¡!¿?:.^$#@&", "5,15"); break;
  }
}

inputs.forEach((inputs) => {
   inputs.addEventListener('keyup', comprobar);
});

const validarInput = (target, name, simbols, limit) => {
  if((validar.ValidateText(target.value, true, true, true, simbols, limit))) {
    input[name] = true;
    document.getElementById(name).classList.add('validado-input');
    document.getElementById(name).classList.remove('errores-input');
  } else {
    input[name] = false;
    document.getElementById(name).classList.remove('validado-input');
    document.getElementById(name).classList.add('errores-input');
  }
}

formLogin.addEventListener('submit', e => {
  e.preventDefault();
  if(input.password && input.username) {
    formLogin.reset();
  } else {
    document.querySelector('.log_reg_table_msg').innerHTML =
    '<div class="error">'+
      '<p><em>ERROR AL INICIAR SESIÓN</em></p>'+
        '<ul style = "color: crimson;">'+
          '<li>La contraseña o el nombre de usuario son incorrectos</li>'+
          '<li>El nombre de usuario debe tener un minimo de 3 y un maximo de 16 caracteres</li>'+
          '<li>La contraseña debe tener un minimo de 5 y un maximo de 15 caracteres</li>'+
        '</ul>'+
    '</div>'+
    '<br>';
  }
});
