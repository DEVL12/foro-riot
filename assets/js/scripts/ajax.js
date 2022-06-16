class Ajax{
  sendPost(url, form) {
    const request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    const ajaxUrl = base_url+url;
    const formData = new FormData(form);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    return request;
  }

  sendGet(url) {
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+url;
    request.open("GET",ajaxUrl, true);
    request.send();
    return request;
  }
}

export default Ajax;
