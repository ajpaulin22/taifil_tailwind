(function(){
    var tblUserInformation = "";
    var dataUser = "";
    var ajax = $D();
    var chkDataUser = [];
    token = $("meta[name=csrf-token]").attr("content");
    $(document).ready(function(){
        drawUserTable();

        $("#btnAdd").click(function(){
            $("#mdlAddUser").modal('show');
        });

        $("#btnEdit").click(function(){
            $.ajax({
                url: "/admin/MasterMaintenance/UserInformation/GetUserInformation",
                dataType: "JSON",
                type: "GET",
                data:{
                    _token: token
                    ,UserID: dataUser.ID
                },
                beforeSend: function(){
                    $("#loading_modal").show();
                },
                success: function(promise){
                    $("#loading_modal").hide();
                    $("#Position").val(promise[0].admin).trigger('change');
                    $("#FirstName").val(promise[0].firstname);
                    $("#LastName").val(promise[0].lastname);
                    $("#UserName").val(promise[0].username);
                    $("#EmailAddress").val(promise[0].email);
                    $("#UserID").val(promise[0].id);
                    $("#mdlAddUser").modal('show');
                }
            });
        });

        $("#frmUser").submit(function(e){
            e.preventDefault();
            if ($("#Password").val() != $("#ConfirmPassword").val())
            {
                showMessage('Error', 'Password do not match', 'error', 'red');
            }
            else{
                var data = $("#frmUser").serializeArray();
                var UserID = $("#UserID").val();
                $.ajax({
                    url: "/admin/MasterMaintenance/UserInformation/SaveUserData",
                    dataType: "JSON",
                    type: "POST",
                    data: {
                        _token: token,
                        data: data,
                        UserID: UserID
                    },
                    beforeSend: function(){
                        $("#loading_modal").show();
                    },
                    success: function(promise){
                        $("#loading_modal").hide();
                        showMessage(promise.msgTitle, promise.msg, promise.msgType, (promise.success == true ? 'green' : 'red'));
                        if(promise.success == true){
                            tblUserInformation.ajax.reload(null, false);
                            $("#mdlAddUser").modal('hide');
                            ajax.clearFromData("frmUser")
                            $("#Password").val("");
                            $("#ConfirmPassword").val("");
                        }
                    },
                });
            }
        });

        $("#btnDelete").click(function(){
            if (chkDataUser.length == 0){
                showMessage("Error", "Please check a row in user table", "error", "red");
            }
            else{
                $.ajax({
                    url:"/admin/MasterMaintenance/UserInformation/DeleteUser",
                    type:"GET",
                    data:{
                        _token: token,
                        ID: chkDataUser,
                    },
                    dataType:"JSON",
                    beforeSend: function(){
                        $("#loading_modal").show();
                    },
                    success:function(promise){
                        $("#loading_modal").hide();
                        tblUserInformation.ajax.reload(null, false);
                        showMessage("Success", "User information was deleted successfully", "success", "green");
                    }
                })
            }
        });

        $("#tblUserInformation").on("change", ".CheckItem", function () {
            var trData = tblUserInformation.row($(this).parents('tr')).data();
            if ($(this).is(":checked")) {
                chkDataUser.push({ ID: trData.ID});
            } else {
                chkDataUser = chkDataUser.filter(function (obj) {
                    return obj.ID !== trData.ID;
                });
            }
        });

        $('#tblUserInformation tbody').on('click', 'tr', function(e){
            dataUser = tblUserInformation.row($(this)).data();
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
                    if ($.trim(dataUser) != "") {
                        if ($(this).hasClass('selected')) {
                            dataUser = "";
                            $("#btnEdit").attr('disabled', true);
                            tblUserInformation.$('tr.selected').removeClass('selected');
                        }
                        else {
                            tblUserInformation.$('tr.selected').removeClass('selected');
                            $("#btnEdit").removeAttr('disabled');
                            $(this).addClass('selected');
                        }
                    }
                    break;
            }
        });

        $("#btnCancelUser").click(function(){
            $("#mdlAddUser").modal('hide');
            ajax.clearFromData("frmUser");
            $("#Password").val("");
            $("#ConfirmPassword").val("");
        });

    });

    function drawUserTable(){
        if (!$.fn.DataTable.isDataTable('#tblUserInformation')) {
            tblUserInformation = $('#tblUserInformation').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/admin/MasterMaintenance/UserInformation/GetUserData",
                    dataType: "JSON",
                    type: "GET",
                    data: function(d){
                        _token = token
                    }
                },
                deferRender: true,
                pageLength: 10,
                order: [
                    [0, "asc"]
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
                    { title: 'Position', data: "Position", width: "18%"},
                    { title: 'UserName', data: "UserName", width: "18%"},
                    { title: 'FirstName', data: "FirstName", width: "18%"},
                    { title: 'LastName', data: "LastName", width: "18%"},

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