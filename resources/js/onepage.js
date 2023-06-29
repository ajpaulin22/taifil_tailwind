



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
    const swiper = new Swiper.Swiper('.hero', {
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
          nextEl: '.hero-next',
          prevEl: '.hero-prev',
        },
      
    
    });

    const swiper_departure = new Swiper.Swiper('.departure',{
      direction: 'horizontal',
       loop: true,
       autoplay: {
        delay: 1000,
        disableOnInteraction:false
      },
       slidesPerView: 3,
       centeredSlides: true,
       spaceBetween: 10,

        

  });

  });

  
})();

window.history.forward();

function noBack() {
    window.history.forward();
}
setTimeout("noBack()", 0);
window.onunload = function() { null };