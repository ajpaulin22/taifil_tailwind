
(function(){
    var tblManagementRegistration = "";
    var tblInterview = "";
    var applicantID = 0;
    var AbroadData = [];
    var tableData = [];
    var abroadCheck = [];
    var tableCheck = [];
    var ajax = $D();
    token = $("meta[name=csrf-token]").attr("content");
    
    $(document).ready(function(){
        drawDataTable();
        drawInterviewTable();
        GetJobCategories();
        GetOperations();

        $(".show").change(function(){
            var x = $(this).attr('id').split('_')[1];
            if ($(this).val() == 0){
                $(".inputs_" + x).attr('disabled', true);
                $(".inputs_" + x).val("");
            }
            else
                $(".inputs_" + x).removeAttr('disabled');
        });

        $("#btnAdd").click(function(){
            $("#mdlApplicant").modal('show');
        });

        $("#btnCreateApplicant").click(function(){
            location.href = "/client/Biodata?data=" + $("#JobType").val() +"&type=fresh";
        });

        $("#btnEdit").click(function(){
            collectCheckBoxID();
            if(tableData.length == 0){
                showMessage("Error!", "Please check a row in the table", "error", "red");
            }
            else if (tableData.length != 1){
                showMessage("Error!", "Can not select more than 1 applicant", "error", "red");
            }
            else{
                $.ajax({
                    url:"/admin/ManagementRegistration/GetPersonalData",
                    type:"GET",
                    data:{
                        _token: self.token,
                        PersonalInfoID: tableData[0].ID
                    },
                    dataType:"JSON",
                    success:function(promise){
                        location.href = "/client/Biodata?data=" + $("#JobType").val() + "&type=mod";
                    }
                });
            }
        });

        $("#btnUpdateInterview").click(function(){
            collectCheckBoxID();
            if(tableData.length == 0){
                showMessage("Error!", "Please check a row in the table", "error", "red");
            }
            else{
                tblInterview.ajax.reload(null, false);
                $("#mdlInterview").modal('show');
            }
        });
        $("#btnSaveAbroad").click(function(){
            AbroadData = [];
            $(".CheckAbroad").each(function(){
                AbroadData.push({
                    ID: $(this).val(),
                    Value: $(this).is(":checked") ? 1 : 0
                });
            });
            
            if(AbroadData.length == 0){
                showMessage("Error!", "Please check a row in To Abroad Column", "error", "red");
            }
            else{
                $.ajax({
                    url:"/admin/ManagementRegistration/SaveAbroad",
                    type:"POST",
                    data:{
                        _token: token,
                        PersonalID: AbroadData
                    },
                    dataType:"JSON",
                    beforeSend: function(){
                        $("#loading_modal").show();
                    },
                    success:function(promise){
                        $("#loading_modal").hide();
                        tblManagementRegistration.ajax.reload(null, false);
                        showMessage("Success!", "Abroad Information Was Saved Successfully", "success", "green");
                    }
                });
            }
        });

        $("#btnAddInterview").click(function(){
            $("#mdlInterview").modal('hide');
            $("#mdlAddInterview").modal('show');
        });

        $("#btnCancelAddInterview").click(function(){
            ajax.clearFromData("frmInterview");
            $("#AttendInterview").val("").trigger('change');
            $("#InterviewDate").val("");
            $("#mdlAddInterview").modal('hide');
            $("#mdlInterview").modal('show');
        });

        $("#frmInterview").submit(function(e){
            e.preventDefault();
            $.ajax({
                url:"/admin/ManagementRegistration/SaveInterview",
                type:"POST",
                data:{
                    _token: token,
                    AttendInterview: $("#AttendInterview").val(),
                    InterviewDate: $("#InterviewDate").val(),
                    Company: $("#Company").val(),
                    PersonalID: tableData
                },
                dataType:"JSON",
                beforeSend: function(){
                    $("#loading_modal").show();
                },
                success:function(promise){
                    $("#loading_modal").hide();
                    tblInterview.ajax.reload(null, false);
                    tblManagementRegistration.ajax.reload(null, false);
                    $("#mdlAddInterview").modal('hide');
                    $("#mdlInterview").modal('show');
                    showMessage("Success!", "Interview Information Was Saved Successfully", "success", "green");
                }
            });
        });


        $("#tblManagementRegistration").on("change", ".CheckItem", function () {
            var id = $(this).val()
            if ($(this).is(":checked")) {
                tableCheck.push({
                    ID: $(this).val()
                });
            } else {
                tableCheck = tableCheck.filter(function (obj) {
                    return obj.ID != id
                });
            }
            $(".CheckItem").each(function () {
                if ($(this).is(":checked")) {
                    $("#CheckAllitem").prop('checked', true);
                }
                else {
                    $("#CheckAllitem").prop('checked', false);
                    return false;
                }
            });
        });

        $("#tblManagementRegistration").on("change", ".CheckAbroad", function () {
            var id = $(this).val()
            if ($(this).is(":checked")) {
                abroadCheck.push({
                    ID: $(this).val()
                });
            } else {
                abroadCheck = abroadCheck.filter(function (obj) {
                    return obj.ID != id
                });
            }
        });

        $("#btnDelete").click(function(){
            collectCheckBoxID();
            if (tableData.length == 0){
                showMessage("Error!", "Please check a row in the table", "error", "red");
            }
            else{
                $.ajax({
                    url:"/admin/ManagementRegistration/DeleteApplicant",
                    type:"POST",
                    data:{
                        _token: token,
                        ID: tableData,
                    },
                    dataType:"JSON",
                    beforeSend: function(){
                        $("#loading_modal").show();
                    },
                    success:function(promise){
                        $("#loading_modal").hide();
                        showMessage("Success", "Applicant information was deleted successfully", "success", "green");
                        tblManagementRegistration.ajax.reload(null, false);
                    }
                })
            }
        });

        $("#Type").select2({
            placeholder: 'Select a type',
            allowClear: true
        })

        $("#btnDownloadExcel").click(function(){
            collectCheckBoxID();
            if(tableData.length != 0){
                var IDs = "";
                for (var i = 0; i < tableData.length; i++){
                    IDs = IDs + "," + tableData[i].ID;
                }
                IDs = IDs.replace(/^,|,$/g, '');
                window.location = '/admin/ManagementRegistration/ExportApplicants?IDs=' + IDs;
            }
            else{
                showMessage("Error!", "Please check a row in the table", "error", "red");
            }
        });

        $("#btnDownloadBiodata").click(function(){
            collectCheckBoxID();
            if(tableData.length != 0){
                for (var i = 0; i < tableData.length; i++){
                    window.location = '/admin/ManagementRegistration/ExportBiodata?IDs=' + tableData[i].ID;
                    // window.open('/admin/ManagementRegistration/ExportBiodata?IDs=' + tableData[i].ID, '_blank');
                }
            }
            else{
                showMessage("Error!", "Please check a row in the table", "error", "red");
            }
        })

        $(".filter").change(function(){
            tblManagementRegistration.ajax.reload(null, false);
        });

        $(".Number-Only").on("input change paste", function () {
            var newVal = $(this).val().replace(/[^0-9\.]/g, '');
            $(this).val(newVal.replace(/,/g, ''));
        });

        $("#CheckAllitem").click(function () {
            if ($(this).is(":checked")) {
                $(".CheckItem").each(function(){
                    if(!$(this).is(":checked")){
                        $(this).prop('checked', true);
                        tableCheck.push({
                            ID: $(this).val()
                        });
                    }
                });
            }
            else {
                $(".CheckItem").each(function(){
                    var id = $(this).val();
                    $(this).prop('checked', false);
                    tableCheck = tableCheck.filter(function (obj) {
                        return obj.ID != id
                    });
                });
            }
        })
    })

    function GetJobCategories(){
        $.ajax({
            url:'/admin/ManagementRegistration/get_categories',
            type:'GET',
            data:{
                _token:self.token,
            },
            dataType:"JSON",
            success:function(promise){
                $('#JobCategories')
                .find('option')
                .remove()
                .end()
                let option = `<option value=""></option>`;
                promise.forEach(data=>{
                    option += `<option value="${data.ID}">${data.Category}</option>`;
                })
                $("#JobCategories").append(option);
                $("#JobCategories").select2({
                    placeholder: 'Select a category',
                    allowClear: true
                });
            }
        })
    }

    function GetOperations(){
        $.ajax({
            url:"/admin/ManagementRegistration/get_operations",
            type:"GET",
            data:{
                _token:self.token,
            },
            dataType:"JSON",
            success:function(promise){
                $('#Operations')
                .find('option')
                .remove()
                .end()
                let option = `<option value=""></option>`;
                promise.forEach(data=>{
                    option += `<option value="${data.ID}">${data.Operation}</option>`;
                })
                $("#Operations").append(option)
                $("#Operations").select2({
                    placeholder: 'Select an operation',
                    allowClear: true
                })
            }
        })
    }

    function drawDataTable(){
        if (!$.fn.DataTable.isDataTable('#tblManagementRegistration')) {
            tblManagementRegistration = $('#tblManagementRegistration').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/admin/ManagementRegistration/GetApplicantData",
                    dataType: "JSON",
                    type: "GET",
                    data: function(d){
                        _token = token,
                        d["Type"] = $("#Type").val(),
                        d["Category"] = $("#JobCategories").val(),
                        d["Operations"] = $("#Operations").val(),
                        d["AgeFrom"] = $("#AgeFrom").val(),
                        d["AgeTo"] = $("#AgeTo").val()
                    }
                },
                // deferRender: true,
                pageLength: 10,
                order: [
                    [1, "asc"]
                ],
                paging: true,
                dataSrc:"data",
                columns:[           
                    {
                        title: "<input type='checkbox' id='CheckAllitem'/>",
                        render: function (data, row, meta){
                            return "<input type='checkbox' name='CheckItem' class='CheckItem text-center' value='" + meta.ID + "'>";
                        },
                        width: "2%", orderable: false
                    },
                    { title: 'Name', data: "Name", width: "18%"},
                    { title: 'Category', data: "Category", width: "17%"},
                    { title: 'Operation', data: "Operation", width: "17%", className: "dt-center"},
                    { title: 'JobType', data: "JobType", width: "6%", className: "dt-center"},
                    { title: 'AttendInterview', data: "AttendInterview", width: "6%", className: "dt-center"},
                    { title: 'InterviewDate', data: "InterviewDate", width: "6%", className: "dt-center"},
                    { title: 'InterviewCount', data: "InterviewCount", width: "6%", className: "dt-center"},
                    { title: 'Company', data: "Company", width:"4%", className: "dt-center"},
                    { title: 'Age', data: "Age", width:"4%", className: "dt-center"},
                    {
                        title: 'To Abroad',
                        render: function (data, row, meta){
                            return "<input type='checkbox' name='CheckAbroad' class='CheckAbroad text-center' value='" + meta.ID + "' " + (meta.ToAbroad == 1 ? 'checked' : '' ) + ">";
                        },
                        width: "2%", orderable: false, className: "dt-center"
                    },
                    { title: 'AbroadDate', data: "AbroadDate", width:"4%", className: "dt-center"},
                ],
                "drawCallback": function() {
                    for(var i = 0; i < tableCheck.length; i++){
                        $("input[name='CheckItem'][value="+ tableCheck[i].ID +"]").prop('checked', true);
                    }
                    for(var i = 0; i < abroadCheck.length; i++){
                        $("input[name='CheckAbroad'][value="+ abroadCheck[i].ID +"]").prop('checked', true);
                    }
                    
                    $(".CheckItem").each(function () {
                        if ($(this).is(":checked")) {
                            $("#CheckAllitem").prop('checked', true);
                        }
                        else {
                            $("#CheckAllitem").prop('checked', false);
                            return false;
                        }
                    });
                }
            }).on('page.dt', function() {
            });
        }
        return this;
    }

    function drawInterviewTable(){
        if (!$.fn.DataTable.isDataTable('#tblInterview')) {
            tblInterview = $('#tblInterview').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/admin/ManagementRegistration/GetInterviewHistory",
                    dataType: "JSON",
                    type: "GET",
                    data: function(d){
                        _token = token,
                        d["applicantID"] = tableData.length == 0 ? 0 : tableData
                    }
                },
                deferRender: true,
                pageLength: 10,
                order: [
                    [1, "asc"]
                ],
                columns:[
                    { title: 'Name', data: "Name", width: "7%", className: "dt-center"},
                    { title: 'AttendInterview', data: "AttendInterview", width: "7%", className: "dt-center"},
                    { title: 'InterviewDate', data: "InterviewDate", width: "28%", className: "dt-center"},
                    { title: 'Company', data: "Company", width: "65%", className: "dt-center"},
                ],
            }).on('page.dt', function() {
            });
        }
        return this;
    }

    function showMessage(title, msg, backgroundColor, color){
        iziToast.show({
            title: title,
            message: msg,
            position: 'topRight',
            backgroundColor: backgroundColor,
            theme: 'light', // dark
            color: color, // blue, red, green, yellow
            timeout: 5000,
        });
    }

    function collectCheckBoxID(){
        tableData = [];
            $(".CheckItem").each(function(){
                if($(this).is(":checked")){
                    tableData.push({
                        ID: $(this).val()
                    });
                }
            });
    }

})();