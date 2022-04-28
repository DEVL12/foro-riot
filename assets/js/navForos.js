if(use_xmlhttprequest == "1") {
  $("#dropmenu, #moremenu").popupMenu();
}

$(document).ready(function() {
  $("#welcomemsg").css("display", "block");
  $("#newthread_guest_text").css("display", "inline-block");
});

$('.show_hide_mobile_header').click(function() {
  $('#mobile_header_links').slideToggle();
});
