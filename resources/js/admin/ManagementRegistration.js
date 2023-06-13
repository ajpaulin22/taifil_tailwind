
(function(){
    var tblManagementRegistration = "";
    var data = [
        {IDcheckbox: 1, IDrow: 1, Name: "Jenefer", JobCategories: "Livestock Agriculture", Program: "SSW", Show: 2, InterviewDate: "2023-01-01", Company: "Seiko IT Solutions Philippines Inc.", Age: 23, ToAbroad: 1},
        {IDcheckbox: 2, IDrow: 2, Name: "Lenard", JobCategories: "Cultivate Agriculture", Program: "TITP", Show: 1, InterviewDate: "2023-01-02", Company: "Umbrella Corporation", Age: 25, ToAbroad: 0},
        {IDcheckbox: 3, IDrow: 3, Name: "Alphy", JobCategories: "Livestock Agriculture", Program: "Direct", Show: 2, InterviewDate: "2023-01-03", Company: "Seiko", Age: 26, ToAbroad: 1},
    ];
    
    $(document).ready(function(){
        drawDataTable();
        $(".carousel").carousel({
            interval: 2000
        });
        $("#Code").change(function(){
            GetJobCategories();
            $("#Operations").html("");
        });
        $("#JobCategories").change(function(){
            GetOperations();
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
    })

    function GetJobCategories(){
        var shtml = "";
        if ($("#Code").val() == "1"){
            shtml = "<option value=''></option>" +
            '<option value="CultivationAgriculture">Cultivation Agriculture</option>' +
            '<option value="LivestockAgriculture">Livestock Agriculture</option> ';
        }
        else if ($("#Code").val() == "2"){
            shtml = "<option value=''></option>" +
            '<option value="FishingBoatFisheries">Fishing Boat Fisheries</option> ' +
            '<option value="Aquaculture">Aquaculture</option> ';
        }
        else{
            shtml = "<option value=''></option>" +
            '<option value="WellDrilling">Well Drilling</option> ' +
            '<option value="BuildingSheetMetalWork">Building Sheet Metal Work</option> ' +
            '<option value="FreezingAndAirConditioningApparatusInstalling">Freezing And Air Conditioning Apparatus Installing</option> ' +
            '<option value="FixtureMaking">Fixture Making</option> ' +
            '<option value="Carpentry">Carpentry</option> ' +
            '<option value="FrameWorking">Frame Working</option> ' +
            '<option value="ReinforcingBarConstruction">Reinforcing Bar Construction</option> ' +
            '<option value="Scaffolding">Scaffolding</option> ' +
            '<option value="BuildingStoneConstruction">Building Stone Construction</option> ' +
            '<option value="Tiling">Tiling</option> ' +
            '<option value="TileRoofing">Tile Roofing</option> ' +
            '<option value="Plastering">Plastering</option> ' +
            '<option value="Plumbing">Plumbing</option> ' +
            '<option value="HeatInsulation">Heat Insulation</option>' +
            '<option value="InteriorFinishing">Interior Finishing</option> ' +
            '<option value="SashSetting">Sash Setting</option> ' +
            '<option value="Waterproofing">Waterproofing</option> ' +
            '<option value="ConcretePressureFeeding">Concrete Pressure Feeding</option> ' +
            '<option value="WellPointConstruction">Well Point Construction</option>' +
            '<option value="PaperHanging">Paper Hanging</option> ' +
            '<option value="ApplicationofConstructionEquipment">Application of Construction Equipment</option> ' +
            '<option value="FurnaceInstallation">Furnace Installation</option> ';
        }
        $("#JobCategories").html(shtml);
    }

    function GetOperations(){
        var shtml = "";
        if ($("#JobCategories").val() == "CultivationAgriculture"){
            shtml = "<option value='0'></option>" +
            '<option value="1">Facility Horticulture</option>' +
            '<option value="2">Upland Field Cropping / Vegetable Growing</option>' +
            '<option value="3">Fruit Growing</option> ';
        }
        else if ($("#JobCategories").val() == "LivestockAgriculture"){
            shtml = "<option value='0'></option>" +
            '<option value="1">Hog Raising</option>' +
            '<option value="2">Poultry Farming (Collecting Chicken Eggs)</option>' +
            '<option value="3">Dairy</option> ';
        }
        else if ($("#JobCategories").val() == "FishingBoatFisheries"){
            shtml = "<option value='0'></option>" +
            '<option value="1">Skipjack Pole And Line Fishery</option>' +
            '<option value="2">Long-line Fishery</option>' +
            '<option value="3">Squid Jigging</option> ' +
            '<option value="4">Purse Seine Fishery</option>' +
            '<option value="5">Trawl And Seine Net Fishery</option>' +
            '<option value="6">Gill Net Fishery</option> ' +
            '<option value="7">Set Net Fishery</option>' +
            '<option value="8">Crab And Shrimp Basket Fishery</option>' +
            '<option value="9">Stick-held-dipnet Fishery</option> ' ;
        }
        else if ($("#JobCategories").val() == "Aquaculture"){
            shtml = "<option value='0'></option>" +
            '<option value="1">Scallop and Oyster Farming</option>' ;
        }
        else if ($("#JobCategories").val() == "WellDrilling"){
            shtml = "<option value='0'></option>" +
            '<option value="1">Percussion Type Well Drilling Operation</option>' +
            '<option value="2">Rotary Type Well Drilling Operation</option>' ;
        }
        else if ($("#JobCategories").val() == "BuildingSheetMetalWork"){
            shtml = "<option value='0'></option>" +
            '<option value="1">Duct Sheet Metal Operation</option>' +
            '<option value="2">Interior And Exterior Sheet Metal Operation</option>' ;
        }
        else if ($("#JobCategories").val() == "FreezingAndAirConditioningApparatusInstalling"){
            shtml = "<option value='0'></option>" +
            '<option value="1">Freezing And Air Harmonizing Equipment Installation Work</option>' ;
        }
        else if ($("#JobCategories").val() == "FixtureMaking"){
            shtml = "<option value='0'></option>" +
            '<option value="1">Hand Processing Work Of Wooden Fixture</option>' ;
        }
        else if ($("#JobCategories").val() == "Carpentry"){
            shtml = "<option value='0'></option>" +
            '<option value="1">Carpentry Contruction Work</option>' ;
        }
        else if ($("#JobCategories").val() == "FrameWorking"){
            shtml = "<option value='0'></option>" +
            '<option value="1">Framing Contruction Work</option>' ;
        }
        else if ($("#JobCategories").val() == "ReinforcingBarConstruction"){
                    shtml = "<option value='0'></option>" +
                    '<option value="1">Assembling Reinforced Rod Bar Work</option>' ;
        }
        else if ($("#JobCategories").val() == "Scaffolding"){
                    shtml = "<option value='0'></option>" +
                    '<option value="1">Scaffolding Building Work</option>' ;
        }
        else if ($("#JobCategories").val() == "BuildingStoneConstruction"){
                    shtml = "<option value='0'></option>" +
                    '<option value="1">Stone Processing Work</option>' +
                    '<option value="2">Work Of Putting Out Stones</option>';
        }
        else if ($("#JobCategories").val() == "Tiling"){
                    shtml = "<option value='0'></option>" +
                    '<option value="1">Tiling Work</option>' ;
        }
        else if ($("#JobCategories").val() == "TileRoofing"){
                    shtml = "<option value='0'></option>" +
                    '<option value="1">Tile-roofing Work</option>' ;
        }
        else if ($("#JobCategories").val() == "Plastering"){
                    shtml = "<option value='0'></option>" +
                    '<option value="1">Plasterers Work</option>' ;
        }
        else if ($("#JobCategories").val() == "Plumbing"){
                    shtml = "<option value='0'></option>" +
                    '<option value="1">Construction Piping Work</option>' +
                    '<option value="2">Plant Piping Work</option>' ;
        }
        else if ($("#JobCategories").val() == "HeatInsulation"){
                    shtml = "<option value='0'></option>" +
                    '<option value="1">Heat-retention and Cool-retention Construction Work</option>' ;
        }
        else if ($("#JobCategories").val() == "InteriorFinishing"){
                    shtml = "<option value='0'></option>" +
                    '<option value="1">Plastic-material Floor Finishing Construction Work</option>' +
                    '<option value="2">Carpeting Floor Finishing Construction Work</option>' +
                    '<option value="3">Metal-made foundation Construction Work</option>' +
                    '<option value="4">Board Finishing Construction Work</option>' +
                    '<option value="5">Curtain Installation Work</option>' ;                    
        }
        else if ($("#JobCategories").val() == "SashSetting"){
                    shtml = "<option value='0'></option>" +
                    '<option value="1">Building Sash Installation Work</option>' ;
        }
        else if ($("#JobCategories").val() == "Waterproofing"){
                    shtml = "<option value='0'></option>" +
                    '<option value="1">Sealing Water-proof Construction Work</option>' ;
        }
        else if ($("#JobCategories").val() == "ConcretePressureFeeding"){
                    shtml = "<option value='0'></option>" +
                    '<option value="1">Concrete Pressure Transfer Construction Work</option>' ;
        }
        else if ($("#JobCategories").val() == "WellPointConstruction"){
                    shtml = "<option value='0'></option>" +
                    '<option value="1">Well-point Construction Work</option>' ;
        }
        else if ($("#JobCategories").val() == "PaperHanging"){
                    shtml = "<option value='0'></option>" +
                    '<option value="1">Painting Work</option>' ;
        }
        else if ($("#JobCategories").val() == "ApplicationofConstructionEquipment"){
                    shtml = "<option value='0'></option>" +
                    '<option value="1">Dozing Work</option>' +
                    '<option value="2">Loading Work</option>' +
                    '<option value="3">Excavating Work</option>' +
                    '<option value="4">Road Rolling Work</option>' ;
        }
        else if ($("#JobCategories").val() == "FurnaceInstallation"){
                    shtml = "<option value='0'></option>" +
                    '<option value="1">Furnace Installation Work</option>' ;
        }
        else{
            shtml = "";
        }
        $("#Operations").html(shtml);
    }

    function drawDataTable(){
        
        $("#tblManagementRegistration").DataTable({
            "ajax": {
                "url" : "../Applicants.json",
                "type": "GET",
                "datatype": "json",
                "dataSrc": "data.Users"
            },
            searching: false,
            columns: [
                {
                    title: "<input type='checkbox' id='CheckAllitem'/>",
                    render: function (data, row, meta){
                        return "<input type='checkbox' class='CheckItem text-center' value='" + meta.ID + "'>";
                    },
                    width: "2%", orderable: false
                },
                { title: 'ID', data: "ID", width: "4%", className: "dt-center"},
                { title: 'Name', data: "Name", width: "18%"},
                { title: 'JobCategories', data: "JobCategories", width: "17%"},
                { title: 'Program', data: "Program", width: "6%", className: "dt-center"},
                { 
                    title: 'Show',
                    render: function (data, row, meta, ){
                        var isSelected = meta.Show == 0 ? 'selected' : '';
                        var isSelected2 = meta.Show == 1 ? 'selected' : '';
                        return "<select class='form-control show' id='show_"+ meta.IDrow +"' style='width:30%; height:12px; font-size: 11px;'>" +
                                "<option value='0' "+ isSelected +"> No </option>" +
                                "<option value='1' "+ isSelected2 +"> Yes </option>" +
                                "</select>";
                    },
                    width: "5%", className: "dt-center"
                },
                { 
                    title: 'InterviewDate', 
                    render: function(data, row, meta){
                        return "<input class='form-control inputs_"+ meta.IDrow +"' style='width:60%; height:12px; font-size: 11px;' type='date' value='"+ meta.InterviewDate +"'>"
                    }, width:"5%", className: "dt-center"
                },
                { 
                    title: 'Company', 
                    render: function(data, row, meta){
                        return "<input class='form-control inputs_"+ meta.IDrow +"' style='width:94%; height:12px; font-size: 11px;' type='text' value='"+ meta.Company +"'>"
                    }, width:"25%"
                },
                { title: 'Age', data: "Age", width:"4%", className: "dt-center"},
                { 
                    title: 'To Abroad', 
                    render: function (data, row, meta, ){
                        var isSelected = meta.ToAbroad == 0 ? 'selected' : '';
                        var isSelected2 = meta.ToAbroad == 1 ? 'selected' : '';
                        return "<select class='form-control' style='width:30%; height:12px; font-size: 11px;'>" +
                                "<option value='0' "+ isSelected +"> No </option>" +
                                "<option value='1' "+ isSelected2 +"> Yes </option>" +
                                "</select>";
                    },
                    width: "1%", className: "dt-center"
                },
            ],
            order: [[1, "asc"]],
            "columnDefs": [
                {
                    
                    "orderDataType": "dom-text",
                    "targets": [5,6]
                 }
            ],
            "initComplete": function () {
                $("#tblManagementRegistration thead #trSearch").remove();
                var thead1 = "<tr id='trSearch'>";
                $.each(this.api().column(0).context[0].aoColumns, function (k, v) {
                    if (v.sName != "") {
                        thead1 += "<th data-field='" + v.sName + "'>" + v.sTitle + "</th>";
                    }
                    else if (!$.trim(JSON.stringify(v.data))) {
                        thead1 += "<th></th>";
                    } else {
                        thead1 += "<th data-field='" + v.data + "'>" + v.sTitle + "</th>";
                    }
                });
                thead1 += "</tr>";
                $("#tblManagementRegistration thead").append(thead1);
                $('#tblManagementRegistration thead #trSearch th').each(function () {
                    var title = $(this).text();
                    var field = $(this).data("field");
                    if (field) {
                        $(this).html("<input class='form-control form-control-sm text-center columnSearch' style='display: inline;width: 100%;height: 100%box-sizing: border-box;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;border: none;' placeholder='" + title + "' type='text'/>");
                        $('#tblManagementRegistration thead #trSearch th').each(function () {
                            var field = $(this).data("field");
                        });
                    }
                });
            },
        });
    }
})();