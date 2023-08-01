@push("styles"){
    <link rel="stylesheet" href="{{asset("css/admin/MasterMaintenance/PromJapLang.css")}}">
}

@section('title')
    Prometrics & Japanese Language
@endsection

@extends("layout.admin")

@section("content")
<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Prometrics</h4>
            </div>
            <div class="panel-body">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <button type="button" id="btnAddPrometrics" class="btn btn-sm btn-info btn-block" style="width: 90%; margin: auto;"><span class="fa fa-plus"></span><span class="btnLabel">Add</span></button>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" id="btnEditPrometrics" class="btn btn-sm btn-success btn-block CodeDisable" style="width: 90%; margin: auto;" disabled><span class="fa fa-edit"></span><span class="btnLabel">Edit</span></button>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" id="btnDeletePrometrics" class="btn btn-sm btn-danger btn-block Delete" style="width: 90%; margin: auto;"><span class="fa fa-trash"></span><span class="btnLabel">Delete</span></button>
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive xs">
                        <table class="table table-striped table-bordered tbl-100p" data-adjust="-30" id="tblprometrics">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Japanese Language</h4>
            </div>
            <div class="panel-body">
            <div class="row mb-2">
                    <div class="col-sm-4">
                        <button type="button" id="btnAddJaplang" class="btn btn-sm btn-info btn-block CodeDisable" style="width: 90%; margin: auto;" disabled><span class="fa fa-plus"></span><span class="btnLabel">Add</span></button>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" id="btnEditJaplang" class="btn btn-sm btn-success btn-block CodeDisable CategoryDisable" style="width: 90%; margin: auto;" disabled><span class="fa fa-edit"></span><span class="btnLabel">Edit</span></button>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" id="btnDeleteJaplang" class="btn btn-sm btn-danger btn-block Delete" style="width: 90%; margin: auto;"><span class="fa fa-trash"></span><span class="btnLabel">Delete</span></button>
                    </div>
                </div>

                <div class="row">
                    <div class="table-responsive xs">
                        <table class="table table-striped table-bordered tbl-100p" data-adjust="-30" id="tbljaplang">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push("scripts"){
    <script src="{{asset("js/admin/MasterMaintenance/PromJapLang.js")}}"></script>
}