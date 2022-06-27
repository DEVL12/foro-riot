import validations from "./validations.js";
import Ajax from "./ajax.js";

const var_Ajax = new Ajax();
const validar = new validations();
const formReply = document.getElementById('answer-riot'); // seleccionar el formulario segun un id
const inputs = document.querySelectorAll('#answer-riot input');// seleccionar TODOS los inputs del formulario
const respuesta = document.querySelectorAll('#answer-riot textarea');//seleccionamos el textarea


let input = {
  subject: false,
  message: false
}

const comprobar = (e) => {
  switch (e.target.name) {
    case 'message': validarInput(e.target, "4,5000"); break;
    /*case 'subject': validarInput(e.target, "4,50"); break;*/
  }
}

  /*inputs.forEach((input) => {
    input.addEventListener('keyup', comprobar);
  });*/

  respuesta[0].addEventListener('keyup', comprobar);

const validarInput = (target, limit) => {
  if ((validar.ValidateText(target.value, true, true, true, " _\\-¡!¿?:\\n.#/*-+=,\"\\\\", limit))) {
    input[target.name] = true;
    document.getElementById(target.name).style.border = "2px solid green";
    document.getElementById(target.name).style.color = "white";
  } else {
    input[target.name] = false;
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

formReply.addEventListener('submit', e => {
  e.preventDefault();
  if(input.message) {
    const request = var_Ajax.sendPost("answer/add_answer", formReply);

    request.onreadystatechange = () => {
      if(request.readyState == 4 && request.status == 200) {
        const objData = JSON.parse(request.responseText);
        if(objData.status) {
          ShowMsg("RESPUESTA ENVIADA", "<li>"+objData.msg+"</li>", "green");
          setTimeout(() => { window.location = base_url+"answer/answers_for/"+objData.direction }, 3000);
          document.getElementById('submit_reply').setAttribute('hidden',"true");
        } else {
          ShowMsg("ERROR :C", "<li>"+objData.msg+"</li>", "crimson");
        }
      }
    };
  } else {
    ShowMsg('ERROR','<li>El mensaje solo debe contener minimo 4 y un maximo de 1000 letras</li>','crimson');
  }

  $("html").animate({ scrollTop: 0 }, 700);
});
