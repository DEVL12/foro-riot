class validations {

  CheckIfEmpty(data = '') {
    return (data == "") ? false : true;
  }

  ValidateText(data = "", numbers = false, upper = false, lower = false, simbols = "", limit = "") {
    let expresion = "^[";
    if(numbers != false) expresion += "0-9";
    if(upper != false) expresion += "A-Z";
    if(lower != false) expresion += "a-z";
    if(simbols != "")  expresion += simbols;
    expresion += (limit != "") ? "]{"+(limit)+"}$" : "]+$";

    if(expresion == "^[]+$") expresion = "^[a-zA-Z ]+$";
    expresion = new RegExp(expresion);
    return expresion.test(data);
  }

  ValidateNumber(data = "", limit = "", convert = false) {
    const expression =  (limit != "") ? new RegExp('^\\d{'+limit+'}$') : new RegExp('^\\d+$');
    let result = expression.test(data);
    return (convert != false &&  result != false) ? parseInt(data) : result;
  }

  CustomValidation(data = "", expresion = "") {
    expresion = new RegExp(expresion);
    return expresion.test(data);
  }
}

export default validations;
