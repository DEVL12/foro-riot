import validations from "./validations.js";
import Ajax from "./ajax.js";

const var_Ajax = new Ajax();
const validar = new validations();
const formReply = document.getElementById('blockUser'); // seleccionar el formulario segun un id
const respuesta = document.querySelectorAll('#blockUser textarea');//seleccionamos el textarea

let input = {
  mensaje: false,
};

const comprobar = (e) => {
  switch (e.target.name) {
    case "mensaje": validarInput(e.target, "4,1000"); break;
  }
};

respuesta.forEach((textarea) => {
  textarea.addEventListener("keyup", comprobar);
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

const ShowMsg = (title, text, color) => {
  document.querySelector(".log_reg_table_msg").innerHTML = `<div class="error">
      <p><em style = "color: ${color};">${title}</em></p>
      <ul style = "color: ${color};">${text}</ul>
    </div>
    <br>`;
};

formReply.addEventListener("submit", (e) => {
  e.preventDefault();
  if (input.mensaje) {
    const request = var_Ajax.sendPost("block/add_block", formReply);
    request.onreadystatechange = () => {
      if(request.readyState == 4 && request.status == 200) {
        const objData = JSON.parse(request.responseText);
        if(objData.status) {
          ShowMsg("Baneo realizado", "<li>El jugado fue baneado exitosamente<li>", "green");
          setTimeout(() => {window.location = base_url}, 3000);

          document.getElementById('submit_reply').setAttribute('hidden',"true");
        } else {
          ShowMsg("ERROR :C", "<li>Intentelo mas tarde</li>", "crimson");
        }
      }
    };
  } else {
    ShowMsg('ERROR','<li>Campo incorrecto</li> <li>El mensaje solo debe contener minimo 4 y un maximo de 1000 letras</li>','crimson');
  }
  $("html").animate({ scrollTop: 0 }, 700);
});
