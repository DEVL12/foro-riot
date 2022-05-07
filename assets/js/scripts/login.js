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
    case 'username': validarInput(e.target, e.target.name); break;
    case 'password': validarInput(e.target, e.target.name); break;
  }
}

inputs.forEach((inputs) => {
   inputs.addEventListener('keyup', comprobar);
});

const validarInput = (target, name) => {
  if((validar.ValidateText(target.value, true, true, true, " _\\-¡!¿?:", "4,40"))) {
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
          '<li>El nombre de usuario y la contraseña debe tener un minimo de 4 y un maximo de 40 caracteres</li>'+
          '<li>No se aceptan simbolos extraños</li>'+
        '</ul>'+
    '</div>'+
    '<br>';
  }
});
