(function(){
    var tblUserInformation = "";
    token = $("meta[name=csrf-token]").attr("content");
    $(document).ready(function(){
        drawUserTable();

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
    
})();