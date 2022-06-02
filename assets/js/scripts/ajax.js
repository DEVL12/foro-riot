class Ajax{
  sendPost(url, form) {
    const request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    const ajaxUrl = base_url+url;
    const formData = new FormData(form);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    return request;
  }
}

export default Ajax;
