import validations from "./validations.js";
import Ajax from "./ajax.js";

const validar = new validations();
const var_Ajax = new Ajax();
const formSearch = document.getElementById('formSearch');

let allOK = true;

const validateInput = (target, simbols, limit) => {
  if((validar.ValidateText(target.value, true, true, true, simbols, limit))) {
    ChangeClass("correct", target.name);
  } else {
    ChangeClass("error", target.name);
  }
}

const ChangeClass = (condicion, name) => {
  if(condicion === "correct") {
    document.getElementById(name).classList.add('validado-input');
    document.getElementById(name).classList.remove('errores-input');
  } else if(condicion === "error") {
    allOK = false;
    document.getElementById(name).classList.remove('validado-input');
    document.getElementById(name).classList.add('errores-input');
  } else if(condicion == "alert") {
    document.getElementById(name).classList.add('alert-input');
  } else if(condicion == "cleanAlert") {
    document.getElementById(name).classList.remove('alert-input');
  }else{

  }
}

formSearch.addEventListener("submit", (e) => {
  e.preventDefault();
  allOK = true;
  validateInput(formSearch.author, " _\\-¡!¿?:.^$", "0,16");
  validateInput(formSearch.keywords, "", "0,999");
  // if (parseInt(formSearch.numreplies.value) < 0) {
  //   ChangeClass("error", formSearch.numreplies.name);
  // }

  if (allOK) {
    const request = var_Ajax.sendPost("search/search_forum", formSearch);
    request.onreadystatechange = () => {
      if(request.readyState == 4 && request.status == 200) {
        const objData = JSON.parse(request.responseText);
        if(objData.status === true) {
          let results = 0, html = "";
          Object.values(objData.data).forEach(data => {
            results++;
            html += show_result(data)
          });

          results = '<h1>Total de resultados: '+results+'</h1>';
          document.getElementById('results').innerHTML = results+html;
          $("html").animate({ scrollTop: 400 }, 700);
        } else {
          alert(objData.msg);
        }
      }
    };
  } else {
    alert("Hay campos inválidos");
  }
});

const show_result = (data) => {
  return (`
  <table cellspacing="0" cellpadding="5" class="tborder radiused">
    <tbody>
      <tr>
        <td class="trow1" style="padding:0px;">
          <table border="0" cellpadding="5" class="tfixed" style="width: 100%;">
            <tbody>
              <tr>
                <td class="trow1 scaleimages no_bottom_border" valign="top">
                  <img src="${base_url}assets/images/default_avatar.png" class="rounded-avatar box_shadowed avatar_white_border" style="width:50px;height:50px;float:left;border-width:5px;margin-bottom:10px;margin-right:10px;margin-top:5px;">
                  <a href="${base_url}answer/answers_for/1">
                    <h2 style="margin:0px;display:inline-block;"> ${data.titulo} </h2>
                  </a><br>

                  <h4> ${data.nombre_plataforma} &nbsp;&nbsp; </h4>
                  <a href="${base_url}player/profile/${data.nombre_jugador}">${data.nombre_jugador}</a>, ${data.fecha_discusion} <div class="border_sep" style="margin-top:10px;"></div>
                  <p class="portal-message" style="max-height:300px;overflow:hidden;">${data.contenido_discusion}</p><br>
                  <a href="${base_url}answer/answers_for/${data.id_discusion}" style="padding:10px 0px;margin-right:18px;">
                    <i class="fas fa-external-link-square-alt"></i>&nbsp; Ver respuestas
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table><br><br>`
  );
}
