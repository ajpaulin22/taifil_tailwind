(function(){
    var tblCodes = "";
    var tblCategories = "";
    var tblOperations = "";
    var dataJobCode = "";
    var dataJobCategory = "";
    var dataJobOperation = "";
    var JobCodeChkData = [];
    var JobCategoryChkData = [];
    var JobOperationChkData = [];
    var ajax = $D();
    token = $("meta[name=csrf-token]").attr("content");
    $(document).ready(function(){
        drawCodesTable();
        drawJobCategoriesTable();
        drawOperationsTable();
        //Job Code Events
        $("#btnAddCodes").click(function(){

            $("#mdlCode").modal("show");
        });

        $("#btnSaveCode").click(function(){
            $.ajax({
                url:"/admin/MasterMaintenance/JobInformation/SaveCode",
                type:"POST",
                data:{
                    _token: token,
                    ID: $("#CodeID").val(),
                    Code: $("#CodeValue").val(),
                },
                dataType:"JSON",
                success:function(promise){
                    tblCodes.ajax.reload(null, false);
                    $("#mdlCode").modal("hide");
                    cancelform();
                    showMessage("Success", "Job code was saved successfully", "success", "green");
                }

            })
        });

        $("#btnDeleteCodes").click(function(){
            var data = {_token: token, ID: JobCodeChkData}
            $.ajax({
                url:"/admin/MasterMaintenance/JobInformation/DeleteJobCode",
                type:"POST",
                data:{
                    _token: token,
                    ID: JobCodeChkData,
                },
                dataType:"JSON",
                success:function(promise){
                    tblCodes.ajax.reload(null, false);
                    showMessage("Success", "Job code was deleted successfully", "success", "green");
                }
            })
        });

        $("#btnEditCodes").click(function(){
            $("#CodeID").val(dataJobCode.ID);
            $("#CodeValue").val(dataJobCode.Code);
            $("#mdlCode").modal("show");
        });

        $("#btnCancelCode").click(function(){
            cancelform();
        });

        $("#tblCodes").on("change", ".CheckItem", function () {
            var trData = tblCodes.row($(this).parents('tr')).data();
            if ($(this).is(":checked")) {
                JobCodeChkData.push({ ID: trData.ID});
            } else {
                JobCodeChkData = JobCodeChkData.filter(function (obj) {
                    return obj.ID !== trData.ID;
                });
            }
        });
        //Job Categories Events

        $("#btnAddJobCategories").click(function(){
            $("#ValueCode").val(dataJobCode.ID);
            $("#TextCode").val(dataJobCode.Code);
            $("#mdlCategory").modal("show");
        });

        $("#btnSaveCategory").click(function(){
            $.ajax({
                url:"/admin/MasterMaintenance/JobInformation/SaveCategory",
                type:"POST",
                data:{
                    _token: token,
                    CodeID: $("#ValueCode").val(),
                    CategoryID: $("#CategoryID").val(),
                    CategoryValue: $("#CategoryValue").val()
                },
                dataType:"JSON",
                success:function(promise){
                    tblCategories.ajax.reload(null, false);
                    $("#mdlCategory").modal("hide");
                    cancelform();
                    showMessage("Success", "Job category was saved successfully", "success", "green");
                }
            })
        });

        $("#btnDeleteCodes").click(function(){
            if (JobCodeChkData.length == 0){
                showMessage("Error", "Please check a row in code table", "error", "red");
            }
            else{
                $.ajax({
                    url:"/admin/MasterMaintenance/JobInformation/DeleteJobCode",
                    type:"POST",
                    data:{
                        _token: token,
                        ID: JobCodeChkData,
                    },
                    dataType:"JSON",
                    success:function(promise){
                        tblCodes.ajax.reload(null, false);
                        showMessage("Success", "Job category was deleted successfully", "success", "green");
                    }
                })
            }
            
        });

        $("#btnEditJobCategories").click(function(){
            $("#ValueCode").val(dataJobCode.ID);
            $("#TextCode").val(dataJobCode.Code);
            $("#CategoryValue").val(dataJobCategory.Category);
            $("#CategoryID").val(dataJobCategory.ID);
            $("#mdlCategory").modal("show");
        });

        $("#btnCancelCategory").click(function(){
            cancelform();
        });

        $("#btnDeleteJobCategories").click(function(){
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
                    success:function(promise){
                        tblCategories.ajax.reload(null, false);
                        showMessage("Success!", "Job category was deleted successfully", "success", "green");
                    }
                })
            }
            
        });

        $("#tblJobCategories").on("change", ".CheckItem", function () {
            var trData = tblCategories.row($(this).parents('tr')).data();
            if ($(this).is(":checked")) {
                JobCategoryChkData.push({ ID: trData.ID});
            } else {
                JobCategoryChkData = JobCategoryChkData.filter(function (obj) {
                    return obj.ID !== trData.ID;
                });
            }
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
                success:function(promise){
                    tblOperations.ajax.reload(null, false);
                    $("#mdlOperation").modal("hide");
                    cancelform();
                    showMessage("Success", "Job operation was saved successfully", "success", "green");
                }
            })
        });

        $("#btnDeleteOperations").click(function(){
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
                    success:function(promise){
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
            cancelform();
        });

        $("#tblOperations").on("change", ".CheckItem", function () {
            var trData = tblOperations.row($(this).parents('tr')).data();
            if ($(this).is(":checked")) {
                JobOperationChkData.push({ ID: trData.ID});
            } else {
                JobOperationChkData = JobOperationChkData.filter(function (obj) {
                    return obj.ID !== trData.ID;
                });
            }
        });

        $('#tblCodes tbody').on('click', 'tr', function(e){
            dataJobCode = tblCodes.row($(this)).data();
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
                    if ($.trim(dataJobCode) != "") {
                        if ($(this).hasClass('selected')) {
                            dataJobCode = "";
                            $("#btnEditCodes").attr('disabled', true);
                            tblCodes.$('tr.selected').removeClass('selected');
                            tblCategories.clear();
                            tblCategories.draw();
                            tblOperations.clear();
                            tblOperations.draw();
                        }
                        else {
                            tblCodes.$('tr.selected').removeClass('selected');
                            $("#btnEditCodes").removeAttr('disabled');
                            $(this).addClass('selected');
                            tblCategories.ajax.reload(null,false);
                            tblOperations.clear();
                            tblOperations.draw();
                        }
                    }
                    break;
            }
        });
    
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
                    if ($.trim(dataJobCategory) != "") {
                        if ($(this).hasClass('selected')) {
                            $("#btnEditJobCategories").attr('disabled', true);
                            dataJobCategory = "";
                            tblCategories.$('tr.selected').removeClass('selected');
                        }
                        else {
                            $("#btnEditJobCategories").removeAttr('disabled');
                            tblCategories.$('tr.selected').removeClass('selected');
                            $(this).addClass('selected');
                            tblOperations.ajax.reload(null,false)
                        }
                    }
                    break;
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
                    if ($.trim(dataJobOperation) != "") {
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
                    }
                    break;
            }
        });
    });

    function drawCodesTable(){
        if (!$.fn.DataTable.isDataTable('#tblCodes')) {
            tblCodes = $('#tblCodes').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/admin/MasterMaintenance/JobInformation/GetJobCode",
                    dataType: "JSON",
                    type: "GET",
                },
                deferRender: true,
                pageLength: 10,
                order: [
                    [0, "desc"]
                ],
                lengthMenu: [
                    [10, 20, 50, 100, 150, 200, 500, -1],
                    [10, 20, 50, 100, 150, 200, 500, "All"]
                ],
                language: {
                    aria: {
                        sortAscending: ": activate to sort column ascending",
                        sortDescending: ": activate to sort column descending"
                    },
                    emptyTable: "No data available in table",
                    info: "Showing _START_ to _END_ of _TOTAL_ records",
                    infoEmpty: "No records found",
                    infoFiltered: "(filtered1 from _MAX_ total records)",
                    lengthMenu: "Show _MENU_",
                    search: "Search:",
                    zeroRecords: "No matching records found",
                    paginate: {
                        "previous": "Prev",
                        "next": "Next",
                        "last": "Last",
                        "first": "First"
                    }
                },
                columns:[
                            {
                                title: "<input type='checkbox' id='CheckAllitem' />",
                                render: function (data, row, meta){
                                    return "<input type='checkbox' class='CheckItem text-center JobCodeschkbox' value='" + meta.ID + "'>";
                                },
                                width: "2%"
                            },
                            { data: 'Code', name: 'Code' ,orderable: true, title: "Code"},
                        ],
            }).on('page.dt', function() {
            });
        }
        return this;
    }
    
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
                        d["ID"] = dataJobCode == "" ? 0 : dataJobCode.ID
                    }
                },
                deferRender: true,
                pageLength: 10,
                order: [
                    [0, "desc"]
                ],
                lengthMenu: [
                    [10, 20, 50, 100, 150, 200, 500, -1],
                    [10, 20, 50, 100, 150, 200, 500, "All"]
                ],
                language: {
                    aria: {
                        sortAscending: ": activate to sort column ascending",
                        sortDescending: ": activate to sort column descending"
                    },
                    emptyTable: "No data available in table",
                    info: "Showing _START_ to _END_ of _TOTAL_ records",
                    infoEmpty: "No records found",
                    infoFiltered: "(filtered1 from _MAX_ total records)",
                    lengthMenu: "Show _MENU_",
                    search: "Search:",
                    zeroRecords: "No matching records found",
                    paginate: {
                        "previous": "Prev",
                        "next": "Next",
                        "last": "Last",
                        "first": "First"
                    }
                },
                columns:[
                            {
                                title: "<input type='checkbox' id='CheckAllitem' />",
                                render: function (data, row, meta){
                                    return "<input type='checkbox' class='CheckItem text-center' value='" + meta.ID + "'>";
                                },
                                width: "2%"
                            },
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
                    [0, "desc"]
                ],
                lengthMenu: [
                    [10, 20, 50, 100, 150, 200, 500, -1],
                    [10, 20, 50, 100, 150, 200, 500, "All"]
                ],
                language: {
                    aria: {
                        sortAscending: ": activate to sort column ascending",
                        sortDescending: ": activate to sort column descending"
                    },
                    emptyTable: "No data available in table",
                    info: "Showing _START_ to _END_ of _TOTAL_ records",
                    infoEmpty: "No records found",
                    infoFiltered: "(filtered1 from _MAX_ total records)",
                    lengthMenu: "Show _MENU_",
                    search: "Search:",
                    zeroRecords: "No matching records found",
                    paginate: {
                        "previous": "Prev",
                        "next": "Next",
                        "last": "Last",
                        "first": "First"
                    }
                },
                columns:[
                            {
                                title: "<input type='checkbox' id='CheckAllitem' />",
                                render: function (data, row, meta){
                                    return "<input type='checkbox' class='CheckItem text-center' value='" + meta.ID + "'>";
                                },
                                width: "2%"
                            },
                            { data: 'Operation', name: 'Operation' ,orderable: true, title: "Operation"},
                        ],
            }).on('page.dt', function() {
            });
        }
        return this;
    }

    function cancelform(){
        ajax.clearFromData("frmCode");
        ajax.clearFromData("frmCategory");
        ajax.clearFromData("frmOperation");
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