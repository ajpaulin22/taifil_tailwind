

(function() {
    var JobCategoryID = 0;
    var JobOperationID = 0;
    const Biodata = function() {
        return new Biodata.init();
    }
    Biodata.init = function() {
        this.id = 0;
        this.token = $("meta[name=csrf-token]").attr("content");
        this.biodata_type = $("meta[name=biodata_type]").attr("content");
        this.local_company = 0;
        this.abroad_company =0;
        this.vocational = 0;
        this.sibling = 0;
        this.children = 0;
        this.relatives = 0;
        this.prometric =0;
        this.jpl = 0;
        this.personalData;
        this.educationalData;
        this.vocationalData;
        this.siblingData;
        this.childrenData;
        this.relativeData;
        this.local_empData;
        this.abroad_empData;
        this.certificateData;
        this.familyData;
        this.uploadData;
        this.prometricData;
        this.jplData;
        this.upload;
    }
    Biodata.prototype = {
        
        validatePersonal: function(){
            const self = this;
            $("#personal_form").validate({
                rules:{
                    code:{
                        required: true,
                    },
                    job_cat:{
                        required: true,
                    },
                    operations:{
                        required: true,
                    },
                    lastname:{
                        required: true,
                    },
                    firstname:{
                        required: true,
                    },
                    middlename:{
                        required: true,
                    },
                    nickname:{
                        required: true,
                    },
                    address:{
                        required: true,
                    },
                    birthday:{
                        required: true,
                    },
                    birth_place:{
                        required: true,
                    },
                    gender:{
                        required: true,
                    },
                    citizenship:{
                        required: true,
                    },
                    age:{
                        required: true,
                    },
                    civil_status:{
                        required: true,
                    },
                    contact:{
                        required: true,
                    },
                    height:{
                        required: true,
                    },
                    religion:{
                        required: true,
                    },
                    facebook:{
                        required: true,
                    },
                    religion:{
                        required: true,
                    },
                    smoking:{
                        required: true,
                    },
                    weight:{
                        required: true,
                    },
                    jp_reading:{
                        required: true
                    },
                    shoe_size:{
                        required: true
                    },
                    hobbies:{
                        required: true
                    },
                    person_to_notify:{
                        required: true
                    },
                    relation:{
                        required: true
                    },
                    person_address:{
                        required: true
                    },
                    person_contact:{
                        required: true
                    },
                    passport:{
                        required: true
                    },
                    issue_date:{
                        required: true
                    },
                    expiry_date:{
                        required: true
                    },
                    issue_place:{
                        required: true
                    },
                    jp_reading:{
                        required: true
                    },
                    allergy:{
                        required: true
                    },
                    tattoo:{
                        required: true
                    },
                    food_allergy:{
                        required: true
                    },
                },
                messages:{
                    code:{
                        required: "Code is required",
                    },
                    lastname:{
                        required: "Last Name is required",
                    }
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
                    self.personalData =  $(form).serializeArray().reduce((obj, item) => Object.assign(obj, { [item.name]: item.value }), {})
                    self.personalData.age = parseInt(self.personalData.age)
                    self.personalData.contact = parseInt(self.personalData.contact)
                    self.personalData.height = parseInt(self.personalData.height)
                    self.personalData.weight = parseInt(self.personalData.weight)
                    self.personalData.shoe_size = parseInt(self.personalData.shoe_size)
                    self.personalData.person_contact = parseInt(self.personalData.person_contact)




                     if($("#seminar_tab").length == 1) {
                        $("#seminar_tab").removeClass('pointer-events-none')
                         $("#seminar_tab").trigger('click');
                     }else{
                        $("#education_tab").removeClass('pointer-events-none')
                         $("#education_tab").trigger('click');
                     }
                  }
            });
        },
        uploadData:function(){
            let self = this;
           try {
            $.ajax({
                url:"/client/Biodata/uploadData",
                type:"POST",
                data:{
                    _token:self.token,
                    prometric:self.prometricData,
                    jpl:self.jplData,
                    family:self.familyData,
                    sibling:self.siblingData,
                    relative:self.relativeData,
                    children:self.childrenData,
                    local_emp:self.local_empData,
                    abroad_emp:self.abroad_empData,
                    educational:self.educationalData,
                    vocational:self.vocationalData,
                    personal:self.personalData
                },
                dataType:"JSON",
                success:function(promise){
                      console.log(promise)
                      if(promise.success){
                        self.saveid(promise.id);
                      }else{
                        console.log(promise.msgTitle)
                      }
                      
                }

            })
           } catch (error) {
            console.log(error)
           }
        },

        getData:function(){
            var strx = location.search.substring(1).split('&');
            var PersonalInfoID = strx[1].substring(strx[1].indexOf("=") + 1);
            $("#PersonalInfoID").val(PersonalInfoID);
            $.ajax({
                url:"/client/Biodata/GetPersonalData",
                type:"GET",
                data:{
                    _token:self.token,
                    PersonalInfoID: PersonalInfoID
                },
                dataType:"JSON",
                success:function(promise){
                    JobCategoryID = promise[0].job_cat;
                    JobOperationID = promise[0].operation;
                    $("#jobcodes").trigger('change');
                    $("#jobcategories").trigger('change');
                    // $("#jobcategories").val(promise[0].job_cat).trigger('change');
                    // $("#joboperations").val(promise[0].operation).trigger('change');
                },
            })
        },

        ddlSelectValue: function (id, text, value) {
            $(id).html("");
            var Options = new Option(text, value, true, true);
            $(id).append(Options).trigger('change');
        },

        getCode:function(){
            $.ajax({
                url:"/client/Biodata/get-code",
                type:"GET",
                data:{_token:self.token},
                dataType:"JSON",
                success:function(promise){
                    console.log(promise)
                    promise.forEach(data=>{
                        let option = `<option value="${data.ID}">${data.Code}</option>`;
                        $("#jobcodes").append(option)
                    })
                }
            })
        },

        getCategories:function(id){
            $.ajax({
                url:"/client/Biodata/get-categories",
                type:"GET",
                data:{
                    _token:self.token,
                    ID:id
                },
                dataType:"JSON",
                success:function(promise){
                    $('#jobcategories')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="" selected disabled value>Choose....</option>')
                    promise.forEach(data=>{
                        let option = `<option value="${data.ID}">${data.Category}</option>`;
                        $("#jobcategories").append(option)
                    })
                }
            })
        },
        getOperations:function(id){
            $.ajax({
                url:"/client/Biodata/get-operations",
                type:"GET",
                data:{
                    _token:self.token,
                    ID:id
                },
                dataType:"JSON",
                success:function(promise){
                    $('#joboperations')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="" selected disabled value>Choose....</option>')
                    promise.forEach(data=>{
                        let option = `<option value="${data.ID}">${data.Operation}</option>`;
                        $("#joboperations").append(option)
                    })
                }
            })
        },
        saveid:function(id){
            let self = this;
            self.upload.append("id", id);
            $.ajax({
                url:"/client/Biodata/upload-image",
                type:"POST",
                data:self.upload,
                cache: false,
                contentType:false,
                processData:false,
                success:function(promise){
                    if(promise.success){
                        setTimeout(() => {
                            location.replace("/")
                        }, 5000);
                    }
                    console.log(promise.msgTitle)
                }
            })
        }
        
    }
    Biodata.init.prototype = Biodata.prototype;

    var biodata = Biodata();
   $(document).ready(function() {
    
    biodata.getCode();
    biodata.getData();
    //EVENTS 
    $("#jobcodes").on("change",function(){
        biodata.getCategories($(this).val());
        if(JobCategoryID != 0){
            biodata.ddlSelectValue("#jobcategories", JobCategoryID, JobCategoryID)
            // $("#jobcategories").val(JobCategoryID).trigger('change');
        }
    })
    $("#jobcategories").on("change",function(){
        biodata.getOperations($(this).val());
        if(JobOperationID != 0){
            $("#joboperations").val(JobOperationID).trigger('change');
        }
    })
    //tabs Event Listener
    $("[data-tab-target]").toArray().forEach(tab => {
        $(tab).on("click",function(){
           const target = $(tab)[0].dataset.tabTarget
            $("[data-tab-content]").toArray().forEach((content)=>{
                $(content).addClass("hidden")
            })
            $("[data-tab-target]").toArray().forEach((content)=>{
                $(content).removeClass("bg-green-800")
                $(content).addClass("bg-green-300")
                $(content).removeClass("text-white")
                $(content).addClass("text-black")
            })
            $(tab).addClass('bg-green-800')
            $(tab).addClass("text-white")
           $(target).removeClass("hidden");
        });
    });

    //PERSONAL TAB ============================================EVENT LISTENER
    $("#personalBtn").on("click",function(e){
        biodata.validatePersonal();

        //to trigger the next tab-------------
        
        // if($("#seminar_tab").length == 1) {
        //     $("#seminar_tab").trigger('click');
        // }else{
        //     $("#education_tab").trigger('click');
        // }
    })

    $("#birthday").on("focusout",function(){
        const getAge = Math.floor((new Date() - new Date($(this).val()).getTime()) / 3.15576e+10)
        console.log(getAge)
        $("#age").val(getAge)
    });

    $("input[name='allergy']").on("click",function(){
        if($(this).val() == 1){
            $("#allergy").show()
            $("input[name='food_allergy']").attr("disabled",false)
        }else{
            $("#allergy").hide() 
            $("input[name='food_allergy']").attr("disabled",true)
        }
    })
    $("input[name='licensed']").on("click",function(){
        if($(this).val() == 1){
            $(".licensed").show()
        }else{
            $(".licensed").hide() 
        }
    })

    //CERTIFICATE TAB ==========================================EVENT LISTENER
    $("#certificate_form").validate({
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
            biodata.educationalData = $(form).serializeArray().reduce((obj, item) => Object.assign(obj, { [item.name]: item.value }), {})
            biodata.prometricData = [];
            biodata.jplData = []
            for (let i = 0; $(form).find('input[name="name_prometric_' + i + '"]').val() != null ; i++){
                biodata.prometricData.push({
                    name:$('input[name="name_prometric_' + i + '"]').val(),
                    address:$('input[name="add_prometric_' + i + '"]').val(),
                    from:$('input[name="date_from_prometric_' + i + '"]').val(),
                    until:$('input[name="date_until_prometric_' + i + '"]').val(),
                    certificate:$('input[name="certificate_prometric_' + i + '"]').val(),
                    certificate_until:$('input[name="date_until_cert_prometric_' + i + '"]').val(),
                })
            }

            for (let i = 0; $(form).find('input[name="name_jpl_' + i + '"]').val() != null ; i++){
                biodata.jplData.push({
                    name:$('input[name="name_jpl_' + i + '"]').val(),
                    address:$('input[name="add_jpl_' + i + '"]').val(),
                    from:$('input[name="date_from_jpl_' + i + '"]').val(),
                    until:$('input[name="date_until_jpl_' + i + '"]').val(),
                    certificate:$('input[name="certificate_jpl_' + i + '"]').val(),
                    certificate_until:$('input[name="date_until_cert_jpl_' + i + '"]').val(),
                })
            }

            $("#educational_tab").removeClass('pointer-events-none')
            $("#educational_tab").trigger("click")
            
          }
    });

    $("#add_prometric").on("click",function(e){
        e.preventDefault();
        let id = biodata.prometric;
        let form = `<div class="prometric_content w-full md:grid grid-cols-7 gap-4 mt-2">
        <div class="mt-2 md:mt-0 form-group col-span-6">
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-1">
            <button id="del_certificate_btn" class="prometric_del py-2 px-4 bg-red-600 rounded w-full self-end text-sm text-white">remove</button>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-3">
            <input name="name_prometric_${id+1}" autocomplete="off" type="text" class="form-control" placeholder="Name of School" required>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-2">
            <input name="add_prometric_${id+1}" autocomplete="off" type="text" class="form-control" placeholder="School Address" required>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-1">
            <div class="relative max-w-sm">
                <x-picker_logo/>
                <input datepicker name="date_from_prometric_${id+1}" autocomplete="off" value="" type="text" class="date_picker" placeholder="Date From" required>
            </div>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-1">
            <div class="relative max-w-sm">
                <x-picker_logo/>
                <input datepicker name="date_until_prometric_${id+1}" autocomplete="off" value="" type="text" class="date_picker" placeholder="Date Until" required>
            </div>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-5">
            <input name="certificate_prometric_${id+1}" autocomplete="off" type="text" class="form-control" placeholder="Certificate Holder" required>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-2">
            <div class="relative max-w-sm">
                <x-picker_logo/>
                <input datepicker name="date_until_cert_prometric_${id+1}" autocomplete="off" value="" type="text" class="date_picker" placeholder="Date Until" required>
            </div>
        </div>
    </div>`;

       $("#prometric_div").append(form);
       Datepicker.initDatepickers();
       $(".prometric_del").on("click",function(e){
           e.preventDefault();
           $(this).closest('.prometric_content').remove();
           biodata.prometric--
       })
       biodata.prometric++
    })

    $("#add_japlang_btn").on("click",function(e){
        e.preventDefault();
        let id = biodata.jpl;
        let form = `<div class="jpl_content w-full md:grid grid-cols-7 gap-4 mt-4">
        <div class="mt-2 md:mt-0 form-group col-span-6">
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-1">
            <button  class="jpl_del py-2 px-4 bg-red-600 rounded w-full self-end text-sm text-white">remove</button>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-3">
            <input name="name_jpl_${id+1}" autocomplete="off" type="text" class="form-control" placeholder="Name of School" required>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-2">
            <input name="add_jpl_${id+1}" autocomplete="off" type="text" class="form-control" placeholder="School Address" required>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-1">
            <div class="relative max-w-sm">
                <x-picker_logo/>
                <input datepicker name="date_from_jpl_${id+1}" autocomplete="off" value="" type="text" class="date_picker" placeholder="Date From" required>
            </div>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-1">
            <div class="relative max-w-sm">
                <x-picker_logo/>
                <input datepicker name="date_until_jpl_${id+1}" autocomplete="off" value="" type="text" class="date_picker" placeholder="Date Until" required>
            </div>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-5">
            <input name="certificate_jpl_${id+1}" autocomplete="off" type="text" class="form-control" placeholder="Certificate Holder" required>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-2">
            <div class="relative max-w-sm">
                <x-picker_logo/>
                <input datepicker name="date_until_cert_jpl_${id+1}" autocomplete="off" value="" type="text" class="date_picker" placeholder="Date Until" required>
            </div>
        </div>
    </div>`;

       $("#jpl_div").append(form);
       Datepicker.initDatepickers();
       $(".jpl_del").on("click",function(e){
           e.preventDefault();
           $(this).closest('.jpl_content').remove();
           biodata.jpl--
       })
       biodata.jpl++
    })

    $("#certificate_form").on("submit",function(){
        $("#certificate_form").valid();
    })

    $("#certificateBtn_Prev").on("click",function(e){
        e.preventDefault()
        $("#personal_tab").trigger('click');
    })


    //EDUCATIONAL TAB===========================================EVENT LISTENER
    $("#educational_form").validate({
               
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
            biodata.educationalData = $(form).serializeArray().reduce((obj, item) => Object.assign(obj, { [item.name]: item.value }), {})
            biodata.vocationalData = [];
            for (let i = 0; $(form).find('input[name="name_vocational_' + i + '"]').val() != null ; i++){
                if($('input[name="name_vocational_' + i + '"]').val() != ''){
                    biodata.vocationalData.push({
                        name:$('input[name="name_vocational_' + i + '"]').val(),
                        address:$('input[name="add_vocational_' + i + '"]').val(),
                        from:$('input[name="date_from_vocational_' + i + '"]').val(),
                        until:$('input[name="date_until_vocational_' + i + '"]').val(),
                        course:$('input[name="course_vocational_' + i + '"]').val(),
                        certificate:$('input[name="certificate_vocational_' + i + '"]').val(),
                        certificate_until:$('input[name="date_until_cert_vocational_' + i + '"]').val(),
                    })
                }
            }


            $("#job_local_tab").removeClass('pointer-events-none')
            $("#job_local_tab").trigger("click")
            
          }
    });


    $("#add_vocational_btn").on("click",function(e){
        e.preventDefault();
        let id = biodata.vocational;
        let form = `<div id="" class="vocational_content md:grid grid-cols-7 gap-4 col-span-7 mt-2">
        <div class="mt-2 md:mt-0 form-group col-span-6">
            
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-1">
            <button id="" class="delete_vocational py-2 px-4 bg-red-600 rounded w-full self-end text-sm text-white">Delete Record</button>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-3">
            <input name="name_vocational_${id+1}" autocomplete="off" type="text" class="form-control" placeholder="Name of School" required>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-2">
            <input name="add_vocational_${id+1}" autocomplete="off" type="text" class="form-control" placeholder="School Address" required>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-1">
            <div class="relative max-w-sm">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
        </div>
                <input datepicker name="date_from_vocational_${id+1}" id="birthday" autocomplete="off" value="" type="text" class="date_picker" placeholder="Date From" required>
            </div>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-1">
            <div class="relative max-w-sm">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
        </div>
                <input datepicker name="date_until_vocational_${id+1}" id="birthday" autocomplete="off" value="" type="text" class="date_picker" placeholder="Date Until" required>
            </div>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-4">
            <input name="course_vocational_${id+1}" autocomplete="off" type="text" class="form-control" placeholder="Course/Major" required>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-2">
            <input name="certificate_vocational_${id+1}" autocomplete="off" type="text" class="form-control" placeholder="Certificate Holder" required>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-1">
            <div class="relative max-w-sm">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
        </div>
                <input datepicker name="date_until_cert_vocational_${id+1}" id="birthday" autocomplete="off" value="" type="text" class="date_picker" placeholder="Date Until" required>
            </div>
        </div>
    </div>`;

       $("#vocational").append(form);
       Datepicker.initDatepickers();
       $(".delete_vocational").on("click",function(e){
           e.preventDefault();
           $(this).closest('.vocational_content').remove();
           biodata.vocational--
       })
       biodata.vocational++
    })

    $("#educational_form").on("submit",function(){
        $("#educational_form").valid();
    })

    $("#educationalBtn_Prev").on("click",function(e){
        e.preventDefault()
        if($("#seminar_tab").length == 1) {
            $("#seminar_tab").trigger('click');
        }else{
            $("#personal_tab").trigger('click');
        }
    })

    //LOCAL EMP TAB ===========================================EVENT LISTENER
    $("#empLocal_form").validate({
               
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
            // console.log($(form).serializeArray().reduce((obj, item) => Object.assign(obj, { [item.name]: item.value }), {}))
            biodata.local_empData = [];
            for (let i = 0; $(form).find('input[name="name_local_' + i + '"]').val() != null ; i++){
                if($('input[name="name_local_' + i + '"]').val() != ''){
                    biodata.local_empData.push({
                        company:$('input[name="name_local_' + i + '"]').val(),
                        position:$('input[name="position_local_' + i + '"]').val(),
                        address:$('input[name="address_local_' + i + '"]').val(),
                        from:$('input[name="date_from_local_' + i + '"]').val(),
                        until:$('input[name="date_until_local_' + i + '"]').val(),
                    })
                }
            }

            
            $("#job_abroad_tab").removeClass('pointer-events-none')
            $("#job_abroad_tab").trigger('click');
            
          }
    });

    $("#add_local_btn").on("click",function(e){
        e.preventDefault();
        let id = biodata.local_company;
        let forms = `<div class='companylocal md:grid grid-cols-9 gap-4' id='company_${id+1}'>
        <div class='mt-2 md:mt-0 form-group col-span-9'>
            <label class='text-xl font-bold'>Company ${id+1}<span style='color:red'>*</span>:</label>
        </div>
        <div class='mt-2 md:mt-0 form-group col-span-1'>
            <button id='delete_btn' class='btnDelLocal py-2 px-4 bg-red-700 rounded w-full self-end text-sm text-white disabled:bg-red-900'>Delete Record</button>
        </div>
        <div class='col-span-8 md:grid grid-cols-4 gap-4'>
            <div class='mt-2 md:mt-0 form-group col-span-2'>
                <input name='name_local_${id+1}' autocomplete='off' type='text' class='name_local form-control disabled:bg-slate-200' placeholder='Name of Company' required>
            </div>
        <div class='mt-2 md:mt-0 form-group col-span-2'>
            <input name='position_local_${id+1}' autocomplete='off' type='text' class='position_local form-control disabled:bg-slate-200' placeholder='Position' required>
        </div>
        <div class='mt-2 md:mt-0 form-group col-span-2'>
            <input name='address_local_${id+1}' autocomplete='off' type='text' class='address_local form-control disabled:bg-slate-200' placeholder='Company Address' required>
        </div>
        <div class='mt-2 md:mt-0 form-group col-span-1'>
            <div class='relative max-w-sm'>
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
          </div>
                <input datepicker name='date_from_local_${id+1}' autocomplete='off' type='text' class='date_from_local form-control date_picker disabled:bg-slate-200' placeholder='Date From' required>
            </div>
        </div>
        <div class='mt-2 md:mt-0 form-group col-span-1'>
            <div class='relative max-w-sm'>
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
          </div>
                <input datepicker name='date_until_local_${id+1}' autocomplete='off' type='text' class='date_until_local form-control date_picker disabled:bg-slate-200' placeholder='Date Until' required>
            </div>
        </div>
        </div>
        </div>`;

        $("#local_companys").append(forms)

        $(".btnDelLocal").on("click",function(e){
            e.preventDefault();
            $(this).closest('.companylocal').remove();
            biodata.local_company --
        })
        biodata.local_company ++

        // $('[datepicker]').each(function (datepickerEl) {
        //     Datepicker(datepickerEl);
        //   });

        // $("#personal_form").removeData('validator');
        // $("#personal_form").removeData('unobtrusiveValidation');
        // $.validator.unobtrusive.parse("#personal_form");
        
            // $('#empLocal_form :input.form-control').each(function() {
            //     console.log($(this)[0])

            //     $(this).rules("add", 
            //         {
            //             required: true
            //         })
            // })
        

        Datepicker.initDatepickers();
    });

    $("#local_applicable").on("click",function(e){
        if(this.checked){
            $("#add_local_btn").attr("disabled", true)
            $("#local_companys :input").attr("disabled", true);
        }else{
            $("#local_companys :input").attr("disabled", false);
            $("#add_local_btn").attr("disabled", false)
        }
       
    })

    $("#empLocal_form").on("submit",function(e){
        //biodata.validateLocalEmp()

        // $("#empLocal_form").validate()
        $("#empLocal_form").valid();
        
    });

    $("#empLocalBtn_Prev").on("click",function(e){
        e.preventDefault()
        $("#education_tab").trigger('click');

    })


    //ABROAD EMP TAB ===========================================EVENT LISTENER
    $("#empAbroad_form").validate({
               
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
            // console.log($(form).serializeArray().reduce((obj, item) => Object.assign(obj, { [item.name]: item.value }), {}))
            biodata.abroad_empData = [];
            for (let i = 0; $(form).find('input[name="name_abroad_' + i + '"]').val() != null ; i++){
                if($('input[name="name_abroad_' + i + '"]').val() != ''){
                    biodata.abroad_empData.push({
                        company:$('input[name="name_abroad_' + i + '"]').val(),
                        position:$('input[name="position_abroad_' + i + '"]').val(),
                        address:$('input[name="address_abroad_' + i + '"]').val(),
                        from:$('input[name="date_from_abroad_' + i + '"]').val(),
                        until:$('input[name="date_until_abroad_' + i + '"]').val(),
                    })
                }
            }


            $("#family_tab").removeClass('pointer-events-none')
            $("#family_tab").trigger('click')
          }
    });


    $("#add_abroad_btn").on("click",function(e){
        e.preventDefault();
        let id = biodata.abroad_company;
        let forms = `<div class='companyabroad md:grid grid-cols-9 gap-4' id='company_${id+1}'>
        <div class='mt-2 md:mt-0 form-group col-span-9'>
            <label class='text-xl font-bold'>Company ${id+1}<span style='color:red'>*</span>:</label>
        </div>
        <div class='mt-2 md:mt-0 form-group col-span-1'>
            <button id='delete_btn' class='btnDelabroad py-2 px-4 bg-red-700 rounded w-full self-end text-sm text-white disabled:bg-red-900'>Delete Record</button>
        </div>
        <div class='col-span-8 md:grid grid-cols-4 gap-4'>
            <div class='mt-2 md:mt-0 form-group col-span-2'>
                <input name='name_abroad_${id+1}' autocomplete='off' type='text' class='form-control disabled:bg-slate-200' placeholder='Name of Company' required>
            </div>
        <div class='mt-2 md:mt-0 form-group col-span-2'>
            <input name='position_abroad_${id+1}' autocomplete='off' type='text' class='form-control disabled:bg-slate-200' placeholder='Position' required>
        </div>
        <div class='mt-2 md:mt-0 form-group col-span-2'>
            <input name='address_abroad_${id+1}' autocomplete='off' type='text' class='form-control disabled:bg-slate-200' placeholder='Company Address' required>
        </div>
        <div class='mt-2 md:mt-0 form-group col-span-1'>
            <div class='relative max-w-sm'>
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
          </div>
                <input datepicker name='date_from_abroad_${id+1}' autocomplete='off' type='text' class='form-control date_picker disabled:bg-slate-200' placeholder='Date From' required>
            </div>
        </div>
        <div class='mt-2 md:mt-0 form-group col-span-1'>
            <div class='relative max-w-sm'>
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
          </div>
                <input datepicker name='date_until_abroad_${id+1}' autocomplete='off' type='text' class='form-control date_picker disabled:bg-slate-200' placeholder='Date Until' required>
            </div>
        </div>
        </div>
        </div>`;

        $("#abroad_companys").append(forms)

        $(".btnDelabroad").on("click",function(e){
            e.preventDefault();
            $(this).closest('.companyabroad').remove();
            biodata.abroad_company --
        })
        biodata.abroad_company ++

        // $('[datepicker]').each(function (datepickerEl) {
        //     Datepicker(datepickerEl);
        //   });

        // $("#personal_form").removeData('validator');
        // $("#personal_form").removeData('unobtrusiveValidation');
        // $.validator.unobtrusive.parse("#personal_form");
        
            // $('#empabroad_form :input.form-control').each(function() {
            //     console.log($(this)[0])

            //     $(this).rules("add", 
            //         {
            //             required: true
            //         })
            // })
        

        Datepicker.initDatepickers();
    });

    $("#abroad_applicable").on("click",function(e){
        if(this.checked){
            $("#add_abroad_btn").attr("disabled", true)
            $("#abroad_companys :input").attr("disabled", true);
        }else{
            $("#abroad_companys :input").attr("disabled", false);
            $("#add_abroad_btn").attr("disabled", false)
        }
       
    })

    $("#empAbroad_form").on("submit",function(e){
        //biodata.validateLocalEmp()

        // $("#empLocal_form").validate()
        $("#empAbroad_form").valid();
        
    });

    $("#empAbroadBtn_Prev").on("click",function(e){
        e.preventDefault()
        $("#job_local_tab").trigger('click')
    })
    

    //FAMILY TAB =========================================EVENT LISTENER
    $("#family_form").validate({
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
            biodata.familyData = $(form).serializeArray().reduce((obj, item) => Object.assign(obj, { [item.name]: item.value }), {})
            biodata.siblingData =[]
            biodata.childrenData = []
            biodata.relativeData = []
            for (let i = 0; $(form).find('input[name="sibling_' + i + '"]').val() != null ; i++){
                if($('input[name="sibling_' + i + '"]').val() != ''){
                    biodata.siblingData.push({
                        name:$('input[name="sibling_' + i + '"]').val(),
                        birhtday:$('input[name="sibling_birthday_' + i + '"]').val(),
                        occupation:$('input[name="sibling_occupation_' + i + '"]').val(),
                        cp:$('input[name="sibling_cp_' + i + '"]').val(),
                        address:$('input[name="sibling_address_' + i + '"]').val(),
                    })
                }
            }

            for (let i = 0; $(form).find('input[name="child_' + i + '"]').val() != null ; i++){
                if($('input[name="child_' + i + '"]').val() != ''){
                    biodata.childrenData.push({
                        name:$('input[name="child_' + i + '"]').val(),
                        birthday:$('input[name="child_birthday_' + i + '"]').val(),
                    })
                }
            }

            for (let i = 0; $(form).find('input[name="name_relative_' + i + '"]').val() != null ; i++){
                if($('input[name="name_relative_' + i + '"]').val() != ''){
                    biodata.relativeData.push({
                        name:$('input[name="name_relative_' + i + '"]').val(),
                        relation:$('input[name="relation_relative_' + i + '"]').val(),
                        contact:$('input[name="contact_relative_' + i + '"]').val(),
                        address:$('input[name="address_relative_' + i + '"]').val(),
                    })
                }
            }

            $("#upload_tab").removeClass('pointer-events-none')
            $("#upload_tab").trigger('click')
          }
    });

     $("#add_sibling").on("click",function(e){
        e.preventDefault();
        let id = biodata.sibling
        let form = `<div class="sibling_item col-span-13 md:grid grid-col-13 gap-4">
        <div class="md:mt-0 mt-2 form-group col-span-1 flex items-center">
         <button class='btnDelsibling py-2 px-4 bg-red-700 rounded w-full self-end text-sm text-white disabled:bg-red-900'>Delete Record</button>
        </div>
        <div class="form-group col-span-3">
            <label for="" class="form-label">Name<span style="color:red">*</span>:</label>
            <input name="sibling_${id+1}" autocomplete="off" type="text" class="sibling form-control disabled:bg-slate-200" required>
        </div>
        <div class="form-group col-span-3">
            <label for="sibling_birthday" class="form-label">Birth Date<span style="color:red">*</span>:</label>
            <div class="relative max-w-sm">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
        </div>
                <input datepicker name="sibling_birthday_${id+1}" autocomplete="off" type="text" class="sibling form-control date_picker disabled:bg-slate-200" placeholder="MM/DD/YYYY" required>
            </div>
        </div>
        <div class="form-group col-span-3">
            <label for="lastname" class="form-label">Occupation<span style="color:red">*</span>:</label>
            <input name="sibling_occupation_${id+1}" autocomplete="off" type="text" class="sibling form-control disabled:bg-slate-200" required>
        </div>
        <div class="form-group col-span-3">
            <label for="lastname" class="form-label">CP No.<span style="color:red">*</span>:</label>
            <input name="sibling_cp_${id+1}" autocomplete="off" type="text" class="sibling form-control disabled:bg-slate-200" required>
        </div>
        <div class="form-group col-start-2 col-span-12">
            <label for="lastname" class="form-label">Address<span style="color:red">*</span>:</label>
            <input name="sibling_address_${id+1}" autocomplete="off" type="text" class="sibling form-control disabled:bg-slate-200" required>
        </div>
    </div>`

    $("#siblings_nav").append(form)

           $(".btnDelsibling").on("click",function(e){
               e.preventDefault();
               $(this).closest('.sibling_item').remove();
               biodata.sibling --
           })
           biodata.sibling ++
           Datepicker.initDatepickers();
     })

     $("#add_children").on("click",function(e){
       e.preventDefault();
       let id = biodata.children
       let form = `<div class="children_content w-full md:grid grid-col-13 gap-4 grid-flow-col">
       <div class="md:mt-0 mt-2 form-group col-span-1 flex items-center">
           <button  class='btnDelchildren py-2 px-4 bg-red-700 rounded w-full self-end text-sm text-white disabled:bg-red-900'>Delete Record</button>
       </div>
       <div class="form-group col-span-8">
           <label for="lastname" class="form-label">Name<span style="color:red">*</span>:</label>
           <input name="child_${id+1}" autocomplete="off" type="text" class="children form-control disabled:bg-slate-200" required>
       </div>
       <div class="form-group col-span-4">
           <label for="lastname" class="form-label">Birth Date<span style="color:red">*</span>:</label>
           <div class="relative w-full">
           <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
           <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
       </div>
               <input datepicker name="child_birthday_${id+1}" autocomplete="off" type="text" class="children form-control date_picker disabled:bg-slate-200" placeholder="MM/DD/YYYY" required>
           </div>
       </div>
   </div>`

      $("#children").append(form);

      $(".btnDelchildren").on("click",function(e){
       e.preventDefault()
       $(this).closest('.children_content').remove();
               biodata.children --
      })
      biodata.children ++
      Datepicker.initDatepickers();
     })

     $("#children_applicable").on("click",function(){
        if(this.checked){
            $(".btnDelchildren").attr("disabled",true)
            $(".children").attr("disabled",true)
            $("#add_children").attr("disabled",true)
        }else{
            $(".children").attr("disabled",false)
            $(".btnDelchildren").attr("disabled",false)
            $("#add_children").attr("disabled",false)
        }
     })

     $("#sibling_applicable").on("click",function(){
        if(this.checked){
            $(".btnDelsibling").attr("disabled",true)
            $(".sibling").attr("disabled",true)
            $("#add_sibling").attr("disabled",true)
        }else{
            $(".sibling").attr("disabled",false)
            $(".btnDelsibling").attr("disabled",false)
            $("#add_sibling").attr("disabled",false)
        }
     })
        
     $("select[name='civil_status']").on("change",function(){
        if($(this).val() == "Married"){
            $(".spouse").attr("disabled",false)
        }else{
            $(".spouse").attr("disabled",true)
        }
     })

     $("#partner_applicable").on("click",function(){
        if(this.checked){
            $(".partner").attr("disabled",false)
            $(".partner_hidden").attr("hidden",false)
        }else{
            $(".partner").attr("disabled",true)
            $(".partner_hidden").attr("hidden",true)
        }
     })
     
     $("input[name='went_japan']").on("click",function(){
        if($(this).val() == 1){
             $(".japan_group").show()
            $(".japan").attr("disabled",false)
        }else{
            $(".japan_group").hide()
            $(".japan").attr("disabled",true)
        }
    })

     $("input[name='overstay']").on("click",function(){
        if($(this).val() == 1){
            $(".overstay_group").show()
            $(".overstay").attr("disabled",false)
        }else{
            $(".overstay_group").hide()
            $(".overstay").attr("disabled",true)
        }
    })

    $("input[name='fakeidentity']").on("click",function(){
        if($(this).val() == 1){
            $(".fakeidentity_group").show()
            $(".fakeidentity").attr("disabled",false)
        }else{
            $(".fakeidentity_group").hide()
            $(".fakeidentity").attr("disabled",true)
        }
    })
    $("input[name='visa']").on("click",function(){
        if($(this).val() == 1){
            $(".visa_group").show()
            $(".visa").attr("disabled",false)
        }else{
            $(".visa_group").hide()
            $(".visa").attr("disabled",true)
        }
    })

    $("#add_relatives").on("click",function(e){
        e.preventDefault();
        let id = biodata.relatives
        let form = `<div class="relative_content w-full md:grid grid-cols-13 grid-flow-col gap-4 mt-2">
        <div class="form-group col-span-1 flex items-center">
            <button  class='btnDelrelatives py-2 px-1 bg-red-700 rounded w-full self-end text-sm font-extrabold text-white disabled:bg-red-900'>X</button>
        </div>
        <div class="form-group col-span-4 mt-2 md:mt-0">
            <input name="name_relative_${id+1}" autocomplete="off" type="text" class="sibling form-control disabled:bg-slate-200" required placeholder="Name">
        </div>
        <div class="form-group col-span-4 mt-2 md:mt-0">
            <input name="relation_relative_${id+1}" autocomplete="off" type="text" class="sibling form-control disabled:bg-slate-200" required placeholder="Relation">
        </div>
        <div class="form-group col-span-4 mt-2 md:mt-0">
            <input name="contact_relative_${id+1}" autocomplete="off" type="number" class="sibling form-control disabled:bg-slate-200" required placeholder="Contact">
        </div>
        <div class="form-group col-span-4 mt-2 md:mt-0">
            <input name="address_relative_${id+1}" autocomplete="off" type="text" class="sibling form-control disabled:bg-slate-200" required placeholder="Address">
        </div>
    </div>`
    $("#relatives").append(form)
    $(".btnDelrelatives").on("click",function(){
        e.preventDefault()
       $(this).closest('.relative_content').remove();
               biodata.relatives --
    })
    biodata.relatives ++
    })

    $("#relatives_applicable").on("click",function(e){
        if(this.checked){
            $("#relatives :input").attr("disabled",true)
        }else{
            $("#relatives :input").attr("disabled",false)
        }
    })

    $("input[name='father_deceased']").on("click",function(){
        if($(this).val() == 1){
            $(".father_deceased").attr("disabled",true)
            $(".father_na").attr("disabled",false)
        }else{
            $(".father_deceased").attr("disabled",true)
            $(".father_na").attr("disabled",true)
        }
    })

    $("input[name='mother_deceased']").on("click",function(){
        if($(this).val() == 1){
            $(".mother_deceased").attr("disabled",true)
            $(".mother_na").attr("disabled",false)
        }else{
            $(".mother_deceased").attr("disabled",true)
            $(".mother_na").attr("disabled",true)
        }
    })

     $("#family_form").on("submit",function(e){
        $("#family_form").valid();
     })

     $("#familyBtn_Prev").on("click",function(e){
        e.preventDefault()
        $("#job_abroad_tab").trigger("click");
     })
     
     //UPLOAD TAB =======================================================EVENT LISTENER

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

     $("#upload_form").validate({
        rules: {
            picture: {
                required: true,
                extension: "png|jpeg|jpg",
                maxsize: 1932979, 
            },
            gov_id: {
                required: true, 
                extension: "png|jpeg|jpg",
                maxsize: 1932979,   
            },
            passport_id: {
                required: true, 
                extension: "png|jpeg|jpg",
                maxsize: 1932979,   
            }
        },
        messages:{
            picture: {
                maxsize: "File size must not exceed 2MB each", 
            },
            gov_id: {
                maxsize: "File size must not exceed 2MB each",   
            },
            passport_id: {
                maxsize: "File size must not exceed 2MB each",   
            }
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
            biodata.uploadData();
          }
    });

    const options = {
        placement: 'bottom-right',
        backdrop: 'dynamic',
        backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40',
        closable: true,
      };
    let modal = new flowbite.Modal($("#popup-modal")[0],options);
    
    $(".close_send").on("click",function(e){
        e.preventDefault();
        modal.hide();
    })
    $("#send").on("click",function(e){
        e.preventDefault();
        if($("#upload_form").valid()){
            modal.show();
            biodata.upload = new FormData($("#upload_form")[0])
        }
        
    });

    $("#upload_details").on("click",function(){
        biodata.uploadData()
        modal.hide();
    })


     $("#uploadBtn_Prev").on("click",function(e){
        e.preventDefault();
        $("#family_tab").trigger("click");
     })

    });
})();


window.history.forward();

function noBack() {
    window.history.forward();
}
setTimeout("noBack()", 0);
window.onunload = function() { null };