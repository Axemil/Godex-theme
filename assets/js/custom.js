"use strict";

$(function () {
  $.get("https://api.godex.io/api/v2/coins-market?convert=USD", function (data) {
    var arrayCripto = data.coins.USD.slice(0, 10).map(function (item) {
      return "<div class=\"exchange_list_item\">\n                        <div class=\"exchange_name\">\n                            <img src=\"".concat(item.icon, "\" alt=\"crypto icon\">\n                            <span>").concat(item.code, "</span>\n                        </div>\n                        <div class=\"exchange_price\">").concat(item.price, "</div>\n                        <div class=\"exchange_volume\">").concat(item.volume, "</div>\n                        ").concat(item.percent_change_24h > 0 ? "<div class=\"exchange_change exchange_positive\">+".concat(item.percent_change_24h, "%</div>") : "<div class=\"exchange_change\">".concat(item.percent_change_24h, "%</div>"), "\n                    </div>");
    });
    var sideBarTable = data.coins.USD.slice(0, 6).map(function (item) {
      return "<div class=\"sidebarTableBlockList\">\n                        <div class=\"sidebarTableItem\">\n                            <div class=\"iconTable\">\n                                <img src=\"".concat(item.icon, "\" alt=\"crypto icon\">\n                                ").concat(item.code, "\n                            </div>\n                            <div class=\"priceItem\">\n                                ").concat(item.price, "\n                            </div>\n                            ").concat(item.percent_change_24h > 0 ? "<div class=\"valueItem exchange_positive\">+".concat(item.percent_change_24h, "%</div>") : "<div class=\"valueItem\">".concat(item.percent_change_24h, "%</div>"), "\n                        </div>\n                    </div>");
    });
    $(".exchange_item_left_side").append(arrayCripto.slice(0, 5));
    $(".exchange_item_right_side").append(arrayCripto.slice(5, 10));
    $(".sidebarTableBlock").append(sideBarTable);
  });
});
"use strict";

$(function () {
  var _this = this;

  $("#submit").click(function (e) {
    var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
    var validation = true;

    if (!$('#author').val()) {
      $('#author').css("border", "1px solid red");
      validation = false;
    } else {
      $('#author').css("border", "1px solid rgba(0,0,0,0)");
    }

    if (pattern.test($('#email').val()) == null || !pattern.test($('#email').val())) {
      $('#email').css("border", "1px solid red");
      validation = false;
    } else {
      $('#email').css("border", "1px solid rgba(0,0,0,0)");
    }

    if (!$('#comment').val()) {
      $('#comment').css("border", "1px solid red");
      validation = false;
    } else {
      $('#comment').css("border", "1px solid rgba(0,0,0,0)");
    }

    if (validation) {
      $(_this).trigger('submit');
    } else {
      e.preventDefault();
    }
  });
  $(".searcher-form_wrapper #searchsubmit").click(function (e) {
    // window.location.origin
    e.preventDefault();

    if ($("#s").val()) {
      window.location.replace(window.location.origin + "/blog/search/" + $("#s").val());
    }
  });
});
"use strict";

$(function () {
  $(".header_mobile-menu").click(function (e) {
    $(".header_mobile_burger-menu").toggle();
    $("#active-btn, #unactive-btn").toggle();
  });
  $(".header_mobile_burger-menu_dropdown").click(function (e) {
    $(".header_mobile_burger-menu_dropdown").toggleClass('header_mobile_burger-menu_dropdown_active');
    $(".header_mobile_burger-menu_dropdown_links").toggle();
  });
  $(".header_articles_mobile").click(function (e) {
    $(".header_mobile_nav").toggle();
    $(".header_articles_mobile_title").toggleClass("header_articles_mobile_title_active"); // $("#active-btn, #unactive-btn").toggle()
  });
  $(".dropdown").click(function (e) {
    $(".dropdown_list").toggleClass("dropdown_list-active");
    $(".dropdown,.dropdown-menu").toggleClass("dropdown-active");
  });
  $(document).mouseup(function (e) {
    // событие клика по веб-документу
    var div = $(".dropdown, .header_searcher, .share, .share_2"); // тут указываем ID элемента

    if (!div.is(e.target) // если клик был не по нашему блоку
    && div.has(e.target).length === 0) {
      // и не по его дочерним элементам
      $(".dropdown_list_desktop").removeClass("dropdown_list-active");
      $(".dropdown").removeClass("dropdown-active");
      $(".searcher-form_wrapper").hide();
      $('.header_searcher>svg').show();
      $(".header_searcher").removeClass("header_searcher_active");
      $(".addtoany_shortcode").hide();
    }

    if (!div.is(e.target) // если клик был не по нашему блоку
    && div.has(e.target).length === 0 && document.documentElement.clientWidth < 700) {
      // и не по его дочерним элементам
      $(".header_logo img").show();
    }
  });
  $(".dropdown-menu").click(function (e) {
    $(e.currentTarget).toggleClass("dropdown-menu-active");
    $(".dropdown_list_mobile").toggleClass("dropdown_list-active");
  });
  $(".header_searcher>svg").click(function (e) {
    $(".searcher-form_wrapper").show();
    $(".header_searcher").addClass("header_searcher_active");
    $(e.currentTarget).hide();

    if (document.documentElement.clientWidth < 700) {
      $(".header_logo img").hide();
    }
  });
  $(".share, .share_2").click(function (e) {
    $(e.currentTarget).children(".addtoany_shortcode").toggle();
  });
  $(".buttonComment").click(function (e) {
    $(".comment_form_wrapper").toggleClass("comment_form_wrapper_active");
  });

  if ($('.comment-respond')) {
    $('.comment-respond').append("<div class=\"close_comment-form\">\n                                        <svg width=\"18\" height=\"18\" viewBox=\"0 0 18 18\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n                                            <path d=\"M10.3398 9.00975L17.7225 1.62702C18.0925 1.25704 18.0925 0.657202 17.7225 0.287253C17.3526 -0.0827303 16.7527 -0.0827303 16.3827 0.287253L8.99998 7.66998L1.61725 0.287253C1.24727 -0.0827303 0.647436 -0.0827303 0.277488 0.287253C-0.0924608 0.657237 -0.0924959 1.25707 0.277488 1.62702L7.66022 9.00975L0.277488 16.3925C-0.0924959 16.7625 -0.0924959 17.3623 0.277488 17.7322C0.647471 18.1022 1.24731 18.1022 1.61725 17.7322L8.99998 10.3495L16.3827 17.7322C16.7527 18.1022 17.3525 18.1022 17.7225 17.7322C18.0924 17.3623 18.0924 16.7624 17.7225 16.3925L10.3398 9.00975Z\" fill=\"#101012\"/>\n                                        </svg>\n                                      </div>");
    $('.close_comment-form').click(function (e) {
      $(".comment_form_wrapper").toggleClass("comment_form_wrapper_active");
    });
  }

  var comp = new RegExp(/((http|https):\/\/localhost:8888\/godexNewBase\/|(https|http):\/\/godex.io)/);
  $('.post_text a').each(function () {
    if (comp.test($(this).attr('href'))) {
      $(this).removeAttr('rel');
    }
  });
});