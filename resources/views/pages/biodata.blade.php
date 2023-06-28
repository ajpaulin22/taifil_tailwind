

@push('meta')
    <meta content="{{$biodata}}" name="biodata_type" />
@endpush

@extends('layout.client')

@section('content')
<nav class="px-10 py-5 bg-green-500" aria-label="Breadcrumb">
    <div class="max-w-7xl flex justify-between mx-auto px-10">
        <div class="text-2xl text-white">Biodata</div>
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
      <li class="inline-flex items-center">
        <a href="/" class="text-white inline-flex items-center text-sm font-medium hover:text-blue-600">
          <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
          Home
        </a>
      </li>
      <li aria-current="page">
        <div class="flex items-center">
          <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
          <span class="ml-1 text-sm font-medium text-white md:ml-2 dark:text-gray-400">{{$biodata}}</span>
        </div>
      </li>
      <li aria-current="page">
        <div class="flex items-center">
          <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
          <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Biodata</span>
        </div>
      </li>
    </ol>
    </div>
    
</nav>
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