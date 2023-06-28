



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

   

  });

  
})();

window.history.forward();

function noBack() {
    window.history.forward();
}
setTimeout("noBack()", 0);
window.onunload = function() { null };