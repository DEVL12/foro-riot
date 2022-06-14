import validations from "./validations.js";
const validar = new validations();

var CanClosePopUp = false;

var elements = document.getElementsByName("AddHonor");
  elements.forEach(element => {
    element.addEventListener("click", function(){AddHonor(element.value, element.id, element.text);});
  });

var elements = document.getElementsByName("SeeHonors");
elements.forEach(element => {
  element.addEventListener("click", function(){SeeHonors(element.id, element.value);});
});

document.addEventListener("click", function(){ClosePopUp(document.getElementById("PopUp"))});

function AddHonor(value, elementId, elementType){
  console.log(value);
  console.log(elementId);
  console.log(elementType);
  //El element.value es el 1 o -1 de los botones, aquí se debe llamar la función AddHonor del HonorModel.php como dice en el answer.php línea 50/57
}

function SeeHonors(elementId, elementType){
  var honorList = DameLosHonoresDeEsto(elementId,elementType);
  PrintPopUp(honorList);
  
}

function DameLosHonoresDeEsto(id, type){
  if(type=="discusion"){
    //aquí se llama el GetHonorsOfADiscussion(id) del HonorModel.php
    return[
      {"id_honor": 1, "puntaje": 1, "fk_jugador": 1, "id_objetivo": 1, "tipo_objetivo": "discusion"},
      {"id_honor": 2, "puntaje": 1, "fk_jugador": 2, "id_objetivo": 1, "tipo_objetivo": "discusion"}
    ];
  }
  else if(type == "respuesta"){
    //aquí se llama el GetHonorsOfAnAnswer(id) del HonorModel.php
    return[
      {"id_honor": 1, "puntaje": 1, "fk_jugador": 1, "id_objetivo": 1, "tipo_objetivo": "respuesta"},
      {"id_honor": 2, "puntaje": 1, "fk_jugador": 2, "id_objetivo": 1, "tipo_objetivo": "respuesta"}
    ];
  }
}

function ClosePopUp(element){
  console.log("AA");
  if(CanClosePopUp){
    if(element.className == "")
      element.className="disabled";
  }
  else
    CanClosePopUp = true;
}

function PrintPopUp(honors){
  var popUp = document.getElementById("PopUp");
  console.log("aaa");
  CanClosePopUp = false;
  popUp.className = "";
  popUp.innerHTML = "";
  //popUp.innerHTML += '<button id="ClosePopUp" onclick="" name="ClosePopUp" style="height:25px; width:20px; display:flex; align-self:flex-end; background-size:contain; background-color:rgba(200,150,144,1); background-repeat:no-repeat; background-image:url(assets/images/down_arrow.png)"></button>';

  honors.forEach(honor => {
    //Aquí necesito saber el valor de la base_url, para ponerle el fondo al botón
    popUp.innerHTML += 
    '<div style="width:80%; height:33px; display:flex; justify-content:center; align-items:center; margin:5px 0; background-color:rgba(0,0,0,0); background:#23242a; padding: 3px 0; border-radius:10px">' +
    //Aquí también para el src a la foto de perfil
    '   <img style="width:30px; height:30px; border-radius:50px; margin: 0 10px">' +// src="/images/default_avatar.png">';
    '   <span style="width:auto; height:auto; margin: 0 5px 0 0">' +
    GetNameOfPlayer(honors['id_jugador']) +
    '   </span>' +
    '   <span style="width:auto; height:auto">'+
    GetHonorValue(honor['puntaje']) +
    '   </span>' + 
    ' </div>';
  });
}

function GetHonorValue(honor){
  if(honor > 0)
  return '   +1';
else
  return '   -1';
}

function GetNameOfPlayer(id){
  //Llamar a la función GetPlayerById(id) del sessionModel.php
  return "Pedro Sánchez";
}

//const formSearch = document.getElementById('IdDelFormulario'); // seleccionar el formulario segun un id
//const inputs = document.querySelectorAll('#IdDelFormulario input');// seleccionar TODOS los inputs del formulario

/*
  let input = {

  }

  const comprobar = (e) => {

  }

  inputs.forEach((inputs) => {

  });

  const validarInput = (target, name) => {

  }

  formSearch.addEventListener('submit', e => {

  });
*/
