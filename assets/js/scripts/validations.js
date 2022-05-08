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
    console.log(expresion);
    expresion = new RegExp(expresion);
    return expresion.test(data);
  }

  ValidateNumber(data = "", limit = "", convert = false){
    const expression =  (limit != "") ? new RegExp('^\\d{'+limit+'}$') : new RegExp('^\\d+$');
    let result = expression.test(data);
    return (convert != false &&  result != false) ? parseInt(data) : result;
  }

  CustomValidation(data = "", expresion = "") {
    expresion = new RegExp(expresion);
    return expresion.test(data);
  }

  ValidateSearch(keywordSearch = '', keywordSearchType = '',
                 forumToSearch = '', topicSearch = '',
                 nicknameSearch = '', equalNickname = '',
                 answerSerachType = '', answerSearch ='',
                 messageSearchType ='', messageInterval = '',
                 orderCriterion = '', orderType = '',
                 showResult = '') {

    var keywordSearchOK = this.CheckIfEmpty(keywordSearch);
    //var keywordSearchTypeOK = CheckIfEmpty(keywordSearchType);
    //var forumToSearchOK = CheckIfEmpty(forumToSearch);
    //var topicSearchOK = CheckIfEmpty(topicSearch);

    var nicknameSearchOK = this.CheckIfEmpty(nicknameSearch);
    //var equalNicknameOK = CheckIfEmpty(equalNickname);

    //var answerSerachTypeOK = CheckIfEmpty(answerSerachType);
    var answerSearchOK = this.CheckIfEmpty(answerSearch);

    //var messageSearchTypeOK = CheckIfEmpty(messageSearchType);
    //var messageIntervalOK = CheckIfEmpty(messageInterval);

    //var orderCriterionOK = CheckIfEmpty(orderCriterion);
    //var orderTypeOK = CheckIfEmpty(orderType);

    //var showResultOK = CheckIfEmpty(showResult);

    /*
      Si por alguna razón necesitas validar si los demás filtros están vacíos, aquí esta el if y arriba
      los chequeos sobre si está vacío, yo lo hice sólo teniendo en cuenta los filtros que
      no están puestos por defecto en la página, además agregué el filtro de tema (topicSearch), el cual corresponde al
      tema de discusión, ejemplo: bug, queja, reclutamiento, etc.

      if(!keywordSearchOK && !keywordSearchTypeOK &&
          !forumToSearchOK &&
          !topicSearchOK &&
          !nicknameSearchOK && !equalNicknameOK &&
          !answerSerachTypeOK && !answerSearchOK &&
          !messageSearchTypeOK && !messageIntervalOK &&
          !orderCriterionOK && !orderTypeOK &&
          !showResultOK){
              console.log('Los filtros están vacíos');
      }
    */
    if(!keywordSearchOK && !nicknameSearchOK && !answerSearchOK){
      console.log('Debes rellenar al menos un campo de búsqueda')
    }
    else
    {
      //se aplican los filtros de búsqueda yendo de lo general a lo más específico, ejemplo:
      //se buscan primero por palabras clave
      //de esos escoges los que cuyo nombre de invocador coincida
      //de esos escoges los que tengan n cantidad de respuestas
      //etc
      //si en algún momento ya no hay resultados se detiene todo el procedimiento para no hacer trabajar innecesariamente
      //el procesador aplicando los filtros siguientes
    }
  }
}

export default validations;
