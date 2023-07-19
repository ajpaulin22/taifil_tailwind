
@section('title')
資格
@endsection
@extends('jp.layout.client')
@section('content')
<x-opening_spin/>
<nav class="py-2 px-1 md:px-10 md:py-5 bg-green-500 " aria-label="Breadcrumb">
  <div class="max-w-7xl text-center md:flex justify-between mx-auto px-10">
      <div class="text-sm md:text-2xl text-white">資格</div>
  <ol class="inline-flex items-center space-x-1 md:space-x-3">
    <li class="inline-flex items-center">
      <a href="/jp" class="text-white inline-flex items-center text-xs md:text-sm font-medium hover:text-blue-600">
        <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
        ホーム
      </a>
    </li>
    <li aria-current="page">
      <div class="flex items-center ">
        <svg aria-hidden="true" class="w-6 h-6 text-gray-400 text-xs md:text-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        <span class="ml-1 md:text-sm font-medium text-white md:ml-2 text-xs">{{$id}}</span>
      </div>
    </li>
    <li aria-current="page">
      <div class="flex items-center">
        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        <span class="ml-1 text-xs md:text-sm font-medium text-gray-500 md:ml-2">資格</span>
      </div>
    </li>
  </ol>
  </div>
  
</nav>
<section class="mt-5 mb-5 ">
    <div class=" max-w-7xl md:mx-auto mx-5 p-2 md:grid grid-cols-4 gap-5">
      @admin
      <div class="col-span-4">
        <button id="edit" class="border border-green-500 px-10 py-2 rounded-lg shadow-sm hover:bg-green-500 hover:text-white transition-colors ease-in-out duration-300">EDIT</button>
      </div>
      @endadmin
        <div class="title col-span-4 text-center text-lg h-auto">DOCUMENTS NEEDED FOR APPLICANTS UPON APPLICATION</div>
        {{-- <div class="col-span-2 p-5 border-2 border-green-500 rounded shadow-lg my-5">
            <p>Please bring <b class="bg-yellow-300" ><u>Original</u></b>  documents and <b class="bg-yellow-300"><u>Photocopy</u></b> of these requirements below .</p>
            
            <ul class="ml-5 my-5">
                <li>✅Updated Resume (with picture)
                </li>
                <li>✅PSA Birth Certificate
                </li>
                <li>✅Valid Passport 
                </li>
                <li>✅Baptismal Certificate
                </li>
                <li>✅PEOS Certificate  (<a href="https://www.dmw.gov.ph/" class="text-blue-500 hover:text-blue-800">https://www.dmw.gov.ph/</a>)
                </li>
                <li>✅E-Registration Resume (<a href="https://www.dmw.gov.ph/" class="text-blue-500 hover:text-blue-800">https://www.dmw.gov.ph/</a>)
                </li>
                <li>✅Long Brown Envelope
                </li>
                <li>✅1x1 picture (White Background)</li>
                @if($id == "SSW")
                <li>✅Prometric Test Result
                </li>
                <li>✅JLPT N4 or JFT Certificate</li>
                @endif
            </ul>
            <p><b>FOR EX-TRAINEES of JAPAN </b>, below are the <b><u>Additional requirements</u></b>  needed:</p>
            <ul class="ml-5 my-5">
                <li>✅JITCO Certificate
                </li>
                <li>✅JITCO Form 10-2 (Curriculum Vitae)
                </li>
                <li>✅JITCO Form 10-25 (Dispatch Notice) 
                </li>
            </ul>
            <p class="col-span-4 text-center text-red-600 h-5 text-lg" ><b><u>STRICTLY NO TATTOO</u></b></p>
        </div>
        <div class="col-span-2 p-5 border-2 border-green-500 rounded shadow-lg my-5">
            <p class="text-lg font-bold underline">HOW TO APPLY?
            </p>
            <p class="font-bold mt-10">ALL APPLICANTS MUST ACCOMPLISH THE BIODATA FOUND IN THE TITP/ SSW/ DIRECT TAB
            </p>
            <div class="flex flex-col justify-center items-center">
                <p>WALK-IN APPLICANTS:
                </p>
                <p>Monday to Fridays
                </p>
                <p> -07:00 am First Batch
                </p>
                <p>-12:00 pm Second Batch
                </p>
                <p class="mt-5"> Saturdays
                </p>
                <p>-07:00 am ONLY
                </p>
            </div>
            <p class="col-span-4 text-center text-red-600 text-lg md:text-2xl mt-5" ><b>We do not entertain late comers and incomplete requirements.</b></p>
        </div> --}}
        @if($content_id != "")
        <input id="id-content" type="hidden" value="{{$content_id}}">
        @endif
        
        <div class="ql-snow title col-span-4 text-center text-lg h-auto p-5 border-2 border-green-500 rounded shadow-lg my-5">
          <div class="ql-editor">
            @if($content != "")
            {!! html_entity_decode($content) !!}
            @else
              <P>NO QUALIFICATION ADDED</P>
            @endif
          </div>
        </div>
        
        
    </div>

    <div id="qualification-modal" data-modal-target="qualification-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative w-full max-w-7xl max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Edit Qualifications
                  </h3>
                  <button type="button" class="close-modal text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" >
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-6 space-y-6">
                <div id="scrolling-container" class="col-span-4">
                  <div id="toolbar-container">
                    <span class="ql-formats">
                      <select class="ql-font"></select>
                      <select class="ql-size"></select>
                    </span>
                    <span class="ql-formats">
                      <button class="ql-bold"></button>
                      <button class="ql-italic"></button>
                      <button class="ql-underline"></button>
                      <button class="ql-strike"></button>
                    </span>
                    <span class="ql-formats">
                      <select class="ql-color"></select>
                      <select class="ql-background"></select>
                    </span>
                    <span class="ql-formats">
                      <button class="ql-script" value="sub"></button>
                      <button class="ql-script" value="super"></button>
                    </span>
                    <span class="ql-formats">
                      <button class="ql-header" value="1"></button>
                      <button class="ql-header" value="2"></button>
                      <button class="ql-blockquote"></button>
                      <button class="ql-code-block"></button>
                    </span>
                    <span class="ql-formats">
                      <button class="ql-list" value="ordered"></button>
                      <button class="ql-list" value="bullet"></button>
                      <button class="ql-indent" value="-1"></button>
                      <button class="ql-indent" value="+1"></button>
                    </span>
                    <span class="ql-formats">
                      <button class="ql-direction" value="rtl"></button>
                      <select class="ql-align"></select>
                    </span>
                    <span class="ql-formats">
                      <button class="ql-link"></button>
                      {{-- <button class="ql-image"></button>
                      <button class="ql-video"></button>
                      <button class="ql-formula"></button> --}}
                    </span>
                    <span class="ql-formats">
                      <button class="ql-clean"></button>
                    </span>
                  </div>
                  <div id="content" class="h-auto">
        
                  </div>
                </div>
              </div>
              <!-- Modal footer -->
              <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                  <button id="save_qualification" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                  <button type="button" class="close-modal text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
              </div>
          </div>
      </div>
  </div>
</section>
@push('scripts')
<script src="{{asset("js/client/qualification.js")}}"></script>
@endpush
@endsection