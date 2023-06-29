
@extends('layout.client')
@section('content')
<nav class="px-10 py-5 bg-green-500" aria-label="Breadcrumb">
    <div class="max-w-7xl flex justify-between mx-auto px-10">
        <div class="text-2xl text-white">Qualifications</div>
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
            <span class="text-white text-sm font-medium">{{$id}}</span>
        </div>
      </li>
      <li aria-current="page">
        <div class="flex items-center">
          <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
          <span class="ml-1 text-sm font-medium text-gray-300 md:ml-2 dark:text-gray-400">Qualifications</span>
        </div>
      </li>
    </ol>
    </div>
    
</nav>
<section class="mt-5 mb-5 ">
    
    <div class=" max-w-7xl md:mx-auto mx-5 p-2 md:grid grid-cols-4 gap-5">
        <div class="title col-span-4 text-center h-5 text-lg">DOCUMENTS NEEDED FOR APPLICANTS UPON APPLICATION</div>
        <div class="col-span-2 p-5 border-2 border-green-500 rounded shadow-lg">
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
        <div class="col-span-2 p-5 border-2 border-green-500 rounded shadow-lg">
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
            <p class="col-span-4 text-center text-red-600 h-5 text-2xl mt-5" ><b>We do not entertain late comers and incomplete requirements.
            </b></p>
        </div>
    </div>
</section>
@endsection