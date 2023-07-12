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
            $("#mdlCategory").modal("show");
        });

        $("#btnSaveCategory").click(function(){
            $.ajax({
                url:"/admin/MasterMaintenance/JobInformation/SaveCategory",
                type:"POST",
                data:{
                    _token: token,
                    CategoryID: $("#CategoryID").val(),
                    CategoryValue: $("#CategoryValue").val()
                },
                dataType:"JSON",
                beforeSend: function(){
                    $("#loading_modal").show();
                },
                success:function(promise){
                    $("#loading_modal").hide();
                    tblCategories.ajax.reload(null, false);
                    $("#mdlCategory").modal("hide");
                    cancelform();
                    showMessage("Success", "Job category was saved successfully", "success", "green");
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
            $("#ValueCode").val(dataJobCode.ID);
            $("#TextCode").val(dataJobCode.Code);
            $("#CategoryValue").val(dataJobCategory.Category);
            $("#CategoryID").val(dataJobCategory.ID);
            $("#mdlCategory").modal("show");
        });

        $("#btnCancelCategory").click(function(){
            $(".input").val("");
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
            $("#ValueCategory").val(dataJobCategory.ID);
            $("#TextCategory").val(dataJobCategory.Category);
            $("#mdlOperation").modal("show");
        });

        $("#btnSaveOperation").click(function(){
            $.ajax({
                url:"/admin/MasterMaintenance/JobInformation/SaveOperation",
                type:"POST",
                data:{
                    _token: token,
                    CategoryID: $("#ValueCategory").val(),
                    OperationID: $("#OperationID").val(),
                    OperationValue: $("#OperationValue").val()
                },
                dataType:"JSON",
                beforeSend: function(){
                    $("#loading_modal").show();
                },
                success:function(promise){
                    $("#loading_modal").hide();
                    tblOperations.ajax.reload(null, false);
                    $("#mdlOperation").modal("hide");
                    cancelform();
                    showMessage("Success", "Job operation was saved successfully", "success", "green");
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
            $("#ValueCategory").val(dataJobCategory.ID);
            $("#TextCategory").val(dataJobCategory.Category);
            $("#OperationValue").val(dataJobOperation.Operation);
            $("#OperationID").val(dataJobOperation.ID);
            $("#mdlOperation").modal("show");
        });

        $("#btnCancelOperation").click(function(){
            $(".input").val("");
        });

        //Job Qualifications Events

        $("#btnAddQualifications").click(function(){
            $("#ValueCategoryQualification").val(dataJobCategory.ID);
            $("#TextCategoryQualification").val(dataJobCategory.Category);
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
                    CategoryID: $("#ValueCategoryQualification").val(),
                    QualificationID: $("#QualificationID").val(),
                    QualificationValue: $("#QualificationValue").val()
                },
                dataType:"JSON",
                beforeSend: function(){
                    $("#loading_modal").show();
                },
                success:function(promise){
                    $("#loading_modal").hide();
                    tblQualifications.ajax.reload(null, false);
                    $("#mdlQualification").modal("hide");
                    cancelform();
                    showMessage("Success", "Job qualification was saved successfully", "success", "green");
                }
            })
        });

        $("#btnEditQualifications").click(function(){
            $("#ValueCategoryQualification").val(dataJobCategory.ID);
            $("#TextCategoryQualification").val(dataJobCategory.Category);
            $("#QualificationValue").val(dataJobQualification.Qualification);
            $("#QualificationID").val(dataJobQualification.ID);
            $("#mdlQualificationTable").modal("hide");
            $("#mdlQualification").modal("show");
        });

        $("#btnCancelQualification").click(function(){
            $("#mdlQualification").modal("hide");
            $("#mdlQualificationTable").modal("show");
            $(".input").val("");
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
                            $("#btnViewQualification").attr('disabled', true);
                            dataJobCategory = "";
                            tblCategories.$('tr.selected').removeClass('selected');
                        }
                        else {
                            $("#btnEditJobCategories").removeAttr('disabled');
                            $("#btnAddOperations").removeAttr('disabled', true);
                            $("#btnViewQualification").removeAttr('disabled');
                            tblCategories.$('tr.selected').removeClass('selected');
                            $(this).addClass('selected');
                        }
                        $(".CategoryDisable").attr('disabled', true);
                        dataJobOperation = "";
                        dataQualification = "";
                        tblOperations.ajax.reload(null, false);
                        tblQualifications.ajax.reload(null, false);
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
                            dataJobOperation = "";
                            tblOperations.$('tr.selected').removeClass('selected');
                        }
                        else {
                            $("#btnEditOperations").removeAttr('disabled');
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

        
        $("#CheckAllitemCategory").click(function () {
            if ($(this).is(":checked")) {
                $(".CheckItemCategory").prop('checked', true);
            }
            else {
                $(".CheckItemCategory").prop('checked', false);
            }
        })

        $("#CheckAllitemOperation").click(function () {
            if ($(this).is(":checked")) {
                $(".CheckItemOperation").prop('checked', true);
            }
            else {
                $(".CheckItemOperation").prop('checked', false);
            }
        })
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
                                    return "<input type='checkbox' class='CheckItemCategory text-center' value='" + meta.ID + "'>";
                                },
                                width: "2%", orderable: false
                            },
                            { data: 'JobType', name: 'JobType' ,orderable: true, title: "Job Type"},
                            { data: 'Category', name: 'Category' ,orderable: true, title: "Category"},
                        ],
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
                                    return "<input type='checkbox' class='CheckItemOperation text-center' value='" + meta.ID + "'>";
                                },
                                width: "2%", orderable: false
                            },
                            { data: 'Operation', name: 'Operation' ,orderable: true, title: "Operation"},
                        ],
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
                                title: "<input type='checkbox' id='CheckAllitem' />",
                                render: function (data, row, meta){
                                    return "<input type='checkbox' class='CheckItem text-center' value='" + meta.ID + "'>";
                                },
                                width: "2%", orderable: false
                            },
                            { data: 'Qualification', name: 'Qualification' ,orderable: true, title: "Qualification"},
                        ],
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