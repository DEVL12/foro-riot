import validations from "./validations.js";
const validar = new validations();
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
  }
}

formSearch.addEventListener('submit', e => {
  e.preventDefault();
  if(validar.CheckIfEmpty(formSearch.author.value)){
    validateInput(formSearch.author, " _\\-¡!¿?:.^$", "3,16");
  }

  if(validar.CheckIfEmpty(formSearch.keywords.value)){
    validateInput(formSearch.keywords,"", "1,9999");
  }

  if(parseInt(formSearch.numreplies.value)< 0){
    ChangeClass("error",formSearch.numreplies.name);
  }
  
  if(allOK){
    alert("realizando búsqueda....");
  }else{
    alert("Hay campos inválidos");
  }
});