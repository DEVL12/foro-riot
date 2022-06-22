import validations from "./validations.js";
import Ajax from "./ajax.js";

const var_Ajax = new Ajax();
const validar = new validations();
const formSearch = document.getElementById('new-disc'); // seleccionar el formulario segun un id
const contenido = document.querySelectorAll('#new-disc textarea'); //seleccionamos el textarea
const plataforma = document.querySelectorAll('#new-disc select#plataformas');
const tema = document.querySelectorAll('#new-disc select#tema');
const titulo = document.querySelector('#new-disc input#titulo')

let input = {
  titulo: false,
  mensaje: false,
  plataformas: false,
  tematica : false,
}

const comprobar = (e) => {
  switch (e.target.name){
    case 'titulo': validarInput(e.target, e.target.name, "4,50"); break;
    case 'mensaje': validarInput(e.target, e.target.name, "4,1000"); break;
    case 'plataformas': input.plataformas = (e.target.value !== "") ? true : false; break;
    case 'tema': input.tematica = (e.target.value !== "") ? true : false; break;
  }
}

contenido[0].addEventListener('keyup', comprobar);
titulo.addEventListener('keyup', comprobar);
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
    const request = var_Ajax.sendPost("discussion/add_discussion", formSearch);

    request.onreadystatechange = () => {
      if(request.readyState == 4 && request.status == 200) {
        const objData = JSON.parse(request.responseText);
        if(objData.status) {
          ShowMsg("DISCUSION ENVIADA", "<li>"+objData.msg+"", "green");
          setTimeout(() => { window.location = base_url+"discussion" }, 3000);
          document.getElementById('submit_discusion').setAttribute('hidden',"true");
        } else {
          ShowMsg("ERROR EN EL ENVIO", "<li>"+objData.msg+"</li>", "crimson");
        }
      }
    };
  } else {
    let text = "";
    if(input.titulo === false)
      text += '<li>El titulo solo debe contener minimo de 4 y un maximo de 50 letras</li>';
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
