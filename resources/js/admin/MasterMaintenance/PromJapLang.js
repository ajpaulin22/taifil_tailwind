"use strict";
(function(){

    var tblprometrics = "";
    var tbljaplang = "";
    var dataPrometric = "";
    var dataLanguage = "";
    var prometricCheck = [];
    var japLangCheck = [];
    var ajax = $D();
    token = $("meta[name=csrf-token]").attr("content");

    $(document).ready(function(){
        token = $("meta[name=csrf-token]").attr("content");
        drawPrometricsTable();
        drawJapLangTable();
        $("#btnAddPrometrics").click(function(){
            $("#mdlPrometricsTitle").text("Create Prometrics");
            $("#lblPrometrics").text("Prometrics");
            ajax.clearFromData("frmPrometrics");
            $("#btnSave").attr("FormName", "Prometrics");
            $("#lblPrometrics").css("width", "80px");
            $("#mdlPrometrics").modal("show");
        });

        $("#btnEditPrometrics").click(function(){
            $("#mdlPrometricsTitle").text("Update Prometrics");
            $("#lblPrometrics").text("Prometrics");
            ajax.clearFromData("frmPrometrics");
            $("#btnSave").attr("FormName", "Prometrics");
            $("#lblPrometrics").css("width", "80px");
            $("#Value").val(dataPrometric.prometric);
            $("#ID").val(dataPrometric.id);
            $("#mdlPrometrics").modal("show");
        });


        $("#btnDeletePrometrics").click(function(){
            
        });

        $("#btnAddJaplang").click(function(){
            $("#mdlPrometricsTitle").text("Create Japanese Language");
            $("#lblPrometrics").text("Japanese Language");
            ajax.clearFromData("frmPrometrics");
            $("#btnSave").attr("FormName", "Japlang");
            $("#lblPrometrics").css("width", "130px");
            $("#mdlPrometrics").modal("show");
        });

        $("#btnDeleteJaplang").click(function(){
        
        });

        $("#btnEditJaplang").click(function(){
            $("#mdlPrometricsTitle").text("Update Japanese Language");
            $("#lblPrometrics").text("Prometrics");
            ajax.clearFromData("frmPrometrics");
            $("#btnSave").attr("FormName", "Prometrics");
            $("#lblPrometrics").css("width", "80px");
            $("#Value").val(dataLanguage.jap_lang);
            $("#ID").val(dataLanguage.id);
            $("#mdlPrometrics").modal("show");
        });

        $("#btnCancel").click(function(){
            $("#mdlPrometrics").modal("hide");
        });

        $("#frmPrometrics").submit(function(e){
            
            e.preventDefault();
            var formName = $("#btnSave").attr("FormName");
            $.ajax({
                url:"/admin/MasterMaintenance/PromJaplang/Save" + formName,
                type:"POST",
                data:{
                    _token: token,
                    ID: $("#ID").val(),
                    prometric: $("#Value").val(),
                    jap_lang: $("#Value").val()
                },
                dataType:"JSON",
                beforeSend: function(){
                    $("#loading_modal").show();
                },
                success:function(promise){
                    $("#loading_modal").hide();
                    if(promise.success == true){
                        if(formName == "Prometrics"){
                            tblprometrics.ajax.reload(null, false);
                            $("#btnEditPrometrics").attr('disabled', true);
                        }
                        else{
                            tbljaplang.ajax.reload(null, false);
                            $("#btnEditJaplang").attr('disabled', true);
                        }
                        $("#mdlPrometrics").modal("hide");
                        showMessage("Success!", promise.msg, "success", "green");
                    }
                    else{
                        showMessage("Error!", "Prometric already exists!", "error", "red");
                    }
                }
            })
        });

        $('#tblprometrics tbody').on('click', 'tr', function(e){
            dataPrometric = tblprometrics.row($(this)).data();
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
                    if ($.trim(dataPrometric) != ""){
                        if ($(this).hasClass('selected')) {
                            $("#btnEditPrometrics").attr('disabled', true);
                            dataPrometric = "";
                            tblprometrics.$('tr.selected').removeClass('selected');
                        }
                        else {
                            $("#btnEditPrometrics").removeAttr('disabled');
                            tblprometrics.$('tr.selected').removeClass('selected');
                            $(this).addClass('selected');
                        }
                        break;
                    }
            }
        });

        $('#tbljaplang tbody').on('click', 'tr', function(e){
            dataLanguage = tbljaplang.row($(this)).data();
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
                    if ($.trim(dataLanguage) != ""){
                        if ($(this).hasClass('selected')) {
                            $("#btnEditJaplang").attr('disabled', true);
                            dataLanguage = "";
                            tbljaplang.$('tr.selected').removeClass('selected');
                        }
                        else {
                            $("#btnEditJaplang").removeAttr('disabled');
                            tbljaplang.$('tr.selected').removeClass('selected');
                            $(this).addClass('selected');
                        }
                        break;
                    }
            }
        });

        $("#tblprometrics").on("change", ".CheckItemPrometrics", function () {
            var id = $(this).val()
            if ($(this).is(":checked")) {
                prometricCheck.push({
                    ID: $(this).val()
                });
            } else {
                prometricCheck = prometricCheck.filter(function (obj) {
                    return obj.ID != id
                });
            }
            $(".CheckItemPrometrics").each(function () {
                if ($(this).is(":checked")) {
                    $("#CheckAllitemPrometrics").prop('checked', true);
                }
                else {
                    $("#CheckAllitemPrometrics").prop('checked', false);
                    return false;
                }
            });
        });

        $("#CheckAllitemPrometrics").click(function () {
            if ($(this).is(":checked")) {
                $(".CheckItemPrometrics").each(function(){
                    if(!$(this).is(":checked")){
                        $(this).prop('checked', true);
                        jobCatCheck.push({
                            ID: $(this).val()
                        });
                    }
                });
            }
            else {
                $(".CheckItemPrometrics").each(function(){
                    var id = $(this).val();
                    $(this).prop('checked', false);
                    jobCatCheck = jobCatCheck.filter(function (obj) {
                        return obj.ID != id
                    });
                });
            }
        });

        $("#tblprometrics").on("change", ".CheckItemPrometrics", function () {
            var id = $(this).val()
            if ($(this).is(":checked")) {
                prometricCheck.push({
                    ID: $(this).val()
                });
            } else {
                prometricCheck = prometricCheck.filter(function (obj) {
                    return obj.ID != id
                });
            }
            $(".CheckItemPrometrics").each(function () {
                if ($(this).is(":checked")) {
                    $("#CheckAllitemPrometrics").prop('checked', true);
                }
                else {
                    $("#CheckAllitemPrometrics").prop('checked', false);
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
                // deferRender: true,
                pageLength: 10,
                autowidth: true,
                order:[
                    [1,"asc"]
                ],
                columns:[
                    {
                        title: "<input type='checkbox' id='CheckAllitemPrometrics' />",
                        render: function (data, row, meta){
                            return "<input type='checkbox' name='CheckItemPrometrics' class='CheckItemPrometrics text-center' value='" + meta.id + "'>";
                        },
                        width: "2%", orderable: false
                    },
                    { data: 'prometric', name: 'prometric' , title: "Prometric"}
                ],
                "drawCallback": function() {
                },
            }).on('page.dt', function() {
            });
        }
        return this;
    }


    function drawJapLangTable(){
        if (!$.fn.DataTable.isDataTable('#tbljaplang')) {
            tbljaplang = $('#tbljaplang').DataTable({
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
                order:[
                    [1, "asc"]
                ],
                columns:[
                    {
                        title: "<input type='checkbox' id='CheckAllitemJapLang' />",
                        render: function (data, row, meta){
                            return "<input type='checkbox' name='CheckItemJapLang' class='CheckItemJapLang text-center' value='" + meta.id + "'>";
                        },
                        width: "2%", orderable: false
                    },
                    { data: 'jap_lang', name: 'jap_lang' ,orderable: false, title: "Japanese Language"},
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