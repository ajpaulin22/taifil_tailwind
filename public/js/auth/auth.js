"use strict";

(function() {
    const Auth = function() {
        return new Auth.init();
    }
    Auth.init = function() {
        this.id = 0;
        this.token = $("meta[name=csrf-token]").attr("content");
    }
    Auth.prototype = {
        
        validateRegister: function(){
            const self = this;
            $("#register").validate({
                rules: {
                    firstname: {
                        required: true,
                        maxlength: 20,
                    },
                    lastname: {
                        required: true,
                        maxlength: 20,
                    },
                    username: {
                        required: true,
                        maxlength: 20,
                        minlength: 6
                    },
                    email: {
                        required: true,
                        email: true,
                        maxlength: 50
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    confirm_password: {
                        required: true,
                        equalTo: "#password"
                    },
                },
                messages: {
                    firstname: {
                        required: "First Name is required",
                        maxlength: "First Name cannot be more than 20 characters"
                    },
                    lastname: {
                        required: "Last Name is required",
                        maxlength: "Last Name cannot be more than 20 characters"
                    },
                    username: {
                        required: "User Name is required",
                        maxlength: "User Name cannot be more than 20 characters",
                        minlength: "User Name must be atleast 6 characters"
                    },
                    email: {
                        required: "Email is required",
                        email: "Email must be a valid email address",
                        maxlength: "Email cannot be more than 50 characters",
                    },
                    password: {
                        required: "Password is required",
                        minlength: "Password must be at least 5 characters"
                    },
                    confirm_password: {
                        required:  "Confirm password is required",
                        equalTo: "Password and confirm password should same"
                    }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('text-red-500 text-sm');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('ring-red-600');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('ring-red-600');
                },
                submitHandler: function(form) {
                    form.submit();
                    // try {
                    //     var object = $(form).serializeArray();
                    //     var param = object.reduce((obj, item) => Object.assign(obj, { [item.name]: item.value }), {});
                    //     $.ajax({
                    //          url:"/auth/create_user",
                    //          type:"POST",
                    //          data:{_token:self.token,data:param},
                    //          dataType:"JSON",
                    //          success:function(){
                    //              console.log("yeahh")
                    //          }
                    //     });
                    // } catch (error) {
                    //     console.log(error)
                    // }
                  }
            });
        },
        validateLogin: function(){
            $("#login").validate({
                rules:{
                    username: {
                        required:true,
                        minlength:6
                    },
                    password:{
                        required:true,
                        minlength:6
                    }
                },
                messages:{
                    username: {
                        required: "User Name is required",
                        minlength: "User Name must be atleast 6 characters"
                    },
                    password:{
                        required:"Password is required",
                        minlength: "Password must be at least 5 characters"
                    }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('text-red-500 text-sm');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('ring-red-600');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('ring-red-600');
                },
                submitHandler: function(form) {
                    console.log($(form).serializeArray())
                  }
            })
        }
    }
    Auth.init.prototype = Auth.prototype;

    var auth = Auth();
   $(document).ready(function() {
        

        // $('#btnCreate').on('click',function(e){
        //     auth.validateRegister();

        //     // var object = arr.reduce((obj, item) => Object.assign(obj, { [item.key]: item.value }), {});
            
        // });

        // $("#btnLogin").on("click",function(){
        //     auth.validateLogin();
        // });




        
    });
})();


window.history.forward();

function noBack() {
    window.history.forward();
}
setTimeout("noBack()", 0);
window.onunload = function() { null };