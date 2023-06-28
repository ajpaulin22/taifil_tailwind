



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
        delay: 1000,
      },
    
      pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
      },
    
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
        enabled:true,
      },
      autoplay: {
        delay: 5000,
      },
    
      scrollbar: {
        el: '.swiper-scrollbar',
      },
    });

     console.log(Swiper)
    // swiper.autoplay.start();

    $(".swiper-button-next").on("click",function(){
      swiper.slideNext();
    })
    $(".swiper-button-prev").on("click",function(){
      swiper.slidePrev();
    })

  });

  
})();

window.history.forward();

function noBack() {
    window.history.forward();
}
setTimeout("noBack()", 0);
window.onunload = function() { null };