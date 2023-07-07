
@section('title')
    Job Category
@endsection
@extends('jp.layout.client')
@section('content')
<nav class="py-2 px-1 md:px-10 md:py-5 bg-green-500 " aria-label="Breadcrumb">
    <div class="max-w-7xl text-center md:flex justify-between mx-auto px-10">
        <div class="text-sm md:text-2xl text-white">Job Category</div>
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
          <span class="ml-1 md:text-sm font-medium text-white md:ml-2 text-xs">{{$id}}</span>
        </div>
      </li>
      <li aria-current="page">
        <div class="flex items-center">
          <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
          <span class="ml-1 text-xs md:text-sm font-medium text-gray-500 md:ml-2">Job Category</span>
        </div>
      </li>
    </ol>
    </div>
    
</nav>
    <section class="md:grid grid-cols-7 gap-4 mx-2 md:mx-auto max-w-7xl my-5">
        <div class="hidden col-span-1 md:block">
          {{-- <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Toggle modal
          </button> --}}
        </div>
        <div class="md:grid grid-cols-3 gap-5 col-span-6">

            @if($id == 'TITP')
            <x-card_job require="MALE,18-35 years old,With welding experience,No Tattoos,At least High School graduate or Senior High School graduate,Physically and Mentally fit,Willing to undergo Japanese Language Training,Not an ex-trainee" job="welder" category="{{$id}}"/>
            <x-card_job require="FEMALE,18-35 years old,With or Without experience,No Tattoos,At least High School graduate or Senior High School graduate,Physically and Mentally fit,Willing to undergo Japanese Language Training,Not an ex-trainee" job="building cleaner" category="{{$id}}"/>
            <x-card_job require="FEMALE,18-35 years old,With welding experience,No Tattoos,At least High School graduate or Senior High School graduate,Physically and Mentally fit,Willing to undergo Japanese Language Training,Not an ex-trainee" job="kitchen staff" category="{{$id}}"/>
            <x-card_job require="FEMALE,23-35 years old,With or Without experience,No Tattoos,At least High School graduate or Senior High School graduate,Physically and Mentally fit,With JLPT N4 or NAT 4Q is an advantage,With NCII Caregiving is an advantage,Willing to undergo Japanese Language Training,Not an ex-trainee" job="careworker" category="{{$id}}"/>
            <x-card_job require="FEMALE/ MALE,18-35 years old,With welding experience,No Tattoos,At least High School graduate or Senior High School graduate,Physically and Mentally fit,Willing to undergo Japanese Language Training,Not an ex-trainee" job="print wiring board" category="{{$id}}"/>
            <x-card_job require="FEMALE,18-35 years old,With or Without experience,No Tattoos,At least High School graduate or Senior High School graduate,Physically and Mentally fit,Willing to undergo Japanese Language Training,Not an ex-trainee" job="inspector" category="{{$id}}"/>
            <x-card_job require="MALE,18-35 years old,With welding experience,No Tattoos,At least High School graduate or Senior High School graduate,Physically and Mentally fit,Willing to undergo Japanese Language Training,Not an ex-trainee" job="construction" category="{{$id}}"/>
            <x-card_job require="MALE,18-35 years old,With or Without experience,No Tattoos,At least High School graduate or Senior High School graduate,Physically and Mentally fit,Willing to undergo Japanese Language Training,Not an ex-trainee" job="finishing" category="{{$id}}"/>
            <x-card_job require="MALE,18-35 years old,With welding experience,No Tattoos,At least High School graduate or Senior High School graduate,Physically and Mentally fit,Willing to undergo Japanese Language Training,Not an ex-trainee" job="machinist" category="{{$id}}"/>
            <x-card_job require="FEMALE,18-35 years old,With or Without experience,No Tattoos,At least High School graduate or Senior High School graduate,Physically and Mentally fit,Willing to undergo Japanese Language Training,Not an ex-trainee" job="electric equipment assembling" category="{{$id}}"/>
            <x-card_job require="MALE,18-33 years old,With welding experience,No Tattoos,At least High School graduate or Senior High School graduate,Physically and Mentally fit,Willing to undergo Japanese Language Training,Not an ex-trainee" job="seafood processing" category="{{$id}}"/>
            <x-card_job require="FEMALE,18-35 years old,With or Without experience,No Tattoos,At least High School graduate or Senior High School graduate,Physically and Mentally fit,Willing to undergo Japanese Language Training,Not an ex-trainee" job="Painting" category="{{$id}}"/>
            @endif

            @if ($id == "SSW")
            <x-card_job require="FEMALE/ MALE,20-35 years old,No Tattoos,At least High School graduate or Senior High School graduate,Ex-Trainees (TITP) are welcome to apply,Physically and Mentally fit,With Prometric Test (Nursing Care Skills Test and Nursing Care Japanese Language Evaluation Test),With JLPT N4 or JFT " job="careworker" category="{{$id}}"/>
            <x-card_job require="FEMALE/ MALE,20-35 years old,No Tattoos,At least High School graduate or Senior High School graduate,Ex-Trainees (TITP) are welcome to apply with the same category,Physically and Mentally fit,With Prometric Test (Food Service Industry),With JLPT N4 or JFT " job="kitchen staff" category="{{$id}}"/>
            <x-card_job require="MALE,20-35 years old,No Tattoos,At least High School graduate or Senior High School graduate,Ex-Trainees (TITP) are welcome to apply with the same category,Physically and Mentally fit,With Prometric Test (Manufacture of Food and Beverages Test),With JLPT N4 or JFT" job="meat processing" category="{{$id}}"/>
            <x-card_job require="MALE,20-35 years old,No Tattoos,At least High School graduate or Senior High School graduate,Ex-Trainees (TITP) are welcome to apply with the same category,Physically and Mentally fit,With Prometric Test,With JLPT N4 or JFT" job="print wiring board manufacturing" category="{{$id}}"/>
            @endif

            @if ($id == "Direct")
            <x-card_job require="FEMALE/ MALE,20-35 years old,No Tattoos,At least High School graduate or Senior High School graduate,Ex-Trainees (TITP) are welcome to apply,Physically and Mentally fit,With JLPT N2 or N1" job="translator" category="{{$id}}"/>
            <x-card_job require="FEMALE,22-35 years old,No Tattoos,At least High School graduate or Senior High School graduate,Ex-Trainees (TITP) are welcome to apply,Physically and Mentally fit,With NCII Domestic Work is an advantage,With JLPT N4 or NAT 4Q is an advantage,Willing to undergo Japanese Language Training" job="housekeeper" category="{{$id}}"/>
            @endif
        </div>
    </section>

    
    
    <!-- Modal -->
    {{-- <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative w-full max-w-md max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow">
              <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  <span class="sr-only">Close modal</span>
              </button>
              <div class="px-6 py-6 lg:px-8">
                  <h3 class="mb-4 text-xl font-medium text-gray-900">ADD JOB CATEGORY</h3>
                  <form class="space-y-6">
                      <div>
                          <label class="block mb-2 text-sm font-medium text-gray-900">Job Title</label>
                          <input type="text" name="job_title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Job Title" required>
                      </div>
                      <h3 class="mb-4 text-xl font-medium text-gray-900 ">Qualifications:</h3>
                      <button id="add_content" class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-2 py-2 text-center">Add Content</button>
                      <div>
                        <label class="inline-block mb-2 text-sm font-medium text-gray-900 ">Content</label>
                        <span> <button class="inline-block">yeahh</button></span>
                        <input type="text" name="content" class="content bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Content" required>
                      </div>
                      <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required>
                      </div>
                      <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required>
                      </div>
                      <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required>
                      </div>
                      <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required>
                      </div>
                      <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required>
                      </div>
                      <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required>
                      </div>
                      <button class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Job</button>

                  </form>
              </div>
          </div>
      </div>
    </div>  --}}
    
@endsection     