@push('styles')
	<link href="{{ asset('css/admin/MasterMaintenance/JobInformation.css') }}" rel="stylesheet">
@endpush

@section('title')
Job Information
@endsection

@extends('layout.admin')

@section('content')

<div class="row">
    <div class="col-sm-4">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Job Information</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <button type="button" id="btnAddCodes" class="btn btn-sm btn-info btn-block" style="width: 90%; margin: auto;"><span class="fa fa-plus"></span><span class="btnLabel">Add</span></button>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" id="btnEditCodes" class="btn btn-sm btn-success btn-block" style="width: 90%; margin: auto;"><span class="fa fa-edit"></span><span class="btnLabel">Edit</span></button>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" id="btnDeleteCodes" class="btn btn-sm btn-danger btn-block" style="width: 90%; margin: auto;"><span class="fa fa-trash"></span><span class="btnLabel">Delete</span></button>
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
    </div>
    <div class="col-sm-4">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Job Category</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <button type="button" id="btnAddJobCategories" class="btn btn-sm btn-info btn-block" style="width: 90%; margin: auto;"><span class="fa fa-plus"></span><span class="btnLabel">Add</span></button>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" id="btnEditJobCategories" class="btn btn-sm btn-success btn-block" style="width: 90%; margin: auto;"><span class="fa fa-edit"></span><span class="btnLabel">Edit</span></button>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" id="btnDeleteJobCategories" class="btn btn-sm btn-danger btn-block" style="width: 90%; margin: auto;"><span class="fa fa-trash"></span><span class="btnLabel">Delete</span></button>
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
    
    <div class="col-sm-4">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Job Operation</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="panel-body">
            <div class="row mb-2">
                    <div class="col-sm-4">
                        <button type="button" id="btnAddOperations" class="btn btn-sm btn-info btn-block" style="width: 90%; margin: auto;"><span class="fa fa-plus"></span><span class="btnLabel">Add</span></button>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" id="btnEditOperations" class="btn btn-sm btn-success btn-block" style="width: 90%; margin: auto;"><span class="fa fa-edit"></span><span class="btnLabel">Edit</span></button>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" id="btnDeleteOperations" class="btn btn-sm btn-danger btn-block" style="width: 90%; margin: auto;"><span class="fa fa-trash"></span><span class="btnLabel">Delete</span></button>
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
@endsection

@push('scripts')
	<script src="{{ asset('js/admin/MasterMaintenance/JobInformation.js') }}" defer></script>
@endpush
