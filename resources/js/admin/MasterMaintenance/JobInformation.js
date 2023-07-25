(function(){
    // var tblCodes = "";
    var tblCategories = "";
    var tblOperations = "";
    var tblQualifications = "";
    // var dataJobCode = "";
    var dataJobCategory = "";
    var dataJobOperation = "";
    var dataJobQualification = "";
    // var JobCodeChkData = [];
    var JobCategoryChkData = [];
    var JobOperationChkData = [];
    var JobQualificationChkData = [];

    var jobCatCheck = [];
    var jobOperationCheck = [];
    var jobQualificationCheck = [];
    var ajax = $D();
    token = $("meta[name=csrf-token]").attr("content");
    // $.fn.DataTable.ext.pager.numbers_length = 4;
    $(document).ready(function(){
        // drawCodesTable();
        drawJobCategoriesTable();
        drawOperationsTable();
        drawQualificationsTable();
        //Job Code Events
        // $("#btnAddCodes").click(function(){
        //     $("#mdlCode").modal("show");
        // });

        // $("#btnSaveCode").click(function(){
        //     $.ajax({
        //         url:"/admin/MasterMaintenance/JobInformation/SaveCode",
        //         type:"POST",
        //         data:{
        //             _token: token,
        //             ID: $("#CodeID").val(),
        //             Code: $("#CodeValue").val(),
        //         },
        //         dataType:"JSON",
        //         beforeSend: function(){
        //             $("#loading_modal").show();
        //         },
        //         success:function(promise){
        //             $("#loading_modal").hide();
        //             tblCodes.ajax.reload(null, false);
        //             $("#mdlCode").modal("hide");
        //             cancelform();
        //             showMessage("Success", "Job code was saved successfully", "success", "green");
        //         }
        //     })
        // });

        // $("#btnEditCodes").click(function(){
        //     $("#CodeID").val(dataJobCode.ID);
        //     $("#CodeValue").val(dataJobCode.Code);
        //     $("#mdlCode").modal("show");
        // });

        // $("#btnCancelCode").click(function(){
        //     $(".input").val("");
        // });

        // $("#tblCodes").on("change", ".CheckItem", function () {
        //     var trData = tblCodes.row($(this).parents('tr')).data();
        //     if ($(this).is(":checked")) {
        //         JobCodeChkData.push({ ID: trData.ID});
        //     } else {
        //         JobCodeChkData = JobCodeChkData.filter(function (obj) {
        //             return obj.ID !== trData.ID;
        //         });
        //     }
        // });
        //Job Categories Events

        $("#btnAddJobCategories").click(function(){
            $("#mdlCategoryTitle").text("Create Category");
            $("#mdlCategory").modal("show");
        });

        $("#frmCategory").submit(function(e){
            e.preventDefault();
            $.ajax({
                url:"/admin/MasterMaintenance/JobInformation/SaveCategory",
                type:"POST",
                data:{
                    _token: token,
                    JobType: $("#JobType").val(),
                    CategoryID: $("#CategoryID").val(),
                    Category: $("#CategoryValue").val()
                },
                dataType:"JSON",
                beforeSend: function(){
                    $("#loading_modal").show();
                },
                success:function(promise){
                    if(promise.success){
                        $("#loading_modal").hide();
                        tblCategories.ajax.reload(null, false);
                        $("#mdlCategory").modal("hide");
                        cancelform();
                        showMessage("Success", "Job category was saved successfully", "success", "green");
                    }
                    else{
                        $("#loading_modal").hide();
                        showMessage("Error!", "Job category already exists", "error", "red");
                    }
                }
            })
        });

        // $("#btnDeleteCodes").click(function(){
        
        //     if (JobCodeChkData.length == 0){
        //         showMessage("Error", "Please check a row in code table", "error", "red");
        //     }
        //     else{
        //         $.ajax({
        //             url:"/admin/MasterMaintenance/JobInformation/DeleteJobCode",
        //             type:"POST",
        //             data:{
        //                 _token: token,
        //                 ID: JobCodeChkData,
        //             },
        //             dataType:"JSON",
        //             beforeSend: function(){
        //                 $("#loading_modal").show();
        //             },
        //             success:function(promise){
        //                 $("#loading_modal").hide();
        //                 tblCodes.ajax.reload(null, false);
        //                 showMessage("Success", "Job category was deleted successfully", "success", "green");
        //             }
        //         })
        //     }
        // });

        $("#btnEditJobCategories").click(function(){
            $("#mdlCategoryTitle").text("Update Category");
            $("#CategoryValue").val(dataJobCategory.Category);
            $("#CategoryID").val(dataJobCategory.ID);
            $("#JobType").val(dataJobCategory.JobType);
            $("#mdlCategory").modal("show");
        });

        $("#btnCancelCategory").click(function(){
            ajax.clearFromData("frmCategory");
        });

        $("#btnDeleteJobCategories").click(function(){
            $(".CheckItemCategory").each(function(){
                if($(this).is(":checked")){
                    JobCategoryChkData.push({
                        ID: $(this).val()
                    });
                }
            });
            if (JobCategoryChkData.length == 0){
                showMessage("Error!", "Please check a row in job categories table", "error", "red");
            }
            else{
                $.ajax({
                    url:"/admin/MasterMaintenance/JobInformation/DeleteJobCategory",
                    type:"POST",
                    data:{
                        _token: token,
                        ID: JobCategoryChkData,
                    },
                    dataType:"JSON",
                    beforeSend: function(){
                        $("#loading_modal").show();
                    },
                    success:function(promise){
                        $("#loading_modal").hide();
                        tblCategories.ajax.reload(null, false);
                        showMessage("Success!", "Job category was deleted successfully", "success", "green");
                    }
                })
            }
        });

        $("#tblJobCategories").on("change", ".CheckItemCategory", function () {
            $(".CheckItemCategory").each(function () {
                if ($(this).is(":checked")) {
                    $("#CheckAllitemCategory").prop('checked', true);
                }
                else {
                    $("#CheckAllitemCategory").prop('checked', false);
                    return false;
                }
            });
        });

        $("#btnViewQualification").click(function(){
                tblQualifications.ajax.reload(null, false);
                $("#mdlQualificationTable").modal('show');
        });

        //Job Operations Events

        $("#btnAddOperations").click(function(){
            $("#TextCategory").attr('readonly', true);
            $("#ValueCategory").val(dataJobCategory.ID);
            $("#TextCategory").val(dataJobCategory.Category);
            $("#mdlOperationTitle").text("Create Operation");
            $("#mdlOperation").modal("show");
        });

        $("#frmOperation").submit(function(e){
            e.preventDefault();
            $.ajax({
                url:"/admin/MasterMaintenance/JobInformation/SaveOperation",
                type:"POST",
                data:{
                    _token: token,
                    CategoryID: $("#ValueCategory").val(),
                    OperationID: $("#OperationID").val(),
                    Operation: $("#OperationValue").val()
                },
                dataType:"JSON",
                beforeSend: function(){
                    $("#loading_modal").show();
                },
                success:function(promise){
                    if(promise.success){
                        $("#loading_modal").hide();
                        tblOperations.ajax.reload(null, false);
                        $("#mdlOperation").modal("hide");
                        cancelform();
                        showMessage("Success", "Job operation was saved successfully", "success", "green");
                    }
                    else{
                        $("#loading_modal").hide();
                        showMessage("Error!", "Job operation already exists", "error", "red");
                    }
                    
                }
            })
        });

        $("#btnDeleteOperations").click(function(){
            $(".CheckItemOperation").each(function(){
                if($(this).is(":checked")){
                    JobOperationChkData.push({
                        ID: $(this).val()
                    })
                }
            });
            if (JobOperationChkData.length == 0){
                showMessage("Error", "Please check a row in operation table", "error", "red");
            }
            else{
                $.ajax({
                    url:"/admin/MasterMaintenance/JobInformation/DeleteJobOperation",
                    type:"POST",
                    data:{
                        _token: token,
                        ID: JobOperationChkData,
                    },
                    dataType:"JSON",
                    beforeSend: function(){
                        $("#loading_modal").show();
                    },
                    success:function(promise){
                        $("#loading_modal").hide();
                        tblOperations.ajax.reload(null, false);
                        showMessage("Success", "Job operation was deleted successfully", "success", "green");
                    }
                })
            }
        });

        $("#btnEditOperations").click(function(){
            $("#TextCategory").attr('readonly', true);
            $("#ValueCategory").val(dataJobCategory.ID);
            $("#TextCategory").val(dataJobCategory.Category);
            $("#OperationValue").val(dataJobOperation.Operation);
            $("#OperationID").val(dataJobOperation.ID);
            $("#mdlOperationTitle").text("Update Operation");
            $("#mdlOperation").modal("show");
        });

        $("#btnCancelOperation").click(function(){
            ajax.clearFromData("frmOperation");
        });

        //Job Qualifications Events

        $("#btnAddQualifications").click(function(){
            $("#TextCategoryQualification").attr('readonly', true);
            $("#mdlQualificationTitle").text("Add Qualification");
            $("#ValueCategoryQualification").val(dataJobOperation.ID);
            $("#TextCategoryQualification").val(dataJobOperation.Operation);
            $("#mdlQualificationTable").modal("hide");
            $("#mdlQualification").modal("show");
        });

        $("#frmQualification").submit(function(e){
            e.preventDefault();
            $.ajax({
                url:"/admin/MasterMaintenance/JobInformation/SaveQualification",
                type:"POST",
                data:{
                    _token: token,
                    OperationID: $("#ValueCategoryQualification").val(),
                    QualificationID: $("#QualificationID").val(),
                    QualificationValue: $("#QualificationValue").val()
                },
                dataType:"JSON",
                beforeSend: function(){
                    $("#loading_modal").show();
                },
                success:function(promise){
                    if(promise.success){
                        $("#loading_modal").hide();
                        tblQualifications.ajax.reload(null, false);
                        $("#mdlQualification").modal("hide");
                        $("#mdlQualificationTable").modal("show");
                        cancelform();
                        showMessage("Success", "Job qualification was saved successfully", "success", "green");
                    }
                    else{
                        $("#loading_modal").hide();
                        showMessage("Error!", "Job qualification already exists", "error", "red");
                    }
                    
                }
            })
        });

        $("#btnEditQualifications").click(function(){
            $("#TextCategoryQualification").attr('readonly', true);
            $("#mdlQualificationTitle").text("Update Qualification");
            $("#ValueCategoryQualification").val(dataJobOperation.ID);
            $("#TextCategoryQualification").val(dataJobOperation.Operation);
            $("#QualificationValue").val(dataJobQualification.Qualification);
            $("#QualificationID").val(dataJobQualification.ID);
            $("#mdlQualificationTable").modal("hide");
            $("#mdlQualification").modal("show");   
        });

        $("#btnCancelQualification").click(function(){
            $("#mdlQualification").modal("hide");
            $("#mdlQualificationTable").modal("show");
            ajax.clearFromData("frmQualification");
        });

        $("#btnDeleteQualifications").click(function(){
            if (jobQualificationCheck.length == 0){
                showMessage("Error", "Please check a row in operation table", "error", "red");
            }
            else{
                $.ajax({
                    url:"/admin/MasterMaintenance/JobInformation/DeleteJobQualification",
                    type:"POST",
                    data:{
                        _token: token,
                        ID: jobQualificationCheck,
                    },
                    dataType:"JSON",
                    beforeSend: function(){
                        $("#loading_modal").show();
                    },
                    success:function(promise){
                        $("#loading_modal").hide();
                        tblQualifications.ajax.reload(null, false);
                        showMessage("Success", "Job qualification was deleted successfully", "success", "green");
                    }
                })
            }
        });

        // $("#tblCodes").on("change", ".CheckItem", function () {
        //     var trData = tblCodes.row($(this).parents('tr')).data();
        //     if ($(this).is(":checked")) {
        //         JobCodeChkData.push({ ID: trData.ID});
        //     } else {
        //         JobCodeChkData = JobCodeChkData.filter(function (obj) {
        //             return obj.ID !== trData.ID;
        //         });
        //     }
        // });

        //////////////////////////////////////////////////////////////

        $("#tblOperations").on("change", ".CheckItemOperation", function () {
            $(".CheckItemOperation").each(function () {
                if ($(this).is(":checked")) {
                    $("#CheckAllitemOperation").prop('checked', true);
                }
                else {
                    $("#CheckAllitemOperation").prop('checked', false);
                    return false;
                }
            });
        });

        // $('#tblCodes tbody').on('click', 'tr', function(e){
        //     dataJobCode = tblCodes.row($(this)).data();
        //     switch (e.target.localName) {
        //         case "button":
        //             break;
        //         case "span":
        //             break;
        //         case "checkbox":
        //             break;
        //         case "i":
        //             break;
        //         case "textbox":
        //             break;
        //         case "input":
        //             break;
        //         default:
        //             if($.trim(dataJobCode) != ""){
        //                 if ($(this).hasClass('selected')) {
        //                     dataJobCode = "";
        //                     $("#btnEditCodes").attr('disabled', true);
        //                     $("#btnAddJobCategories").attr('disabled', true);
        //                     tblCodes.$('tr.selected').removeClass('selected');
        //                 }
        //                 else {
        //                     $("#btnEditCodes").removeAttr('disabled');
        //                     $("#btnAddJobCategories").removeAttr('disabled');
        //                     tblCodes.$('tr.selected').removeClass('selected');
        //                     $(this).addClass('selected');
        //                 }
        //             }

        //             $(".CodeDisable").attr('disabled', true);
        //             dataJobCategory = "";
        //             dataJobOperation = "";
        //             dataQualification = "";
        //             tblCategories.ajax.reload(null, false);
        //             tblOperations.ajax.reload(null, false);
        //             tblQualifications.ajax.reload(null, false);
        //             break;
        //     }
        // });
    
        $('#tblJobCategories tbody').on('click', 'tr', function(e){
            dataJobCategory = tblCategories.row($(this)).data();
            jobOperationCheck = [];
            switch (e.target.localName) {
                case "button":
                    break;
                case "span":
                    break;
                case "checkbox":
                    break;
                case "i":
                    break;
                case "textbox":
                    break;
                case "input":
                    break;
                default:
                    if ($.trim(dataJobCategory) != ""){
                        if ($(this).hasClass('selected')) {
                            $("#btnEditJobCategories").attr('disabled', true);
                            $("#btnAddOperations").attr('disabled', true);
                            dataJobCategory = "";
                            tblCategories.$('tr.selected').removeClass('selected');
                        }
                        else {
                            $("#btnEditJobCategories").removeAttr('disabled');
                            $("#btnAddOperations").removeAttr('disabled', true);
                            tblCategories.$('tr.selected').removeClass('selected');
                            $(this).addClass('selected');
                        }
                        $(".CategoryDisable").attr('disabled', true);
                        dataJobOperation = "";
                        dataQualification = "";
                        tblOperations.ajax.reload(null, false);
                        break;
                    }
            }
        });

        $('#tblOperations tbody').on('click', 'tr', function(e){
            dataJobOperation = tblOperations.row($(this)).data();
            switch (e.target.localName) {
                case "button":
                    break;
                case "span":
                    break;
                case "checkbox":
                    break;
                case "i":
                    break;
                case "textbox":
                    break;
                case "input":
                    break;
                default:
                    if ($.trim(dataJobOperation) != ""){
                        if ($(this).hasClass('selected')) {
                            $("#btnEditOperations").attr('disabled', true);
                            $("#btnViewQualification").attr('disabled', true);
                            dataJobOperation = "";
                            tblOperations.$('tr.selected').removeClass('selected');
                        }
                        else {
                            $("#btnEditOperations").removeAttr('disabled');
                            $("#btnViewQualification").removeAttr('disabled');
                            tblOperations.$('tr.selected').removeClass('selected');
                            $(this).addClass('selected');
                        }
                        break;
                    }
            }
        });

        $('#tblQualifications tbody').on('click', 'tr', function(e){
            dataJobQualification = tblQualifications.row($(this)).data();
            switch (e.target.localName) {
                case "button":
                    break;
                case "span":
                    break;
                case "checkbox":
                    break;
                case "i":
                    break;
                case "textbox":
                    break;
                case "input":
                    break;
                default:
                    if ($.trim(dataJobQualification) != ""){
                        if ($(this).hasClass('selected')) {
                            $("#btnEditQualifications").attr('disabled', true);
                            dataJobQualification = "";
                            tblQualifications.$('tr.selected').removeClass('selected');
                        }
                        else {
                            $("#btnEditQualifications").removeAttr('disabled');
                            tblQualifications.$('tr.selected').removeClass('selected');
                            $(this).addClass('selected');
                        }
                        break;
                    }
            }
        });

        //END OF EVENTS

        $("#btnSaveHiring").click(function(){
            var hiringData = [];
            $(".CheckHiring").each(function(){
                hiringData.push({
                    ID: $(this).val(),
                    Value: $(this).is(":checked") ? 1 : 0
                })
            })
            if(hiringData.length == 0){
                showMessage("Error!", "Please check a row in Hiring Column", "error", "red");
            }
            else{
                $.ajax({
                    url:"/admin/MasterMaintenance/JobInformation/SaveHiring",
                    type:"POST",
                    data:{
                        _token: token,
                        PersonalID: hiringData
                    },
                    dataType:"JSON",
                    beforeSend: function(){
                        $("#loading_modal").show();
                    },
                    success:function(promise){
                        $("#loading_modal").hide();
                        tblOperations.ajax.reload(null, false);
                        showMessage("Success!", "Hiring Information Was Saved Successfully", "success", "green");
                    }
                });
            }
        });

        $("#tblJobCategories").on("change", ".CheckItemCategory", function () {
            var id = $(this).val()
            if ($(this).is(":checked")) {
                jobCatCheck.push({
                    ID: $(this).val()
                });
            } else {
                jobCatCheck = jobCatCheck.filter(function (obj) {
                    return obj.ID != id
                });
            }
            $(".CheckItemCategory").each(function () {
                if ($(this).is(":checked")) {
                    $("#CheckAllitemCategory").prop('checked', true);
                }
                else {
                    $("#CheckAllitemCategory").prop('checked', false);
                    return false;
                }
            });
        });

        $("#CheckAllitemCategory").click(function () {
            if ($(this).is(":checked")) {
                $(".CheckItemCategory").each(function(){
                    if(!$(this).is(":checked")){
                        $(this).prop('checked', true);
                        jobCatCheck.push({
                            ID: $(this).val()
                        });
                    }
                });
            }
            else {
                $(".CheckItemCategory").each(function(){
                    var id = $(this).val();
                    $(this).prop('checked', false);
                    jobCatCheck = jobCatCheck.filter(function (obj) {
                        return obj.ID != id
                    });
                });
            }
        });

        $("#tblOperations").on("change", ".CheckItemOperation", function () {
            var id = $(this).val()
            if ($(this).is(":checked")) {
                jobOperationCheck.push({
                    ID: $(this).val()
                });
            } else {
                jobOperationCheck = jobOperationCheck.filter(function (obj) {
                    return obj.ID != id
                });
            }
            $(".CheckItemOperation").each(function () {
                if ($(this).is(":checked")) {
                    $("#CheckAllitemOperation").prop('checked', true);
                }
                else {
                    $("#CheckAllitemOperation").prop('checked', false);
                    return false;
                }
            });
        });

        $("#CheckAllitemOperation").click(function () {
            if ($(this).is(":checked")) {
                $(".CheckItemOperation").each(function(){
                    if(!$(this).is(":checked")){
                        $(this).prop('checked', true);
                        jobOperationCheck.push({
                            ID: $(this).val()
                        });
                    }
                });
            }
            else {
                $(".CheckItemOperation").each(function(){
                    var id = $(this).val();
                    $(this).prop('checked', false);
                    jobOperationCheck = jobOperationCheck.filter(function (obj) {
                        return obj.ID != id
                    });
                });
            }
        });

        $("#tblQualifications").on("change", ".CheckItemQualification", function () {
            var id = $(this).val()
            if ($(this).is(":checked")) {
                jobQualificationCheck.push({
                    ID: $(this).val()
                });
            } else {
                jobQualificationCheck = jobQualificationCheck.filter(function (obj) {
                    return obj.ID != id
                });
            }
            $(".CheckItemQualification").each(function () {
                if ($(this).is(":checked")) {
                    $("#CheckAllitemQualification").prop('checked', true);
                }
                else {
                    $("#CheckAllitemQualification").prop('checked', false);
                    return false;
                }
            });
        });

        $("#CheckAllitemQualification").click(function () {
            if ($(this).is(":checked")) {
                $(".CheckItemQualification").each(function(){
                    if(!$(this).is(":checked")){
                        $(this).prop('checked', true);
                        jobQualificationCheck.push({
                            ID: $(this).val()
                        });
                    }
                });
            }
            else {
                $(".CheckItemQualification").each(function(){
                    var id = $(this).val();
                    $(this).prop('checked', false);
                    jobQualificationCheck = jobQualificationCheck.filter(function (obj) {
                        return obj.ID != id
                    });
                });
            }
        });
    });

    // function drawCodesTable(){
    //     if (!$.fn.DataTable.isDataTable('#tblCodes')) {
    //         tblCodes = $('#tblCodes').DataTable({
    //             processing: true,
    //             serverSide: true,
    //             "order": [
    //                 [1, "asc"]
    //             ],
    //             ajax: {
    //                 url: "/admin/MasterMaintenance/JobInformation/GetJobCode",
    //                 dataType: "JSON",
    //                 type: "GET",
    //             },
    //             deferRender: true,
    //             pageLength: 10,
    //             lengthMenu: [
    //                 [10, 20, 50, 100, 150, 200, 500, -1],
    //                 [10, 20, 50, 100, 150, 200, 500, "All"]
    //             ],
    //             language: {
    //                 aria: {
    //                     sortAscending: ": activate to sort column ascending",
    //                     sortDescending: ": activate to sort column descending"
    //                 },
    //                 emptyTable: "No data available in table",
    //                 info: "Showing _START_ to _END_ of _TOTAL_ records",
    //                 infoEmpty: "No records found",
    //                 infoFiltered: "(filtered1 from _MAX_ total records)",
    //                 lengthMenu: "Show _MENU_",
    //                 search: "Search:",
    //                 zeroRecords: "No matching records found",
    //                 paginate: {
    //                     "previous": "Prev",
    //                     "next": "Next",
    //                     "last": "Last",
    //                     "first": "First"
    //                 }
    //             },
    //             columns:[
    //                         {
    //                             title: "<input type='checkbox' id='CheckAllitem' />",
    //                             render: function (data, row, meta){
    //                                 return "<input type='checkbox' class='CheckItem text-center JobCodeschkbox' value='" + meta.ID + "'>";
    //                             },
    //                             width: "2%", orderable: false
    //                         },
    //                         { data: 'Code', name: 'Code', title: "Code"},
    //                     ],
    //         }).on('page.dt', function() {
    //         });
    //     }
    //     return this;
    // }

    function drawJobCategoriesTable(){
        if (!$.fn.DataTable.isDataTable('#tblJobCategories')) {
            tblCategories = $('#tblJobCategories').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/admin/MasterMaintenance/JobInformation/GetJobCategory",
                    dataType: "JSON",
                    type: "GET",
                    data: function(d){
                    }
                },
                deferRender: true,
                pageLength: 10,
                order: [
                    [1, "asc"]
                ],
                autowidth: false,
                columns:[
                            {
                                title: "<input type='checkbox' id='CheckAllitemCategory' />",
                                render: function (data, row, meta){
                                    return "<input type='checkbox' name='CheckItemCategory' class='CheckItemCategory text-center' value='" + meta.ID + "'>";
                                },
                                width: "2%", orderable: false
                            },
                            { data: 'JobType', name: 'JobType' ,orderable: true, title: "Job Type"},
                            { data: 'Category', name: 'Category' ,orderable: true, title: "Category"},
                ],
                "drawCallback": function() {
                    for(var i = 0; i < jobCatCheck.length; i++){
                        $("input[name='CheckItemCategory'][value="+ jobCatCheck[i].ID +"]").prop('checked', true);
                    }
                    
                    $(".CheckItemCategory").each(function () {
                        if ($(this).is(":checked")) {
                            $("#CheckAllitemCategory").prop('checked', true);
                        }
                        else {
                            $("#CheckAllitemCategory").prop('checked', false);
                            return false;
                        }
                    });
                },
            }).on('page.dt', function() {
            });
        }
        return this;
    }

    function drawOperationsTable(){
        if (!$.fn.DataTable.isDataTable('#tblOperations')) {
            tblOperations = $('#tblOperations').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/admin/MasterMaintenance/JobInformation/GetJobOperation",
                    dataType: "JSON",
                    type: "GET",
                    data: function(d){
                        d["ID"] = dataJobCategory == "" ? 0 : dataJobCategory.ID
                    }
                },
                deferRender: true,
                pageLength: 10,
                order: [
                    [1, "asc"]
                ],
                columns:[
                            {
                                title: "<input type='checkbox' id='CheckAllitemOperation' />",
                                render: function (data, row, meta){
                                    return "<input type='checkbox' name='CheckItemOperation' class='CheckItemOperation text-center' value='" + meta.ID + "'>";
                                },
                                width: "2%", orderable: false
                            },
                            { data: 'Operation', name: 'Operation' ,orderable: true, title: "Operation"},
                            {
                                title: "Hiring",
                                render: function (data, row, meta){
                                    return "<input type='checkbox' class='CheckHiring text-center' value='" + meta.ID + "' " + (meta.Hiring == 1 ? 'checked' : '' ) +">";
                                },
                                width: "2%", orderable: false
                            },
                ],
                "drawCallback": function() {
                    $("#btnViewQualification").attr('disabled', true);
                    for(var i = 0; i < jobOperationCheck.length; i++){
                        $("input[name='CheckItemOperation'][value="+ jobOperationCheck[i].ID +"]").prop('checked', true);
                    }
                    
                    $(".CheckItemOperation").each(function () {
                        if ($(this).is(":checked")) {
                            $("#CheckAllitemOperation").prop('checked', true);
                        }
                        else {
                            $("#CheckAllitemOperation").prop('checked', false);
                            return false;
                        }
                    });
                },
            }).on('page.dt', function() {
            });
        }
        return this;
    }

    function drawQualificationsTable(){
        if (!$.fn.DataTable.isDataTable('#tblQualifications')) {
            tblQualifications = $('#tblQualifications').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/admin/MasterMaintenance/JobInformation/GetQualification",
                    dataType: "JSON",
                    type: "GET",
                    data: function(d){
                        d["ID"] = dataJobOperation == "" ? 0 : dataJobOperation.ID
                    }
                },
                deferRender: true,
                pageLength: 10,
                order: [
                    [1, "asc"]
                ],
                columns:[
                            {
                                title: "<input type='checkbox' id='CheckAllitemQualification' />",
                                render: function (data, row, meta){
                                    return "<input type='checkbox' name='CheckItemQualification' class='CheckItemQualification text-center' value='" + meta.ID + "'>";
                                },
                                width: "2%", orderable: false
                            },
                            { data: 'Qualification', name: 'Qualification' ,orderable: true, title: "Qualification"},
                ],
                "drawCallback": function() {
                    for(var i = 0; i < jobQualificationCheck.length; i++){
                        $("input[name='CheckItemQualification'][value="+ jobQualificationCheck[i].ID +"]").prop('checked', true);
                    }
                    
                    $(".CheckItemQualification").each(function () {
                        if ($(this).is(":checked")) {
                            $("#CheckAllitemQualification").prop('checked', true);
                        }
                        else {
                            $("#CheckAllitemQualification").prop('checked', false);
                            return false;
                        }
                    });
                },
            }).on('page.dt', function() {
            });
        }
        return this;
    }

    function cancelform(){
        // ajax.clearFromData("frmCode");
        ajax.clearFromData("frmCategory");
        ajax.clearFromData("frmOperation");
        ajax.clearFromData("frmQualification");
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
})();