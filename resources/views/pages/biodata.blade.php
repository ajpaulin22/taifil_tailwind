

@push('meta')
    <meta content="{{$biodata}}" name="biodata_type" />
@endpush

@extends('layout.client')

@section('content')
    <div class="mx-2 md:mx-auto max-w-7xl my-5">
        <ul class="tabs md:flex justify-between my-2 hidden ">
            <li data-tab-target="#personal_content" id="personal_tab" class="p-3 bg-green-800 text-white rounded-md shadow-xl transition-all duration-300 ease-in-out hover:shadow-inner hover:cursor-pointer hover:bg-green-700 ">
                Personal Data
            </li>
            @if($biodata == "SSW")
            <li data-tab-target="#seminar_content" id="seminar_tab" class="pointer-events-none p-3 bg-green-500 text-white rounded-md shadow-xl transition-all duration-300 ease-in-out hover:shadow-inner hover:cursor-pointer hover:bg-green-700"> 
                Seminar/Certificate
            </li>
            @endif
            <li data-tab-target="#education_content" id="education_tab" class="p-3 bg-green-500 text-white rounded-md shadow-xl transition-all duration-300 ease-in-out hover:shadow-inner hover:cursor-pointer hover:bg-green-700">
                Educational Background
            </li>
            <li data-tab-target="#emp_local_content" id="job_local_tab" class="p-3 bg-green-500 text-white rounded-md shadow-xl transition-all duration-300 ease-in-out hover:shadow-inner hover:cursor-pointer hover:bg-green-700">
                Employment Record(local)
            </li>
            <li data-tab-target="#emp_abroad_content" id="job_abroad_tab" class="p-3 bg-green-500 text-white rounded-md shadow-xl transition-all duration-300 ease-in-out hover:shadow-inner hover:cursor-pointer hover:bg-green-700">
                Employment Record(Abroad)
            </li>
            <li data-tab-target="#family_content" id="family_tab" class="p-3 bg-green-500 text-white rounded-md shadow-xl transition-all duration-300 ease-in-out hover:shadow-inner hover:cursor-pointer hover:bg-green-700">
                Family Information
            </li>
            <li data-tab-target="#upload_content" id="upload_tab" class="p-3 bg-green-500 text-white rounded-md  shadow-xl transition-all duration-300 ease-in-out hover:shadow-inner hover:cursor-pointer hover:bg-green-700">
                Upload ID
            </li>
        </ul>
    
        <div class="tab-content mt-5 rounded overflow-hidden border-2 border-green-950">
            <div id="personal_content" data-tab-content class="p-5 transition-all duration-300 ease-in-out" >

                @include('tab_contents.tab_personal')
            </div>
            @if($biodata == "SSW")
            <div id="seminar_content" data-tab-content class="hidden p-5">

                @include('tab_contents.tab_certificate')
            </div>
            @endif
            <div id="education_content" data-tab-content class="hidden p-5">

                @include('tab_contents.tab_educational')
            </div>
            <div id="emp_local_content" data-tab-content class="hidden p-5">

                @include('tab_contents.tab_empLocal')
            </div>
            <div id="emp_abroad_content" data-tab-content class="hidden p-5">

                @include('tab_contents.tab_empAbroad')
            </div>
            <div id="family_content" data-tab-content class="hidden p-5">
                @include('tab_contents.tab_family')
            </div>
            <div id="upload_content" data-tab-content class="hidden p-5">

                @include('tab_contents.tab_upload')
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{asset("js/client/Biodata.js")}}" defer></script>
@endpush