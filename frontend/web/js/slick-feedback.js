$('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
  slidesToShow: 5,
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  dots: false,
  // arrows: false,
  prevArrow: '<button class="prevArrow-btn" type="button" ><svg class="prevArrow-svg" version="1.1" id="arrow-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\n' +
  '\t viewBox="0 0 38 28" style="enable-background:new 0 0 38 28;" xml:space="preserve">\n' +
  '<path  class="prevArrow-fill" d="M0.5,12.7c-0.7,0.7-0.7,1.9,0,2.7l11.3,12.1c0.3,0.4,0.8,0.6,1.2,0.6c0.5,0,0.9-0.2,1.2-0.6c0.7-0.7,0.7-1.9,0-2.7L6,15.9\n' +
  '\th30.2c1,0,1.8-0.8,1.8-1.9c0-1-0.8-1.9-1.8-1.9H6l8.3-8.9c0.7-0.7,0.7-1.9,0-2.7c-0.7-0.7-1.8-0.7-2.5,0L0.5,12.7L0.5,12.7z\n' +
  '\t M0.5,12.7"/>\n' +
  '</svg></button>',
  nextArrow: '<button class="nextArrow-btn" type="button" ><svg class="nextArrow-svg" version="1.1" id="arrow-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\n' +
  '\t viewBox="0 0 38 28" style="enable-background:new 0 0 38 28;" xml:space="preserve">\n' +
  '<path  class="nextArrow-fill" d="M37.5,12.7L26.2,0.6c-0.7-0.7-1.8-0.7-2.5,0c-0.7,0.7-0.7,1.9,0,2.7l8.3,8.9H1.8C0.8,12.1,0,13,0,14c0,1,0.8,1.9,1.8,1.9H32\n' +
  '\tl-8.3,8.9c-0.7,0.7-0.7,1.9,0,2.7c0.3,0.4,0.8,0.6,1.2,0.6c0.5,0,0.9-0.2,1.2-0.6l11.3-12.1C38.2,14.6,38.2,13.4,37.5,12.7\n' +
  '\tL37.5,12.7z M37.5,12.7"/>\n' +
  '</svg></button>',
  centerMode: true,
  centerPadding: '0',
  focusOnSelect: true,
  responsive: [
    {
      breakpoint: 700,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 550,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});