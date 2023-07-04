
(function(){
    var tblManagementRegistration = "";
    var dataApplicant = "";
    token = $("meta[name=csrf-token]").attr("content");
    var data = [
        {IDcheckbox: 1, IDrow: 1, Name: "Jenefer", JobCategories: "Livestock Agriculture", Program: "SSW", Show: 2, InterviewDate: "2023-01-01", Company: "Seiko IT Solutions Philippines Inc.", Age: 23, ToAbroad: 1},
        {IDcheckbox: 2, IDrow: 2, Name: "Lenard", JobCategories: "Cultivate Agriculture", Program: "TITP", Show: 1, InterviewDate: "2023-01-02", Company: "Umbrella Corporation", Age: 25, ToAbroad: 0},
        {IDcheckbox: 3, IDrow: 3, Name: "Alphy", JobCategories: "Livestock Agriculture", Program: "Direct", Show: 2, InterviewDate: "2023-01-03", Company: "Seiko", Age: 26, ToAbroad: 1},
    ];
    
    $(document).ready(function(){
        drawDataTable();
        GetCodes();
        $("#Code").change(function(){
            GetJobCategories($(this).val());
        });
        $("#JobCategories").change(function(){
            GetOperations($(this).val());
        })

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
            location.href = "/client/Biodata?data=" + $("#JobType").val();
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
                            tblManagementRegistration.$('tr.selected').removeClass('selected');
                        }
                        else {
                            tblManagementRegistration.$('tr.selected').removeClass('selected');
                            $("#btnEdit").removeAttr('disabled');
                            $(this).addClass('selected');
                        }
                    }
                    break;
            }
        });

        $("#btnUpdateInterview").click(function(){
            $("#mdlInterview").modal('show');
        });
    })

    function GetJobCategories(id){
        $.ajax({
            url:"/client/Biodata/get-categories",
            type:"GET",
            data:{
                _token:self.token,
                ID:id
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
                $("#JobCategories").append(option)
            }
        })
    }

    function GetOperations(id){
        $.ajax({
            url:"/client/Biodata/get-operations",
            type:"GET",
            data:{
                _token:self.token,
                ID:id
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
            }
        })
    }

    function GetCodes(){
        $.ajax({
            url:"/client/Biodata/get-code",
            type:"GET",
            data:{_token:self.token},
            dataType:"JSON",
            success:function(promise){
                console.log(promise)
                let option = `<option value=""></option>`;
                promise.forEach(data=>{
                    option += `<option value="${data.ID}">${data.Code}</option>`;
                    
                })
                $("#Code").append(option)
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
                        d["Code"] = $("#Code").val(),
                        d["JobCategories"] = $("#JobCategories").val(),
                        d["Operations"] = $("#Operations").val(),
                        d["AgeFrom"] = $("#AgeFrom").val(),
                        d["AgeTo"] = $("#AgeTo").val()
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

})();