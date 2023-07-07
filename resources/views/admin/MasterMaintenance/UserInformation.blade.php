@push('styles')
	<link href="{{ asset('css/admin/MasterMaintenance/JobInformation.css') }}" rel="stylesheet">
@endpush

@section('title')
User Information
@endsection

@extends('layout.admin')

@section('content')

<style>
    .input-group-text{
        text-align: right !important;
        display: block !important;
    }
</style>
<div class="panel panel-inverse">
	<div class="panel-heading">
		<h4 class="panel-title">User Information</h4>
		<div class="panel-heading-btn">
			<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
			<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
		</div>
	</div>
	<div class="panel-body">

		<div class="panel panel-inverse" id="main-panel" style="margin: auto; margin-top: 10px; width: 95%; font-size: 14px; box-shadow: 0px 2px 5px 2px rgba(0,0,0,0.1);" >
			<div class="panel-body">
				<div class="row">
					<div class="row col-sm-6 mb-2">
						<div class="col-sm-2">
							<button type="button" id="btnAdd" class="btn btn-sm btn-info btn-block" style="width: 90%; margin: auto;"><span class="fa fa-plus"></span><span class="btnLabel">Add</span></button>
						</div>
						<div class="col-sm-2">
							<button type="button" id="btnEdit" class="btn btn-sm btn-success btn-block" style="width: 90%; margin: auto;" disabled><span class="fa fa-edit"></span><span class="btnLabel">Edit</span></button>
						</div>
						<div class="col-sm-2">
							<button type="button" id="btnDelete" class="btn btn-sm btn-danger btn-block" style="width: 90%; margin: auto;"><span class="fa fa-trash"></span><span class="btnLabel">Delete</span></button>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="table-responsive xs">
						<table class="table table-bordered tbl-100p" data-adjust="-30" id="tblUserInformation">
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="mdlAddUser" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue-madison">
                <h4 class="modal-title" id="mdlUserTitle"> Create User</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">Job Codes</h4>
                    </div>
                    <div class="panel-body" style="background-color: rgb(241, 238, 238)">
                        <form id="frmUser" data-parsley-validate>
                            <div class="row col-sm-12">
                                <div class="input-group m-b-5">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" id="lblPosition" style="width: 140px;"> Position <span class="text-danger"> *</span></label>
                                    </div>
                                    <select class="form-control" id="Position" name="Position" placeholder="Please Select Position" required>
                                        <option id=""></option>
                                        <option value="1">Admin</option>
                                        <option value="0">Staff</option>
                                    </select>
                                </div>
                                <div id="err-Position"></div>
                            </div>
                            <div class="row col-sm-12">
                                <div class="input-group m-b-5">
                                    <div class="input-group-prepend" style="text-align:right;">
                                        <label class="input-group-text" id="lblFirstName" style="width: 140px;"> First Name <span class="text-danger"> *</span></label>
                                    </div>
                                    <input type="hidden" id="UserID" name="UserID" class="form-control input" autocomplete="off" value=0>
                                    <input type="text" id="FirstName" name="FirstName" class="form-control input" autocomplete="off" required>
                                </div>
                                <div id="err-FirstName"></div>
                            </div>
                            <div class="row col-sm-12">
                                <div class="input-group m-b-5">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" id="lblLastName" style="width: 140px;"> Last Name <span class="text-danger"> *</span></label>
                                    </div>
                                    <input type="text" id="LastName" name="LastName" class="form-control input" autocomplete="off" required>
                                </div>
                                <div id="err-LastName"></div>
                            </div>
                            <div class="row col-sm-12">
                                <div class="input-group m-b-5">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" id="lblUserName" style="width: 140px;"> User Name <span class="text-danger"> *</span></label>
                                    </div>
                                    <input type="text" id="UserName" name="UserName" class="form-control input" autocomplete="off" required>
                                </div>
                                <div id="err-UserName"></div>
                            </div>
                            <div class="row col-sm-12">
                                <div class="input-group m-b-5">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" id="lblEmailAddress" style="width: 140px;"> Email Address <span class="text-danger"> *</span></label>
                                    </div>
                                    <input type="text" id="EmailAddress" name="EmailAddress" class="form-control input" autocomplete="off" required>
                                </div>
                                <div id="err-EmailAddress"></div>
                            </div>
                            <div class="row col-sm-12">
                                <div class="input-group m-b-5">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" id="lblPassword" style="width: 140px;"> Password <span class="text-danger"> *</span></label>
                                    </div>
                                    <input type="password" id="Password" name="Password" class="form-control input" autocomplete="off" required>
                                </div>
                                <div id="err-Password"></div>
                            </div>
                            <div class="row col-sm-12">
                                <div class="input-group m-b-5">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" id="lblConfirmPassword" style="width: 140px;"> Confirm Password <span class="text-danger"> *</span></label>
                                    </div>
                                    <input type="password" id="ConfirmPassword" name="ConfirmPassword" class="form-control input" autocomplete="off" required>
                                </div>
                                <div id="err-ConfirmPassword"></div>
                            </div>
                            <div class="row" style="margin-top: 10px;">
                                <div class="mb-1 offset-6 col-sm-3">
                                    <button type="submit" id="btnSaveUser" class="btn btn-sm btn-block btn-primary"><span class="fa fa-save"></span> <span class="btn-label">Save </span></button>
                                </div>
                                <div class="mb-1 col-sm-3">
                                    <button type="button" id="btnCancelUser" class="btn btn-sm btn-block btn-danger"><span class="fa fa-times"></span> Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
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
	<script src="{{ asset('js/admin/MasterMaintenance/UserInformation.js') }}" defer></script>
@endpush
