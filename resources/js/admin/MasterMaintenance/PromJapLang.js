(function(){
    // var tblCodes = "";
    var tblprometrics = "";
    var tbljaplang = "";


    var ajax = $D();
    token = $("meta[name=csrf-token]").attr("content");
    // $.fn.DataTable.ext.pager.numbers_length = 4;
    $(document).ready(function(){
        // drawCodesTable();
        drawJobCategoriesTable();
        drawOperationsTable();
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

        $("#btnAddPrometrics").click(function(){
        });

        $("#btnEditPrometrics").click(function(){
        });


        $("#btnDeletePrometrics").click(function(){
        });


        $("#btnAddJaplang").click(function(){
       
        });

        $("#btnDeleteJaplang").click(function(){
     
        });

        $("#btnEditJaplang").click(function(){
    
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
        if (!$.fn.DataTable.isDataTable('#tblprometrics')) {
            tblCategories = $('#tblJobCategories').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/admin/MasterMaintenance/PromJaplang/GetPrometrics",
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
                            { data: 'prometric', name: 'prometric' ,orderable: true, title: "Prometric"},
                ],
                "drawCallback": function() {
                    for(var i = 0; i < jobCatCheck.length; i++){
                        $("input[name='CheckItemCategory'][value="+ jobCatCheck[i].ID +"]").prop('checked', true);
                    }
                    $("#btnEditJobCategories").attr('disabled', true);
                    dataJobCategory = "";
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
        if (!$.fn.DataTable.isDataTable('#tbljaplang')) {
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
                    $("#btnEditOperations").attr("disabled", true);
                    dataJobOperation = "";
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