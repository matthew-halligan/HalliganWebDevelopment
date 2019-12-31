
$(document).ready(function() {
 $(".navigation").navigation({
  responsive:true,
  mobileBreakpoint:768,
  showDuration:300,
  hideDuration:300,
  showDelayDuration:100,
  hideDelayDuration:0,
  submenuTrigger:"hover",
  effect:"fade",
  submenuIndicator:true,
  hideSubWhenGoOut:true,
  visibleSubmenusOnMobile:false,
  fixed:false,
  overlay:true,
  overlayColor:"rgba(0, 0, 0, 0.5)",
  hidden:false,
  offCanvasSide:"left",
}); 
});





new WOW().init();


$(window).scroll(function () {
  if ($(window).scrollTop() > 150) {
      $("header").addClass("fixed");
  } else {
      $("header").removeClass("fixed");
  }
});


$(function(){
 'use strict';
var galleryTop = new Swiper('.gallery-top', {
      spaceBetween: 10,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
    var galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 10,
      centeredSlides: true,
      slidesPerView: 'auto',
      touchRatio: 0.2,
      slideToClickedSlide: true,
    });
    galleryTop.controller.control = galleryThumbs;
    galleryThumbs.controller.control = galleryTop;
});
 