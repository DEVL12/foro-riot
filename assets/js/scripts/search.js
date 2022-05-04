import validations from "./validations.js";
const validar = new validations();
const formSearch = document.getElementById('formSearch');
const inputs = document.querySelectorAll('#formSearch input');

let input = { /* SABER SI EL INPUT ESTA VALIDADO EN EL CASO DE QUE SEA REQUERIDO*/
  keywords: false,
  author: false,
  numreplies: false,
}

const comprobar = (e) => {
  switch(e.target.name) { // dependiendo del evento que se ejecute 'e.target.name' va a tener el nombre de ese input
    case 'keywords': validarInput(e.target, e.target.name); break; // Que funcion va a ejecutar cada input en este caso el 'keywords'
    case 'author': validarInput(e.target, e.target.name); break;
    case 'numreplies' : validarInput(e.target, e.target.name); break;
  }
}

inputs.forEach((inputs) => {
  switch(inputs.type){ // DEPENDIENDO DEL INPUT QUE SE VAYA OBTENIENDO SE LE VA ASIGNAR UN EVENTO DIFERENTE, PERO QUE EJECUTE LA MISMA FUNCION
    case "text" : inputs.addEventListener('keyup', comprobar); break;
    case "radio": inputs.addEventListener('click', comprobar); break;   // El evento que quieras y le asignas la funcion 'comprobar'
    case "checkbox": inputs.addEventListener('click', comprobar); break;// El evento que quieras y le asignas la funcion 'comprobar'
  }
});

const validarInput = (target, name) => {
  if(validar.CheckIfEmpty(target.value) === false) { // USANDO LA FUNCION DE VALIDATIONS.JS SI ES NECESARIO PUEDEN CREAR NUEVAS FUNCIONES
    console.log("El campo esta vacio");
    input[name] = false;

  } else {
    console.log("FINO UWU");
    input[name] = true;
  }
}

formSearch.addEventListener('submit', e => { // FUNCION QUE SE EJECUTA CADA VEZ QUE SE ENVIAN LOS DATOS
  e.preventDefault(); // Evita que la pagina se recargue
  if(input.keywords !== false && input.author !== false && input.numreplies !== false) {
    /*
      ME DEJAN TODA ESTA PARTE YA QUE LUEGO HARÉ UNA FUNCION PARA ENVIAR TODO MEDIANTE AJAX
    */
    alert("VALORES ENVIADOS CORRECTAMENTE");
    formSearch.reset();
  } else {
    alert("ALGUNOS INPUTS AUN NO ESTAN VALIDADOS");
  }
});
