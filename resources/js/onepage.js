



(function(){
  const Onepage = function(){
      return new Onepage.init();
  }

  Onepage.init = function(){

  }

  Onepage.prototype = {

  }

  Onepage.init.prototype = Onepage.prototype;

  var onepage = new Onepage();
  $(document).ready(function(){
    const swiper = new Swiper.Swiper('.swiper', {
      direction: 'horizontal',
      loop: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction:false
      },
      effect: 'fade',
         fadeEffect: {
           crossFade: true
         },
         navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      
    
    });

    const swiper_departure = new Swiper.Swiper('.departure',{
      direction: 'horizontal',
      loop: true,
      slidesPerView: 3,
      centeredSlides: true,
      spaceBetween: 30,
      grabCursor: true,
      pagination: {
          el: '.departure-pagi',
          type: "progressbar",
          clickable: true,
        },
        navigation: {
          nextEl: '.departure-next',
          prevEl: '.departure-prev',
        },
        

  });

  });

  
})();

window.history.forward();

function noBack() {
    window.history.forward();
}
setTimeout("noBack()", 0);
window.onunload = function() { null };