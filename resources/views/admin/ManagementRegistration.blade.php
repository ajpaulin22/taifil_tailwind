@push('styles')
	<link href="{{ asset('css/admin/ManagementRegistration.css') }}" rel="stylesheet">
@endpush

@section('title')
Management Registration
@endsection

@extends('layout.admin')

@section('content')
<style>
    .form-control{
        display: inline;
    }
    body table.dataTable tbody tr.selected td{
        font-weight: 500;
    }
    .select2{
        width: 100% !important;
    }
</style>
<div class="panel panel-inverse">
	<div class="panel-heading">
		<h4 class="panel-title">Management Registration</h4>
		<div class="panel-heading-btn">
			<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
			<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
		</div>
	</div>
	<div class="panel-body">
		<div class="row">
            <div class="col-sm-2 mb-2">
                <div class="form-group">
                    <label>Type:</label>
                    <select class="form-control filter" id="Type">
                        <option value=""></option>
                        <option value="TITP">TITP</option>
                        <option value="SSW">SSW</option>
                        <option value="Direct">Direct</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-2 mb-2" >
                <div class="form-group">
                    <label>Code:</label>
                    <select class="form-control filter" id="Code" >
                    </select>
                </div>
            </div>
            <div class="col-sm-2 mb-2">
                <div class="form-group">
                    <label>Job Categories:</label>
                    <select class="form-control filter" id="JobCategories" >
                    </select>
                </div>
            </div>
            <div class="col-sm-3 mb-2">
                <div class="form-group">
                    <label>Operations:</label>
                    <select class="form-control filter" id="Operations" >
                    </select>
                </div>
            </div>
            <div class="col-sm-2 mb-2" >
                <div class="form-group" >
                    <label style="margin-right:150px;">Age:</label>
                    <input type="text" id="AgeFrom" class="form-control filter" style="width: 30%; text-align: center;" > - <input type="text" id="AgeTo" class="form-control filter" style="width: 30%; text-align: center;">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-1 mb-2" style='padding-right:0px;'>
                <button type="button" id="btnAdd" class="btn btn-sm btn-primary btn-block" style="padding-left: 0px; padding-right: 0px;"><span class="fa fa-plus"></span><span class="btnLabel">Add Applicant</span></button>
            </div>
            <div class="col-sm-1 mb-2" style='padding-right:0px;'>
                <button type="button" id="btnEdit" class="btn btn-sm btn-warning btn-block"><span class="fa fa-edit"></span><span class="btnLabel">Edit</span></button>
            </div>
            <div class="col-sm-1 mb-2" style='padding-right:0px;'>
                <button type="button" id="btnDelete" class="btn btn-sm btn-danger btn-block"><span class="fa fa-trash"></span><span class="btnLabel">Delete</span></button>
            </div>
            <div class="col-sm-2 offset-6 mb-2" style='text-align: right;'>
                <button type="button" id="btnUpdateInterview" class="btn btn-sm btn-primary btn-block"><span class="fa fa-save"></span><span class="btnLabel">Update Interview History</span></button>
            </div>
            <div class="col-sm-1 mb-2">
                <button type="button" id="btnSaveAbroad" class="btn btn-sm btn-warning btn-block" style="padding-left: 0px; padding-right: 0px;"><span class="fa fa-plus"></span><span class="btnLabel">Save Abroad</span></button>
            </div>
        </div>
        <div class="table-responsive xs ">
            <table class="table table-striped table-bordered tbl-100p display" style='width: 100%;' data-adjust="-30" id="tblManagementRegistration">
                <thead style='border: 1px solid black;'>
                    <tr>
                        <th rowspan="2" class='HeaderTable' style='padding-bottom:25px; '></th>
                        <th rowspan="2" class='HeaderTable'>Name</th>
                        <th rowspan="2" class='HeaderTable'>Job Categories</th>
                        <th rowspan="2" class='HeaderTable'>Program</th>
                        <th colspan="4" style='text-align: center; border-bottom: 1px solid white !important;'>Interview History</th>
                        <th rowspan="2" class='HeaderTable'>Age</th>
                        <th rowspan="2" class='HeaderTable'>Sent To Abroad</th>
                        <th rowspan="2" class='HeaderTable'>Abroad Date</th>
                    </tr>
                    <tr>
                        <th style='text-align:center;'>Show/No Show</th>
                        <th style='text-align:center;'>InterviewDate</th>
                        <th style='text-align:center;'>InterviewCount</th>
                        <th style='text-align:center;'>Company</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td name="checkbox" ><input type="checkbox"></td>
                        <td name="Name"></td>
                        <td name="Category"></td>
                        <td name="JobType"></td>
                        <td name=AttendInterview></td>
                        <td name="InterviewDate"></td>
                        <td name="InterviewCount"></td>
                        <td name="Company"></td>
                        <td name="Age"></td>
                        <td name="ToAbroad"></td>
                        <td name="AbroadDate"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-sm-2 mb-2" style='padding-right:0px;'>
                <button type="button" id="btnDownloadExcel" class="btn btn-sm btn-success btn-block"><span class="fa fa-file-excel-o"></span><span class="btnLabel">Generate Excel</span></button>
            </div>
        </div>
	</div>
</div>

<div class="modal fade" id="mdlApplicant" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-blue-madison">
                <button type="button" class="close" aria-hidden="true"></button>
                <h4 class="modal-title" id="mdlApplicantTitle"> Create Applicant</h4>
            </div>
            <div class="modal-body">
                <form id="frmApplicant" data-parsley-validate>
                    <div class="row ">
                        <div class="col-sm-12">
                            <div class="input-group input-group-sm m-b-5">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" style="width:80px;" id="lblType"> Job Type <span class="text-danger"> *</span></label>
                                </div>
                                <select type="text" id="JobType" name="JobType" class="form-control input" data-parsley-required data-parsley-errors-container="#err-JobType" autocomplete="off">
                                    <option value="TITP">TITP</option>
                                    <option value="SSW">SSW</option>
                                    <option value="DIRECT">DIRECT</option>
                                </select>
                            </div>
                            <div id="err-JobType"></div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="mb-1 col-sm-6">
                            <button type="button" id="btnCreateApplicant" class="btn btn-sm btn-block btn-primary"><span class="fa fa-share"></span> <span class="btn-label">Go </span></button>
                        </div>
                        <div class="mb-1 col-sm-6">
                            <button type="button" id="btnCancelApplicant" class="btn btn-sm btn-block red" data-dismiss="modal"><span class="fa fa-times"></span> Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mdlInterview" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-blue-madison">
                <h4 class="modal-title" id="mdlInterviewTitle"> View Interview Information</h4>
            </div>
            <div class="modal-body">
                <div class="row col-sm-12 mb-2">
                    <div class="col-sm-2 offset-10 mb-2">
                        <button type="button" id="btnAddInterview" class="btn btn-sm btn-block btn-primary"><span class="fa fa-plus"></span> <span class="btn-label">Add Interview</span></button>
                    </div>
                </div>
                <div class="row col-sm-12 mb-2">
                    <div class="table-responsive xs ">
                        <table class="table table-striped table-bordered tbl-100p display" style='width: 100%;' data-adjust="-30" id="tblInterview">
                        </table>
                    </div>
                </div>
                <div class="row col-sm-12" style="margin-top: 10px;">
                    <div class="mb-1 col-sm-3 offset-9">
                        <button type="button" id="btnCancelInterview" class="btn btn-sm btn-block btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mdlAddInterview" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-blue-madison">
                <h4 class="modal-title" id="mdlInterviewTitle"> Add Interview Information</h4>
            </div>
            <div class="modal-body">
                <form id="frmInterview" data-parsley-validate>
                    <div class="row col-sm-12">
                        <div class="col-sm-5">
                            <div class="input-group input-group-sm m-b-5">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" style="width:127px;" id="lblAttendInterview"> Attended Interview <span class="text-danger"> *</span></label>
                                </div>
                                <select class="form-control" id="AttendInterview" required>
                                    <option value=""></option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div id="err-AttendInterview"></div>
                        </div>
                        <div class="col-sm-7">
                            <div class="input-group input-group-sm m-b-5">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" style="width:127px;" id="lblInterviewDate"> Interview Date <span class="text-danger"> *</span></label>
                                </div>
                                <input type="text" id="InterviewDate" name="InterviewDate" class="form-control input" data-parsley-required data-parsley-errors-container="#err-InterviewDate" autocomplete="off">
                            </div>
                            <div id="err-AttendInterview"></div>
                        </div>
                    </div>
                    <div class="row col-sm-12">
                        <div class="col-sm-12">
                            <div class="input-group input-group-sm m-b-5">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" style="width:127px;" id="lblCompany"> Company <span class="text-danger"> *</span></label>
                                </div>
                                <input type="text" id="Company" name="Company" class="form-control input" required data-parsley-required data-parsley-errors-container="#err-Company" autocomplete="off">
                            </div>
                            <div id="err-Company"></div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="mb-1 col-sm-3 offset-6">
                            <button type="submit" id="btnSaveInterview" class="btn btn-sm btn-block btn-primary"><span class="fa fa-save"></span> <span class="btn-label">Save </span></button>
                        </div>
                        <div class="mb-1 col-sm-3">
                            <button type="button" id="btnCancelAddInterview" class="btn btn-sm btn-block btn-danger"><span class="fa fa-times"></span> Close</button>
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

@push('scripts')
	<script src="{{ asset('js/admin/ManagementRegistration.js') }}" defer></script>
@endpush
