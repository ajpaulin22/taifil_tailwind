



(function(){
  const Onepage = function(){
      return new Onepage.init();
  }

  Onepage.init = function(){
    this.token = $("meta[name=csrf-token]").attr("content");
    this.contact_form;
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
       slidesPerView: 1,
       centeredSlides: true,
       spaceBetween: 10,
       breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 50,
        },
      },

        

     });

     const swiper_ttip = new Swiper.Swiper('.ttip',{
      direction: 'horizontal',
       loop: true,
       autoplay: {
        delay: 3000,
        disableOnInteraction:false
      },
      pagination: {
        el: '.ttip-pagi',
        type: "progressbar",
      },
       slidesPerView: 1,
       centeredSlides: true,
       spaceBetween: 10,
       breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 50,
        },
      },

        

     });

     AOS.init({
      duration: 700, // values from 0 to 3000, with step 50ms
      easing: 'ease-in-sine',
      once: true,
     });

    let validator = $("#contact-form").validate({

      errorElement: 'span',
      errorPlacement: function (error, element) {
          error.addClass('text-red-500 text-sm');
          element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
          $(element).addClass('border-red-600');
          $(element).removeClass('border-sky-800');
      },
      unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('border-red-600');
          $(element).addClass('border-sky-800');
      },
      submitHandler: function(form) {
          onepage.contact_form = $(form).serializeArray().reduce((obj, item) => Object.assign(obj, { [item.name]: item.value }), {})
        }
    });

    $("#contact-form").on("submit",function(e){
      e.preventDefault();
      
      if($("#contact-form").valid()){
        $("#loader").show();
        let form = $(this)[0]
        $.ajax({
          url:"/client/contact-form/",
          type:"POST",
          data:onepage.contact_form,
          dataType:"JSON",
          success:function(promise){
              if(promise.success){
                iziToast.success({
                    class:'rounded-lg overflow-hidden',
                    title: 'OK',
                    message: `${promise.message}`,
                    position:'topRight'
                });
                validator.resetForm();
                form.reset()
                $("#loader").hide();
               }else{
                iziToast.error({
                    class:'rounded-lg overflow-hidden',
                    title: 'Error',
                    message: `${promise.message}`,
                    position:'topRight'
                });
                $("#loader").hide();
               }
          }
        })
      }

    })

  });

  
})();

window.history.forward();

function noBack() {
    window.history.forward();
}
setTimeout("noBack()", 0);
window.onunload = function() { null };