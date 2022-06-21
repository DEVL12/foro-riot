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
  var button = document.getElementById("r" + value.split(",")[1]);
  //TotalHonorsButton

  var currentHonor = parseInt(button.attributes[2].value);
  const request = var_Ajax.sendGet(`honor/AddHonor/${value}`, true);
  request.send();
  request.onreadystatechange = () => {
    if(request.readyState == 4 && request.status == 200) {
      const objData = JSON.parse(request.responseText);
      if (objData.status){
        alert(objData.msg);
        var result;
        if(objData.msg == "El honor fue añadido en esta publicación correctamente"){
          result = currentHonor + parseInt(value.split(",")[3])
        }
        else if(objData.msg == "Su honor fue modificado en esta publicación correctamente"){
          result = currentHonor + (parseInt(value.split(",")[3]) * 2);
        }
        else if(objData.msg == "Su honor fue removido de esta publicación correctamente"){
          result = currentHonor - parseInt(value.split(",")[3])
        }
        button = document.getElementById("r" + value.split(",")[1]);
        button.attributes[2].value = result;
        button.id = "r" + value.split(",")[1];
        button.innerHTML = result;
      } else {
        alert(objData.msg);
        var button = document.getElementById("r" + value.split(",")[1]);

        button.innerHTML = result
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
        response_JSON = (objData.status)
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
  popUp.innerHTML += '<button class="ClosePopUp" id="ClosePopUp" onclick="" name="ClosePopUp"></button>';
  console.log(honors);

  if(honors !== null) {
    honors.forEach(honor => {
      popUp.innerHTML +=
      '<div class="PopUp">' +
      '   <img class="img-PopUp" src="'+base_url+'assets/images/default_avatar.png">' +
      '   <span class="name-player">' +
      GetNameOfPlayer(honor['fk_jugador']) +
      '   </span>' +
      '   <span class="honor-value">'+
      GetHonorValue(honor['puntaje']) +
      '   </span>' +
      ' </div>';
    });
  } else{
    popUp.innerHTML += '<br><h1> VACIO </h1><br>';
  }
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

