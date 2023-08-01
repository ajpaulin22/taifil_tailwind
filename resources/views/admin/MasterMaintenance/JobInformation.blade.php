@push('styles')
	<link href="{{ asset('css/admin/MasterMaintenance/JobInformation.css') }}" rel="stylesheet">
@endpush

@section('title')
Job Information
@endsection

@extends('layout.admin')

@section('content')

<div class="row">
    {{-- <div class="col-sm-4">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Job Codes</h4>
            </div>
            <div class="panel-body">
                <div class="row mb-2" >
                    <div class="col-sm-4">
                        <button type="button" id="btnAddCodes" class="btn btn-sm btn-info btn-block" style="width: 90%; margin: auto;"><span class="fa fa-plus"></span><span class="btnLabel">Add</span></button>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" id="btnEditCodes" class="btn btn-sm btn-success btn-block" style="width: 90%; margin: auto;" disabled><span class="fa fa-edit"></span><span class="btnLabel">Edit</span></button>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" id="btnDeleteCodes" class="btn btn-sm btn-danger btn-block Delete" style="width: 90%; margin: auto;" ChkBoxName="JobCodeschkbox" ><span class="fa fa-trash"></span><span class="btnLabel">Delete</span></button>
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive xs">
                        <table class="table table-striped table-bordered tbl-100p" data-adjust="-30" id="tblCodes">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="col-sm-6">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Job Category</h4>
            </div>
            <div class="panel-body">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <button type="button" id="btnAddJobCategories" class="btn btn-sm btn-info btn-block" style="width: 90%; margin: auto;"><span class="fa fa-plus"></span><span class="btnLabel">Add</span></button>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" id="btnEditJobCategories" class="btn btn-sm btn-success btn-block CodeDisable" style="width: 90%; margin: auto;" disabled><span class="fa fa-edit"></span><span class="btnLabel">Edit</span></button>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" id="btnDeleteJobCategories" class="btn btn-sm btn-danger btn-block Delete" style="width: 90%; margin: auto;"><span class="fa fa-trash"></span><span class="btnLabel">Delete</span></button>
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive xs">
                        <table class="table table-striped table-bordered tbl-100p" data-adjust="-30" id="tblJobCategories">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Job Operation</h4>
            </div>
            <div class="panel-body">
            <div class="row mb-2">
                    <div class="col-sm-4">
                        <button type="button" id="btnAddOperations" class="btn btn-sm btn-info btn-block CodeDisable" style="width: 90%; margin: auto;" disabled><span class="fa fa-plus"></span><span class="btnLabel">Add</span></button>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" id="btnEditOperations" class="btn btn-sm btn-success btn-block CodeDisable CategoryDisable" style="width: 90%; margin: auto;" disabled><span class="fa fa-edit"></span><span class="btnLabel">Edit</span></button>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" id="btnDeleteOperations" class="btn btn-sm btn-danger btn-block Delete" style="width: 90%; margin: auto;"><span class="fa fa-trash"></span><span class="btnLabel">Delete</span></button>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-5">
                        <button type="button" id="btnViewQualification" class="btn btn-sm btn-danger btn-block" style="width: 90%; margin: auto;" disabled><span class="fa fa-eye"></span><span class="btnLabel">View Qualifications</span></button>
                    </div>
                    <div class="col-sm-3">
                        <button type="button" id="btnSaveHiring" class="btn btn-sm btn-warning btn-block" style="width: 100%; margin: auto;"><span class="fa fa-save"></span><span class="btnLabel">Save Hiring Status</span></button>
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive xs">
                        <table class="table table-striped table-bordered tbl-100p" data-adjust="-30" id="tblOperations">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
</div>
{{-- <div class="modal fade" id="mdlCode" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-blue-madison">
                <h4 class="modal-title" id="mdlCodeTitle"> Create Code</h4>
            </div>
            <div class="modal-body">
                <form id="frmCode" data-parsley-validate>
                    <div class="row ">
                        <div class="col-sm-12">
                            <div class="input-group input-group-sm m-b-5">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" style="width:80px;" id="lblCode"> Code <span class="text-danger"> *</span></label>
                                </div>
                                <input type="text" id="CodeValue" name="CodeValue" class="form-control input Value" data-parsley-required data-parsley-errors-container="#err-CodeValue" autocomplete="off">
                                <input type="hidden" id="CodeID" name="CodeID" class="form-control input ID" data-parsley-errors-container="#err-CodeID">
                            </div>
                            <div id="err-CodeValue"></div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="mb-1 col-sm-6">
                            <button type="button" id="btnSaveCode" class="btn btn-sm btn-block btn-primary"><span class="fa fa-save"></span> <span class="btn-label">Save </span></button>
                        </div>
                        <div class="mb-1 col-sm-6">
                            <button type="button" id="btnCancelCode" class="btn btn-sm btn-block red" data-dismiss="modal"><span class="fa fa-times"></span> Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}
<div class="modal fade" id="mdlCategory" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-blue-madison">
                <h4 class="modal-title" id="mdlCategoryTitle"> Create Category</h4>
            </div>
            <div class="modal-body">
                <form id="frmCategory" data-parsley-validate>
                    {{-- <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group input-group-sm m-b-5">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" style="width:80px;" id="lblCodeParent"> Type <span class="text-danger"> *</span></label>
                                </div>
                                <input type="hidden" id="ValueCode" name="ValueCode" class="form-control input" autocomplete="off" readonly>
                                <input type="text" id="TextCode" name="TextCode" class="form-control input" autocomplete="off" readonly>
                            </div>
                            <div id="err-Type"></div>
                        </div>                                                                                                                                                                                                          
                    </div> --}}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group input-group-sm m-b-5">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" style="width:80px;" id="lblCodeParent">Job Type <span class="text-danger"> *</span></label>
                                </div>
                                {{-- <input type="hidden" id="ValueCode" name="ValueCode" class="form-control input" autocomplete="off" readonly>
                                <input type="text" id="TextCode" name="TextCode" class="form-control input" autocomplete="off" readonly> --}}
                                <select type="text" id="JobType" name="JobType" class="form-control input" data-parsley-required data-parsley-errors-container="#err-JobType" autocomplete="off">
                                    <option value=""></option>
                                    <option value="TITP">TITP</option>
                                    <option value="SSW">SSW</option>
                                    <option value="DIRECT">DIRECT</option>
                                </select>
                            </div>
                            <div id="err-Type"></div>
                        </div>                                                                                                                                                                                                          
                    </div>
                    <div class="row ">
                        <div class="col-sm-12">
                            <div class="input-group input-group-sm m-b-5">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" style="width:80px;" id="lblCode"> Category <span class="text-danger"> *</span></label>
                                </div>
                                <input type="text" id="CategoryValue" name="CategoryValue" class="form-control input" data-parsley-required data-parsley-errors-container="#err-CategoryValue" autocomplete="off">
                                <input type="hidden" id="CategoryID" name="CategoryID" class="form-control input ID" data-parsley-errors-container="#err-CategoryID" value="0">
                            </div>
                            <div id="err-CategoryValue"></div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="mb-1 col-sm-6">
                            <button type="submit" id="btnSaveCategory" class="btn btn-sm btn-block btn-primary"><span class="fa fa-save"></span> <span class="btn-label">Save </span></button>
                        </div>
                        <div class="mb-1 col-sm-6">
                            <button type="button" id="btnCancelCategory" class="btn btn-sm btn-block red" data-dismiss="modal"><span class="fa fa-times"></span> Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="mdlOperation" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-blue-madison">
                <h4 class="modal-title" id="mdlOperationTitle"> Create Operation</h4>
            </div>
            <div class="modal-body">
                <form id="frmOperation" data-parsley-validate>
                    <div class="row" id="divCategory">
                        <div class="col-sm-12">
                            <div class="input-group input-group-sm m-b-5">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" style="width:80px;" id="lblCategoryParent"> Category <span class="text-danger"> *</span></label>
                                </div>
                                <input type="hidden" id="ValueCategory" name="ValueCategory" class="form-control input" autocomplete="off" readonly>
                                <input type="text" id="TextCategory" name="TextCategory" class="form-control input" autocomplete="off" readonly>
                            </div>
                            <div id="err-Type"></div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-sm-12">
                            <div class="input-group input-group-sm m-b-5">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" style="width:80px;" id="lblOperation"> Operation <span class="text-danger"> *</span></label>
                                </div>
                                <input type="text" id="OperationValue" name="OperationValue" class="form-control input" data-parsley-required data-parsley-errors-container="#err-OperationValue" autocomplete="off">
                                <input type="hidden" id="OperationID" name="OperationID" class="form-control input ID" data-parsley-errors-container="#err-CategoryID" value="0">
                            </div>
                            <div id="err-OperationValue"></div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="mb-1 col-sm-6">
                            <button type="submit" id="btnSaveOperation" class="btn btn-sm btn-block btn-primary"><span class="fa fa-save"></span> <span class="btn-label">Save </span></button>
                        </div>
                        <div class="mb-1 col-sm-6">
                            <button type="button" id="btnCancelOperation" class="btn btn-sm btn-block red" data-dismiss="modal"><span class="fa fa-times"></span> Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mdlQualification" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-blue-madison">
                <h4 class="modal-title" id="mdlQualificationTitle"> Create Qualification</h4>
            </div>
            <div class="modal-body">
                <form id="frmQualification" data-parsley-validate>
                    <div class="row" id="divCategoryQualification">
                        <div class="col-sm-12">
                            <div class="input-group input-group-sm m-b-5">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" style="width:90px;" id="lblCategoryQualificationParent" readonly> Operation <span class="text-danger"> *</span></label>
                                </div>
                                <input type="hidden" id="ValueCategoryQualification" name="ValueCategoryQualification" class="form-control input" autocomplete="off" readonly>
                                <input type="text" id="TextCategoryQualification" name="TextCategoryQualification" class="form-control input" autocomplete="off" readonly>
                            </div>
                            <div id="err-Type"></div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-sm-12">
                            <div class="input-group input-group-sm m-b-5">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" style="width:90px;" id="lblQualification"> Qualification <span class="text-danger"> *</span></label>
                                </div>
                                <input type="text" id="QualificationValue" name="QualificationValue" class="form-control input" maxlength="150" data-parsley-required data-parsley-errors-container="#err-QualificationValue" autocomplete="off">
                                <input type="hidden" id="QualificationID" name="QualificationID" class="form-control input ID" data-parsley-errors-container="#err-CategoryID" value="0">
                            </div>
                            <div id="err-QualificationValue"></div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="mb-1 col-sm-6">
                            <button type="submit" id="btnSaveQualification" class="btn btn-sm btn-block btn-primary"><span class="fa fa-save"></span> <span class="btn-label">Save </span></button>
                        </div>
                        <div class="mb-1 col-sm-6">
                            <button type="button" id="btnCancelQualification" class="btn btn-sm btn-block red"><span class="fa fa-times"></span> Close</button>
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

<div class="modal fade" id="mdlQualificationTable" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-blue-madison">
                <h4 class="modal-title" id="mdlCodeTitle"> Qualifcations</h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <h4 class="panel-title">Job Qualifications</h4>
                        </div>
                        <div class="panel-body">
                        <div class="row mb-2">
                                <div class="col-sm-4">
                                    <button type="button" id="btnAddQualifications" class="btn btn-sm btn-info btn-block" style="width: 90%; margin: auto;"><span class="fa fa-plus"></span><span class="btnLabel">Add</span></button>
                                </div>
                                <div class="col-sm-4">
                                    <button type="button" id="btnEditQualifications" class="btn btn-sm btn-success btn-block" style="width: 90%; margin: auto;" disabled><span class="fa fa-edit"></span><span class="btnLabel">Edit</span></button>
                                </div>
                                <div class="col-sm-4">
                                    <button type="button" id="btnDeleteQualifications" class="btn btn-sm btn-danger btn-block" style="width: 90%; margin: auto;"><span class="fa fa-trash"></span><span class="btnLabel">Delete</span></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="table-responsive xs">
                                    <table class="table table-striped table-bordered tbl-100p" data-adjust="-30" id="tblQualifications">
                                    </table>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px;">
                                <div class="mb-1 col-sm-4 offset-8">
                                    <button type="button" id="btnCancelQualificationTable" class="btn btn-sm btn-block btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
	<script src="{{ asset('js/admin/MasterMaintenance/JobInformation.js') }}" defer></script>
@endpush
