function getCoords(e){return e.getBoundingClientRect().right}function resize(){gallery.style.marginLeft=viewportWidth>1280?Math.round(viewportWidth-getCoords(portfolioBrief))+"px":"0px"}$(function(){var e=0;setInterval(function(){var o=(e-=1)+"px 0";$(".cloud1").css("background-position",o)},50);var o=0;setInterval(function(){var e=(o+=1)+"px 0";$(".cloud2").css("background-position",e)},70),$("[data-fancybox]").fancybox({arrows:!0,buttons:["thumbs","close"],idleTime:!1}),$(".js_phone-mask").length>0&&$(".js_phone-mask").inputmask({alias:"phoneru"}),($(".blog__slider--wrap").length>0||$(".feedback__slider").length>0)&&($(".blog__slider--wrap").slick({dots:!1,variableWidth:!0,infinite:!0,prevArrow:'<button class="prevArrow-blog" type="button" ><svg class="prevArrow-blogsvg" version="1.1" id="arrow-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\n\t viewBox="0 0 38 28" style="enable-background:new 0 0 38 28;" xml:space="preserve">\n<path  class="prevArrow-blogfill" d="M0.5,12.7c-0.7,0.7-0.7,1.9,0,2.7l11.3,12.1c0.3,0.4,0.8,0.6,1.2,0.6c0.5,0,0.9-0.2,1.2-0.6c0.7-0.7,0.7-1.9,0-2.7L6,15.9\n\th30.2c1,0,1.8-0.8,1.8-1.9c0-1-0.8-1.9-1.8-1.9H6l8.3-8.9c0.7-0.7,0.7-1.9,0-2.7c-0.7-0.7-1.8-0.7-2.5,0L0.5,12.7L0.5,12.7z\n\t M0.5,12.7"/>\n</svg></button>',nextArrow:'<button class="nextArrow-blog" type="button" ><svg class="nextArrow-blogsvg" version="1.1" id="arrow-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\n\t viewBox="0 0 38 28" style="enable-background:new 0 0 38 28;" xml:space="preserve">\n<path  class="nextArrow-blogfill" d="M37.5,12.7L26.2,0.6c-0.7-0.7-1.8-0.7-2.5,0c-0.7,0.7-0.7,1.9,0,2.7l8.3,8.9H1.8C0.8,12.1,0,13,0,14c0,1,0.8,1.9,1.8,1.9H32\n\tl-8.3,8.9c-0.7,0.7-0.7,1.9,0,2.7c0.3,0.4,0.8,0.6,1.2,0.6c0.5,0,0.9-0.2,1.2-0.6l11.3-12.1C38.2,14.6,38.2,13.4,37.5,12.7\n\tL37.5,12.7z M37.5,12.7"/>\n</svg></button>',responsive:[{breakpoint:1e3,settings:{variableWidth:!0,slidesToShow:1}},{breakpoint:768,settings:{variableWidth:!1,slidesToShow:2}},{breakpoint:576,settings:{variableWidth:!0,slidesToShow:1}}]}),$(".feedback__slider").slick({dots:!1,infinite:!0,slidesToShow:1,slideToScroll:1})),($(".dotdot").length>0||$(".dotdot-title").length>0)&&($(".dotdot").dotdotdot({height:80}),$(".dotdot-title").dotdotdot({ellipsis:"...",height:46})),($(".dottext").length>0||$(".blog__block-text").length>0)&&($(".dottext").dotdotdot({height:160}),$(".blog__block-text").dotdotdot({ellipsis:"...",height:140})),$(".brief__form-head input").unbind().blur(function(){var e=$(this).attr("id"),o=$(this).val();switch(e){case"name":var t=/^[a-zA-Zа-яА-Я]+$/;o.length>2&&""!=o&&t.test(o)?($(this).addClass("not_error"),$(this).css({color:"#272e34","border-color":"#165EB8"})):($(this).removeClass("not_error").addClass("error"),$(this).css({color:"red","border-color":"#eb4534"}));break;case"phone":var s=/^[0-9]+$/;""!=o&&s.test(o)?($(this).addClass("not_error"),$(this).css({color:"#272e34"})):($(this).removeClass("not_error").addClass("error"),$(this).css({color:"red","border-color":"#eb4534"}))}}),$(document).on("click",".header__nav a",function(e){if(~$(this).attr("href").indexOf("#")){e.preventDefault();var o=$(this).attr("href"),t=$(o),s=t.offset().top;return $("html,body").animate({scrollTop:s},1e3),!1}}),$(document).on("click",".header__mobile-btn",function(){$(".header__mobile-btn").addClass("header__mobile-btn--active"),$(".header__nav").slideDown().css("display","flex");var e=$("body");$(".header__mobile-btn").hasClass("header__mobile-btn--active")?e.addClass(" bodyOverflow"):$(".header__mobile-btn").hasClass("header__mobile-btn--submenu")?e.addClass(" bodyOverflow"):e.removeClass(" bodyOverflow")}),$(document).on("click",".header__mobile-btn--active",function(){$(".header__mobile-btn").removeClass("header__mobile-btn--active"),$(".header__nav").slideUp().css("display","flex");var e=$("body");$(".header__mobile-btn").hasClass("header__mobile-btn--active")?e.addClass(" bodyOverflow"):$(".header__mobile-btn").hasClass("header__mobile-btn--submenu")?e.addClass(" bodyOverflow"):e.removeClass(" bodyOverflow")}),window.innerWidth>992&&($(".tittle .block_span_title").addClass("animated").css("opacity","0"),$(".tittle .block_title").addClass("animated").css("opacity","0")),window.innerWidth>800?($(window).scroll(function(){$(".tittle .block_span_title").each(function(){$(this).offset().top<$(window).scrollTop()+500&&$(this).addClass("fadeInLeft").css("opacity","1")})}),$(window).scroll(function(){$(".tittle .block_title").each(function(){$(this).offset().top<$(window).scrollTop()+500&&$(this).addClass("fadeInRight").css("opacity","1")})})):($(window).scroll(function(){$(".tittle .block_span_title").each(function(){$(this).offset().top<$(window).scrollTop()+400&&$(this).addClass("fadeInLeft").css("opacity","1")})}),$(window).scroll(function(){$(".tittle .block_title").each(function(){$(this).offset().top<$(window).scrollTop()+400&&$(this).addClass("fadeInRight").css("opacity","1")})})),$(".scroll").on("click",function(e){var o=$(this);$("html, body").stop().animate({scrollTop:$(o.attr("href")).offset().top},777),e.preventDefault()}),$(".portfolio-scroll").on("click",function(e){var o=$(this);$("html, body").stop().animate({scrollTop:$(o.attr("href")).offset().top},777),e.preventDefault()}),$(document).on("mouseenter",".dropdown",function(){var e=$(this).find(".header__submenu"),o=$(this).parents(".header");o.find(".header__nav-li > a"),o.find(".header__mobile-btn--active");window.innerWidth>1200&&(e.slideDown(0),e.toggleClass("flex"))}),$(document).on("mouseleave",".dropdown",function(){var e=$(this).find(".header__submenu"),o=$(this).parents(".header");o.find(".header__nav-li > a"),o.find(".header__mobile-btn--active");window.innerWidth>1200&&(e.slideUp(0),e.toggleClass("flex"))}),$(document).on("click",".dropdown_mob",function(){var e=$(this).parents(".header"),o=e.find(".header__nav-li > a"),t=e.find(".header__submenu"),s=e.find(".header__logo"),a=e.find(".header__callback"),l=e.find(".header__mobile-btn"),r=e.find(".dropdown_mob");o.addClass("hidden_links"),r.addClass("hidden_links"),s.addClass("hidden_links"),a.addClass("hidden_links"),t.css("display","flex"),l.removeClass("header__mobile-btn--active"),l.addClass("header__mobile-btn--submenu")}),$(document).on("click",".header__mobile-btn--submenu",function(){var e=$(this).parents(".header"),o=e.find(".header__nav-li > a"),t=e.find(".header__submenu"),s=e.find(".header__logo"),a=e.find(".header__callback"),l=e.find(".dropdown_mob");o.removeClass("hidden_links"),l.removeClass("hidden_links"),s.removeClass("hidden_links"),a.removeClass("hidden_links"),t.css("display","none"),$(this).addClass("header__mobile-btn--active"),$(this).removeClass("header__mobile-btn--submenu")}),$(window).scroll(function(){$(this).scrollTop()>100?$(".scrollup").fadeIn():$(".scrollup").fadeOut()}),$(".scrollup").click(function(){return $("html, body").animate({scrollTop:0},600),!1}),$(document).on("click",".js_header",function(){var e=$(".js_header"),o=$(".header__overlay"),t=$(".header__nav");$(".header__mobile-btn").hasClass("header__mobile-btn--active")?o.fadeIn("slow"):$(".header__mobile-btn").hasClass("header__mobile-btn--submenu")||o.fadeOut("slow"),window.innerWidth>1200&&(t.slideToggle().css("display","flex"),e.toggleClass(" header-wrapper-active"),$(".js_header").hasClass("header-wrapper-active")?(e.toggleClass("header-wrapper-down"),e.toggleClass("header-wrapper-up"),o.fadeIn("slow")):(e.toggleClass("header-wrapper-down"),e.toggleClass("header-wrapper-up"),o.fadeOut("slow")))}),$(document).on("click",function(e){if($(".header__overlay").is(e.target)){var o=$(".js_header"),t=$(".header__overlay");$(".header__nav").slideToggle().css("display","flex"),o.removeClass(" header-wrapper-active"),o.toggleClass("header-wrapper-down"),o.toggleClass("header-wrapper-up"),t.fadeOut("slow")}}),$(document).on("click",".scroll",function(e){e.preventDefault();var o=$(".js_header"),t=$(".header__overlay"),s=$(".header__nav");o.toggleClass("header-wrapper-down"),o.toggleClass("header-wrapper-up"),$(window).width<992&&$(".header__mobile-btn").removeClass("header__mobile-btn--active"),s.slideToggle().css("display","flex"),o.removeClass(" header-wrapper-active"),t.fadeOut("slow"),$(".header__mobile-btn").removeClass("header__mobile-btn--active")})});var viewportWidth=document.body.clientWidth,gallery=document.querySelector(".portfolio__gallery"),portfolioBrief=document.querySelector(".portfolio__brief");gallery&&resize();