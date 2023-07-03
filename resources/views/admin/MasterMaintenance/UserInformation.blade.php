@push('styles')
	<link href="{{ asset('css/admin/MasterMaintenance/JobInformation.css') }}" rel="stylesheet">
@endpush

@section('title')
User Information
@endsection

@extends('layout.admin')

@section('content')

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
							<button type="button" id="btnEdit" class="btn btn-sm btn-success btn-block" style="width: 90%; margin: auto;"><span class="fa fa-edit"></span><span class="btnLabel">Edit</span></button>
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
<div class="modal fade" id="mdlUser" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-blue-madison">
                <button type="button" class="close" aria-hidden="true"></button>
                <h4 class="modal-title" id="mdlUserTitle"> Create User</h4>
            </div>
            <div class="modal-body">
                <form id="frmUser" data-parsley-validate>
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
                                    <label class="input-group-text" style="width:80px;" id="lblUser"> User <span class="text-danger"> *</span></label>
                                </div>
                                <input type="text" id="OperationValue" name="OperationValue" class="form-control input" data-parsley-required data-parsley-errors-container="#err-OperationValue" autocomplete="off">
                                <input type="hidden" id="OperationID" name="OperationID" class="form-control input ID" data-parsley-errors-container="#err-CategoryID" value="0">
                            </div>
                            <div id="err-OperationValue"></div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="mb-1 col-sm-6">
                            <button type="button" id="btnSaveOperation" class="btn btn-sm btn-block btn-primary"><span class="fa fa-save"></span> <span class="btn-label">Save </span></button>
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

@endsection

@push('scripts')
	<script src="{{ asset('js/admin/MasterMaintenance/UserInformation.js') }}" defer></script>
@endpush
