

(function() {
    
    const Gallery = function() {
        return new Gallery.init();
    }
    Gallery.init = function() {
        this.token = $("meta[name=csrf-token]").attr("content");
    }
    Gallery.prototype = {
        
    }
    Gallery.init.prototype = Gallery.prototype;

   

    var biodata = Gallery();
   $(document).ready(function() {
    $.validator.addMethod( "maxsizetotal", function( value, element, param ) {
        // if ( this.optional( element ) ) {
        //     return true;
        // }
    
        if ( $( element ).attr( "type" ) === "file" ) {
            if ( element.files && element.files.length ) {
                var totalSize = 0;
    
                for ( var i = 0; i < element.files.length; i++ ) {
                    totalSize += element.files[ i ].size;
                    if ( totalSize > param ) {
                        return false;
                    }
                }
            }
        }
    
        return true;
    }, $.validator.format( "Total size of all files must not exceed {0} bytes." ) );
    $.validator.addMethod( "maxsize", function( value, element, param ) {
        if ( this.optional( element ) ) {
            return true;
        }
    
        if ( $( element ).attr( "type" ) === "file" ) {
            if ( element.files && element.files.length ) {
                for ( var i = 0; i < element.files.length; i++ ) {
                    if ( element.files[ i ].size > param ) {
                        return false;
                    }
                }
            }
        }
    
        return true;
    }, $.validator.format( "File size must not exceed {0} bytes each." ) );

     $.validator.addMethod( "extension", function( value, element, param ) {
        param = typeof param === "string" ? param.replace( /,/g, "|" ) : "png|jpe?g|gif";
        return this.optional( element ) || value.match( new RegExp( "\\.(" + param + ")$", "i" ) );
    }, $.validator.format( "Please enter a value with a valid extension." ) );

    $("#create_form").validate({
        rules: {
            pictures: {
                extension: "png|jpeg|jpg",
                maxsize: 1932979,
                maxsizetotal:1932979,
            },
        },
        messages:{
            pictures: {
                maxsize: "File size must not exceed 2MB each", 
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('text-red-500 text-sm');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('border-red-600');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('border-red-600');
        },
        submitHandler: function(form) {
            
          }
    });
    $("#create_form").on("submit",function(e){
        e.preventDefault();
        
        let formData = new FormData(this);
        if($("#create_form").valid()){
            // $("#create_form")[0].reset();
            $.ajax({
                url:"/client/gallery/create",
                type:"POST",
                data:formData,
                cache: false,
                contentType:false,
                processData:false,
                success:function(promise){
                    console.log(promise.success);
                    if(promise.success){
                        iziToast.success({
                            class:'rounded-lg overflow-hidden',
                            title: 'OK',
                            message: 'Successfully inserted record!',
                            position:'topRight'
                        });
                        iziToast.show({
                            class:'rounded-lg overflow-hidden',
                            title: 'Redirecting',
                            message: 'Redirecting to Mainpage',
                            position:'topRight'
                        });
                        setTimeout(()=>{
                            location.replace("/");
                        },5000)
                    }else{
                        iziToast.error({
                            class:'rounded-lg overflow-hidden',
                            title: 'Error',
                            message: 'Illegal operation',
                            position:'topRight'
                        });
                    }
                    
                }
            })
        }

    })

    const swiper = new Swiper.Swiper('.swiper',{
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            type: "progressbar",
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