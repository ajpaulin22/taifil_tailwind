(function(){
    var tblCodes = "";
    var tblCategories = "";
    var tblOperations = "";
    var dataJobCode = "";
    var dataJobCategory = "";

    $(document).ready(function(){
        drawCodesTable();
        drawJobCategoriesTable();
        drawOperationsTable();

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
                            tblCodes.$('tr.selected').removeClass('selected');
                            tblCategories.clear();
                            tblCategories.draw();
                            tblOperations.clear();
                            tblOperations.draw();
                        }
                        else {
                            tblCodes.$('tr.selected').removeClass('selected');
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
                            dataJobCategory = "";
                            tblCategories.$('tr.selected').removeClass('selected');
                        }
                        else {
                            tblCategories.$('tr.selected').removeClass('selected');
                            $(this).addClass('selected');
                            tblOperations.ajax.reload(null,false)
                        }
                    }
                    break;
            }
        });

        $('#tblOperations tbody').on('click', 'tr', function(e){
            var data = tblOperations.row($(this)).data();
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
                    if ($.trim(data) != "") {
                        if ($(this).hasClass('selected')) {
                            data = "";
                            tblOperations.$('tr.selected').removeClass('selected');
                        }
                        else {
                            tblOperations.$('tr.selected').removeClass('selected');
                            $(this).addClass('selected');
                        }
                    }
                    break;
            }
        });
    });

    function drawCodesTable(){
        if (!$.fn.DataTable.isDataTable("#tblJobCategories"))
        { 
            tblCodes = $("#tblCodes").DataTable({
                processing: true,
                serverSide: true,
                "ajax": {
                    "url": "/admin/MasterMaintenance/JobInformation/GetJobCode",
                    "type": "GET"
                },
                columns: [
                    {
                        title: "<input type='checkbox' id='CheckAllitem' />",
                        render: function (data, row, meta){
                            return "<input type='checkbox' class='CheckItem text-center' value='" + meta.ID + "'>";
                        },
                        width: "2%", orderable: false
                    },
                    { data: 'Code', name: "Code", title: "Code"},
                ],
            });
        }
    }

    function drawJobCategoriesTable(){
        if (!$.fn.DataTable.isDataTable("#tblJobCategories"))
        {
            tblCategories = $("#tblJobCategories").DataTable({
                processing: true,
                serverSide: true,
                "ajax": {
                    "url": "/admin/MasterMaintenance/JobInformation/GetJobCategory",
                    "type": "GET",
                    "data": function (d) {
                        d["ID"] = dataJobCode == "" ? 0 : dataJobCode.ID;
                    }
                },
                columns: [
                    {
                        title: "<input type='checkbox' id='CheckAllitem' />",
                        render: function (data, row, meta){
                            return "<input type='checkbox' class='CheckItem text-center' value='" + meta.ID + "'>";
                        },
                        width: "2%", orderable: false
                    },
                    { data: 'Category', name: "Category", title: "Category"},
                ],
            })
        }
    }

    function drawOperationsTable(){
        if (!$.fn.DataTable.isDataTable("#tblOperations"))
        {
            tblOperations = $("#tblOperations").DataTable({
                processing: true,
                serverSide: true,
                "ajax": {
                    "url": "/admin/MasterMaintenance/JobInformation/GetJobOperation",
                    "type": "GET",
                    "data": function (d) {
                        d["ID"] = dataJobCategory == "" ? 0 : dataJobCategory.ID;
                    }
                },
                columns: [
                    {
                        title: "<input type='checkbox' id='CheckAllitem' />",
                        render: function (data, row, meta){
                            return "<input type='checkbox' class='CheckItem text-center' value='" + meta.ID + "'>";
                        },
                        width: "2%", orderable: false
                    },
                    { data: 'Operation', name: "Operation", title: "Operation"},
                ],
            })
        }
    }

})();