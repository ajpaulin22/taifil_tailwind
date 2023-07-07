
(function(){
    var tblManagementRegistration = "";
    var tblInterview = "";
    var dataApplicant = "";
    var applicantID = 0;
    var tableData = [];
    token = $("meta[name=csrf-token]").attr("content");
    var data = [
        {IDcheckbox: 1, IDrow: 1, Name: "Jenefer", JobCategories: "Livestock Agriculture", Program: "SSW", Show: 2, InterviewDate: "2023-01-01", Company: "Seiko IT Solutions Philippines Inc.", Age: 23, ToAbroad: 1},
        {IDcheckbox: 2, IDrow: 2, Name: "Lenard", JobCategories: "Cultivate Agriculture", Program: "TITP", Show: 1, InterviewDate: "2023-01-02", Company: "Umbrella Corporation", Age: 25, ToAbroad: 0},
        {IDcheckbox: 3, IDrow: 3, Name: "Alphy", JobCategories: "Livestock Agriculture", Program: "Direct", Show: 2, InterviewDate: "2023-01-03", Company: "Seiko", Age: 26, ToAbroad: 1},
    ];
    
    $(document).ready(function(){
        drawDataTable();
        drawInterviewTable();
        GetCodes();
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
            $.ajax({
                url:"/admin/ManagementRegistration/GetPersonalData",
                type:"GET",
                data:{
                    _token: self.token,
                    PersonalInfoID: dataApplicant.ID
                },
                dataType:"JSON",
                success:function(promise){
                    location.href = "/client/Biodata?data=" + $("#JobType").val() + "&type=mod";
                }
            });
        });

        $('#tblManagementRegistration tbody').on('click', 'tr', function(e){
            dataApplicant = tblManagementRegistration.row($(this)).data();
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
                    if ($.trim(dataApplicant) != "") {
                        if ($(this).hasClass('selected')) {
                            dataApplicant = "";
                            $("#btnEdit").attr('disabled', true);
                            $("#btnUpdateInterview").attr('disabled', true);
                            tblManagementRegistration.$('tr.selected').removeClass('selected');
                        }
                        else {
                            tblManagementRegistration.$('tr.selected').removeClass('selected');
                            $("#btnEdit").removeAttr('disabled');
                            $("#btnUpdateInterview").removeAttr('disabled');
                            $(this).addClass('selected');
                        }
                    }
                    break;
            }
        });

        $("#btnUpdateInterview").click(function(){
            $("#ApplicantName").text(dataApplicant.Name);
            applicantID = dataApplicant.ID;
            tblInterview.ajax.reload(null, false);
            $("#mdlInterview").modal('show');
        });

        $("#btnAddInterview").click(function(){
            $("#AddApplicantName").text(dataApplicant.Name);
            $("#mdlInterview").modal('hide');
            $("#mdlAddInterview").modal('show');
        });

        $("#btnCancelAddInterview").click(function(){
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
                    PersonalID: dataApplicant.ID
                },
                dataType:"JSON",
                beforeSend: function(){
                    $("#loading_modal").show();
                },
                success:function(promise){
                    $("#loading_modal").hide();
                    tblInterview.ajax.reload(null, false);
                    $("#mdlAddInterview").modal('hide');
                    $("#mdlInterview").modal('show');
                    showMessage("Success!", "Interview Information Was Saved Successfully", "success", "green");
                }
            });
        });

        $("#tblManagementRegistration").on("change", ".CheckItem", function () {
            var trData = tblManagementRegistration.row($(this).parents('tr')).data();
            if ($(this).is(":checked")) {
                tableData.push({ ID: trData.ID});
            } else {
                tableData = tableData.filter(function (obj) {
                    return obj.ID !== trData.ID;
                });
            }
        });

        $("#btnDelete").click(function(){
            if (tableData.length == 0){
                showMessage("Error", "Please check a row in the table", "error", "red");
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
            window.location = '/admin/ManagementRegistration/ExportApplicants';
            // $.ajax({
            //     url:"/admin/ManagementRegistration/ExportApplicants",
            //         type:"GET",
            //         data:{
            //             _token: token
            //         },
            //         dataType:"JSON",
            //         beforeSend: function(){
            //             $("#loading_modal").show();
            //         },
            //         success:function(promise){
            //             $("#loading_modal").hide();
            //     }
            // })
        });
        
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

    function GetCodes(){
        $.ajax({
            url:"/admin/ManagementRegistration/get_code",
            type:"GET",
            data:{_token:self.token},
            dataType:"JSON",
            success:function(promise){
                let option = `<option value=""></option>`;
                promise.forEach(data=>{
                    option += `<option value="${data.ID}">${data.Code}</option>`;
                    
                })
                $("#Code").append(option)
                $("#Code").select2({
                    placeholder: 'Select a code',
                    allowClear: true
                })
            }
        })
    }

    function drawDataTable(){
        var Type = $("#Type").val();
        var Code = $("#Code").val();
        var JobCategories = $("#JobCategories").val();
        var Operations = $("#Operations").val();
        var AgeFrom = $("#AgeFrom").val();
        var AgeTo = $("#AgeTo").val();
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
                        d["Type"] = Type,
                        d["Code"] = Code,
                        d["Category"] = JobCategories,
                        d["Operations"] = Operations,
                        d["AgeFrom"] = AgeFrom,
                        d["AgeTo"] = AgeTo
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
                        title: "<input type='checkbox' id='CheckAllitem'/>",
                        render: function (data, row, meta){
                            return "<input type='checkbox' class='CheckItem text-center' value='" + meta.ID + "'>";
                        },
                        width: "2%", orderable: false
                    },
                    { title: 'Name', data: "Name", width: "18%"},
                    { title: 'Category', data: "Category", width: "17%"},
                    { title: 'JobType', data: "JobType", width: "6%", className: "dt-center"},
                    { title: 'AttendInterview', data: "AttendInterview", width: "6%", className: "dt-center"},
                    { title: 'InterviewDate', data: "InterviewDate", width: "6%", className: "dt-center"},
                    { title: 'InterviewCount', data: "InterviewCount", width: "6%", className: "dt-center"},
                    { title: 'Company', data: "Company", width:"4%", className: "dt-center"},
                    { title: 'Age', data: "Age", width:"4%", className: "dt-center"},
                    { title: 'ToAbroad', data: "ToAbroad", width:"4%", className: "dt-center"},
                    { title: 'AbroadDate', data: "AbroadDate", width:"4%", className: "dt-center"},
                ],
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
                        d["applicantID"] = applicantID
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

})();