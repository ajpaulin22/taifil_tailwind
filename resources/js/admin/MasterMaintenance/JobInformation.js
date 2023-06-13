(function(){
    var tblCodes = "";
    var tblJobCategories = "";
    var tblOperations = "";
    var dataCodes = [
        {IDcheckbox: 1, IDrow: 1, Code: "Agriculture"},
        {IDcheckbox: 2, IDrow: 2, Code: "Fishery"},
        {IDcheckbox: 3, IDrow: 3, Code: "Construction"}
    ]
    var dataJobCategories = [];
    var dataOperations = [];

    $(document).ready(function(){
        drawCodesTable();
        drawJobCategoriesTable();
        drawOperationsTable();
        $('#tblCodes tbody').on('click', 'tr', function(e){
            var data = tblCodes.row($(this)).data();
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
                            tblCodes.$('tr.selected').removeClass('selected');
                        }
                        else {
                            tblCodes.$('tr.selected').removeClass('selected');
                            $(this).addClass('selected');
                            if (data.Code == "Agriculture")
                            {
                                dataJobCategories = [];
                                dataJobCategories = [
                                    {IDcheckbox: 1, IDrow: 1, Code: "Cultivation Agriculture"},
                                    {IDcheckbox: 2, IDrow: 2, Code: "Livestock Agriculture"},
                                ]
                                tblJobCategories.clear().draw();
                                tblJobCategories.rows.add(dataJobCategories);
                                tblJobCategories.draw();
                            }
                            else if (data.Code == "Fishery")
                            {
                                dataJobCategories = [];
                                dataJobCategories = [
                                    {IDcheckbox: 1, IDrow: 1, Code: "Fishing Boat Fisheries"},
                                    {IDcheckbox: 2, IDrow: 2, Code: "Aquaculture"},
                                ]
                                tblJobCategories.clear().draw();
                                tblJobCategories.rows.add(dataJobCategories);
                                tblJobCategories.draw();
                            }
                            else{
                                dataJobCategories = [];
                                dataJobCategories = [
                                    {IDcheckbox: 1, IDrow: 1, Code: "Well Drilling"},
                                    {IDcheckbox: 2, IDrow: 2, Code: "Building Sheet Metal Work"},
                                    {IDcheckbox: 3, IDrow: 3, Code: "Freezing And Air Conditioning Apparatus Installing"},
                                    {IDcheckbox: 4, IDrow: 4, Code: "Fixture Making"},
                                    {IDcheckbox: 5, IDrow: 5, Code: "Carpentry"},
                                    {IDcheckbox: 6, IDrow: 6, Code: "Frame Working"},
                                    {IDcheckbox: 7, IDrow: 7, Code: "Reinforcing Bar Construction"},
                                    {IDcheckbox: 8, IDrow: 8, Code: "Scaffolding"},
                                    {IDcheckbox: 9, IDrow: 9, Code: "Building Stone Construction"},
                                    {IDcheckbox: 10, IDrow: 10, Code: "Tiling"},
                                    {IDcheckbox: 11, IDrow: 11, Code: "Tile Roofing"},
                                    {IDcheckbox: 12, IDrow: 12, Code: "Plastering"},
                                    {IDcheckbox: 13, IDrow: 13, Code: "Plumbing"},
                                    {IDcheckbox: 14, IDrow: 14, Code: "Heat Insulation"},
                                    {IDcheckbox: 15, IDrow: 15, Code: "Interior Finishing"},
                                    {IDcheckbox: 16, IDrow: 16, Code: "Sash Setting"},
                                    {IDcheckbox: 17, IDrow: 17, Code: "Waterproofing"},
                                    {IDcheckbox: 18, IDrow: 18, Code: "Concrete Pressure Feeding"},
                                    {IDcheckbox: 19, IDrow: 19, Code: "Well Point Construction"},
                                    {IDcheckbox: 20, IDrow: 20, Code: "Paper Hanging"},
                                    {IDcheckbox: 21, IDrow: 21, Code: "Application of Construction Equipment"},
                                    {IDcheckbox: 22, IDrow: 22, Code: "Furnace Installation"}
                                ]
                                tblJobCategories.clear();
                                tblJobCategories.rows.add(dataJobCategories);
                                tblJobCategories.draw();
                            }
                            tblOperations.clear();
                            tblOperations.draw();
                        }
                    }
                    break;
            }
        });
    
        $('#tblJobCategories tbody').on('click', 'tr', function(e){
            var data = tblJobCategories.row($(this)).data();
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
                            tblJobCategories.$('tr.selected').removeClass('selected');
                        }
                        else {
                            tblJobCategories.$('tr.selected').removeClass('selected');
                            $(this).addClass('selected');
                            if (data.Code == "Cultivation Agriculture"){
                                dataOperations = [];
                                dataOperations.push('Facility Horticulture', 'Upland Field Cropping / Vegetable Growing', 'Fruit Growing');
                            }
                            else if (data.Code == "Livestock Agriculture"){
                                dataOperations = [];
                                dataOperations.push('Hog Raising', 'Poultry Farming (Collecting Chicken Eggs)', 'Dairy');
                            }
                            else if (data.Code == "Fishing Boat Fisheries"){
                                dataOperations = [];
                                dataOperations.push('Skipjack Pole And Line Fishery', 'Long-line Fishery, Squid Jigging, Purse Seine Fishery', 'Trawl And Seine Net Fishery', 'Gill Net Fishery', 'Set Net Fishery', 'Crab And Shrimp Basket Fishery', 'Stick-held-dipnet Fishery');
                            }
                            else if (data.Code == "Aquaculture"){
                                dataOperations = [];
                                dataOperations.push('Scallop and Oyster Farming');
                            }
                            else if (data.Code == "Well Drilling"){
                                dataOperations = [];
                                dataOperations.push('Percussion Type Well Drilling Operation', 'Rotary Type Well Drilling Operation');
                            }
                            else if (data.Code == "Building Sheet Metal Work"){
                                dataOperations = [];
                                dataOperations.push('Duct Sheet Metal Operation', 'Interior And Exterior Sheet Metal Operation');
                            }
                            else if (data.Code == "Freezing And Air Conditioning Apparatus Installing"){
                                dataOperations = [];
                                dataOperations.push('Freezing And Air Harmonizing Equipment Installation Work');
                            }
                            else if (data.Code == "Fixture Making"){
                                dataOperations = [];
                                dataOperations.push('Hand Processing Work Of Wooden Fixture');
                            }
                            else if (data.Code == "Carpentry"){
                                dataOperations = [];
                                dataOperations.push('Carpentry Contruction Work');
                            }
                            else if (data.Code == "Frame Working"){
                                dataOperations = [];
                                dataOperations.push('Framing Contruction Work');
                            }
                            else if (data.Code == "Reinforcing Bar Construction"){
                                dataOperations = [];
                                dataOperations.push('Assembling Reinforced Rod Bar Work');
                            }
                            else if (data.Code == "Scaffolding"){
                                dataOperations = [];
                                dataOperations.push('Scaffolding Building Work');
                            }
                            else if (data.Code == "Building Stone Construction"){
                                dataOperations = [];
                                dataOperations.push('Stone Processing Work', 'Work Of Putting Out Stones');
                            }
                            else if (data.Code == "Tiling"){
                                dataOperations = [];
                                dataOperations.push('Tiling Work');
                            }
                            else if (data.Code == "Tile Roofing"){
                                dataOperations = [];
                                dataOperations.push('Tile-roofing Work');
                            }
                            else if (data.Code == "Plastering"){
                                dataOperations = [];
                                dataOperations.push('Plasterers Work');
                            }
                            else if (data.Code == "Plumbing"){
                                dataOperations = [];
                                dataOperations.push('Construction Piping Work', 'Plant Piping Work');
                            }
                            else if (data.Code == "Heat Insulation"){
                                dataOperations = [];
                                dataOperations.push('Heat-retention and Cool-retention Construction Work');
                            }
                            else if (data.Code == "Interior Finishing"){
                                dataOperations = [];
                                dataOperations.push('Plastic-material Floor Finishing Construction Work', 'Carpeting Floor Finishing Construction Work', 'Metal-made foundation Construction Work', 'Board Finishing Construction Work', 'Curtain Installation Work');
                            }
                            else if (data.Code == "Sash Setting"){
                                dataOperations = [];
                                dataOperations.push('Building Sash Installation Work');
                            }
                            else if (data.Code == "Waterproofing"){
                                dataOperations = [];
                                dataOperations.push('Sealing Water-proof Construction Work');
                            }
                            else if (data.Code == "Concrete Pressure Feeding"){
                                dataOperations = [];
                                dataOperations.push('Concrete Pressure Transfer Construction Work');
                            }
                            else if (data.Code == "Well Point Construction"){
                                dataOperations = [];
                                dataOperations.push('Well-point Construction Work');
                            }
                            else if (data.Code == "Paper Hanging"){
                                dataOperations = [];
                                dataOperations.push('Painting Work');
                            }
                            else if (data.Code == "Application of Construction Equipment"){
                                dataOperations = [];
                                dataOperations.push('Dozing Work', 'Loading Work', 'Excavating Work', 'Road Rolling Work');
                            }
                            else{
                                dataOperations = [];
                                dataOperations.push('Furnace Installation Work');
                            }

                            OperationsData(dataOperations);
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
        if (!$.fn.DataTable.isDataTable("#tblCodes"))
        {
            tblCodes = $("#tblCodes").DataTable({

                data: dataCodes,
                columns: [
                    {
                        title: "<input type='checkbox' id='CheckAllitem' />",
                        render: function (data, row, meta){
                            return "<input type='checkbox' class='CheckItem text-center' value='" + meta.IDcheckbox + "'>";
                        },
                        width: "2%", orderable: false
                    },
                    { title: 'ID', data: "IDrow", width: "4%", className: "dt-center"},
                    { title: 'Code', data: "Code", width: "18%"},
                ],
                order: [[1, "asc"]],
            })
        }
    }

    function drawJobCategoriesTable(){
        if (!$.fn.DataTable.isDataTable("#tblJobCategories"))
        {
            tblJobCategories = $("#tblJobCategories").DataTable({
                data: dataJobCategories,
                columns: [
                    {
                        title: "<input type='checkbox' id='CheckAllitem' />",
                        render: function (data, row, meta){
                            return "<input type='checkbox' class='CheckItem text-center' value='" + meta.IDcheckbox + "'>";
                        },
                        width: "2%", orderable: false
                    },
                    { title: 'ID', data: "IDrow", width: "4%", className: "dt-center"},
                    { title: 'Code', data: "Code", width: "18%"},
                ],
                order: [[1, "asc"]],
            })
        }
    }

    function drawOperationsTable(){
        if (!$.fn.DataTable.isDataTable("#tblOperations"))
        {
            tblOperations = $("#tblOperations").DataTable({
                data: dataOperations,
                columns: [
                    {
                        title: "<input type='checkbox' id='CheckAllitem' />",
                        render: function (data, row, meta){
                            return "<input type='checkbox' class='CheckItem text-center' value='" + meta.IDcheckbox + "'>";
                        },
                        width: "2%", orderable: false
                    },
                    { title: 'ID', data: "IDrow", width: "4%", className: "dt-center"},
                    { title: 'Code', data: "Code", width: "18%"},
                ],
                order: [[1, "asc"]],
            })
        }
    }

    function OperationsData(JobCategoriesValue){
        for (var i = 0; i < JobCategoriesValue.length; i++){
            dataOperations[i] = {IDcheckbox: i + 1, IDrow: i + 1, Code: JobCategoriesValue[i]};
        }
        tblOperations.clear().draw();
        tblOperations.rows.add(dataOperations);
        tblOperations.draw();
    }
})();