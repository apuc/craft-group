function getCoords(e){return e.getBoundingClientRect().right}function resize(){gallery.style.marginLeft=viewportWidth>1280?Math.round(viewportWidth-getCoords(portfolioBrief))+"px":"0px"};$(function(){var e=0;setInterval(function(){var t=(e-=1)+"px 0";$(".cloud1").css("background-position",t)},50);var t=0;setInterval(function(){var e=(t+=1)+"px 0";$(".cloud2").css("background-position",e)},70),$("[data-fancybox]").fancybox({arrows:!0,buttons:["thumbs","close"],idleTime:!1}),($(".blog__slider--wrap").length>0||$(".feedback__slider").length>0)&&($(".blog__slider--wrap").slick({dots:!1,variableWidth:!0,infinite:!0,responsive:[{breakpoint:768,settings:{variableWidth:!1,slidesToShow:2}},{breakpoint:576,settings:{variableWidth:!1,slidesToShow:1}}]}),$(".feedback__slider").slick({dots:!1,infinite:!0,slidesToShow:1,slideToScroll:1})),($(".dotdot").length>0||$(".dotdot-title").length>0)&&($(".dotdot").dotdotdot({height:80}),$(".dotdot-title").dotdotdot({ellipsis:"...",height:46})),$(".brief__form-head input").unbind().blur(function(){var e=$(this).attr("id"),t=$(this).val();switch(e){case"name":var o=/^[a-zA-Zа-яА-Я]+$/;t.length>2&&""!=t&&o.test(t)?($(this).addClass("not_error"),$(this).css({color:"#272e34","border-color":"#165EB8"})):($(this).removeClass("not_error").addClass("error"),$(this).css({color:"red","border-color":"#eb4534"}));break;case"phone":var i=/^[0-9]+$/;""!=t&&i.test(t)?($(this).addClass("not_error"),$(this).css({color:"#272e34"})):($(this).removeClass("not_error").addClass("error"),$(this).css({color:"red","border-color":"#eb4534"}))}}),$(document).on("click",".header__nav a",function(e){if(~$(this).attr("href").indexOf("#")){e.preventDefault();var t=$(this).attr("href"),o=$(t),i=o.offset().top;return $("html,body").animate({scrollTop:i},1e3),!1}}),$(document).on("click",".header__mobile-btn",function(){$(".header__mobile-btn").addClass("header__mobile-btn--active"),$(".header__nav").slideDown().css("display","flex")}),$(document).on("click",".header__mobile-btn--active",function(){$(".header__mobile-btn").removeClass("header__mobile-btn--active"),$(".header__nav").slideUp().css("display","flex")}),$(".tittle .block_span_title").addClass("animated").css("opacity","0"),$(".tittle .block_title").addClass("animated").css("opacity","0"),window.innerWidth>800?($(window).scroll(function(){$(".tittle .block_span_title").each(function(){$(this).offset().top<$(window).scrollTop()+500&&$(this).addClass("fadeInLeft").css("opacity","1")})}),$(window).scroll(function(){$(".tittle .block_title").each(function(){$(this).offset().top<$(window).scrollTop()+500&&$(this).addClass("fadeInRight").css("opacity","1")})})):($(window).scroll(function(){$(".tittle .block_span_title").each(function(){$(this).offset().top<$(window).scrollTop()+400&&$(this).addClass("fadeInLeft").css("opacity","1")})}),$(window).scroll(function(){$(".tittle .block_title").each(function(){$(this).offset().top<$(window).scrollTop()+400&&$(this).addClass("fadeInRight").css("opacity","1")})})),$(".scroll").on("click",function(e){var t=$(this);$("html, body").stop().animate({scrollTop:$(t.attr("href")).offset().top},777),e.preventDefault()}),$(window).width()>992&&$(document).on("click",".header__wrapper",function(){$(".header__nav").slideToggle().css("display","flex"),$(".header__overlay").slideToggle(100)}),$(document).on("mouseenter",".dropdown",function(){var e=$(this).find(".header__submenu"),t=$(this).parents(".header");t.find(".header__nav-li > a"),t.find(".header__mobile-btn--active");window.innerWidth>992&&(e.slideDown(0),e.toggleClass("flex"))}),$(document).on("mouseleave",".dropdown",function(){var e=$(this).find(".header__submenu"),t=$(this).parents(".header");t.find(".header__nav-li > a"),t.find(".header__mobile-btn--active");window.innerWidth>992&&(e.slideUp(0),e.toggleClass("flex"))}),$(document).on("click",".dropdown_mob",function(){var e=$(this).parents(".header"),t=e.find(".header__nav-li > a"),o=e.find(".header__submenu"),i=e.find(".header__mobile-btn"),n=e.find(".dropdown_mob");t.addClass("hidden_links"),n.addClass("hidden_links"),o.css("display","flex"),i.removeClass("header__mobile-btn--active"),i.addClass("header__mobile-btn--submenu")}),$(document).on("click",".header__mobile-btn--submenu",function(){var e=$(this).parents(".header"),t=e.find(".header__nav-li > a"),o=e.find(".header__submenu"),i=e.find(".dropdown_mob");t.removeClass("hidden_links"),i.removeClass("hidden_links"),o.css("display","none"),$(this).addClass("header__mobile-btn--active"),$(this).removeClass("header__mobile-btn--submenu")}),$(window).scroll(function(){$(this).scrollTop()>100?$(".scrollup").fadeIn():$(".scrollup").fadeOut()}),$(".scrollup").click(function(){return $("html, body").animate({scrollTop:0},600),!1}),$(document).on("click",".scroll",function(){$(window).width<992?($(".header__mobile-btn").removeClass("header__mobile-btn--active"),$(".header__nav").slideUp().css("display","none")):($(".header__nav").slideUp(),$(".header__overlay").slideUp())})});var viewportWidth=document.body.clientWidth,gallery=document.querySelector(".portfolio__gallery"),portfolioBrief=document.querySelector(".portfolio__brief");gallery&&resize();