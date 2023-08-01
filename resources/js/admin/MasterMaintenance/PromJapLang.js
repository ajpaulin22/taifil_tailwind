(function(){

    var tblprometrics = "";
    var tbljaplang = "";


    var ajax = $D();
    token = $("meta[name=csrf-token]").attr("content");

    $(document).ready(function(){

        drawPrometricsTable();
        drawOperationsTable();
       
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

    function drawPrometricsTable(){
        if (!$.fn.DataTable.isDataTable('#tblprometrics')) {
            tblprometrics = $('#tblprometrics').DataTable({
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
                pageLength: 5,
                autowidth: false,
                columns:[
                            {
                                title: "<input type='checkbox' id='CheckAllitemCategory' />",
                                render: function (data, row, meta){
                                    return "<input type='checkbox' name='CheckItemCategory' class='CheckItemCategory text-center' >";
                                },
                                width: "2%", orderable: false
                            },
                            { data: 'prometric', name: 'prometric' ,orderable: true, title: "Prometric"}
                ],
                "drawCallback": function() {
                   
                },
            }).on('page.dt', function() {
            });
        }
        return this;
    }


    function drawOperationsTable(){
        if (!$.fn.DataTable.isDataTable('#tbljaplang')) {
            tblOperations = $('#tbljaplang').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/admin/MasterMaintenance/PromJaplang/GetJaplang",
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
                columns:[
                            {
                                title: "<input type='checkbox' id='CheckAllitemOperation' />",
                                render: function (data, row, meta){
                                    return "<input type='checkbox' name='CheckItemOperation' class='CheckItemOperation text-center' value='" + meta.ID + "'>";
                                },
                                width: "2%", orderable: false
                            },
                            { data: 'jap_lang', name: 'jap_lang' ,orderable: true, title: "Japanese Language"},
                ],
                "drawCallback": function() {
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