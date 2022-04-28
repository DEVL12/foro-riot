$("ul.tabs li").click(function () {
  var tab_id = $(this).attr("data-tab");
  $("ul.tabs li").removeClass("current");
  $(".tab-content").removeClass("current");
  $(this).addClass("current");
  $("#" + tab_id).addClass("current");
});

$(document).scroll(function () {
  var wd = $(this).scrollTop();
  if (wd > 500) {
    $(".backtop").show();
  } else {
    $(".backtop").hide();
  }
});
jQuery(function ($) {
  $(".leftbutton").hide();
  $(".rightbutton").on("click", function () {
    $(".sidebar").animate(
      {
        height: "hide",
        opacity: 0,
      },
      150,
      function () {
        $(".forums").animate(
          {
            width: "100%",
          },
          400
        );
      }
    );
    $(this).hide();
    $(".leftbutton").show();
    Cookie.set("sidebar", "collapsed", 60 * 60 * 24 * 365);
    return false;
  });
  $(".leftbutton").on("click", function () {
    $(".forums").animate(
      {
        width: "76%",
      },
      400,
      function () {
        $(".sidebar").animate(
          {
            height: "show",
            opacity: 1,
          },
          150
        );
      }
    );
    $(this).hide();
    $(".rightbutton").show();
    Cookie.set("sidebar", "expanded", 60 * 60 * 24 * 365);
    return false;
  });
  if (Cookie.get("sidebar") == "collapsed") {
    $(".rightbutton").hide();
    $(".leftbutton").show();
    $(".forums").css("width", "100%");
    $(".sidebar").hide();
  }
  if ($(".forums").length < 1) $(".toggle-container").hide();
});
