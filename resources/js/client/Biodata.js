

(function() {
    var JobCategoryID = 0;
    var JobOperationID = 0;
    const Biodata = function() {
        return new Biodata.init();
    }
    Biodata.init = function() {
        this.family_validator =false;
        this.personal_validator = false;
        this.educational_validator = false;
        this.local_emp_validator = false;
        this.abroad_emp_validator = false;
        this.certificate_validator = false;
        this.upload_validator =false;
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
        this.japanvisit = 0;
        this.jpl = 0;
        this.japanvisitData;
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
        uploadData:function(){
            $("#loader").show()
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
                    personal:self.personalData,
                    japanvisit:self.japanvisitData,
                    personalid: $("#PersonalInfoID").val()
                },
                dataType:"JSON",
                success:function(promise){
                      console.log(promise)
                      if(promise.success){
                        self.saveid(promise.id);
                      }
                      else{
                        $("#loader").hide();
                        iziToast.error({
                            class:'rounded-lg overflow-hidden',
                            title: 'Error',
                            message: promise.msgTitle,
                            position:'topRight'
                        });
                      }
                      
                }

            })
           } catch (error) {
            console.log(error)
           }
        },

        loadURLToInputField:function(url, fileName, key){
            biodata.getImgURL(url, (imgBlob)=>{
              // Load img blob to input
              // WIP: UTF8 character error
              let file = new File([imgBlob], fileName,{type:"image/jpeg", lastModified:new Date().getTime()}, 'utf-8');
              let container = new DataTransfer();
              container.items.add(file);
              document.querySelector('#' + key).files = container.files;
            })
        },
          // xmlHTTP return blob respond
        getImgURL:function(url, callback){
        var xhr = new XMLHttpRequest();
        xhr.onload = function() {
            callback(xhr.response);
        };
        xhr.open('GET', url);
        xhr.responseType = 'blob';
        xhr.send();
        },

        getData:function(){
            var strx = location.search.substring(1).split('&');
            var type = strx[1].substring(strx[1].indexOf("=") + 1);
            if (type == "mod"){
                $.ajax({
                    url:"/client/Biodata/GetPersonalData",
                    type:"GET",
                    data:{
                        _token:self.token,
                    },
                    dataType:"JSON",
                    success:function(promise){
                        JobCategoryID = promise.personaldata[0].job_cat;
                        JobOperationID = promise.personaldata[0].operation;
                        //personal
                        $("#PersonalInfoID").val(promise.personaldata[0].id);
                        $("#jobcategories").val(promise.personaldata[0].job_cat).trigger('change');
                        $("#lastname").val(promise.personaldata[0].lastname);
                        $("#firstname").val(promise.personaldata[0].first_name);
                        $("#middlename").val(promise.personaldata[0].middle_name);
                        $("#nickanme").val(promise.personaldata[0].nickname);
                        $("#address").val(promise.personaldata[0].address);
                        $("#birthday").val(promise.personaldata[0].date_birth);
                        $("#birth_place").val(promise.personaldata[0].place_birth);
                        $("input[name='gender'][value='" + promise.personaldata[0].gender + "']").prop("checked", true);
                        $("select[name='citizenship']").val(promise.personaldata[0].citizenship).trigger('change');
                        $("#age").val(promise.personaldata[0].age);
                        $("select[name='blood_type']").val(promise.personaldata[0].bloodtype).trigger('change');
                        $("select[name='civil_status']").val(promise.personaldata[0].civil_status).trigger('change');
                        $("#contact").val(promise.personaldata[0].contact);
                        $("input[name='height']").val(promise.personaldata[0].height);
                        $("select[name='religion']").val(promise.personaldata[0].religion).trigger('change');
                        $("input[name='facebook']").val(promise.personaldata[0].facebook);
                        $("input[name='smoking'][value='" + promise.personaldata[0].smoking + "']").prop("checked", true);
                        $("input[name='weight']").val(promise.personaldata[0].weight);
                        $("input[name='jp_reading']").prop('checked', promise.personaldata[0].jap_reading == 1 ? true : false);
                        $("input[name='jp_writing']").prop('checked', promise.personaldata[0].jap_writing == 1 ? true : false);
                        $("input[name='jp_Speaking']").prop('checked', promise.personaldata[0].jap_speaking == 1 ? true : false);
                        $("input[name='jp_Listening']").prop('checked', promise.personaldata[0].jap_listening == 1 ? true : false);
                        $("input[name='weight']").val(promise.personaldata[0].weight);
                        $("input[name='other_lang']").val(promise.personaldata[0].other_lang == null ? "" : promise.personaldata[0].other_lang);
                        $("input[name='shoe_size']").val(promise.personaldata[0].shoe_size);
                        $("input[name='hobbies']").val(promise.personaldata[0].hobbies);
                        $("input[name='person_to_notify']").val(promise.personaldata[0].person_to_notify);
                        $("select[name='relation']").val(promise.personaldata[0].person_relation).trigger('change');
                        $("input[name='person_address']").val(promise.personaldata[0].person_address);
                        $("input[name='person_contact']").val(promise.personaldata[0].person_contact);
                        $("input[name='passport']").val(promise.personaldata[0].passport_no);
                        $("input[name='issue_date']").val(promise.personaldata[0].issue_date);
                        $("input[name='expiry_date']").val(promise.personaldata[0].expiry_date);
                        $("input[name='issue_place']").val(promise.personaldata[0].issue_place);
                        $("input[name='allergy'][value='" + promise.personaldata[0].allergy + "']").prop("checked", true);
                        $("input[name='tattoo'][value='" + promise.personaldata[0].tattoo + "']").prop("checked", true);
                        $("input[name='licensed'][value='" + promise.personaldata[0].drivers_licensed + "']").prop("checked", true);

                        //educational
                        $("input[name='name_elem']").val(promise.educationaldata[0].name_elem);
                        $("input[name='add_elem']").val(promise.educationaldata[0].address_elem);
                        $("input[name='date_from_elem']").val(promise.educationaldata[0].from_elem);
                        $("input[name='date_until_elem']").val(promise.educationaldata[0].until_elem);
                        $("input[name='name_highschool']").val(promise.educationaldata[0].name_highschool);
                        $("input[name='add_highschool']").val(promise.educationaldata[0].address_highschool);
                        $("input[name='date_from_highschool']").val(promise.educationaldata[0].from_highschool);
                        $("input[name='date_until_highschool']").val(promise.educationaldata[0].until_highschool);
                        $("input[name='name_jpl']").val(promise.educationaldata[0].name_jp_lang);
                        $("input[name='add_jpl']").val(promise.educationaldata[0].address_jp_lang);
                        $("input[name='date_from_jpl']").val(promise.educationaldata[0].from_jp_lang);
                        $("input[name='date_until_jpl']").val(promise.educationaldata[0].until_jp_lang);
                        $("input[name='certificate_jpl']").val(promise.educationaldata[0].certificate_jp_lang);
                        $("input[name='date_until_cert_jpl']").val(promise.educationaldata[0].certificate_until_jp_lang);
                        $("input[name='name_college']").val(promise.educationaldata[0].name_college);
                        $("input[name='add_college']").val(promise.educationaldata[0].address_college);
                        $("input[name='date_from_college']").val(promise.educationaldata[0].from_college);
                        $("input[name='date_until_college']").val(promise.educationaldata[0].until_college);
                        $("input[name='course_college']").val(promise.educationaldata[0].course_college);
                        $("select[name='certificate_college']").val(promise.educationaldata[0].certificate_college).trigger('change');
                        $("input[name='date_until_cert_college']").val(promise.educationaldata[0].certificate_until_college);
                        for (var i = 0; i < promise.vocationaldata.length; i++){
                            if(i != 0)
                                $("#add_vocational_btn").trigger('click');
                            $("input[name='name_vocational_"+ i +"']").val(promise.vocationaldata[i].name);
                            $("input[name='add_vocational_"+ i +"']").val(promise.vocationaldata[i].address);
                            $("input[name='date_from_vocational_"+ i +"']").val(promise.vocationaldata[i].from);
                            $("input[name='date_until_vocational_"+ i +"']").val(promise.vocationaldata[i].until);
                            $("input[name='course_vocational_"+ i +"']").val(promise.vocationaldata[i].course);
                            $("input[name='certificate_vocational_"+ i +"']").val(promise.vocationaldata[i].certificate);
                            $("input[name='date_until_cert_vocational_"+ i +"']").val(promise.vocationaldata[i].certificate_until);
                        }

                        //localemployment
                        if (promise.employmentlocaldata.length == 0){
                            $("#local_applicable").trigger('click');                        
                        }
                        else{
                            for (var i = 0; i < promise.employmentlocaldata.length; i++){
                                if(i != 0)
                                    $("#add_local_btn").trigger('click');
                                $("input[name='name_local_"+ i +"']").val(promise.employmentlocaldata[i].company_name);
                                $("input[name='position_local_"+ i +"']").val(promise.employmentlocaldata[i].position);
                                $("input[name='address_local_"+ i +"']").val(promise.employmentlocaldata[i].company_address);
                                $("input[name='date_from_local_"+ i +"']").val(promise.employmentlocaldata[i].from);
                                $("input[name='date_until_local_"+ i +"']").val(promise.employmentlocaldata[i].until);
                            }
                        }

                        //abroademployment
                        if (promise.employmentabroaddata.length == 0){
                            $("#abroad_applicable").trigger('click');                        
                        }
                        else{
                            for (var i = 0; i < promise.employmentabroaddata.length; i++){
                                if(i != 0)
                                    $("#add_abroad_btn").trigger('click');
                                $("input[name='name_abroad_"+ i +"']").val(promise.employmentabroaddata[i].company_name);
                                $("input[name='position_abroad_"+ i +"']").val(promise.employmentabroaddata[i].position);
                                $("input[name='address_abroad_"+ i +"']").val(promise.employmentabroaddata[i].company_address);
                                $("input[name='date_from_abroad_"+ i +"']").val(promise.employmentabroaddata[i].from);
                                $("input[name='date_until_abroad_"+ i +"']").val(promise.employmentabroaddata[i].until);
                            }
                        }

                        //family
                        if (promise.familydata[0].father_name == null && promise.familydata[0].father_birth == null){
                            $("input[name='father_deceased'][value='3']").trigger('click');
                        }
                        else if(promise.familydata[0].father_name != null && promise.familydata[0].father_birth == null){
                            $("input[name='father_deceased'][value='2']").trigger('click');
                            $("input[name='father']").val(promise.familydata[0].father_name);
                        }
                        else{
                            $("input[name='father']").val(promise.familydata[0].father_name);
                            $("input[name='father_birthday']").val(promise.familydata[0].father_birth);
                            $("input[name='father_occupation']").val(promise.familydata[0].father_occupation);
                            $("input[name='father_cp']").val(promise.familydata[0].father_cp);
                            $("input[name='father_address']").val(promise.familydata[0].father_address);
                        }

                        if (promise.familydata[0].mother_name == null && promise.familydata[0].mother_birth == null){
                            $("input[name='mother_deceased'][value='3']").trigger('click');
                        }
                        else if(promise.familydata[0].mother_name != null && promise.familydata[0].mother_birth == null){
                            $("input[name='mother_deceased'][value='2']").trigger('click');
                            $("input[name='mother']").val(promise.familydata[0].mother_name);
                        }
                        else{
                            $("input[name='mother']").val(promise.familydata[0].mother_name);
                            $("input[name='mother_birthday']").val(promise.familydata[0].mother_birth);
                            $("input[name='mother_occupation']").val(promise.familydata[0].mother_occupation);
                            $("input[name='mother_cp']").val(promise.familydata[0].mother_cp);
                            $("input[name='mother_address']").val(promise.familydata[0].mother_address);
                        }

                        if($("select[name='civil_status']").val() == 'Married'){
                            $("input[name='spouse']").val(promise.familydata[0].spouse_name);
                            $("input[name='spouse_birthday']").val(promise.familydata[0].spouse_birth);
                            $("input[name='spouse_occupation']").val(promise.familydata[0].spouse_occupation);
                            $("input[name='spouse_cp']").val(promise.familydata[0].spouse_cp);
                            $("input[name='spouse_address']").val(promise.familydata[0].spouse_address);
                        }
                        
                        if(promise.familydata[0].partner_name != null){
                            $("#partner_applicable").trigger('click');
                            $("input[name='partner']").val(promise.familydata[0].partner_name);
                            $("input[name='partner_birthday']").val(promise.familydata[0].partner_birth);
                            $("input[name='partner_occupation']").val(promise.familydata[0].partner_occupation);
                            $("input[name='partner_cp']").val(promise.familydata[0].partner_cp);
                            $("input[name='partner_address']").val(promise.familydata[0].partner_address);
                        }

                        if(promise.familydata[0].went_japan == 0){
                            $("input[name='went_japan'][value='"+ promise.familydata[0].went_japan +"']").trigger('click');
                        }
                        else{
                            $("input[name='went_japan'][value='"+ promise.familydata[0].went_japan +"']").trigger('click');
                            $("input[name='japan_times']").val(promise.familydata[0].how_many_japan);
                            $("input[name='japan_when']").val(promise.familydata[0].when_japan);
                            $("input[name='japan_where']").val(promise.familydata[0].where_japan);
                            $("input[name='japan_where']").val(promise.familydata[0].where_japan);

                            if(promise.familydata[0].overstay_japan == 0){
                                $("input[name='went_japan'][value='"+ promise.familydata[0].overstay_japan +"']").trigger('click');
                            }
                            else{
                                $("input[name='overstay'][value='"+ promise.familydata[0].overstay_japan +"']").trigger('click');
                                $("input[name='overstay_howlong']").val(promise.familydata[0].how_long_overstay);
                            }

                            if(promise.familydata[0].fake_identity_japan == 0){
                                $("input[name='fakeidentity'][value='"+ promise.familydata[0].fake_identity_japan +"']").trigger('click');
                            }
                            else{
                                $("input[name='fakeidentity'][value='"+ promise.familydata[0].fake_identity_japan +"']").trigger('click');
                                $("input[name='fakeidentity_purpose']").val(promise.familydata[0].fake_identity_purpose);
                                $("input[name='fakeidentity_surrendered'][value='"+ promise.familydata[0].fake_identity_surrender +"']").trigger('click');
                            }
                        }

                        if(promise.familydata[0].applied_visa == 0){
                            $("input[name='visa'][value='"+ promise.familydata[0].applied_visa +"']").trigger('click');
                        }
                        else{
                            $("input[name='visa'][value='"+ promise.familydata[0].applied_visa +"']").trigger('click');
                            $("select[name='visa_type']").val(promise.familydata[0].type_visa).trigger('change');
                            $("input[name='visa_when']").val(promise.familydata[0].when_applied_visa);
                            $("select[name='visa_approved']").val(promise.familydata[0].approved).trigger('change');
                        }

                        if (promise.siblingdata.length == 0){
                            $("#sibling_applicable").trigger('click');                        
                        }
                        else{
                            for (var i = 0; i < promise.siblingdata.length; i++){
                                if(i != 0)
                                    $("#add_sibling").trigger('click');
                                $("input[name='sibling_"+ i +"']").val(promise.siblingdata[i].sibling_name);
                                $("input[name='sibling_birthday_"+ i +"']").val(promise.siblingdata[i].sibling_birth);
                                $("input[name='sibling_occupation_"+ i +"']").val(promise.siblingdata[i].sibling_occupation);
                                $("input[name='sibling_cp_"+ i +"']").val(promise.siblingdata[i].sibling_cp);
                                $("input[name='sibling_address_"+ i +"']").val(promise.siblingdata[i].sibling_address);
                            }
                        }

                        if (promise.childrendata.length == 0){
                            $("#children_applicable").trigger('click');                        
                        }
                        else{
                            for (var i = 0; i < promise.childrendata.length; i++){
                                if(i != 0)
                                    $("#add_children").trigger('click');
                                $("input[name='child_"+ i +"']").val(promise.childrendata[i].name);
                                $("input[name='child_birthday_"+ i +"']").val(promise.childrendata[i].birthday);
                            }
                        }

                        if (promise.relativedata.length == 0){
                            $("#relatives_applicable").trigger('click');                        
                        }
                        else{
                            for (var i = 0; i < promise.relativedata.length; i++){
                                if(i != 0)
                                    $("#add_relatives").trigger('click');
                                $("input[name='name_relative_"+ i +"']").val(promise.relativedata[i].name);
                                $("input[name='relation_relative_"+ i +"']").val(promise.relativedata[i].relation);
                                $("input[name='contact_relative_"+ i +"']").val(promise.relativedata[i].cp);
                                $("input[name='address_relative_"+ i +"']").val(promise.relativedata[i].address);
                            }
                        }

                        //pictures
                        var pictureName = promise.personaldata[0].id_picture.replace('1x1_pictures/', '')
                        var govIDName = promise.personaldata[0].gov_id_picture.replace('gov_id_pictures/', '')
                        var passportIDName = promise.personaldata[0].passport_id_picture.replace('passport_id_pictures/', '')
                        biodata.loadURLToInputField('/storage/1x1_pictures/' + pictureName, pictureName, "picture");
                        biodata.loadURLToInputField('/storage/gov_id_pictures/' + govIDName, govIDName, "gov_id");
                        biodata.loadURLToInputField('/storage/passport_id_pictures/' + passportIDName, passportIDName, "passport_id");
                    },
                })
            }
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

        getCategories:function(){
            let self = this;
            $.ajax({
                url:"/client/Biodata/get-categories",
                type:"GET",
                data:{
                    _token:self.token,
                    type:self.biodata_type
                },
                dataType:"JSON",
                success:function(promise){
                    $('#jobcategories')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="" selected disabled value>Choose....</option>')
                    promise.forEach(data=>{
                        let option = `<option value="${data.ID}" >${data.Category}</option>`;
                        $("#jobcategories").append(option)
                    })
                    if(JobCategoryID != 0){
                        $("#jobcategories").val(JobCategoryID).trigger('change');
                    }
                    let params = new URLSearchParams(window.location.search)
                    for (let p of params) {
                        if(p[0] == "cat"){
                            $("#jobcategories").val(p[1]).trigger('change');
                        }
                    }
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
                    if(JobOperationID != 0 || JobOperationID != ""){
                        $("#joboperations").val(JobOperationID).trigger('change');
                    }
                    let params = new URLSearchParams(window.location.search)
                    for (let p of params) {
                        if(p[0] == "op"){
                            $("#joboperations").val(p[1]).trigger('change');
                        }
                    }
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
                        $("#upload_details").prop('disabled', true);
                        $("#send").prop('disabled', true);
                        $("#personal_form").trigger("reset");
                        $("#certificate_form").trigger("reset");
                        $("#empLocal_form").trigger("reset");
                        $("#personal_form").trigger("reset");
                        $("#empAbroad_form").trigger("reset");
                        $("#family_form").trigger("reset");
                        $("#upload_form").trigger("reset");
                        $("#loader").hide();
                        iziToast.success({
                            class:'rounded-lg overflow-hidden',
                            title: promise.msgTitle,
                            message: promise.msg,
                            position:'topRight'
                        });
                        setTimeout(() => {
                            location.replace((location.pathname.includes("/jp")? "/jp/":"/"));
                        }, 2000);
                    }
                    console.log(promise.msgTitle)
                }
            })
        },
        countRow:function(lblClass, lblText){
            var count = 1;
            $(".lbl" + lblClass).each(function(){
                $(this).html(lblText + " " + count+"<span style='color:red'>*</span>:");
                count++;
            })
        }
    }
    Biodata.init.prototype = Biodata.prototype;

    var biodata = Biodata();
   $(document).ready(function() {
    //initialiazed
    let Datepicker = tw_elements.Datepicker;
    let Input = tw_elements.Input;
    tw_elements.initTE({ Datepicker,Input });
    setTimeout(() => {
        $("#opening").hide();
    }, 1000);
    // biodata.getCode();
    biodata.getData();
    biodata.getCategories()
    $.validator.addMethod("validDate", function(value, element) {
        // return moment(value).isSameOrAfter('01/01/1900');
        return true;
    }, "Please enter a valid date in the format DD/MM/YYYY");

    //=================================================EVENTS LISTENER
    // $("#jobcodes").on("change",function(){
    //     biodata.getCategories($(this).val());
    // })
    $("#jobcategories").on("change",function(){
        biodata.getOperations($(this).val());
    });

    $(".date_picker").on("keydown",function(){
       return false;
    })

    $(".date_picker").on("input",function(){
        $(this).valid()
    })




    //====================================================================tabs Event Listener
    $("[data-tab-target]").toArray().forEach(tab => {
        let valid = false;
        $(tab).on("click",function(){
            const target = $(tab)[0].dataset.tabTarget
            $("[data-tab-content]").toArray().forEach((content)=>{
                
                if(!$(content).hasClass("hidden")){
                    let validRun = $(content).find('form').attr("id")
                    switch (validRun){
                        case "personal_form":
                            valid = (biodata.personal_validator) ? $(content).find('form').valid() : true
                            break;
                        case "certificate_form":
                            valid = (biodata.certificate_validator) ? $(content).find('form').valid() : true
                            break;
                        case "educational_form":
                            valid = (biodata.educational_validator) ? $(content).find('form').valid() : true
                            break;
                        case "empLocal_form":
                            valid = (biodata.local_emp_validator) ? $(content).find('form').valid() : true
                            break;
                        case "empAbroad_form":
                            valid = (biodata.abroad_emp_validator) ? $(content).find('form').valid() : true
                            break;
                        case "family_form":
                            valid = (biodata.family_validator) ? $(content).find('form').valid() : true
                            break;
                        case "upload_form":
                            valid = (biodata.upload_validator) ? $(content).find('form').valid() : true
                            break;    
                    }

                    if($(content).find('form').attr("id") == "family_form") {
                        biodata.family_validator = true;
                    }
                }
                if(valid){
                    $(content).addClass("hidden")
                }
                
            })
            if(valid){
                $("[data-tab-target]").toArray().forEach((content)=>{
                    $(content).removeClass("bg-green-800")
                    $(content).addClass("bg-green-300")
                    $(content).removeClass("text-white")
                    $(content).addClass("text-black")
                })
                $(tab).addClass('bg-green-800')
                $(tab).addClass("text-white")
                 $(target).removeClass("hidden");
            }
            
        });
    });
 
    

    
    //PERSONAL TAB ============================================EVENT LISTENER
    $("#personal_form").validate({
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
            biodata.personalData =  $(form).serializeArray().reduce((obj, item) => Object.assign(obj, { [item.name]: item.value }), {})
            biodata.personalData.age = parseInt(biodata.personalData.age)
            biodata.personalData.contact = parseInt(biodata.personalData.contact)
            biodata.personalData.height = parseInt(biodata.personalData.height)
            biodata.personalData.weight = parseInt(biodata.personalData.weight)
            biodata.personalData.shoe_size = parseInt(biodata.personalData.shoe_size)
            biodata.personalData.person_contact = parseInt(biodata.personalData.person_contact)
            $(window).scrollTop(0);
             if($("#seminar_tab").length == 1) {
                $("#seminar_tab").removeClass('pointer-events-none')
                 $("#seminar_tab").trigger('click');
             }else{
                $("#education_tab").removeClass('pointer-events-none')
                 $("#education_tab").trigger('click');
             }
          }
    });
    $("#personalBtn").on("click",function(e){
        $("#personal_form").valid();
        biodata.personal_validator = true;
        //to trigger the next tab-------------
        
        // if($("#seminar_tab").length == 1) {
        //     $("#seminar_tab").trigger('click');
        // }else{
        //     $("#education_tab").trigger('click');
        // }
    })

    $("#birthday").on("input",function(){
        // const getAge = Math.floor((new Date($(this).val()).getTime() - new Date()) / 3.15576e+10)
        var difference=Date.now() - new Date($(this).val()).getTime(); 
        var  ageDate = new Date(difference); 
        var calculatedAge=   Math.abs(ageDate.getUTCFullYear() - 1970);
        $("#age").val(calculatedAge).trigger("change");
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
    let certificateValid = $("#certificate_form").validate({
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
            $(window).scrollTop(0);
            for (let i = 0; $(form).find('input[name="name_prometric_' + i + '"]').val() != null ; i++){
                if($('input[name="name_prometric_' + i + '"]').val() != ''){
                    biodata.prometricData.push({
                        name:$('input[name="name_prometric_' + i + '"]').val(),
                        address:$('input[name="add_prometric_' + i + '"]').val(),
                        from:$('input[name="date_from_prometric_' + i + '"]').val(),
                        until:$('input[name="date_until_prometric_' + i + '"]').val(),
                        certificate:$('input[name="certificate_prometric_' + i + '"]').val(),
                        certificate_until:$('input[name="date_until_cert_prometric_' + i + '"]').val(),
                    })
                }
            }

            for (let i = 0; $(form).find('input[name="name_jpl_' + i + '"]').val() != null ; i++){
                if($('input[name="name_jpl_' + i + '"]').val() != ''){
                    biodata.jplData.push({
                        name:$('input[name="name_jpl_' + i + '"]').val(),
                        address:$('input[name="add_jpl_' + i + '"]').val(),
                        from:$('input[name="date_from_jpl_' + i + '"]').val(),
                        until:$('input[name="date_until_jpl_' + i + '"]').val(),
                        certificate:$('input[name="certificate_jpl_' + i + '"]').val(),
                        certificate_until:$('input[name="date_until_cert_jpl_' + i + '"]').val(),
                    })
                }
               
            }

            $("#education_tab").removeClass('pointer-events-none')
            $("#education_tab").trigger("click")
            
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
            <input name="name_prometric_${id+1}" autocomplete="off" type="text"  maxlength="100" class="form-control" placeholder="Name of School" required>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-2">
            <input name="add_prometric_${id+1}" autocomplete="off" type="text" maxlength="100" class="form-control" placeholder="School Address" required>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-1">
        <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
        <input data-rule-validDate="true" name="date_from_prometric_${id+1}" maxlength="10" autocomplete="off" type="text" required class=" form-control date_picker disabled:bg-slate-200" placeholder="Date From" />
   </div>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-1">
        <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
        <input data-rule-validDate="true" name="date_until_prometric_${id+1}" maxlength="10" autocomplete="off" type="text" required class=" form-control date_picker disabled:bg-slate-200" placeholder="Date Until" />
   </div>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-5">
            <input name="certificate_prometric_${id+1}" autocomplete="off" type="text" maxlength="100" class="form-control" placeholder="Certificate Holder" required>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-2">
        <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
        <input data-rule-validDate="true" name="date_until_cert_prometric_${id+1}" maxlength="10" autocomplete="off" type="text" required class=" form-control date_picker disabled:bg-slate-200" placeholder="Date Until" />
   </div>
        </div>
    </div>`;

       $("#prometric_div").append(form);
       $(".prometric_del").on("click",function(e){
           e.preventDefault();
           $(this).closest('.prometric_content').remove();
           biodata.prometric--
       })
       biodata.prometric++
       tw_elements.initTE({ Datepicker,Input });
       $(".date_picker").on("keydown",function(){
        return false;
     })
 
     $(".date_picker").on("input",function(){
         $(this).valid()
     })
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
            <input name="name_jpl_${id+1}" autocomplete="off" type="text" maxlength="100" class="form-control" placeholder="Name of School" required>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-2">
            <input name="add_jpl_${id+1}" autocomplete="off" type="text" maxlength="100" class="form-control" placeholder="School Address" required>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-1">
        <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
        <input data-rule-validDate="true" name="date_from_jpl_${id+1}" maxlength="10" autocomplete="off" type="text" required class=" form-control date_picker disabled:bg-slate-200" placeholder="Date From" />
   </div>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-1">
        <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
        <input data-rule-validDate="true" name="date_until_jpl_${id+1}" maxlength="10" autocomplete="off" type="text" required class=" form-control date_picker disabled:bg-slate-200" placeholder="Date Until" />
   </div>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-5">
            <input name="certificate_jpl_${id+1}" autocomplete="off" type="text" maxlength="100" class="form-control" placeholder="Certificate Holder" required>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-2">
        <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
        <input data-rule-validDate="true" name="date_until_cert_jpl_${id+1}" maxlength="10" autocomplete="off" type="text" required class=" form-control date_picker disabled:bg-slate-200" placeholder="Date Until" />
   </div>
        </div>
    </div>`;

       $("#jpl_div").append(form);
       tw_elements.initTE({ Datepicker,Input });
       $(".jpl_del").on("click",function(e){
           e.preventDefault();
           $(this).closest('.jpl_content').remove();
           biodata.jpl--
       })
       biodata.jpl++
       $(".date_picker").on("keydown",function(){
        return false;
     })
 
     $(".date_picker").on("input",function(){
         $(this).valid()
     })
    })

    $("#certificate_form").on("submit",function(){
        $("#certificate_form").valid();
        biodata.certificate_validator = true;
    })

    $("#certificateBtn_Prev").on("click",function(e){
        e.preventDefault()
        $("#personal_tab").trigger('click');
    })

    $("#certificate_applicable").on("click",function(e){
        if(this.checked){
            certificateValid.resetForm();
            $("#certificate_form").find("input").attr("disabled",true);
            $("#certificate_form").find("input").html("");
            $("#add_prometric").attr("disabled", true)
            $("#add_japlang_btn").attr("disabled", true)

            $("#prometric_div").html("")
            $("#jpl_div").html("")
            
        }else{
            $("#certificate_form").find("input").attr("disabled",false);
            $("#add_prometric").attr("disabled", false)
            $("#add_japlang_btn").attr("disabled", false)
        }
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
            $(window).scrollTop(0);
            
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
            <input name="name_vocational_${id+1}" autocomplete="off" type="text" maxlength="100" class="form-control" placeholder="Name of School" required>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-2">
            <input name="add_vocational_${id+1}" autocomplete="off" type="text" maxlength="100" class="form-control" placeholder="School Address" required>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-1">
        <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
        <input data-rule-validDate="true" name="date_from_vocational_${id+1}"  maxlength="10" autocomplete="off" type="text" required class="form-control date_picker disabled:bg-slate-200" placeholder="Date From" />
   </div>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-1">
        <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
        <input data-rule-validDate="true" data-rule-pastDate="true" name="date_until_vocational_${id+1}" maxlength="10" autocomplete="off" type="text" required class="form-control date_picker disabled:bg-slate-200" placeholder="Date Until" />
   </div>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-4">
            <input name="course_vocational_${id+1}" autocomplete="off" type="text" maxlength="100" class="form-control" placeholder="Course/Major" required>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-2">
            <input name="certificate_vocational_${id+1}" autocomplete="off" type="text" maxlength="100" class="form-control" placeholder="Certificate Holder" required>
        </div>
        <div class="mt-2 md:mt-0 form-group col-span-1">
        <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
        <input data-rule-validDate="true" data-rule-pastDate="true" name="date_until_cert_vocational_${id+1}" maxlength="10" autocomplete="off" type="text" required class="form-control date_picker disabled:bg-slate-200" placeholder="Date Until" />
   </div>
        </div>
    </div>`;

       $("#vocational").append(form);
       $(".delete_vocational").on("click",function(e){
           e.preventDefault();
           $(this).closest('.vocational_content').remove();
           biodata.vocational--
       })
       biodata.vocational++
       tw_elements.initTE({ Datepicker,Input });
       $(".date_picker").on("keydown",function(){
        return false;
     })
 
     $(".date_picker").on("input",function(){
         $(this).valid()
     })
    })

    $("#educational_form").on("submit",function(){
        $("#educational_form").valid();
        biodata.educational_validator = true;
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
    let emplocalValid = $("#empLocal_form").validate({
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
            biodata.local_emp_validator = true;
            $(window).scrollTop(0);
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
        let count = 0
        $(".companylocal").each(function(){
            count++
        })
        let id = biodata.local_company;
        let forms = `<div class='companylocal md:grid grid-cols-9 gap-4' id='company_${id+1}'>
        <div class='mt-2 md:mt-0 form-group col-span-9'>
            <label class='text-xl font-bold lblLocalCompany'>Company ${count+1}<span style='color:red'>*</span>:</label>
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
        <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
        <input data-rule-validDate="true" name="date_from_local_${id+1}" maxlength="10" autocomplete="off" type="text" required class="date_until_local_0 form-control date_picker disabled:bg-slate-200" placeholder="Date From" />
   </div>
        </div>
        <div class='mt-2 md:mt-0 form-group col-span-1'>
        <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
        <input data-rule-validDate="true" name="date_until_local_${id+1}" maxlength="10" autocomplete="off" type="text" required class="date_until_local_0 form-control date_picker disabled:bg-slate-200" placeholder="Date Until" />
   </div>
        </div>
        </div>
        </div>`;

        $("#local_companys").append(forms)

        $(".btnDelLocal").on("click",function(e){
            e.preventDefault();
            $(this).closest('.companylocal').remove();
            biodata.countRow("LocalCompany", "Company");
            // biodata.local_company--
        })
        biodata.local_company++
        tw_elements.initTE({ Datepicker,Input });
        $(".date_picker").on("keydown",function(){
            return false;
         })
     
         $(".date_picker").on("input",function(){
             $(this).valid()
         })

    });

    $("#local_applicable").on("click",function(e){
        if(this.checked){
            emplocalValid.resetForm();
            $("#local_companys").html("");
            $("#add_local_btn").attr("disabled", true)
            // $("#local_companys :input").val("");
            // $("#local_companys :input").removeClass("border-red-600");
            $(".companylocal :input").attr("disabled", true);
            $(".companylocal :input").val("");
            $("#local_required").html("")
            
        }else{
            $(".companylocal :input").attr("disabled", false);
            $("#add_local_btn").attr("disabled", false);
            $("#local_required").html("*")
        }
    })

    $("#empLocal_form").on("submit",function(e){
        //biodata.validateLocalEmp()

        // $("#empLocal_form").validate()
        $("#empLocal_form").valid();
        biodata.local_emp_validator = true;
        
    });

    $("#empLocalBtn_Prev").on("click",function(e){
        e.preventDefault()
        $("#education_tab").trigger('click');

    })


    //ABROAD EMP TAB ===========================================EVENT LISTENER
    let empAbroadValid = $("#empAbroad_form").validate({
               
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
            biodata.abroad_emp_validator = true;
            $(window).scrollTop(0);
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
        let count = 0
        $(".companyabroad").each(function(){
            count++
        })
        let id = biodata.abroad_company;
        let forms = `<div class='companyabroad md:grid grid-cols-9 gap-4' id='company_${id+1}'>
        <div class='mt-2 md:mt-0 form-group col-span-9'>
            <label class='text-xl font-bold lblAbroadCompany'>Company ${count+1}<span style='color:red'>*</span>:</label>
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
        <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
        <input data-rule-validDate="true" name="date_from_abroad_${id+1}" maxlength="10" autocomplete="off" type="text" required class=" form-control date_picker disabled:bg-slate-200" placeholder="Date From" />
   </div>
        </div>
        <div class='mt-2 md:mt-0 form-group col-span-1'>
        <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
        <input data-rule-validDate="true" name="date_until_abroad_${id+1}" maxlength="10" autocomplete="off" type="text" required class=" form-control date_picker disabled:bg-slate-200" placeholder="Date Until" />
   </div>
        </div>
        </div>
        </div>`;

        $("#abroad_companys").append(forms)

        $(".btnDelabroad").on("click",function(e){
            e.preventDefault();
            $(this).closest('.companyabroad').remove();
            // biodata.abroad_company--
            biodata.countRow("AbroadCompany", "Company");
            
        })
        biodata.abroad_company++
        tw_elements.initTE({ Datepicker,Input });
        $(".date_picker").on("keydown",function(){
            return false;
         })
     
         $(".date_picker").on("input",function(){
             $(this).valid()
         })

    });

    $("#abroad_applicable").on("click",function(e){
        if(this.checked){
            empAbroadValid.resetForm();
            $("#abroad_companys").html("");
            $("#add_abroad_btn").attr("disabled", true)
            $(".companyabroad :input").attr("disabled", true);
            $(".companyabroad :input").val("");
            $("#abroad_required").html("");
        }else{
            $(".companyabroad :input").attr("disabled", false);
            $("#add_abroad_btn").attr("disabled", false)
            $("#abroad_required").html("*");
        }
       
    })

    $("#empAbroad_form").on("submit",function(e){
        //biodata.validateLocalEmp()

        // $("#empLocal_form").validate()
        $("#empAbroad_form").valid();
        biodata.abroad_emp_validator = true;
        
    });

    $("#empAbroadBtn_Prev").on("click",function(e){
        e.preventDefault()
        $("#job_local_tab").trigger('click')
    })
    

    //FAMILY TAB =========================================EVENT LISTENER
    let family_form = $("#family_form").validate({
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
            $(window).scrollTop(0);
            biodata.familyData = $(form).serializeArray().reduce((obj, item) => Object.assign(obj, { [item.name]: item.value }), {})
            biodata.siblingData =[]
            biodata.childrenData = []
            biodata.relativeData = []
            biodata.japanvisitData = []
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

            for (let i = 0; $(form).find('input[name="japan_where_' + i + '"]').val() != null ; i++){
                if($('input[name="japan_where_' + i + '"]').val() != ''){
                    biodata.japanvisitData.push({
                        where:$('input[name="japan_where_' + i + '"]').val(),
                        when:$('input[name="japan_when_' + i + '"]').val(),

                    })
                }
            }

            console.log(biodata.japanvisitData)
            $("#upload_tab").removeClass('pointer-events-none')
            $("#upload_tab").trigger('click')
          }
    });

    $("#add_sibling").on("click",function(e){
        e.preventDefault();
        let id = biodata.sibling
        let form = `<div class="sibling_item col-span-13 md:grid grid-col-13 gap-4">
        <div class="form-group col-span-13">
                    <div class="flex justify-end">
                        <div class="flex items-center mr-4">
                            <input type="radio" value="1" name="sibling_${id+1}_deceased" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 " checked>
                            <label for="inline-radio" class="ml-2 text-lg text-gray-900">Available</label>
                        </div>
                        <div class="flex items-center mr-4">
                            <input type="radio" value="2" name="sibling_${id+1}_deceased" class=" w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                            <label for="inline-radio" class="ml-2 text-lg text-gray-900">Deceased</label>
                        </div>
                    </div>
                </div>
        <div class="md:mt-0 mt-2 form-group col-span-1 flex items-center">
            <button class='btnDelsibling py-2 bg-red-700 rounded w-full self-end text-sm text-white disabled:bg-red-900'>x</button>
        </div>
        <div class="form-group col-span-3">
            <label for="" class="form-label">Name<span style="color:red">*</span>:</label>
            <input name="sibling_${id+1}" autocomplete="off" type="text" maxlength="100" class="sibling_${id+1} form-control disabled:bg-slate-200" required>
        </div>
        <div class="form-group col-span-3">
            <label for="sibling_birthday" class="form-label">Birth Date<span style="color:red">*</span>:</label>
            <div class="relative" data-te-datepicker-init data-te-disable-future="true" data-te-inline="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                        <input data-rule-validDate="true" data-rule-pastDate="true" name="sibling_birthday_${id+1}" maxlength="10" autocomplete="off" type="text" required class="sibling_${id+1} form-control date_picker disabled:bg-slate-200" placeholder="MM/DD/YYYY" />
                   </div>
        </div>
        <div class="form-group col-span-3">
            <label for="lastname" class="form-label">Occupation<span class="req_sibling_${id+1}_deceased" style="color:red">*</span>:</label>
            <input name="sibling_occupation_${id+1}" autocomplete="off" type="text" maxlength="100" class="sibling_${id+1}_deceased form-control disabled:bg-slate-200" required>
        </div>
        <div class="form-group col-span-3">
            <label for="lastname" class="form-label">CP No.<span class="req_sibling_${id+1}_deceased" style="color:red">*</span>:</label>
            <input name="sibling_cp_${id+1}" autocomplete="off" type="text" maxlength="100" class="sibling_${id+1}_deceased form-control disabled:bg-slate-200" required>
        </div>
        <div class="form-group col-start-2 col-span-12">
            <label for="lastname" class="form-label">Address<span class="req_sibling_${id+1}_deceased" style="color:red">*</span>:</label>
            <input name="sibling_address_${id+1}" autocomplete="off" type="text" maxlength="100" class="sibling_${id+1}_deceased form-control disabled:bg-slate-200" required>
        </div>
    </div>`

    $("#siblings_nav").append(form)

           $(".btnDelsibling").on("click",function(e){
               e.preventDefault();
               $(this).closest('.sibling_item').remove();
            //    biodata.sibling--
           })
           biodata.sibling++;
           tw_elements.initTE({ Datepicker,Input });
           $(".date_picker").on("keydown",function(){
                return false;
            })

            $(".date_picker").on("input",function(){
                $(this).valid()
            })
            $(`input[name='sibling_${id+1}_deceased']`).on("click",function(){
                if($(this).val() == 1){
                     family_form.resetForm();
                    $(`.sibling_${id+1}_deceased`).attr("disabled",false)
                    $(`.req_sibling_${id+1}_deceased`).html("*")
                    
                    if(biodata.family_validator){
                       
                        $("#family_form").valid();
                    }
        
                }
                else if($(this).val() == 2){
                    family_form.resetForm();
                    $(`.sibling_${id+1}_deceased`).val("")
                    $(`.sibling_${id+1}_deceased`).attr("disabled",true)
                    $(`.req_sibling_${id+1}_deceased`).html("")
                    if(biodata.family_validator){
                        $("#family_form").valid();
                    }
        
                }
        
            })
     });

     $("#add_children").on("click",function(e){
        e.preventDefault();
        let id = biodata.children
        let form = `<div class="children_content w-full md:grid grid-col-13 gap-4 grid-flow-col">
        <div class="md:mt-0 mt-2 form-group col-span-1 flex items-center">
        <button  class='btnDelchildren py-2 px-3 bg-red-700 rounded w-full text-sm text-white disabled:bg-red-900'>x</button>
        </div>
        <div class="form-group col-span-7">
            <label for="lastname" class="form-label">Name<span style="color:red">*</span>:</label>
            <input name="child_${id+1}" autocomplete="off" type="text" maxlength="100" class="children form-control disabled:bg-slate-200" required>
        </div>
        <div class="form-group col-span-4">
            <label for="lastname" class="form-label">Birth Date<span style="color:red">*</span>:</label>
            <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                     <input data-rule-validDate="true" data-rule-pastDate="true" name="child_birthday_${id+1}" maxlength="10" autocomplete="off" type="text" required class="children form-control date_picker disabled:bg-slate-200" placeholder="MM/DD/YYYY" />
                </div>
        </div>
    </div>`

      $("#children").append(form);

      $(".btnDelchildren").on("click",function(e){
       e.preventDefault()
       $(this).closest('.children_content').remove();
               biodata.children --
      })
      biodata.children++
      tw_elements.initTE({ Datepicker,Input });
      $(".date_picker").on("keydown",function(){
        return false;
     })
 
     $(".date_picker").on("input",function(){
         $(this).valid()
     })
     })

     $("#add_japanvisit").on("click",function(e){
        e.preventDefault();
        let id = biodata.japanvisit
        let form = `<div class="japanvisit_content col-span-12 japan_group grid grid-cols-12 gap-5">
        <div class="form-group col-span-3 japan_group">
        </div>
        <div class="form-group col-span-1 japan_group">
            <label for="lastname" class="form-label text-white">-</label>
            <button  class='btnDeljapanvisit py-2 px-3 bg-red-700 rounded w-full text-sm text-white disabled:bg-red-900'>x</button>
        </div>
        <div class="form-group col-span-4 japan_group">
            <label for="lastname" class="form-label">Where in japan</label>
            <input name="japan_where_${id+1}" autocomplete="off" type="text" maxlength="100" class="japan form-control disabled:bg-slate-200" required>
        </div>
        <div class="form-group col-span-4 japan_group">
            <label for="lastname" class="form-label">When (kailan?)</label>
            <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                <input data-rule-validDate="true" data-rule-pastDate="true" name="japan_when_${id+1}" maxlength="10" autocomplete="off" type="text" required class="spouse form-control date_picker disabled:bg-slate-200" placeholder="MM/DD/YYYY" />
           </div>
        </div>
       </div>`

    $("#japanvisit_nav").append(form)

           $(".btnDeljapanvisit").on("click",function(e){
               e.preventDefault();
               $(this).closest('.japanvisit_content').remove();
            //    biodata.sibling--
           })
           biodata.japanvisit++;
           tw_elements.initTE({ Datepicker,Input });
           $(".date_picker").on("keydown",function(){
                return false;
            })

            $(".date_picker").on("input",function(){
                $(this).valid()
            })
     });

     $("#children_applicable").on("click",function(){
        if(this.checked){
            family_form.resetForm();
            $(".btnDelchildren").attr("disabled",true)
            $(".children").attr("disabled",true)
            $("#add_children").attr("disabled",true)
            $(".children").val("")
            $("#children").html("")
            $(".required_children").html("")
            if(biodata.family_validator){
               
                $("#family_form").valid();
            }
        }else{
            family_form.resetForm();
            $(".children").attr("disabled",false)
            $(".btnDelchildren").attr("disabled",false)
            $("#add_children").attr("disabled",false)
            $(".required_children").html("*")
            if(biodata.family_validator){
               
                $("#family_form").valid();
            }
        }
     })

     $("#sibling_applicable").on("click",function(){
        if(this.checked){
            family_form.resetForm();
            $(".btnDelsibling").attr("disabled",true)
            $(".sibling").attr("disabled",true)
            $("#add_sibling").attr("disabled",true)
            $("#siblings_nav").html("")
            $(".sibling_required").html("")
            $(".sibling").val("")
            if(biodata.family_validator){
                $("#family_form").valid();
            }
        }else{
            family_form.resetForm();
            $(".sibling").attr("disabled",false)
            $(".btnDelsibling").attr("disabled",false)
            $("#add_sibling").attr("disabled",false)
            $(".sibling_required").html("*")
            if(biodata.family_validator){
               
                $("#family_form").valid();
            }
        }
     })
     $("input[name='sibling_deceased']").on("click",function(){
        if($(this).val() == 1){
             family_form.resetForm();
            $(".sibling_deceased").attr("disabled",false)
            $(".req_sibling_deceased").html("*")
            
            if(biodata.family_validator){
               
                $("#family_form").valid();
            }

        }
        else if($(this).val() == 2){
            family_form.resetForm();
            $(".sibling_deceased").val("")
            $(".sibling_deceased").attr("disabled",true)
            $(".req_sibling_deceased").html("")
            if(biodata.family_validator){
               
                $("#family_form").valid();
            }

        }

    })
        
     $("select[name='civil_status']").on("change",function(){
        if($(this).val() == "Married"){
            family_form.resetForm();
            $(".spouse").attr("disabled",false)
            $("#spouse_required").html("")
            if(biodata.family_validator){
               
                $("#family_form").valid();
            }
        }else{
            family_form.resetForm();
            $(".spouse").attr("disabled",true)
            $("#spouse_required").html("*")
            if(biodata.family_validator){
               
                $("#family_form").valid();
            }
        }
     })

     $("#partner_applicable").on("click",function(){
        if(this.checked){
            $(".partner").attr("disabled",false)
            $(".partner_hidden").attr("hidden",false)
        }else{
            $(".partner").attr("disabled",true)
            $(".partner").val("")
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
            $(".japan").val("")
        }
    })

     $("input[name='overstay']").on("click",function(){
        if($(this).val() == 1){
            $(".overstay_group").show()
            $(".overstay").attr("disabled",false)
        }else{
            $(".overstay_group").hide()
            $(".overstay").attr("disabled",true)
            $(".overstay").val("")
        }
    })

    $("input[name='fakeidentity']").on("click",function(){
        if($(this).val() == 1){
            $(".fakeidentity_group").show()
            $(".fakeidentity").attr("disabled",false)
        }else{
            $(".fakeidentity_group").hide()
            $(".fakeidentity").attr("disabled",true)
            $(".fakeidentity").val("")
        }
    })
    $("input[name='visa']").on("click",function(){
        if($(this).val() == 1){
            $(".visa_group").show()
            $(".visa").attr("disabled",false)
        }else{
            $(".visa_group").hide()
            $(".visa").attr("disabled",true)
            $(".visa").val("")
        }
    })

    $("#add_relatives").on("click",function(e){
        e.preventDefault();
        let id = biodata.relatives
        let form = `<div class="relative_content relative_content_dynamic w-full md:grid grid-cols-13 grid-flow-col gap-4 mt-2">
        <div class="form-group col-span-1 flex items-center">
            <button  class='btnDelrelatives py-2 bg-red-700 rounded w-full text-xs font-bold text-white disabled:bg-red-900'>X</button>
        </div>
        <div class="form-group col-span-4 mt-2 md:mt-0">
            <input name="name_relative_${id+1}" autocomplete="off" type="text" maxlength="100" class="sibling form-control disabled:bg-slate-200" required placeholder="Name">
        </div>
        <div class="form-group col-span-4 mt-2 md:mt-0">
            <input name="relation_relative_${id+1}" autocomplete="off" type="text" maxlength="100" class="sibling form-control disabled:bg-slate-200" required placeholder="Relation">
        </div>
        <div class="form-group col-span-4 mt-2 md:mt-0">
            <input name="contact_relative_${id+1}" autocomplete="off" onKeyPress="if(this.value.length==20) return false;" type="number" class="sibling form-control disabled:bg-slate-200 text-right" required placeholder="Contact">
        </div>
        <div class="form-group col-span-4 mt-2 md:mt-0">
            <input name="address_relative_${id+1}" autocomplete="off" type="text" maxlength="100" class="sibling form-control disabled:bg-slate-200" required placeholder="Address in Japan">
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
            family_form.resetForm();
            $(".relative_content_dynamic").remove();
            $("#relatives :input").attr("disabled",true)
            $("#relatives :input").val("");
            $("#add_relatives").attr("disabled",true)
            if(biodata.family_validator){
               
                $("#family_form").valid();
            }
         }else{
            family_form.resetForm();
            $("#relatives :input").attr("disabled",false)
            $("#add_relatives").attr("disabled",false)
            if(biodata.family_validator){
               
                $("#family_form").valid();
            }
        }
    })

    $("input[name='father_deceased']").on("click",function(){
        if($(this).val() == 1){
             family_form.resetForm();
            $(".father_deceased").attr("disabled",false)
            $(".father_na").attr("disabled",false)
            $(".req_father_deceased").html("*")
            $(".req_father_na").html("*")
            
            if(biodata.family_validator){
               
                $("#family_form").valid();
            }

        }
        else if($(this).val() == 2){
            family_form.resetForm();
            $(".father_deceased").val("")
            $(".father_deceased").attr("disabled",true)
            $(".father_na").attr("disabled",false)
            $(".req_father_deceased").html("")
            $(".req_father_na").html("*")
            if(biodata.family_validator){
               
                $("#family_form").valid();
            }

        }else{
            family_form.resetForm();
            $(".father_na").val("")
            $(".father_deceased").val("")
            $(".father_deceased").attr("disabled",true)
            $(".father_na").attr("disabled",true)
            $(".req_father_deceased").html("")
            $(".req_father_na").html("")
            if(biodata.family_validator){
               
                $("#family_form").valid();
            }
        }

    })

    $("input[name='mother_deceased']").on("click",function(){
        if($(this).val() == 1){
            family_form.resetForm();
            $(".mother_deceased").attr("disabled",false)
            $(".mother_na").attr("disabled",false)
            $(".req_mother_deceased").html("*")
            $(".req_mother_na").html("*")
            if(biodata.family_validator){
               
                $("#family_form").valid();
            }
        }
        else if($(this).val() == 2){
            family_form.resetForm();
            $(".mother_deceased").val("")
            $(".mother_deceased").attr("disabled",true)
            $(".mother_na").attr("disabled",false)
            $(".req_mother_deceased").html("")
            $(".req_mother_na").html("*")
            if(biodata.family_validator){
               
                $("#family_form").valid();
            }
        }else{
            family_form.resetForm();
            $(".mother_na").val("")
            $(".mother_deceased").val("")
            $(".mother_deceased").attr("disabled",true)
            $(".mother_na").attr("disabled",true)
            $(".req_mother_deceased").html("")
            $(".req_mother_na").html("")
            if(biodata.family_validator){
               
                $("#family_form").valid();
            }
        }
    })

     $("#family_form").on("submit",function(e){
        $("#family_form").valid();
        biodata.family_validator = true;
     })

     $("#familyBtn_Prev").on("click",function(e){
        e.preventDefault()
        $("#job_abroad_tab").trigger("click");
     })

     $(".Number-Only").on("input change paste", function () {
        var newVal = $(this).val().replace(/[^0-9\.]/g, '');
        $(this).val(newVal.replace(/,/g, ''));
    });
     
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
        biodata.upload_validator = true;
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