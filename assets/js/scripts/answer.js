import validations from "./validations.js";
import Ajax from "./ajax.js";

const validar = new validations();
const var_Ajax = new Ajax();

let CanClosePopUp = false;


var elements = document.getElementsByName("AddHonor");
  elements.forEach(element => {
    element.addEventListener("click", function(){AddHonor(element.value);});
  });

var elements = document.getElementsByName("SeeHonors");
elements.forEach(element => {
  element.addEventListener("click", function(){SeeHonors(element.id, element.value);});
});

document.addEventListener("click", function(){ClosePopUp(document.getElementById("PopUp"))});

function AddHonor(value){
  console.log(value);

  const request = var_Ajax.sendGet(`honor/AddHonor/${value}`, true);
  request.send();
  request.onreadystatechange = () => {
    if(request.readyState == 4 && request.status == 200) {
      const objData = JSON.parse(request.responseText);
      if (objData.status){
        alert(objData.msg);
        /* MAS CODIGO PARA CAMBIAR EL N# DE HONOR EN LA PUBLICACION */
      } else {
        alert(objData.msg);
      }
    }
  };
}

function SeeHonors(elementId, elementType){
  let honorList = DameLosHonoresDeEsto(elementId, elementType);
  PrintPopUp(honorList);
}

function DameLosHonoresDeEsto(id, type) {
  let response_JSON = null;
  if(type === "discusion"){
    const request = var_Ajax.sendGet(`honor/GetHonor/${type}/${id}`, false);
    request.onreadystatechange = () => {
      if(request.readyState == 4 && request.status == 200) {
        const objData = JSON.parse(request.responseText);
        response_JSON = (objData.status)
          ? objData.data
          : null;
      }
    };
    request.send(null);
    return response_JSON;
  }
  else if(type === "respuesta") {
    const request = var_Ajax.sendGet(`honor/GetHonor/${type}/${id}`, false);
    request.onreadystatechange = () => {
      if(request.readyState == 4 && request.status == 200) {
        const objData = JSON.parse(request.responseText);
        return (objData.status)
          ? objData.data
          : null;
      }
    };
    request.send(null);
    return response_JSON;
  }
}

function ClosePopUp(element){
  if(CanClosePopUp){
    if(element.className == "")
      element.className="disabled";
  }
  else
    CanClosePopUp = true;
}

function PrintPopUp(honors){
  var popUp = document.getElementById("PopUp");
  CanClosePopUp = false;
  popUp.className = "";
  popUp.innerHTML = "";
  popUp.innerHTML += '<button id="ClosePopUp" onclick="" name="ClosePopUp" style="height:25px; width:20px; display:flex; align-self:flex-end; background-size:contain; background-color:rgba(200,150,144,1); background-repeat:no-repeat; background-image:url('+base_url+'assets/images/down_arrow.png)"></button>';

  honors.forEach(honor => {
    if(honor !== undefined) {

      popUp.innerHTML +=
      '<div style="width:80%; height:33px; display:flex; justify-content:center; align-items:center; margin:5px 0; background-color:rgba(0,0,0,0); background:#23242a; padding: 3px 0; border-radius:10px">' +
      '   <img style="width:30px; height:30px; border-radius:50px; margin: 0 10px" src="'+base_url+'assets/images/default_avatar.png">' +
      '   <span style="width:auto; height:auto; margin: 0 5px 0 0">' +
      GetNameOfPlayer(honor['fk_jugador']) +
      '   </span>' +
      '   <span style="width:auto; height:auto">'+
      GetHonorValue(honor['puntaje']) +
      '   </span>' +
      ' </div>';
    }
  });
}

function GetHonorValue(honor){
  if(honor > 0)
  return '   +1';
else
  return '   -1';
}

function GetNameOfPlayer(id){
  let response_JSON = null;

  const request = var_Ajax.sendGet(`session/GetPlayerById/${id}`, false);
  request.onreadystatechange = () => {
    if(request.readyState == 4 && request.status == 200) {
      const objData = JSON.parse(request.responseText);
      response_JSON = (objData.status)
        ? [objData.data]
        : "Jugador desconocido";
    }
  }
  request.send(null);
  return response_JSON;
}

