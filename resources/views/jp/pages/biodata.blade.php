
@section('title')
    Biodata
@endsection
@push('meta')
    <meta content="{{$biodata}}" name="biodata_type" />
@endpush

@extends('layout.client')

@section('content')


<x-opening_spin/>
<nav class="py-2 px-1 md:px-10 md:py-5 bg-green-500 " aria-label="Breadcrumb">
    <div class="max-w-7xl text-center md:flex justify-between mx-auto px-10">
        <div class="text-sm md:text-2xl text-white">Biodata</div>
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
      <li class="inline-flex items-center">
        <a href="/" class="text-white inline-flex items-center text-xs md:text-sm font-medium hover:text-blue-600">
          <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
          Home
        </a>
      </li>
      <li aria-current="page">
        <div class="flex items-center ">
          <svg aria-hidden="true" class="w-6 h-6 text-gray-400 text-xs md:text-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
          <span class="ml-1 md:text-sm font-medium text-white md:ml-2 text-xs">{{$biodata}}</span>
        </div>
      </li>
      <li aria-current="page">
        <div class="flex items-center">
          <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
          <span class="ml-1 text-xs md:text-sm font-medium text-gray-500 md:ml-2">Biodata</span>
        </div>
      </li>
    </ol>
    </div>
    
  </nav>
    <div class="mx-2 md:mx-auto max-w-7xl my-5">
        <ul class="tabs md:flex justify-between my-2 hidden ">
            <li data-tab-target="#personal_content" id="personal_tab" class=" text-xs lg:text-sm p-3 bg-green-800 text-white rounded-md shadow-xl transition-all duration-300 ease-in-out hover:shadow-inner hover:cursor-pointer hover:bg-green-700 ">
                Personal Data
            </li>
            @if($biodata == "SSW")
            <li data-tab-target="#seminar_content" id="seminar_tab" class="pointer-events-none text-xs lg:text-sm   p-3 bg-green-300 text-black rounded-md shadow-xl transition-all duration-300 ease-in-out hover:shadow-inner hover:cursor-pointer hover:bg-green-700"> 
                Seminar/Certificate
            </li>
            @endif
            <li data-tab-target="#education_content" id="education_tab" class="pointer-events-none text-xs lg:text-sm  p-3 bg-green-300 text-black rounded-md shadow-xl transition-all duration-300 ease-in-out hover:shadow-inner hover:cursor-pointer hover:bg-green-700">
                Educational Background
            </li>
            <li data-tab-target="#emp_local_content" id="job_local_tab" class="pointer-events-none text-xs lg:text-sm  p-3 bg-green-300 text-black rounded-md shadow-xl transition-all duration-300 ease-in-out hover:shadow-inner hover:cursor-pointer hover:bg-green-700">
                Employment Record(local)
            </li>
            <li data-tab-target="#emp_abroad_content" id="job_abroad_tab" class="pointer-events-none text-xs lg:text-sm  p-3 bg-green-300 text-black rounded-md shadow-xl transition-all duration-300 ease-in-out hover:shadow-inner hover:cursor-pointer hover:bg-green-700">
                Employment Record(Abroad)
            </li>
            <li data-tab-target="#family_content" id="family_tab" class="pointer-events-none text-xs lg:text-sm  p-3 bg-green-300 text-black rounded-md shadow-xl transition-all duration-300 ease-in-out hover:shadow-inner hover:cursor-pointer hover:bg-green-700">
                Family Information
            </li>
            <li data-tab-target="#upload_content" id="upload_tab" class="pointer-events-none text-xs lg:text-sm p-3 bg-green-300 text-black rounded-md  shadow-xl transition-all duration-300 ease-in-out hover:shadow-inner hover:cursor-pointer hover:bg-green-700">
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
{{-- modal======================================================= --}}
    <div id="popup-modal" data-modal-target="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="close_send absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to Send and confirm all the details?</h3>
                    <button id="upload_details" type="button" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300  font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Yes, I'm sure
                    </button>
                    <button type="button" class="close_send text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">No, cancel</button>
                </div>
            </div>
        </div>
    </div>
    <x-loader message="Please wait....." />
    
@endsection

@push('scripts')
    <script src="{{asset("js/client/Biodata.js")}}" defer></script>
@endpush