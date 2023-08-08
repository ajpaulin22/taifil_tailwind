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
                        <button type="button" id="btnAddJaplang" class="btn btn-sm btn-info btn-block CodeDisable" style="width: 90%; margin: auto;"><span class="fa fa-plus"></span><span class="btnLabel">Add</span></button>
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
<div class="modal fade" id="mdlPrometrics" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-blue-madison">
                <h4 class="modal-title" id="mdlPrometricsTitle"> Create Prometrics</h4>
            </div>
            <div class="modal-body">
                <form id="frmPrometrics" data-parsley-validate>
                    <div class="row ">
                        <div class="col-sm-12">
                            <div class="input-group input-group-sm m-b-5">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" style="width:90px;" id="lblPrometrics"> Prometrics <span class="text-danger"> *</span></label>
                                </div>
                                <input type="text" id="Value" name="Value" class="form-control input" maxlength="150" data-parsley-required data-parsley-errors-container="#err-Value" autocomplete="off">
                                <input type="hidden" id="ID" name="ID" class="form-control input ID" data-parsley-errors-container="#err-CategoryID" value="0">
                            </div>
                            <div id="err-Value"></div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="mb-1 col-sm-6">
                            <button type="submit" id="btnSave" class="btn btn-sm btn-block btn-primary"><span class="fa fa-save"></span> <span class="btn-label">Save </span></button>
                        </div>
                        <div class="mb-1 col-sm-6">
                            <button type="button" id="btnCancel" class="btn btn-sm btn-block btn-danger"><span class="fa fa-times"></span> Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="loading_modal" class="modal loading_modal" data-backdrop="static">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <img src="/images/ajax-loader.gif" height="100" class="block-centered">
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