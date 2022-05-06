import validations from "./validations.js";
const validar = new validations();
const formSearch = document.getElementById('formSearch'); // seleccionar el formulario segun un id
const inputs = document.querySelectorAll('#formSearch input');// seleccionar TODOS los inputs del formulario

/*
  -----------FUNCIONES OBTENIDAS DE VALIDATIONS.JS-----------
  * console.log(validar.ValidateNumber("126", "1,4", false));  <----- FUNCION, esta funcion va a retorna true o false dependiendo las
    especificaciones que indiquemos en los parametros

  LOS PARAMETROS SON :
  * VALOR("123") Este representa el dato a validar (SOLAMENTE ACEPTA NUMEROS ENTEROS, en el caso de contener una letra o un simbolo, este retorna FALSE)
  * RANGO("1,4") Que el string tenga UN MINIMO DE 1 NUMERO Y UN MAXIMO DE 4 NUMEROS
  * PARSE(false) Este parametro sirve como una opcion para retornar un entero (En caso de que no sea valido para convertirlo en un entero,
    va a retorna un FALSE)

  -> validar.ValidateNumber("423") <- OJO tambien se pueden saltar los parametros, pero en este caso solo va a validar si solamente los valores son numericos
  (OSEA SOLO VA A RETORNAR FALSE y no tendra un rango o limite de digitos)
------------------------------------------------------------------------------------------------------------------------------------------------------

  * console.log(validar.ValidateText("Esto es un string", true, true, true, "@-~","1,3")); <----- FUNCION, esta funcion va a retorna true o
  false dependiendo las especificaciones que indiquemos en los parametros

  LOS PARAMETROS SON :
  * VALOR ("Esto es un string"): Este representa el dato a validar (el string)
  * NUMEROS (true): Con este parametro damos la posibilidad de que existan numeros en nuestro string
  * MAYUSCULAS (true): Con este parametro damos la posibilidad de que el string contenga mayusculas
  * MINUSCULAS (true) : Con este parametro damos la posibilidad de que el string contenga minusculas
  * SIMBOLOS ("@-~"): En este caso hay que ser cuidadoso, si deseamos de que el string contenga algunos simbolos en especifico
    podemos asignarlos mediante este parametro. En este ejemplo yo quiero que el string pueda tener los siguientes caracteres
    @ - ~, pero en el parametro estan unidos "@-~", si los pusiera "@ - ~" el espacio tambien es interpretado como un caracter
    osea que les estoy diciendo los siguiente: QUIERO UN ARROBA (@) UN ESPACIO ( ) UN GUION (-) OTRO ESPACIO ( ) Y LO QUE SEA ESTO (~).
    Asi que, la mejor forma de decir que quieres todo estos simbolo y ADEMAS de que tu string contenga espacios, va a ser de la siguiente
    manera(@-~ ).
  * RANGO ("1,3") Que el string tenga UN MINIMO DE 1 CARACTER Y UN MAXIMO DE 4 CARACTERES

  -> validar.ValidateText("HoLa XD") <- OJO tambien se pueden saltar los parametros, pero en este caso solo va a valida que tenga
     mayusculas, minusculas y espacios. Si tiene numero el string DARA FALSE YA QUE NO SE HAN ESPECIFICADO, AL IGUAL QUE CUALQUIER
     SIMBOLO Y ADEMAS NO POSEE UN RANGO

  ------------------------------------------------------------------------------------------------------------------------------------------------------
  validar.CheckIfEmpty("") Solo valida si un dato esta vacio o no
*/

// EJEMPLOS
console.log("EJEMPLOS ValidateNumber");
console.log(validar.ValidateNumber("123456789","5,10",false));
console.log(validar.ValidateNumber("1234567896543","",true));
console.log(validar.ValidateNumber("1234TEXTO RANDOM XD","",true));
console.log(validar.ValidateNumber("123456789","1,3"));
console.log(validar.ValidateNumber("1234HOLA"));
console.log(validar.ValidateNumber(""));

// EJEMPLOS
console.log("EJEMPLOS ValidateText");
console.log(validar.ValidateText("HOLAAA"));
console.log(validar.ValidateText("32", true));
console.log(validar.ValidateText("HOLAAA32", true, true));
console.log(validar.ValidateText("hola32", true, true));
console.log(validar.ValidateText("hola32", false, true));
console.log(validar.ValidateText("holaHOLA32", true , true, true));
console.log(validar.ValidateText("holaHOLA32", false , true, true));
console.log(validar.ValidateText("holaHOLA32", true , true, false));
console.log(validar.ValidateText("HOLA COMO ESTAS?", false , true, true, " ?"));
console.log(validar.ValidateText("HOLA COMO ESTAS?", false , true, true, "?")); // OJO: aqui no acepte los espacios
console.log(validar.ValidateText("Soy un texto con una longitud de 47 caracteres?", true , true, true, " ?", "1,46")); // RANGO
console.log(validar.ValidateText("HOLA soy un texto tanto con MAYUSCULAS minusculas ESPACIOS y sin un limite establecido"));
console.log(validar.ValidateText("Pero no puedo tener NUMERO(12345567)"));
console.log(validar.ValidateText("O SIMBOLOS (!#$%&/(){})"));

console.log("EJEMPLOS CheckIfEmpty");
console.log(validar.CheckIfEmpty(""));
console.log(validar.CheckIfEmpty("ALGO"));
// ESPERO QUE ME HAYAN ENTENDIDO UwU CUALQUIER COSA ME AVISAN, ASI PODEMOS TRABAR DE MANERA MAS SENCILLA CON LAS VALIDACIONES

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
    input[name] = false; //Asignandole el valor TRUE O FALSE al objecto INPUT

  } else {
    console.log("FINO UWU");
    input[name] = true; //Asignandole el valor TRUE O FALSE al objecto INPUT
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
