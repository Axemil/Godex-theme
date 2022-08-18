$(function(){
    $(".header_mobile-menu").click(e => {
        $(".header_mobile_burger-menu").toggle()
        $("#active-btn, #unactive-btn").toggle()
    })
    $(".header_mobile_burger-menu_dropdown").click(e => {
        $(".header_mobile_burger-menu_dropdown").toggleClass('header_mobile_burger-menu_dropdown_active')
        $(".header_mobile_burger-menu_dropdown_links").toggle()
    })
    
    $(".header_articles_mobile").click(e => {
        $(".header_mobile_nav").toggle()
        $(".header_articles_mobile_title").toggleClass("header_articles_mobile_title_active")
        // $("#active-btn, #unactive-btn").toggle()
    })
    $(".dropdown").click(e => {
        $(".dropdown_list").toggleClass("dropdown_list-active")
        $(".dropdown,.dropdown-menu").toggleClass("dropdown-active");
    })
    $(document).mouseup(function (e){ // событие клика по веб-документу
        var div = $(".dropdown, .header_searcher, .share, .share_2"); // тут указываем ID элемента
        if (!div.is(e.target) // если клик был не по нашему блоку
            && div.has(e.target).length === 0) { // и не по его дочерним элементам
            $(".dropdown_list_desktop").removeClass("dropdown_list-active")
            $(".dropdown").removeClass("dropdown-active");
            $(".searcher-form_wrapper").hide();
            $('.header_searcher>svg').show();
            $(".header_searcher").removeClass("header_searcher_active")
            $(".addtoany_shortcode").hide();
        }
        if (!div.is(e.target) // если клик был не по нашему блоку
        && div.has(e.target).length === 0 && document.documentElement.clientWidth < 700) { // и не по его дочерним элементам
            $(".header_logo img").show();
        }
      });
    $(".dropdown-menu").click(e => {
        $(e.currentTarget).toggleClass("dropdown-menu-active")
        $(".dropdown_list_mobile").toggleClass("dropdown_list-active")
    })
    $(".header_searcher>svg").click(e => {
        $(".searcher-form_wrapper").show();
        $(".header_searcher").addClass("header_searcher_active")
        $(e.currentTarget).hide();
        if(document.documentElement.clientWidth < 700){
            $(".header_logo img").hide();
        }
    })
    $(".share, .share_2").click(e => {
        $(e.currentTarget).children(".addtoany_shortcode").toggle();
    })
    $(".buttonComment").click(e => {
        $(".comment_form_wrapper").toggleClass("comment_form_wrapper_active")
    })
    if($('.comment-respond')){
        $('.comment-respond').append(`<div class="close_comment-form">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.3398 9.00975L17.7225 1.62702C18.0925 1.25704 18.0925 0.657202 17.7225 0.287253C17.3526 -0.0827303 16.7527 -0.0827303 16.3827 0.287253L8.99998 7.66998L1.61725 0.287253C1.24727 -0.0827303 0.647436 -0.0827303 0.277488 0.287253C-0.0924608 0.657237 -0.0924959 1.25707 0.277488 1.62702L7.66022 9.00975L0.277488 16.3925C-0.0924959 16.7625 -0.0924959 17.3623 0.277488 17.7322C0.647471 18.1022 1.24731 18.1022 1.61725 17.7322L8.99998 10.3495L16.3827 17.7322C16.7527 18.1022 17.3525 18.1022 17.7225 17.7322C18.0924 17.3623 18.0924 16.7624 17.7225 16.3925L10.3398 9.00975Z" fill="#101012"/>
                                        </svg>
                                      </div>`);
        $('.close_comment-form').click(e => {
            $(".comment_form_wrapper").toggleClass("comment_form_wrapper_active")
        })
    }

    var comp = new RegExp(/((http|https):\/\/localhost:8888\/godexNewBase\/|(https|http):\/\/godex.io)/);
    $('.post_text a').each(function(){
        if(comp.test($(this).attr('href'))){
            $(this).removeAttr('rel')
        }
     });
    
})
