import validations from "./validations.js";
const validar = new validations();
const formSearch = document.getElementById('new-disc'); // seleccionar el formulario segun un id
const contenido = document.querySelectorAll('#new-disc textarea'); //seleccionamos el textarea
const plataforma = document.querySelectorAll('#new-disc select#plataformas');
const tema = document.querySelectorAll('#new-disc select#tema');

let input = {
  mensaje: false,
  plataformas: false,
  tematica : false,
}

const comprobar = (e) => {
  switch (e.target.name){
    case 'mensaje': validarInput(e.target, e.target.name, "4,1000"); break;
    case 'plataformas': input.plataformas = (e.target.value !== "") ? true : false; break;
    case 'tema': input.tematica = (e.target.value !== "") ? true : false; break;
  }
}

console.log(tema, plataforma);

contenido[0].addEventListener('keyup', comprobar);
if(typeof(plataforma) !==  "undefined") plataforma.forEach(input => {input.addEventListener('click' ,comprobar)});
if(typeof(tema) !==  "undefined")  tema.forEach(input => {input.addEventListener('click' ,comprobar)});


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

const ShowMsg = (title, text, color) => {
  document.querySelector('.log_reg_table_msg').innerHTML =
  `<div class="error">
    <p><em style = "color: ${color};">${title}</em></p>
    <ul style = "color: ${color};">${text}</ul>
  </div>
  <br>`;
};
formSearch.addEventListener('submit', e => {
  e.preventDefault();
  if (input.plataformas && input.mensaje && input.tematica) {
    ShowMsg("DISCUSION ENVIADA", "<li>Tu discusión creada correctamente</li>", "green");

  } else {
    let text = "";
    if(input.plataformas === false)
      text += "<li>Se debe seleccionar una plataforma de videojuego para poder seguir</li>";
    if(input.tematica === false)
      text += "<li>Se debe seleccionar almenos una tematica</li>";
    if(input.mensaje === false)
      text += '<li>El mensaje solo debe contener minimo 4 y un maximo de 1000 letras</li>';

    ShowMsg('ERROR', text, 'crimson');
  }

  $("html").animate({ scrollTop: 0 }, 700); // Envia al principio
});
