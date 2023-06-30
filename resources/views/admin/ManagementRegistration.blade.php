@push('styles')
	<link href="{{ asset('css/admin/ManagementRegistration.css') }}" rel="stylesheet">
@endpush

@section('title')
Management Registration
@endsection

@extends('layout.admin')

@section('content')

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
            <div class="col-sm-1 mb-2">
                <div class="form-group">
                    <label>Type:</label>
                    <select class="form-control" id="Type" style="width: 70%;">
                        <option value="1">TITP</option>
                        <option value="2">SSW</option>
                        <option value="3">Direct</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-2 mb-2" style='margin-left:45px;'>
                <div class="form-group">
                    <label>Code:</label>
                    <select class="form-control" id="Code" style="width: 70%;">
                        <option value="1">Agriculture</option>
                        <option value="2">Fishery</option>
                        <option value="3">Construction</option>
                        <!-- <option value="4">Food Manufacturing</option>
                        <option value="5">Textile</option>
                        <option value="6">Machinery</option>
                        <option value="7">Others</option> -->
                    </select>
                </div>
            </div>
            <div class="col-sm-3 mb-2">
                <div class="form-group">
                    <label>Job Categories:</label>
                    <select class="form-control" id="JobCategories" style="width: 70%;">
                        <option value=""></option>
                        <option value="CultivationAgriculture">Cultivation Agriculture</option>
                        <option value="LivestockAgriculture">Livestock Agriculture</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3 mb-2">
                <div class="form-group">
                    <label>Operations:</label>
                    <select class="form-control" id="Operations" style="width: 70%;">
                    </select>
                </div>
            </div>
            <div class="col-sm-2 mb-2" style='width: 14.1%'>
                <div class="form-group" style='width: 200px;'>
                    <label>Age:</label>
                    <input type="text" id="AgeFrom" class="form-control" style="width: 30%; text-align: center;"> - <input type="text" id="AgeTo" class="form-control" style="width: 30%; text-align: center;">
                </div>
            </div>
            <div class="col-sm-1 mb-2"> 
                <button type="button" id="btnFilter" class="btn btn-sm btn-info btn-block" style="width: 100px; margin-top:4px;"><span class="fa fa-filter"></span><span class="btnLabel">Filter</span></button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-1 mb-2" style='padding-right:0px; margin-right: 5px; width:8%'>
                <button type="button" id="btnAdd" class="btn btn-sm btn-primary btn-block" style="width: 150px;"><span class="fa fa-plus"></span><span class="btnLabel">Add Applicant</span></button>
            </div>
            <div class="col-sm-1 mb-2" style='padding-right:0px; margin-right: 5px; width:5.33333%'>
                <button type="button" id="btnEdit" class="btn btn-sm btn-warning btn-block" style="width: 100px;"><span class="fa fa-edit"></span><span class="btnLabel">Edit</span></button>
            </div>
            <div class="col-sm-1 mb-2" style='padding-right:0px; margin-right: 5px; width:5.33333%'>
                <button type="button" id="btnDelete" class="btn btn-sm btn-danger btn-block" style="width: 100px;"><span class="fa fa-trash"></span><span class="btnLabel">Delete</span></button>
            </div>
            <div class="col-sm-2 offset-6 mb-2" style='text-align: right;'>
                <button type="button" id="btnSave" class="btn btn-sm btn-primary btn-block" style="width: 200px;"><span class="fa fa-save"></span><span class="btnLabel">Update Applicant Status</span></button>
            </div>
            <div class="col-sm-1 mb-2">
                <button type="button" id="btnDownloadExcel" class="btn btn-sm btn-success btn-block" style="width: 200px;"><span class="fa fa-file-excel-o"></span><span class="btnLabel">Generate Excel</span></button>
            </div>
        </div>
        <div class="table-responsive xs " style='overflow-x: visible !important'>
            <table class="table table-striped table-bordered tbl-100p display" style='width: 100%;' data-adjust="-30" id="tblManagementRegistration">
                <thead style='border: 1px solid black;'>
                    <tr>
                        <th rowspan="2" class='HeaderTable' style='padding-bottom:25px; '></th>
                        <th rowspan="2" class='HeaderTable' style='margin:auto;text-align:center; '>ID</th>
                        <th rowspan="2" class='HeaderTable'>Name</th>
                        <th rowspan="2" class='HeaderTable'>Job Categories</th>
                        <th rowspan="2" class='HeaderTable'>Program</th>
                        <th colspan="3" style='text-align: center; border-bottom: 1px solid white !important;'>Interview History</th>
                        <th rowspan="2" class='HeaderTable'>Age</th>
                        <th rowspan="2" class='HeaderTable'>Sent To Abroad</th>
                    </tr>
                    <tr>
                        <th style='text-align:center;'>Show/No Show</th>
                        <th style='text-align:center;'>InterviewDate</th>
                        <th style='text-align:center;'>Company</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td name="checkbox" ><input type="checkbox"></td>
                        <td name="ID" style='text-align: center;'></td>
                        <td name="Name"></td>
                        <td name="JobCategories"></td>
                        <td name="Program"></td>
                        <td name=Show></td>
                        <td name="InterviewDate"></td>
                        <td name="Company"></td>
                        <td name="Age"></td>
                        <td name="ToAbroad"></td>
                    </tr>
                </tbody>
            </table>
        </div>
	</div>
</div>

@endsection

@push('scripts')
	<script src="{{ asset('js/admin/ManagementRegistration.js') }}" defer></script>
@endpush
